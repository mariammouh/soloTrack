<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class autoentrepreneur extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nom_entreprise',  
         'Domain_de_travail',
        'contact',
        'Identifiant_Fiscal',
 'adresse',
 'logo',
 'TP'  ,
 'CNCC' ,
 'ICE'  ,
 'numero_autoentrepreneur' ,
 'taux_tax' ,
    ];
}
