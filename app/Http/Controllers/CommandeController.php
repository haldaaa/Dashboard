<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View as FlareClientView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContactRequest;

use App\Models\Commandes;
use App\Models\Commerciaux;
use App\Models\DetailCommande;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\Cast\Array_;
use Symfony\Component\Console\Input\Input;

class CommandeController extends Controller
{
    public function index()
    {

        $nom_produits = DB::select('select * from produits');
        $nom_clients  = DB::select('select * from clients');
        $nom_commercial = DB::select('select * from commerciaux');

      //  $commandes = DB::select('select * from details_commande');


        return View('commande.index', [
            'nom_produits' => $nom_produits,
            'nom_clients' => $nom_clients,
            'nom_commercial' => $nom_commercial,
           // 'commandes' => $commandes
        ]);
    }


    public function store(Request $request){

        $table_commande = new Commandes();

        // Récupération donnée Commandes via formulaire :
        $table_commande->commercial_id=$request->select_commercial;
        $table_commande->client_id=$request->select_client;

        // Sauvegarde dans la table Commandes
        $table_commande->save();

        // On récupére le tableau dans notre vue
        $tableau = $request->tableau;

        // On boucle sur le tableau, en indiquant de continuer lorsque la quantité est = a 0
         foreach($tableau as $produit_id => $quantite)
            {
                $table_detail = new DetailCommande();
                $table_detail->produit_id = $produit_id;
                $table_detail->quantite = $quantite;
                $table_detail->commande_id = $table_commande->id;

                if($quantite == 0)
                {
                    continue;
                }
               $table_detail->save();
            }

        // Ne marche pas car renvoie un tableau:
       // $nom_client = DB::select("SELECT nom FROM commerciaux WHERE commercial = '$request->select_commercial' ");



       $nom_client = DB::table('commerciaux')
       ->select('nom')
       ->where("commercial", '=' , "$request->select_commercial" )
       ->get();




       dd($nom_client);






        return back()->with('succes' , 'La commande de ' . $nom_client . 'a été ajouté');

    }


    public function liste()
    {



        $liste = DB::table('commandes')
        ->join('commerciaux', 'commercial' , '=' , 'commercial_id')
        ->join('clients', 'client' , '=' , 'client_id' )
        ->take(80)
        ->get();

        return View('commande.commande-liste' , [
            'liste' => $liste
        ]);

    }

    public function coucou()
    {

        // Ne renvoie rien :
       // return "Controller je test";
       // Peut etre qu'il faut que je revoie ma table, mettre commercial_id dans detail commandes
       // Le code ci dessous marche, mais me renvoie trop de résultat car commercial_id est appelé plusieurs fois
         $yes2 = DB::table('commandes')
        ->join('commerciaux', 'commercial' , '=' , 'commercial_id')
        ->join('clients', 'client' , '=' , 'client_id' )
        ->take(80)
        ->get();




        $nom_client = DB::table('commerciaux')
        ->select('nom')
        ->where("commercial", '=' , "2" )
        ->get();

        $nom_client = $nom_client->pluck('nom');

        return(print_r($nom_client['nom']));


    }



}
