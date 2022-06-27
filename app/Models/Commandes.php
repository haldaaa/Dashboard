<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commandes extends Model
{
    use HasFactory;

    protected $primary_key = "id" ;

    protected $fillable = [
        'nom_commercial',
        'nom_client',

    ];

    public function commande()
    {
        return $this->belongsTo(DetailCommande::class);
    }

}
