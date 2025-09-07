<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\AutoEntrepreneur;
use App\Models\BonDeCommande;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Depense;
use App\Models\Devis;
use App\Models\Fournisseur;
use App\Models\Produit;
use App\Models\Consultation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
class DashboardController extends Controller
{
    public function index()
    {
        $autoentrepreneur = AutoEntrepreneur::where('id_user', Auth::user()->id)->first();
        $clientCount = Client::where('id_autoentrepreneur', $autoentrepreneur->id)->count();
        $fournisseurCount = Fournisseur::where('id_autoentrepreneur', $autoentrepreneur->id)->count();
        $benefice = (float)Devis::where('id_autoentrepreneur', $autoentrepreneur->id)->sum('total_prix');
        $devisCount = Devis::where('id_autoentrepreneur', $autoentrepreneur->id)->count();
        $produitCount = Produit::where('id_autoentrepreneur', $autoentrepreneur->id)->count();
        $depenseCount = Depense::where('id_autoentrepreneur', $autoentrepreneur->id)->count();
        $bonCount = BonDeCommande::where('id_autoentrepreneur', $autoentrepreneur->id)->count();

        $currentYear = date('Y');
        $currentMonth = date('m');
        $lastMonth = $currentMonth - 1;
        $lastMonthYear = $currentYear;

        if ($lastMonth == 0) {
            $lastMonth = 12;
            $lastMonthYear -= 1;
        }

        // Fetch the benefice for the current month
        $currentMonthBenefice = Devis::where('id_autoentrepreneur', $autoentrepreneur->id)
            ->whereYear('date_operation', $currentYear)
            ->whereMonth('date_operation', $currentMonth)
            ->sum('total_prix');

        // Fetch the benefice for the last month
        $lastMonthBenefice = Devis::where('id_autoentrepreneur', $autoentrepreneur->id)
            ->whereYear('date_operation', $lastMonthYear)
            ->whereMonth('date_operation', $lastMonth)
            ->sum('total_prix');

        // Calculate the percentage growth for benefice
        $beneficePercentageGrowth = 0;
        if ($lastMonthBenefice > 0) {
            $beneficePercentageGrowth = (($currentMonthBenefice - $lastMonthBenefice) / $lastMonthBenefice) * 100;
        }

        // Fetch the count of devis for the current month
        $currentMonthDevisCount = Devis::where('id_autoentrepreneur', $autoentrepreneur->id)
            ->whereYear('date_operation', $currentYear)
            ->whereMonth('date_operation', $currentMonth)
            ->count();

        // Fetch the count of devis for the last month
        $lastMonthDevisCount = Devis::where('id_autoentrepreneur', $autoentrepreneur->id)
            ->whereYear('date_operation', $lastMonthYear)
            ->whereMonth('date_operation', $lastMonth)
            ->count();

        // Calculate the percentage growth for devis
        $devisPercentageGrowth = 0;
        if ($lastMonthDevisCount > 0) {
            $devisPercentageGrowth = (($currentMonthDevisCount - $lastMonthDevisCount) / $lastMonthDevisCount) * 100;
        }

        // Fetch the count of bon de commande for the current month
        $currentMonthBonCount = BonDeCommande::where('id_autoentrepreneur', $autoentrepreneur->id)
            ->whereYear('date_operation', $currentYear)
            ->whereMonth('date_operation', $currentMonth)
            ->count();

        // Fetch the count of bon de commande for the last month
        $lastMonthBonCount = BonDeCommande::where('id_autoentrepreneur', $autoentrepreneur->id)
            ->whereYear('date_operation', $lastMonthYear)
            ->whereMonth('date_operation', $lastMonth)
            ->count();

        // Calculate the percentage growth for bon de commande
        $bonPercentageGrowth = 0;
        if ($lastMonthBonCount > 0) {
            $bonPercentageGrowth = (($currentMonthBonCount - $lastMonthBonCount) / $lastMonthBonCount) * 100;
        }

        $barChart = DB::table('devis')
            ->select(
                DB::raw('SUM(total_prix) as total_sales'),
                DB::raw('MONTH(date_operation) as month')
            )
            ->where('id_autoentrepreneur', $autoentrepreneur->id)
            ->groupBy(DB::raw('MONTH(date_operation)'))
            ->get();

        $devis = DB::table('devis')
            ->select(DB::raw('COUNT(devis.id) as devis_count'), 'date_operation')
            ->where('id_autoentrepreneur', $autoentrepreneur->id)
            ->groupBy('date_operation')
            ->get();

        $depenses = DB::table('depenses')
            ->select(DB::raw('COUNT(depenses.id) as depenses_count'), 'date_depense as date_operation')
            ->where('id_autoentrepreneur', $autoentrepreneur->id)
            ->groupBy('date_operation')
            ->get();

        $devisData = [];
        foreach ($devis as $dev) {
            $month = (new \DateTime($dev->date_operation))->format('Y-m');
            $devisData[$month] = $dev->devis_count;
        }

        $depensesData = [];
        foreach ($depenses as $dep) {
            $month = (new \DateTime($dep->date_operation))->format('Y-m');
            $depensesData[$month] = $dep->depenses_count;
        }
        $notification = DB::table('Consultations')
        ->where('id_autoentrepreneur', $autoentrepreneur->id)
        ->whereNotNull('reponse')
       
        ->get();    
             // Merge and fill missing months with zeros
        $allMonths = array_unique(array_merge(array_keys($devisData), array_keys($depensesData)));
        sort($allMonths);

        $devisChartData = [];
        $depensesChartData = [];

        foreach ($allMonths as $month) {
            $devisChartData[] = $devisData[$month] ?? 0;
            $depensesChartData[] = $depensesData[$month] ?? 0;
        }

        $monthsLabels = array_map(function ($month) {
            return (new \DateTime($month))->format('M Y');
        }, $allMonths);
// dd($barChart);
// dd($notification);
        return view('Dashboard', [
            'notifications' => $notification,
            'bonCount' => $bonCount,
            'produitCount' => $produitCount,
            'devisCount' => $devisCount,
            'devis' => $devis,
            'depenses' => $depenses,
            'depenseCount' => $depenseCount,
            'barChart' => $barChart,
            'benefice' => $benefice,
            'fournisseurCount' => $fournisseurCount,
            'navAside' => 'dashboard',
            'clientCount' => $clientCount,
            'autoentrepreneur' => $autoentrepreneur,
            'monthsLabels' => json_encode($monthsLabels),
            'devisChartData' => json_encode($devisChartData),
            'depensesChartData' => json_encode($depensesChartData),
            'currentMonthBenefice' => $currentMonthBenefice,
            'lastMonthBenefice' => $lastMonthBenefice,
            'beneficePercentageGrowth' => $beneficePercentageGrowth,
            'currentMonthDevisCount' => $currentMonthDevisCount,
            'lastMonthDevisCount' => $lastMonthDevisCount,
            'devisPercentageGrowth' => $devisPercentageGrowth,
            'currentMonthBonCount' => $currentMonthBonCount,
            'lastMonthBonCount' => $lastMonthBonCount,
            'bonPercentageGrowth' => $bonPercentageGrowth,
        ]);
    }

    public function contact(Request $request,$id)
    {
       
      

        // Create a new instance of the Consultation model
        $consultation = new Consultation();

        // Assign values from the request to the model attributes
        $consultation->categorie = $request->input('category');
        $consultation->message = $request->input('message');
        $consultation->id_autoentrepreneur=$id;
       
        $consultation->save();

        return redirect()->back()->with('success', 'Consultation submitted successfully!');
    }




}
