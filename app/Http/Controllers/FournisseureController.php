<?php

namespace App\Http\Controllers;

use App\Models\achat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\PDF;
use App\Models\AutoEntrepreneur;
use App\Models\categorie;
use Illuminate\Support\Facades\Redirect;
use App\Models\fournisseur;
use App\Models\bonDeCommande;

use Illuminate\Support\Facades\DB;
class FournisseureController extends Controller
{



    public function downloadPDF($parameters)



    {
        $params = json_decode(base64_decode($parameters), true);

        $pdf = app()->make('dompdf.wrapper');
        $pdf->loadView('pdf.templateAchat', ['data' => $params]);
        return $pdf->download('Doc_operations d\'achat ' . $params['nom'] . '.pdf');
    }

    public function addCategorie(Request $request, $id)
    {

        $cat = new categorie();
        $cat->categorie = $request->Newcategorie;
        $cat->id_autoentrepreneur = $id;
        $cat->save();
        return Redirect::route('fournisseures', $id)->with('status', 'profile-updated');
    }

    public function recherche(Request $request, $id)
   
    {
        // Retrieve autoentrepreneur data
        $autoentrepreneur = AutoEntrepreneur::where('id_user', $request->user()->id)->first();
    
        // Retrieve fournisseurs data
        $fournisseurs = Fournisseur::join('categories', 'fournisseurs.id_categorie', '=', 'categories.id')
            ->where('fournisseurs.id_autoentrepreneur', $id)
            ->where(function ($query) use ($request) {
                $query->where('nom', 'LIKE', '%' . $request->recherche . '%')
                    ->orWhere('adresse', 'LIKE', '%' . $request->recherche . '%')
                    ->orWhere('contact', 'LIKE', '%' . $request->recherche . '%')
                    ->orWhere('email', 'LIKE', '%' . $request->recherche . '%')
                    ->orWhere('categorie', 'LIKE', '%' . $request->recherche . '%');

            })
            ->select('fournisseurs.*', 'categories.categorie as categorie')
            ->get();
         
        // Retrieve categories data
        $categories = Categorie::where('id_autoentrepreneur', $id)->get();
    
        // Retrieve statistics data
        $statistics = DB::table('fournisseurs')
            ->join('categories', 'fournisseurs.id_categorie', '=', 'categories.id')
            ->select('categories.categorie', DB::raw('count(fournisseurs.id_categorie) as count'))
            ->where('fournisseurs.id_autoentrepreneur', $id)
            ->groupBy('categories.id','categories.categorie')
            ->get();
            $supplierStatics = Fournisseur::select(
                'fournisseurs.nom',
                'categories.categorie as categorie',
                DB::raw('count(bon_de_commandes.id) as bon_commande_count')
            )
            ->join('categories', 'fournisseurs.id_categorie', '=', 'categories.id')

            ->leftJoin('bon_de_commandes', 'bon_de_commandes.id_fournisseur', '=', 'fournisseurs.id')
            ->groupBy('fournisseurs.id', 'fournisseurs.nom', 'categorie')
            ->get();
        
            // Calculate total number of bon_commande for all suppliers
            $totalBonCommande = bonDeCommande::count();
        // Pass data to the view
        return view('fournisseures.fournisseures', [
            'user' => $request->user(),
            'supplierStatics' => $supplierStatics,
            'totalBonCommande' => $totalBonCommande,
            'navAside' => 'fournisseurs',
            'fournisseures' => $fournisseurs,
            'autoentrepreneur' => $autoentrepreneur,
            'categories' => $categories,
            'statistics' => $statistics, // Pass statistics data to the view
        ]);
    }
    
