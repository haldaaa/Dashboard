<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // a rajouter pour travailler avec DB

class ProduitsController extends Controller
{

    // Ici on renvoie produits a la vue et non $allproducts
    public function index()
    {

        $allproducts = DB::select('select * from produits');

        return View('produits.index', [
            'produits' => $allproducts
        ]);
    }
}
