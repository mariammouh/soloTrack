<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\PDF;
use App\Models\AutoEntrepreneur;
use Illuminate\Support\Facades\Redirect;
use App\Models\client;
use App\Models\devis;

class ClientController extends Controller
{
    public function downloadPDF($parameters)
    {
        $params = json_decode(base64_decode($parameters), true);

        $pdf = app()->make('dompdf.wrapper');
        $pdf->loadView('pdf.templateVend', ['data' => $params]);
        return $pdf->download('Doc_operations de vend ' . $params['nom'] . '.pdf');
    }

    public function recherche(Request $request, $id)
    {
        $autoentrepreneur = AutoEntrepreneur::where('id_user', $request->user()->id)->first();
        $clients = Client::where('id_autoentrepreneur', $id)
            ->where(function ($query) use ($request) {
                $query->where('nom', 'LIKE', '%' . $request->recherche . '%')
                    ->orWhere('adresse', 'LIKE', '%' . $request->recherche . '%')
                    ->orWhere('contact', 'LIKE', '%' . $request->recherche . '%')
                    ->orWhere('email', 'LIKE', '%' . $request->recherche . '%');
            })
            ->get();


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
                'clients.id AS id_client ',

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
                'auto.logo as logo'
            )
            ->where('auto.id', $id)
            ->get();

        $statics = Client::select('clients.adresse', 'clients.nom', DB::raw('count(devis.id) as devis_count'), DB::raw('sum(devis.total_prix) as prix_total_client'))
            ->join('devis', 'devis.id_client', '=', 'clients.id')
            ->groupBy('clients.id', 'clients.adresse', 'clients.nom')
            ->where('clients.id_autoentrepreneur', $autoentrepreneur->id)
            ->get();


        $devisCount = Devis::where('id_autoentrepreneur', $autoentrepreneur->id)->count();


        return view('clients.clients', [
            'statics' => $statics,
            'devisCount' => $devisCount,
            'user' => $request->user(),
            'navAside' => 'clients',
            'clients' =>  $clients,
            'autoentrepreneur' => $autoentrepreneur,
            'ventes' => $devis
        ]);
    }

    public function index(Request $request, $id)
    {
        $autoentrepreneur = AutoEntrepreneur::where('id_user', $request->user()->id)->first();
        $clients = Client::where('id_autoentrepreneur', $id)->get();

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
                'clients.id AS id_client ',

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
                'auto.logo as logo'
            )
            ->where('auto.id', $id)
            ->get();

        $statics = Client::select('clients.adresse', 'clients.nom', DB::raw('count(devis.id) as devis_count'), DB::raw('sum(devis.total_prix) as prix_total_client'))
            ->join('devis', 'devis.id_client', '=', 'clients.id')
            ->groupBy('clients.id', 'clients.adresse', 'clients.nom')
            ->where('clients.id_autoentrepreneur', $autoentrepreneur->id)
            ->get();


        $devisCount = Devis::where('id_autoentrepreneur', $autoentrepreneur->id)->count();


        return view('clients.clients', [
            'statics' => $statics,
            'devisCount' => $devisCount,
            'user' => $request->user(),
            'navAside' => 'clients',
            'clients' =>  $clients,
            'autoentrepreneur' => $autoentrepreneur,
            'ventes' => $devis
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

    public function store(Request $request, $id)
    {
        $client = new  Client();
        $client->nom = request('nom');
        $client->email = request('email');
        $client->adresse = request('adresse');
        $client->contact = request('contact');
        $client->id_autoentrepreneur = $id;
        $client->save();
        return Redirect::route('clients', $id)->with('status', 'profile-updated');
    }

    public function destroy(Request $request, $id_client)
    {
        $client = Client::findOrFail($id_client);
        $client->delete();
        return Redirect::route('clients', $client->id_autoentrepreneur)->with('status', 'profile-updated');
    }
}
