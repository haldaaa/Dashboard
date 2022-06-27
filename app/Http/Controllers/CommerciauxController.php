<?php

namespace App\Http\Controllers;

use App\Models\Commerciaux;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommerciauxController extends Controller
{

    protected $test = "Coucou";
    public function index()
    {

        $a = 5;
        $b = 10;
        $resultat = $a + $b;
        $commerciaux = DB::select('select * from commerciaux');

        return view('commerciaux', [
            'commerciaux' => $commerciaux,
            'resultat' => $resultat
        ]);
    }


    public function calcul()
    {
        $a = 5;
        $b = 10;
        $resultat = $a + $b;

        return view('commerciaux', [
            'resultat' => $resultat
        ]);
    }

}
