<?php

namespace App\Http\Controllers;

use App\Models\Commerciaux;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {

        $record = DB::table('commerciaux')
        ->select("nom as nom_commercial" , "total_vente")
        ->get();

        $data=[];
            foreach($record as $ligne)
            {
                $data['label'][] = $ligne->nom_commercial;
                $data['data'][]= $ligne->total_vente;
            }
            $data['chart_data'] = json_encode($data);
            

           // dd($data);
        return view('chart', $data);
        

    }
}
