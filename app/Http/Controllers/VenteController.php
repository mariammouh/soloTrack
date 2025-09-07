<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AutoEntrepreneur;
use Illuminate\Support\Facades\Redirect;
use App\Models\client;
use App\Models\facture;
use App\Models\vente;
use App\Models\produit;
class VenteController extends Controller
{
    public function downloadPDF($parameters)
    {
        $params = json_decode(base64_decode($parameters), true);
    
        $pdf = app()->make('dompdf.wrapper');
        $pdf->loadView('pdf.templateVend', ['data' => $params]);
        return $pdf->download('Doc_operations de vend ' . $params['nom'] . '.pdf');
    }
  
    public function index(Request $request, $id)
    {
        $autoentrepreneur = AutoEntrepreneur::where('id_user', $request->user()->id)->first();
        $clients = Client::where('id_autoentrepreneur', $id)->get();
        $produits = produit::where('id_autoentrepreneur', $id)->get();

        $ventes = Vente::join('produits', 'ventes.id_produit', '=', 'produits.id')
        ->join('factures', 'ventes.id_facture', '=', 'factures.id')
        ->join('clients', 'ventes.id_client', '=', 'clients.id')
        ->join('autoentrepreneurs', 'clients.id_autoentrepreneur', '=', 'autoentrepreneurs.id')
        ->select('ventes.*', 
                 'clients.nom AS client_nom', 
                 'clients.adresse AS client_adresse',
                 'clients.email AS client_email', 
                 'clients.contact AS client_contact', 
                 'produits.nom AS produit_nom', 
                 'produits.prix AS produit_prix', 
                 'factures.tva as tva','factures.id as facture_id',
                 'ventes.qantite', 
                 'ventes.total_prix', 
                 'ventes.mode_paiement', 
                 'ventes.date_operation')
        ->where('autoentrepreneurs.id', $id)
        ->get();
    
    
    
    
    return view('ventes.ventes', [
        'user' => $request->user(),
        'navAside' => 'ventes',
        'clients'=>$clients,
        'produits' => $produits,  
        'autoentrepreneur' => $autoentrepreneur,
        'ventes' => $ventes
    ]);
    }
    
    public function  update($id_client)
    {
        $client = Client::findOrFail($id_client);
        $client->update([
            'nom' => request('nom'),
            'email' => request('email'),
            'adresse' => request('adresse'),
            'contact' => request('contact'),
        ]);
        return Redirect::route('clients', $client->id_autoentrepreneur)->with('status', 'profile-updated');
    }
    public function storeclient(Request $request, $id)
{
    $client = new  Client();
    $client->nom = request('nom');
    $client->email = request('email');
    $client->adresse = request('adresse');
    $client->contact = request('contact');
    $client->id_autoentrepreneur = $id;
    $client->save();
    return Redirect::route('ventes', $id)->with('status', 'vente');
}
public function storeProduit(Request $request, $id)
    {
        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('produits'), $filename);
            $filename =   'produits/' .  $filename;
        }

        $produit = new produit();
        $produit->id_autoentrepreneur = $id;
        $produit->nom = $request->nom;
        $produit->prix = $request->prix;
        $produit->stock = $request->stock;
        $produit->description = $request->description;
        $produit->example = $filename;
        $produit->date_creation =now();
        $produit->save();
        return Redirect::route('ventes', $id)->with('status', 'vente');

    }
    public function store(Request $request, $id)
    {


if($request->client===null){
    $client = new client();
    $client->nom = $request->nom_client;
    $client->email = $request->email;
    $client->adresse = $request->adresse;
    $client->contact = $request->contact;
    $client->id_autoentrepreneur = $id;
    $client->save();
    $id_client=$client->id;
}else {
    $id_client=$request->client;
}
if($request->produit===""){
    if ($request->hasFile('photo')) {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('produits'), $filename);
        $filename =   'produits/' .  $filename;
    }

    $produit = new produit();
    $produit->id_autoentrepreneur = $id;
    $produit->nom = $request->nom;
    $produit->prix = $request->prix;
    $produit->stock = $request->stock;
    $produit->description = $request->description;
    $produit->example = $filename;
    $produit->date_creation =now();
    $produit->save();
$id_produit=$produit->id;
}else{
$id_produit=request('produit');
}
        $product = Produit::find($id_produit);

        if ($product) {
      
            $prix_unitaire = $product->prix;
            $quantite = $request->qantite;
            $tva = $request-> tva;
        
            $prix_total = $quantite * $prix_unitaire - ($quantite * $prix_unitaire * $tva / 100);
            
            $facture = new Facture();
            $facture->prix_effectuée= $prix_total;
            $facture->date_facturation=$request->date_operation;
            $facture->titre="facteure de vente produit  ".$request->produit;"client ".$request->client;
            $facture->tva = $tva;
            
            $facture->save(); 

            $vente = new vente();
            $vente->id_autoentrepreneur = $id;
            $vente->id_client = $id_client;
            $vente->id_produit = $id_produit;
            $vente->qantite = $quantite;
            $vente->mode_paiement = $request->mode_paiement;
            $vente->date_operation = $request->date_operation;
          
            $vente->total_prix = $prix_total;
            $vente->id_facture=$facture->id;
            $vente->save();
        
         
         
        } else {
            // Product with the given ID not found, handle the error accordingly
            // For example, return a response indicating the error
            return response()->json(['error' => 'Product not found'], 404);
        }
       
        return Redirect::route('ventes', $id)->with('status', 'vente');
    }
    
    public function destroy(Request $request, $id)
    {
        $vente = vente::findOrFail($id);
        $vente->delete();
        return Redirect::route('ventes', $vente->id_autoentrepreneur)->with('status', 'profile-updated');
    }
    
}
