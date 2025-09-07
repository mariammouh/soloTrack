<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class devis extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_client',
       'total_prix',
       'mode_paiement',
     'date_operation', 
    ];
}
