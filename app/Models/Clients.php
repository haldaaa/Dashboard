<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $table = "clients";
    protected $primaryKey = "client";
    
    protected $fillable = [
        'nom_entreprise',
        'nbre_commande',


    ];


    public function commandes()
    {
        return $this->hasOne(Commandes::class);
    }
}
