<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AutoEntrepreneur;
use Illuminate\Support\Facades\Redirect;
use App\Models\Client;
use App\Models\Facture;
use App\Models\Devis;
use App\Models\Produit;
use App\Models\produit_devis;
use Symfony\Component\VarDumper\VarDumper;

use function Pest\Laravel\get;

class DevisController extends Controller
{
    public function downloadPDF($id)
    {
        $devis = Devis::
            // join('factures', 'devis.id_facture', '=', 'factures.id')
            //     ->
            join('clients', 'devis.id_client', '=', 'clients.id')
            ->join('autoentrepreneurs as auto', 'clients.id_autoentrepreneur', '=', 'auto.id')
            ->join('users', 'auto.id_user', '=', 'users.id')
            ->select(
                'devis.*',
                'clients.nom AS client_nom',
                'clients.adresse AS client_adresse',
                'clients.email AS client_email',
                'clients.contact AS client_contact',
                // 'factures.tva as tva',
                // 'factures.id as facture_id',
                'devis.id as facture_id',
                'devis.total_prix',
                'devis.mode_paiement',
                'devis.date_operation',
                'users.email as auto_email',
                'devis.mode_paiement as Modedepaiement',
                'auto.Nom_entreprise as auto_nom',
                'auto.contact as auto_contact',
                'auto.taux_tax as tva',
                'auto.logo as logo',
                'auto.adresse as auto_adresse'
                
            )
            ->where('devis.id', $id)
            ->get();
        $produitDeChaqueDevis = produit_devis::join('produits', 'produit_devis.id_produit', '=', 'produits.id')
            ->join('Devis', 'devis.id', '=', 'produit_devis.id_devis')
            ->select(
                'produit_devis.*',
                'produits.nom AS produit_nom',
                'produit_devis.quantite as Quantité',
                'produits.prix AS produit_prix',
                'produit_devis.prix as prix_total_produit'
            )->where('devis.id', $id)->get();



        $pdf = app()->make('dompdf.wrapper');
        $pdf->loadView('pdf.templateDevis', ['data' => $devis, 'produits' => $produitDeChaqueDevis]);
        return $pdf->download('Doc_devis_' . $devis[0]["facture_id"] . '.pdf');
    }

    public function recherche(Request $request, $id)
    {
        $auto = AutoEntrepreneur::find($id);
        $tva = $auto->taux_tax;
        $tva_value = (float)$tva;
        $autoentrepreneur = AutoEntrepreneur::where('id_user', $request->user()->id)->first();
        $clients = Client::where('id_autoentrepreneur', $id)->get();
        $produits = Produit::where('id_autoentrepreneur', $id)->get();

        $devis = Devis::join('clients', 'devis.id_client', '=', 'clients.id')
    ->join('autoentrepreneurs', 'clients.id_autoentrepreneur', '=', 'autoentrepreneurs.id')
    ->select(
        'devis.*',
        'clients.nom AS client_nom',
        'clients.adresse AS client_adresse',
        'clients.email AS client_email',
        'clients.contact AS client_contact',
        'devis.id AS id_devis',
        'devis.total_prix',
        'devis.mode_paiement',
        'devis.date_operation',
        'autoentrepreneurs.taux_tax AS tva'
    )
    ->where('autoentrepreneurs.id', $id)
    ->where(function ($query) use ($request) {
        $query->where('clients.nom', 'LIKE', '%' . $request->recherche . '%')
              ->orWhere('clients.adresse', 'LIKE', '%' . $request->recherche . '%')
              ->orWhere('clients.contact', 'LIKE', '%' . $request->recherche . '%')
              ->orWhere('clients.email', 'LIKE', '%' . $request->recherche . '%')
              ->orWhere('devis.id', 'LIKE', '%' . $request->recherche . '%');

            })
    ->get();

        $produitDeChaqueDevis = produit_devis::join('produits', 'produit_devis.id_produit', '=', 'produits.id')
            ->join('Devis', 'devis.id', '=', 'produit_devis.id_devis')
            ->select(
                'produit_devis.*',
                'produits.nom AS produit_nom',
                'produit_devis.quantite as quantite',
                'produits.prix AS produit_prix',
            )->get();



        return view('devis.devis', [
            'user' => $request->user(),
            'navAside' => 'devis',
            'clients' => $clients,
            'produits' => $produits,
            'autoentrepreneur' => $autoentrepreneur,
            'devis' => $devis,
            'ProduitsChaqueDevis' => $produitDeChaqueDevis
        ]);
    }

