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


        $commerciaux = DB::select('select * from commerciaux');

        return view('commerciaux', [
            'commerciaux' => $commerciaux

        ]);
    }




}