    public function index(Request $request, $id)
    {
        // Retrieve autoentrepreneur data
        $autoentrepreneur = AutoEntrepreneur::where('id_user', $request->user()->id)->first();
    
        // Retrieve fournisseurs data
        $fournisseurs = Fournisseur::join('categories', 'fournisseurs.id_categorie', '=', 'categories.id')
            ->where('fournisseurs.id_autoentrepreneur', $id)
            ->select('fournisseurs.*', 'categories.categorie as categorie')
            ->get();
         
        // Retrieve categories data
        $categories = Categorie::where('id_autoentrepreneur', $id)->get();
    
        // Retrieve statistics data
        $statistics = DB::table('fournisseurs')
            ->join('categories', 'fournisseurs.id_categorie', '=', 'categories.id')
            ->select('categories.categorie', DB::raw('count(fournisseurs.id_categorie) as count'))
            ->where('fournisseurs.id_autoentrepreneur', $id)
            ->groupBy('categories.id','categories.categorie')
            ->get();
            $supplierStatics = Fournisseur::select(
                'fournisseurs.nom',
                'categories.categorie as categorie',
                DB::raw('count(bon_de_commandes.id) as bon_commande_count')
            )
            ->join('categories', 'fournisseurs.id_categorie', '=', 'categories.id')

            ->leftJoin('bon_de_commandes', 'bon_de_commandes.id_fournisseur', '=', 'fournisseurs.id')
            ->groupBy('fournisseurs.id', 'fournisseurs.nom', 'categorie')
            ->get();
            $bonDeCommande = bonDeCommande::
            // join('factures', 'devis.id_facture', '=', 'factures.id')
            //     ->
            join('fournisseurs', 'bon_de_commandes.id_fournisseur', '=', 'fournisseurs.id')
            ->join('autoentrepreneurs as auto', 'fournisseurs.id_autoentrepreneur', '=', 'auto.id')
            ->join('users', 'auto.id_user', '=', 'users.id')
            ->select(
                'bon_de_commandes.*',
               

                'fournisseurs.contact AS client_contact',
                // 'factures.tva as tva',
                // 'factures.id as facture_id',
                'bon_de_commandes.id as facture_id',
               
                'bon_de_commandes.mode_paiement',
                'bon_de_commandes.date_operation',
                'users.email as auto_email',
                'bon_de_commandes.mode_paiement as Modedepaiement',
                'auto.Nom_entreprise as auto_nom',
                'auto.contact as auto_contact',
                'auto.taux_tax as tva',
                'auto.logo as logo'
            )
            ->where('auto.id', $id)
            ->get();
        
            // Calculate total number of bon_commande for all suppliers
            $totalBonCommande = bonDeCommande::count();
        // Pass data to the view
        return view('fournisseures.fournisseures', [
            'achats' => $bonDeCommande,
            'user' => $request->user(),
            'supplierStatics' => $supplierStatics,
            'totalBonCommande' => $totalBonCommande,
            'navAside' => 'fournisseurs',
            'fournisseures' => $fournisseurs,
            'autoentrepreneur' => $autoentrepreneur,
            'categories' => $categories,
            'statistics' => $statistics, // Pass statistics data to the view
        ]);
    }
    
    public function  update($id_produit)
    {

        $fournisseure = fournisseur::findOrFail($id_produit);
        $id_cat = Categorie::where('categorie', request('categorie'))
            ->where('id_autoentrepreneur', $fournisseure->id_autoentrepreneur)
            ->select('id')
            ->first();
        $fournisseure->update([
            'nom' => request('nom'),
            'email' => request('email'),
            'adresse' => request('adresse'),
            'contact' => request('contact'),
            'categorie' =>   $id_cat->id,
        ]);
        return Redirect::route('fournisseures', $fournisseure->id_autoentrepreneur)->with('status', 'profile-updated');
    }
    public function store(Request $request, $id)
    {


        $fournisseure = new  fournisseur();
        $fournisseure->nom = request('nom');
        $fournisseure->email = request('email');
        $fournisseure->adresse = request('adresse');
        $fournisseure->contact = request('contact');
        $fournisseure->id_autoentrepreneur = $id;
       
        $fournisseure->id_categorie =  request('categorie');
        $fournisseure->save();
        return redirect()->back()->with('success', 'Categorie ajoutée avec succès.');
    }
    public function destroy(Request $request, $id)
    {
  
        $fournisseure = fournisseur::findOrFail($id);      
        $fournisseure->delete();
     
        return Redirect::route('fournisseures', $fournisseure->id_autoentrepreneur)->with('status', 'profile-updated');
    }
}