    public function index(Request $request, $id)
    {
        $auto = AutoEntrepreneur::find($id);
        $tva = $auto->taux_tax;
        $tva_value = (float)$tva;
        $autoentrepreneur = AutoEntrepreneur::where('id_user', $request->user()->id)->first();
        $clients = Client::where('id_autoentrepreneur', $id)->get();
        $produits = Produit::where('id_autoentrepreneur', $id)->get();

        $devis = Devis::
            // join('factures', 'devis.id_facture', '=', 'factures.id') ->
            join('clients', 'devis.id_client', '=', 'clients.id')
            ->join('autoentrepreneurs', 'clients.id_autoentrepreneur', '=', 'autoentrepreneurs.id')
            ->select(
                'devis.*',
                'clients.nom AS client_nom',
                'clients.adresse AS client_adresse',
                'clients.email AS client_email',
                'clients.contact AS client_contact',
                // 'factures.tva as tva',
                // 'factures.id as facture_id',
                'devis.id as id_devis',
                'devis.total_prix',
                'devis.mode_paiement',
                'devis.date_operation',
                'autoentrepreneurs.taux_tax as tva'
            )
            ->where('autoentrepreneurs.id', $id)
            ->get();
        $produitDeChaqueDevis = produit_devis::join('produits', 'produit_devis.id_produit', '=', 'produits.id')
            ->join('Devis', 'devis.id', '=', 'produit_devis.id_devis')
            ->select(
                'produit_devis.*',
                'produits.nom AS produit_nom',
                'produit_devis.quantite as quantite',
                'produits.prix AS produit_prix',
            )->get();



        return view('devis.devis', [
            'user' => $request->user(),
            'navAside' => 'devis',
            'clients' => $clients,
            'produits' => $produits,
            'autoentrepreneur' => $autoentrepreneur,
            'devis' => $devis,
            'ProduitsChaqueDevis' => $produitDeChaqueDevis
        ]);
    }

    public function update(Request $request, $id)
    {
        $devis = Devis::findOrFail($id);
        $prix = 0;
        if (
            $request->produit !== "0"
        ) {
            $product = Produit::find($request->produit);

            $prix_unitaire = $product->prix;

            $quantite = $request->quantite;
          
            $prix = $prix_unitaire * $quantite *  $request->tva ;

            $produitDevis = new produit_devis();

            $produitDevis->id_produit = $request->produit;
            $produitDevis->id_devis = $id;
            $produitDevis->quantite = $quantite;
            $produitDevis->prix = $prix;
            $produitDevis->save();
        }
   
        $devis->update([

            'id_client' => $request->client,
            'total_prix' => $request->total_prix + $prix,
            'mode_paiement' => $request->mode_paiement,
            'date_operation' => $request->date_operation,
        ]);
        return Redirect::route('devis', $devis->id_autoentrepreneur)->with('status', 'profile-updated');
    }
    public function create(Request $request, $id)
    {
        $autoentrepreneur = AutoEntrepreneur::where('id_user', $request->user()->id)->first();
        $clients = Client::where('id_autoentrepreneur', $id)->get();
        $produits = produit::where('id_autoentrepreneur', $id)->get();
        do {
            $numero_devis = rand();
        } while (Devis::where('id',  $numero_devis)->exists());

        return view('devis.add', [
            'user' => $request->user(),
            'navAside' => 'devis',
            'clients' => $clients,
            'produits' => $produits,
            'autoentrepreneur' => $autoentrepreneur,
            'numero_devis' => $numero_devis,

        ]);
    }


