<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\autoentrepreneur;
use App\Models\devis;
use OpenAdmin\Admin\Admin;
use OpenAdmin\Admin\Controllers\Dashboard;
use OpenAdmin\Admin\Layout\Column;
use OpenAdmin\Admin\Layout\Content;
use OpenAdmin\Admin\Layout\Row;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\BonDeCommande;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Depense;

use App\Models\Fournisseur;
use App\Models\Produit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Consultation;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function index(Content $content)
    {

        $countUsers = User::count();
        $countDevis = Devis::count();
        $countBonDeCommande = BonDeCommande::count();
        $countFournisseur = Fournisseur::count();
        $countClient = Client::count();
       
        $lastWeekUsersCount = User::whereBetween('created_at', [now()->startOfWeek()->subWeek(), now()->startOfWeek()])->count();
        $lastWeekDevisCount = Devis::whereBetween('created_at', [now()->startOfWeek()->subWeek(), now()->startOfWeek()])->count();
        $lastWeekBonDeCommandeCount = BonDeCommande::whereBetween('created_at', [now()->startOfWeek()->subWeek(), now()->startOfWeek()])->count();
        $lastWeekFournisseurCount = Fournisseur::whereBetween('created_at', [now()->startOfWeek()->subWeek(), now()->startOfWeek()])->count();
        $lastWeekClientCount = Client::whereBetween('created_at', [now()->startOfWeek()->subWeek(), now()->startOfWeek()])->count();
$lastWeekBonDeCommandeCoun=1;
$lastWeekClientCount=1;
        $usersChange = ($countUsers - $lastWeekUsersCount) / $lastWeekUsersCount * 100;
        $devisChange = ($countDevis - $lastWeekDevisCount) / $lastWeekDevisCount * 100;
        $bonDeCommandeChange = ($countBonDeCommande - $lastWeekBonDeCommandeCount) / 1 * 100;
        $fournisseurChange = ($countFournisseur - $lastWeekFournisseurCount) / $lastWeekFournisseurCount * 100;
        $clientChange = ($countClient - $lastWeekClientCount) / $lastWeekClientCount * 100;

        $todaysUsersCount = User::whereDate('created_at', now()->toDateString())->count();

        $salesByMonth = DB::table('Devis')
            ->select(DB::raw('MONTH(date_operation) as month'), DB::raw('COUNT(*) as total'))
            ->groupBy(DB::raw('MONTH(date_operation)'))
            ->get();
        $operationsByMonth = DB::table('Devis')
            ->select(DB::raw('MONTH(date_operation) as month'), DB::raw('COUNT(*) as total'))
            ->groupBy(DB::raw('MONTH(date_operation)'))
            ->union(
                DB::table('Bon_de_commandes')
                    ->select(DB::raw('MONTH(date_operation) as month'), DB::raw('COUNT(*) as total'))
                    ->groupBy(DB::raw('MONTH(date_operation)'))
            )
            ->get()
            ->groupBy('month')
            ->map(function ($item) {
                return $item->sum('total');
            });

        $countClients = DB::table('Clients')->count();
        $countFournisseurs = DB::table('Fournisseurs')->count();
        $usersByMonth = User::selectRaw('COUNT(*) as count, DATE_FORMAT(created_at, "%Y-%m") as month')
        ->groupBy('month')
        ->orderBy('month', 'asc')
        ->get()
        ->keyBy('month');

    // Prepare data for chart
    $months = [];
    $userCounts = [];
    $now = Carbon::now();
    
    for ($i = 11; $i >= 0; $i--) {
        $date = $now->copy()->subMonths($i)->format('Y-m');
        $months[] = $now->copy()->subMonths($i)->translatedFormat('F Y'); // Labels in French
        $userCounts[] = isset($usersByMonth[$date]) ? $usersByMonth[$date]->count : 0;
    }

    $operationsByAutoEntrepreneur = DB::table('Devis')
    ->select('id_autoentrepreneur', DB::raw('COUNT(*) as total'))
    ->groupBy('id_autoentrepreneur')
    ->union(
        DB::table('Bon_de_commandes')
            ->select('id_autoentrepreneur', DB::raw('COUNT(*) as total'))
            ->groupBy('id_autoentrepreneur')
    )
    ->get()
    ->groupBy('id_autoentrepreneur')
    ->map(function ($item) {
        return $item->sum('total');
    });
    $autoEntrepreneurs = DB::table('autoentrepreneurs')->pluck('Nom_entreprise', 'id');

$chartData = [
    'labels' => [],
    'data' => []
];

foreach ($autoEntrepreneurs as $id => $name) {
    $chartData['labels'][] = $name;
    $chartData['data'][] = $operationsByAutoEntrepreneur->get($id, 0); // default to 0 if no operations found
}




$operationsByMonth = DB::table('Devis')
    ->select(DB::raw('MONTH(date_operation) as month'), DB::raw('COUNT(*) as total'))
    ->groupBy(DB::raw('MONTH(date_operation)'))
    ->union(
        DB::table('Bon_de_commandes')
            ->select(DB::raw('MONTH(date_operation) as month'), DB::raw('COUNT(*) as total'))
            ->groupBy(DB::raw('MONTH(date_operation)'))
    )
    ->get()
    ->groupBy('month')
    ->map(function ($item) {
        return $item->sum('total');
    });

// Generate chart data
$lineData = [
    'labels' => [],
    'data' => []
];

// Assuming you want to display data for the whole year
for ($month = 1; $month <= 12; $month++) {
    // Get the number of operations for this month, default to 0 if no operations found
    $lineData['labels'][] = date('M', mktime(0, 0, 0, $month, 1)); // Get month abbreviation (e.g., Jan, Feb)
    $lineData['data'][] = $operationsByMonth->get($month, 0);
}


        return view('SoloAdmin.dash', [
            'navSode'=>'dash',
            'lineData' => $lineData,
            'barLabels' =>   json_encode($chartData['labels']),
            'barData'=>   json_encode($chartData['data']),
            'chartData' => json_encode($chartData),
            'months' => json_encode($months),
            'userCounts' => json_encode($userCounts),
            'salesByMonth' => $salesByMonth,
            // 'expensesByMonth' => $expensesByMonth,
            // 'salesByProductCategory' => $salesByProductCategory,
            'todaysUsersCount' => $todaysUsersCount,
            'countUsers' => $countUsers,
            'countDevis' => $countDevis,
            'countBonDeCommande' => $countBonDeCommande,
            'countFournisseur' => $countFournisseur,
            'countClient' => $countClient,
            'usersChange' => $usersChange,
            'devisChange' => $devisChange,
            'bonDeCommandeChange' => $bonDeCommandeChange,
            'fournisseurChange' => $fournisseurChange,
            'clientChange' => $clientChange,
            'operationsByMonth' => $operationsByMonth,
            'countClients' => $countClients,
            'countFournisseurs' => $countFournisseurs
        ]);
    }
    public function getprofile(Content $content)
    {
        $consultation = Consultation::join('autoentrepreneurs','autoentrepreneurs.id','=','consultations.id_autoentrepreneur')
        ->select('Consultations.*',
        'autoentrepreneurs.Nom_entreprise',
     'autoentrepreneurs.logo'   )
        ->get();

        $admin = Auth::guard('admin')->user();

        return view('SoloAdmin.profile', [
            'navSode'=>'profile',

            'admin' => $admin, 'consultations' => $consultation]);
    }
    public function updatePasse(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        // Validate the request data
        $request->validate([
            'old' => 'required',
            'new' => 'required|min:8',
            'confirm' => 'required|same:new',
        ]);

        // Check if the old password matches the one in the database
        if (!Hash::check($request->old, $admin->password)) {
            return redirect()->back()->with('error', 'Mot de passe actuel incorrect.');
        }

        // Update the password
        $admin->password = bcrypt($request->new);
        $admin->save();

        return redirect()->route('admin.profile')->with('success', 'Mot de passe mis à jour avec succès.');
    }
    public function consultation(Request $request, $id)
    {
        $consultation = consultation::findOrFail($id);
        $consultation->update([
            'reponse' => $request->reponse,

        ]);
        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }
    public function updateProfile(Request $request)
    {




        $admin = Auth::guard('admin')->user();


        $admin->name = $request->input('nom');
        $admin->username = $request->input('usernom');
        $admin->update([
            'name' => $request->input('nom'),
            'username' => $request->input('usernom')
        ]);

        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }
    public function recherche(Request $request)
    {

        $autoentrepreneurs = DB::table('autoentrepreneurs')
            ->join('users', 'autoentrepreneurs.id_user', '=', 'users.id')
            ->leftJoin('clients', 'clients.id_autoentrepreneur', '=', 'autoentrepreneurs.id')
            ->leftJoin('fournisseurs', 'fournisseurs.id_autoentrepreneur', '=', 'autoentrepreneurs.id')
            ->leftJoin('devis', 'devis.id_autoentrepreneur', '=', 'autoentrepreneurs.id')
            ->leftJoin('bon_de_commandes', 'bon_de_commandes.id_autoentrepreneur', '=', 'autoentrepreneurs.id')
            ->select(
                'autoentrepreneurs.*',
                'users.email as email',
                'autoentrepreneurs.adresse as adresse',
                'autoentrepreneurs.contact as contact',
                DB::raw('COUNT(DISTINCT clients.id) as nbr_client'),
                DB::raw('COUNT(DISTINCT fournisseurs.id) as nbr_fournisseur'),
                DB::raw('COUNT(DISTINCT devis.id) + COUNT(DISTINCT bon_de_commandes.id) as nbr_operation')
            )->where(function ($query) use ($request) {
                $query->where('autoentrepreneurs.Nom_entreprise', 'LIKE', '%' . $request->recherche . '%')
                    ->orWhere('autoentrepreneurs.adresse', 'LIKE', '%' . $request->recherche . '%')
                    ->orWhere('autoentrepreneurs.contact', 'LIKE', '%' . $request->recherche . '%')
                    ->orWhere('users.email', 'LIKE', '%' . $request->recherche . '%');
            })
            ->groupBy(
                'autoentrepreneurs.id',

                'autoentrepreneurs.Nom_entreprise',
                'autoentrepreneurs.Identifiant_Fiscal',
                'autoentrepreneurs.contact',
                'autoentrepreneurs.adresse',
                'autoentrepreneurs.Domain_de_travail',
                'autoentrepreneurs.logo',
                'autoentrepreneurs.date_creation',
                'autoentrepreneurs.ICE',
                'autoentrepreneurs.TP',
                'autoentrepreneurs.CNCC',
                'autoentrepreneurs.numero_autoentrepreneur',
                'autoentrepreneurs.taux_tax',
                'autoentrepreneurs.id_user',
                'autoentrepreneurs.created_at',
                'autoentrepreneurs.updated_at',
                'users.email'
            )
            ->get();
        return view('SoloAdmin.autoentrepreneurs', [
            'navSode'=>'auto',

            'autoentrepreneurs' => $autoentrepreneurs]);
    }
    public function getAutoentrepreneurs(Content $content)
    {
        $autoentrepreneurs = DB::table('autoentrepreneurs')
            ->join('users', 'autoentrepreneurs.id_user', '=', 'users.id')
            ->leftJoin('clients', 'clients.id_autoentrepreneur', '=', 'autoentrepreneurs.id')
            ->leftJoin('fournisseurs', 'fournisseurs.id_autoentrepreneur', '=', 'autoentrepreneurs.id')
            ->leftJoin('devis', 'devis.id_autoentrepreneur', '=', 'autoentrepreneurs.id')
            ->leftJoin('bon_de_commandes', 'bon_de_commandes.id_autoentrepreneur', '=', 'autoentrepreneurs.id')
            ->select(
                'autoentrepreneurs.*',
                'users.email as email',
                'autoentrepreneurs.adresse as adresse',
                'autoentrepreneurs.contact as contact',
                DB::raw('COUNT(DISTINCT clients.id) as nbr_client'),
                DB::raw('COUNT(DISTINCT fournisseurs.id) as nbr_fournisseur'),
                DB::raw('COUNT(DISTINCT devis.id) + COUNT(DISTINCT bon_de_commandes.id) as nbr_operation')
            )
            ->groupBy(
                'autoentrepreneurs.id',

                'autoentrepreneurs.Nom_entreprise',
                'autoentrepreneurs.Identifiant_Fiscal',
                'autoentrepreneurs.contact',
                'autoentrepreneurs.adresse',
                'autoentrepreneurs.Domain_de_travail',
                'autoentrepreneurs.logo',
                'autoentrepreneurs.date_creation',
                'autoentrepreneurs.ICE',
                'autoentrepreneurs.TP',
                'autoentrepreneurs.CNCC',
                'autoentrepreneurs.numero_autoentrepreneur',
                'autoentrepreneurs.taux_tax',
                'autoentrepreneurs.id_user',
                'autoentrepreneurs.created_at',
                'autoentrepreneurs.updated_at',
                'users.email'
            )
            ->get();
        return view('SoloAdmin.autoentrepreneurs', [
            'navSode'=>'auto',

            'autoentrepreneurs' => $autoentrepreneurs]);
    }
}
