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
        'quantite',
        'sous_total'

    ];

    public function commandes()
    {
        return $this->hasOne(Commandes::class, 'commande_id');
    }

    public function commerciaux()
    {
        return $this->hasOne(Produits::class, 'produit_id');
    }

    public function beneficeCommercial($id)
    {
        $data = DB::table('commandes')
        ->join('details_commande' , 'commande_id' , 'id')
        ->get();

    }


}
