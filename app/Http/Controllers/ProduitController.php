<?php

namespace App\Http\Controllers;

use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AutoEntrepreneur;
use Illuminate\Support\Facades\Redirect;
use App\Models\Devis;
use Illuminate\Support\Facades\DB;
class ProduitController extends Controller
{

    public function index(Request $request, $id)
    {

        $autoentrepreneur = AutoEntrepreneur::where('id_user', $request->user()->id)->first();
        $produits = produit::where('id_autoentrepreneur', $id)->get();
        $productStatics = Produit::select(
            'produits.nom',
            'produits.prix',
            DB::raw('count(devis.id) as devis_count')
        )
        ->leftJoin('produit_devis', 'produit_devis.id_produit', '=', 'produits.id')
        ->leftJoin('devis', 'produit_devis.id_devis', '=', 'devis.id')
        ->groupBy('produits.id', 'produits.nom', 'produits.prix')
        ->get();
    
        // Calculate total number of devis for all products
        $totalDevis = Devis::count();    

        return view('produits.produit', [
            'productStatics' => $productStatics,
        'totalDevis' => $totalDevis,
            'user' => $request->user(), 'navAside' => 'produits', 'produits' => $produits, 'autoentrepreneur' => $autoentrepreneur
        ]);
    }
    public function  update($id_produit)
    {
        $produit = produit::findOrFail($id_produit);
        $produit->update([
            'prix' => request('prix'),
            'stock' => request('stock'),
            'nom' => request('nom'),
            'description' => request('description'),
        ]);
        return Redirect::route('produits',$produit->id_autoentrepreneur)->with('status', 'profile-updated');

    }
    public function store(Request $request, $id)
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
        return Redirect::route('produits',$id)->with('status', 'profile-updated');

    }
    public function destroy(Request $request,$id_produit)
    { 
        $produit = produit::findOrFail($id_produit);
$produit->delete();
return Redirect::route('produits',$produit->id_autoentrepreneur)->with('status', 'profile-updated');

    }
}
