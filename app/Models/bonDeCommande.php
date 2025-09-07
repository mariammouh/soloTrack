<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bonDeCommande extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_client',
       
       'mode_paiement' ,
     ' date_operation', 
    ];
}
