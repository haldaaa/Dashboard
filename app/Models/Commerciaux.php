<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commerciaux extends Model
{
    use HasFactory;
    protected $table = 'commerciaux'; // je protège la variable car laravel traduit automatiquement la variable au pluriel

    protected $fillable = [
        'nom',
        'prenom',
        'ville',
        'nbre_commande',

    ];



}
