<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Commerciaux extends Model
{
    use HasFactory;
    protected $table = 'commerciaux'; // je protège la variable car laravel traduit automatiquement la variable au pluriel

    protected $primaryKey = "commercial";

    protected $fillable = [
        'nom',
        'ville',
        'nbre_commande',

    ];


    public function ohOui()
    {
        $liste = DB::table('commandes')
        ->join('commerciaux', 'commercial' , '=' , 'commercial_id')
        ->join('clients', 'client' , '=' , 'client_id' )
        ->get();

        return($liste);
    }


}
