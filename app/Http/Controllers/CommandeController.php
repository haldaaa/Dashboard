<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View as FlareClientView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContactRequest;

use App\Models\Commandes;
use App\Models\DetailCommande;
use Illuminate\Support\Facades\Redirect;
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

        // Save dans la table Commande
        //$test->save();

        // Récupération données DétailsCommande via formulaire:
        $table_detail = new DetailCommande();
        $table_detail->commande_id = $table_commande->id;
        $table_detail->produit_id = $request->produit;
        $table_detail->quantite = $request->nombre;


         $name = $request->all();

         dd($name);




    }



    public function coucou()
    {

        // Ne renvoie rien :
       // return "Controller je test";
       // Peut etre qu'il faut que je revoie ma table, mettre commercial_id dans detail commandes
       // Le code ci dessous marche, mais me renvoie trop de résultat car commercial_id est appelé plusieurs fois
         $yes = DB::table('details_commande')
        ->join('produits', 'produit_id' , '=' , 'produit_id')
        ->join('commandes' , 'commande_id' , '=' , 'commande_id')
        ->join('commerciaux' , 'commercial_id' , '=' , 'commercial_id')
        ->join('clients' , 'client_id' , '=' , 'client_id')
        ->where('commande_id' , '=' , "4" )
        ->take(10)
        ->get();


            //Marche :
       // $yes = DB::table('users2')
        //->join('post', 'post_id', '=' , 'post_id')
       // ->get();

        return(dd($yes));

    }



}
