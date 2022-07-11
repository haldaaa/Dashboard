<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailCommande extends Model
{
    use HasFactory;

    protected $table  = 'details_commande';

    protected $fillable = [
        'commande_id',
        'produit_id',
        'quantite'

    ];

    public function commande_id()
    {
        return $this->hasOne(Commandes::class, 'commande_id');
    }

    public function produit_id()
    {
        return $this->hasMany(Produits::class, 'produit_id');
    }

    public function beneficeCommercial($id)
    {
        $data = DB::table('commandes')
        ->join('details_commande' , 'commande_id' , 'id')
        ->get();

    }


}
