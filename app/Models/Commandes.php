<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Commandes extends Model
{
    use HasFactory;

    protected $table = "commandes";
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
