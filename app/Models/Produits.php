<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produits extends Model
{
    use HasFactory;

    protected $table = "produits";

    protected $fillable = [
        'nom_produit',
        'prix',
    ];


    public function detailcommande()
    {
        return $this->belongsTo(DetailCommande::class, 'produits_id');
    }

    public function getAllPriceAndProduct()
    {

        $data = DB::table('produits')
        ->get();

        return($data);
    }


    public function produitPrice($id) 
    {
        $data = DB::table('produits')
        ->select('prix')
        ->where('id' , '=' , "2")
        ->get();
        
    }

    public function nom_produit()
    {
        return $this->nom_produit;
    }
}