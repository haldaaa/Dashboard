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


    ## 03/12/2022 01h18 : test 
    public function commandes()
    {
        return $this->belongsTo(Commandes::class);
    }

    

    // Recupére toutes les commandes de tout les commerciaux
    public function allCommande()
    {
        $liste = DB::table('commerciaux')
        ->get();

        return($liste);
    }


    // Récupere le bénéfice total d'un commercial
   public static function totalCommande($commercial)
   {
    
    $data = DB::table('commandes')
     ->where('commercial_id' , '=' , "$commercial")
     ->join('details_commande' , 'commande_id' , 'commandes.id')
     ->sum('sous_total');

     return($data);
   }

   public function jeTest()
   {
    $data = DB::table('commandes')
    ->select('commercial_id as CommercialID' , 'sous_total AS SousTotal')
    ->join('details_commande' , 'commande_id' , 'commandes.id')
    ->get();
    

    return($data);

   }

}
