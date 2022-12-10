<?php

namespace App\Models;

use Facade\FlareClient\Http\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Commandes extends Model
{
    use HasFactory;

    protected $table = "commandes";
    protected $primary_key = "id" ;

    protected $fillable = [
        'commercial_id',
        'client_id',
    

    ];


    // Partie BDD : création des clés étrangères pour la migration.
    public function commerciaux()
    {
        return $this->hasOne(Commerciaux::class);
    }

    public function clients()
    {
        return $this->hasOne(Clients::class);
    }

    public function detail_commande()
    {
        return $this->belongsTo(DetailCommande::class);
    }

    // FIn partie BDD


    public function macommande($id)
    { 
        $macommande = DB::table('commande')
        ->where('commercial_id' , '=' , '$id');
        
    }



    public function allComCommercial($id_commercial)
    {
        
        // Edit 10/12/22 : Toute les commandes d'un commercial + son total

        $maCommande = DB::table('Commandes')
        ->where('commercial_id' , '=' , "9")
        ->join('details_commande' , 'commande_id' , 'commandes.id')
        ->join('commerciaux' , 'commercial' , 'commercial_id')
        ->select('nom As Nom' , 'nbre_commande AS Total commande' , 'total_vente AS Total bénéfices' , 'quantite AS Quantité' , 'sous_total AS Sous Total')
        ->get();

        return $maCommande;
    }
}
