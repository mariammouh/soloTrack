<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\PDF;
use App\Models\AutoEntrepreneur;
use App\Models\categorie;
use App\Models\depense;
use Illuminate\Support\Facades\Redirect;
use App\Models\fournisseur;
class DepenseController extends Controller
{
    public function index(Request $request, $id)
    {

        $autoentrepreneur = AutoEntrepreneur::where('id_user', $request->user()->id)->first();
  $depenses=depense ::join('categories', 'depenses.id_categorie', '=', 'categories.id')
            ->where('depenses.id_autoentrepreneur', $id)
            ->select('depenses.*',
            'categories.categorie as categorie'
            )
            ->get();
  $categorie = categorie::where('id_autoentrepreneur', $id)->get();
  return view('depenses.depenses', [
    'user' => $request->user(),'depenses'=> $depenses ,'navAside' => 'depense',  'autoentrepreneur' => $autoentrepreneur,
    'categories' => $categorie
]);
    }
    public function store(Request $request, $id)
    {
        
       
    
        // Retrieve the autoentrepreneur
        $autoentrepreneur = Autoentrepreneur::findOrFail($id);
    
        // Create the new depense
        $depense = new Depense();
        $depense->description = $request->description;
        $depense->montant = $request->montant;
        $depense->date_depense = $request->date_depense;
        $depense->date_limit_depense = $request->date_limit_depense;
        $depense->mode_paiement = $request->mode_paiement;
        $depense->id_categorie = $request->categorie;
        $depense->id_autoentrepreneur = $autoentrepreneur->id;
    
        $depense->save();
    
        return redirect()->back()->with('success', 'Dépense ajoutée avec succès.');
    }
    
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
       
    
        // Retrieve the depense
        $depense = Depense::findOrFail($id);
   
        // Update the depense fields
        $depense->description = $request->description;
        $depense->montant = $request->montant;
        $depense->date_depense = $request->date_depense;
        $depense->date_limit_depense = $request->date_limit_depense;
        $depense->mode_paiement = $request->mode_paiement;
        $depense->id_categorie = $request->categorie;
    
        // Save the updated depense to the database
        $depense->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Dépense mise à jour avec succès.');
    }
    
    public function destroy(Request $request, $id)
    {
        $depense = Depense::findOrFail($id);
$depense->delete();
return redirect()->back()->with('success', 'Dépense est supprimée avec succès.');

    }
}
