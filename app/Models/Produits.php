<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
