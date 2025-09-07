<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\AutoEntrepreneur;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AutoentrepreneurController extends Controller
{
    public function index(){
        var_dump( Auth::user()->id);
        $autoentrepreneur = AutoEntrepreneur::where('id_user', Auth::user()->id)->first();

ob_start();

// Dump the request data for debugging
var_dump($autoentrepreneur);

// Get the output buffer contents and log it
$output = ob_get_clean();
error_log($output);
            return view('TableauBord',['autoentrepreneur'=>$autoentrepreneur]);
        
    }
}
