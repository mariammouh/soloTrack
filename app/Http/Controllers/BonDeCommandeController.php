<?php

namespace App\Http\Controllers;

use App\Models\bonDeCommande;
use Illuminate\Http\Request;
use App\Models\AutoEntrepreneur;
use Illuminate\Support\Facades\Redirect;
use App\Models\produit_bon_de_commande;
use App\Models\Facture;
use App\Models\fournisseur;
use App\Models\Produit;
use App\Models\categorie;
use Termwind\Components\Dd;

use Illuminate\Support\Facades\DB;
class BonDeCommandeController extends Controller
{

        public function downloadPDF($id)
        {
            $bon_de_commande = bonDeCommande::
            // join('factures', 'bon_de_commande.id_facture', '=', 'factures.id')
            //     ->
                join('fournisseurs', 'bon_de_commandes.id_fournisseur', '=', 'fournisseurs.id')
                ->join('autoentrepreneurs as auto', 'fournisseurs.id_autoentrepreneur', '=', 'auto.id')
                ->join('users', 'auto.id_user', '=', 'users.id')
                ->select(
                    'bon_de_commandes.*',
                    'fournisseurs.nom AS fournisseur_nom',
                    'fournisseurs.adresse AS fournisseur_adresse',
                    'fournisseurs.email AS fournisseur_email',
                    'fournisseurs.contact AS fournisseur_contact',
                    // 'factures.tva as tva',
                    // 'factures.id as facture_id',
                    'bon_de_commandes.id as facture_id',
                   
                    'bon_de_commandes.mode_paiement',
                    'bon_de_commandes.date_operation',
                    'users.email as auto_email',
                    'bon_de_commandes.mode_paiement as Modedepaiement',
                    'auto.Nom_entreprise as auto_nom',
                    'auto.contact as auto_contact',
                  
                   'auto.logo as logo'
                )
                ->where('bon_de_commandes.id', $id)
                ->get();
            $produitDeChaquebon_de_commande = produit_bon_de_commande::join('produits', 'produit_bon_de_commandes.id_produit', '=', 'produits.id')
                ->join('bon_de_commandes', 'bon_de_commandes.id', '=', 'produit_bon_de_commandes.id_bon_de_commande')
                ->select(
                    'produit_bon_de_commandes.*',
                    'produits.nom AS produit_nom',
                    'produit_bon_de_commandes.quantite as Quantité',
                   
                ) ->where('bon_de_commandes.id', $id)->get();
    
            
    
            $pdf = app()->make('dompdf.wrapper');
            $pdf->loadView('pdf.templatebon_de_commande', ['data' => $bon_de_commande,'produits'=>$produitDeChaquebon_de_commande]);
            return $pdf->download('Doc_bon_de_commande_'.$bon_de_commande[0]["facture_id"].'.pdf');
        }
    
        public function index(Request $request, $id)
        {
            $autoentrepreneur = AutoEntrepreneur::where('id_user', $request->user()->id)->first();
            $fournisseurs = fournisseur::where('id_autoentrepreneur', $id)->get();
            $produits = Produit::where('id_autoentrepreneur', $id)->get();
    
            $bon_de_commande = bonDeCommande::
                join('fournisseurs', 'bon_de_commandes.id_fournisseur', '=', 'fournisseurs.id')
                ->join('autoentrepreneurs', 'fournisseurs.id_autoentrepreneur', '=', 'autoentrepreneurs.id')
                ->select(
                    'bon_de_commandes.*',
                    'fournisseurs.nom AS fournisseur_nom',
                    'fournisseurs.adresse AS fournisseur_adresse',
                    'fournisseurs.email AS fournisseur_email',
                    'fournisseurs.contact AS fournisseur_contact',
                'autoentrepreneurs.taux_tax as tva',
            
                    'bon_de_commandes.id as id_bon_de_commande',
           
                    'bon_de_commandes.mode_paiement',
                    'bon_de_commandes.date_operation'
                )
                ->where('autoentrepreneurs.id', $id)
                ->get();
              
            $produitDeChaquebon_de_commande = produit_bon_de_commande::join('produits', 'produit_bon_de_commandes.id_produit', '=', 'produits.id')
                ->join('bon_de_commandes', 'bon_de_commandes.id', '=', 'produit_bon_de_commandes.id_bon_de_commande')
                ->select(
                    'produit_bon_de_commandes.*',
                    'produits.nom AS produit_nom',
                    'bon_de_commandes.id as id_bon_de_commande',
                )->get();
    
           
    
            return view('bon_de_commande.bon_de_commande', [
          
                'user' => $request->user(),
                'navAside' => 'bon_de_commande',
                'fournisseurs' => $fournisseurs,
                'produits' => $produits,
                'autoentrepreneur' => $autoentrepreneur,
                'bon_de_commandes' => $bon_de_commande,
                'ProduitsChaquebon_de_commandes' => $produitDeChaquebon_de_commande
            ]);
        }
    
