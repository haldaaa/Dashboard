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


    public function allCommande()
    {
        $liste = DB::table('commerciaux')
        ->get();

        return($liste);
    }


    public function fonctionTest($id)
    {
        $data = DB::table('comman');
    }

}
