<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\AutoEntrepreneur;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
 
    
        $autoentrepreneur = AutoEntrepreneur::where('id_user', Auth::user()->id)->first();

            return view('Dashboard',['autoentrepreneur'=>$autoentrepreneur]);
        
    }
}