        public function update(Request $request, $id)
        {
            $bon_de_commande = bonDeCommande::findOrFail($id);
            $produitbon_de_commande = new produit_bon_de_commande();
            $produitbon_de_commande->id_produit = $request->produit;
            $produitbon_de_commande->id_bon_de_commande = $id;
            $produitbon_de_commande ->quantite = $request->qantite;
            $produitbon_de_commande->save();
            $bon_de_commande->update([
    
                'id_fournisseur' => $request->fournisseur,
    
              
                'mode_paiement' => $request->mode_paiement,
                'date_operation' => $request->date_operation,
            ]);
            return Redirect::route('bon_de_commandes', $bon_de_commande->id_autoentrepreneur)->with('status', 'profile-updated');
        }
        public function create(Request $request, $id)
        {
           
            $autoentrepreneur = AutoEntrepreneur::where('id_user', $request->user()->id)->first();
            $fournisseurs = fournisseur::where('id_autoentrepreneur', $id)->get();
            $produits = produit::where('id_autoentrepreneur', $id)->get();
            do {
                $numero_bon_de_commande = rand();
            } while (BonDeCommande::where('id', $numero_bon_de_commande)->exists());
            $categorie=categorie::where('id_autoentrepreneur', $id)->get(); 
            return view('bon_de_commande.add', [
                'user' => $request->user(),
                'navAside' => 'bon_de_commande',
                'fournisseurs' => $fournisseurs,
                'produits' => $produits,
                'autoentrepreneur' => $autoentrepreneur,
                'numero_bon_de_commande' => $numero_bon_de_commande,
                'categories' =>$categorie
            ]);
        }
    
    
        public function store(Request $request, $id)
        {
            $auto = AutoEntrepreneur::find($id);
            $tva = $auto->taux_tax;
            $tva_value = (float)$tva;
            if ($request->fournisseur === null && $request->email !== null && $request->adresse !== null && $request->contact !== null) {
                $fournisseur = new fournisseur();
                $fournisseur->nom = $request->nomfournisseur;
                $fournisseur->email = $request->email;
                $fournisseur->adresse = $request->adresse;
                $fournisseur->contact = $request->contact;
                $fournisseur->id_autoentrepreneur = $id;
               
                  $fournisseur->id_categorie =  $request->categorie;
                $fournisseur->save();
                $id_fournisseur = $fournisseur->id;
            } else {
                $id_fournisseur = $request->fournisseur;
            }
    
            $bon_de_commande = new bonDeCommande();
            $bon_de_commande->id = $request->numero_bon_de_commande;
            $bon_de_commande->id_autoentrepreneur = $id;
            $bon_de_commande->id_fournisseur = $id_fournisseur;
    
    
            $bon_de_commande->mode_paiement = $request->mode_paiement;
            $bon_de_commande->date_operation = $request->date_operation;
        
    
            $bon_de_commande->save();
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
                $prix =  $request->prix * $request->qantiteNew * $tva_value / 100;
                $bon_de_commande_produi = new produit_bon_de_commande();
                $bon_de_commande_produi->id_produit =  $id_produit;
               
                $bon_de_commande_produi->id_bon_de_commande = $request->numero_bon_de_commande;
                $bon_de_commande_produi->quantite = $request->qantiteNew;
                $bon_de_commande_produi->save();
            }
    
    
    
    
    
    
    
    
    
    
    
    
            // $facture = new Facture();
    
            // $facture->date_facturation = $request->date_operation;
            // $facture->titre = "Facture de bon_de_commande produit " . $request->produit . "; fournisseur " . $request->fournisseur;
            // $facture->tva = $tva;
    
            // $facture->save();
    
    
            ////////
    
            $produits = $request->produits;
            $quantites = $request->quantite;
    
            $prix = (!0) ? $prix_total = 0 : $prix_total = $prix;
            for ($i = 0; $i < count($produits); $i++) {
     if($produits[$i]!=="0"){
    
                $product = Produit::find($produits[$i]);
                if ($product) {
                    $prix_unitaire = $product->prix;
    
                    $quantite = $quantites[$i];
    
                    $bon_de_commande_produi = new produit_bon_de_commande();
                    $bon_de_commande_produi->id_produit = $produits[$i];
                    $bon_de_commande_produi->id_bon_de_commande = $request->numero_bon_de_commande;
                    $bon_de_commande_produi->quantite = $quantite;
                    $bon_de_commande_produi->save();
                    $quantite_value = (float)$quantite;
                    $prix_unitaire_value = (float)$prix_unitaire;
    
    
                    $subtotal = $quantite_value * $prix_unitaire_value;
                    $tva_amount = $subtotal * $tva_value / 100;
    
                    $prix_total += $subtotal - $tva_amount;
                } else {
                    return response()->json(['error' => 'Produit non trouvé'], 404);
                }
            }
    
          
    
            return Redirect::route('bon_de_commandes', $id)->with('status', 'bon_de_commande');
        } }
    
        public function destroy(Request $request, $id)
        {
            $bon_de_commande = bonDeCommande::findOrFail($id);
            $bon_de_commande->delete();
            return Redirect::route('bon_de_commandes', $bon_de_commande->id_autoentrepreneur)->with('status', 'profile-updated');
        }
    }
    

