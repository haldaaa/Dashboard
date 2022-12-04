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




}