    public function store(Request $request, $id)
    {
        $prix_total = 0;
        $auto = AutoEntrepreneur::find($id);
        $tva = $auto->taux_tax;
        // $tva_value = (float)$tva;
        if ($request->client === null && $request->email !== null && $request->adresse !== null && $request->contact !== null) {
            $client = new Client();
            $client->nom = $request->nomClient;
            $client->email = $request->email;
            $client->adresse = $request->adresse;
            $client->contact = $request->contact;
            $client->id_autoentrepreneur = $id;
            $client->save();
            $id_client = $client->id;
        } else {
            $id_client = $request->client;
        }

        $devis = new Devis();
        $devis->id = $request->numero_devis;
        $devis->id_autoentrepreneur = $id;
        $devis->id_client = $id_client;
        $devis->mode_paiement = $request->mode_paiement;
        $devis->date_operation = $request->date_operation;
        $devis->total_prix = $prix_total;

        $devis->save();
        $prix = 0;

        // && $request->nomProduit !== null && $request->prix !== null && $request->stock !== null
        // && $request->description !== null
        if (
            $request->nomProduit !== "" && $request->nomProduit !== null
        ) {

            if ($request->hasFile('photo')) {

                $request->validate([
                    'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
                $file = $request->file('photo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('produits'), $filename);
                $filename = 'produits/' . $filename;
            }

            $produit = new Produit();
            $produit->id_autoentrepreneur = $id;
            $produit->nom = $request->nomProduit;
            $produit->prix = $request->prix;
            $produit->stock = $request->stock;
            $produit->description = $request->description;
            $produit->example = $filename;
            $produit->date_creation = now();
            
            $produit->save();
            $id_produit = $produit->id;
            $prix =  $request->prix * $request->qantiteNew * $tva ;
            $devis_produi = new produit_devis();
            $devis_produi->id_produit =  $id_produit;
            $devis_produi->id_devis = $request->numero_devis;
            $devis_produi->quantite = $request->qantiteNew;
            $devis_produi->prix=$prix;
            $devis_produi->save();
          
            $prix_total = $prix_total + $prix;
        }












        // $facture = new Facture();

        // $facture->date_facturation = $request->date_operation;
        // $facture->titre = "Facture de devis produit " . $request->produit . "; client " . $request->client;
        // $facture->tva = $tva;

        // $facture->save();


        ////////

        $produits = $request->produits;
        $quantites = $request->quantite;

        $prix = (!0) ? $prix_total = 0 : $prix_total = $prix;
        for ($i = 0; $i < count($produits); $i++) {
            if ($produits[$i] !== "0") {

                $product = Produit::find($produits[$i]);
               
                if ($product) {
              
                    $prix_unitaire = $product->prix;
                    $quantite = $quantites[$i];
                    $quantite_value = (float)$quantite;
                    $prix_unitaire_value = (float)$prix_unitaire;
                    $devis_produi = new produit_devis();
                    $devis_produi->id_produit = $produits[$i];
                    $devis_produi->id_devis = $request->numero_devis;
                    $devis_produi->quantite = $quantite;
                    $devis_produi->prix = $prix_unitaire_value *  $quantite_value;
                    $devis_produi->save();
                    $subtotal = $quantite_value * $prix_unitaire_value;
                    $tva_amount = $subtotal * $tva;
                    $prix_total += $subtotal - $tva_amount;
                
                } else {
                    return response()->json(['error' => 'Produit non trouvé'], 404);
                }
            }
           
            $devis->update([
                'total_prix' => $prix_total,
            ]);

            return Redirect::route('devis', $id)->with('status', 'devis');
        }
    }

    public function destroy(Request $request, $id)
    {
        $devis = Devis::findOrFail($id);
        $devis->delete();
        return Redirect::route('devis', $devis->id_autoentrepreneur)->with('status', 'profile-updated');
    }
}
