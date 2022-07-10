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
use App\Models\Produits;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\Cast\Array_;
use Symfony\Component\Console\Input\Input;

class CommandeController extends Controller
{
    public function index()
    {

        // Pensez a ranger tout les appels en base dans les model correspondant (voir fonction liste)
        $nom_produits = DB::select('select * from produits');
        $nom_clients  = DB::select('select * from clients');
        $nom_commercial = DB::select('select * from commerciaux');


        return View('commande.index', [
            'nom_produits' => $nom_produits,
            'nom_clients' => $nom_clients,
            'nom_commercial' => $nom_commercial,
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


        // On incrémente le nombre de commande du Commercial
        $update_commande = Commerciaux::find("$request->select_commercial");
        $update_commande->nbre_commande = $update_commande->nbre_commande + 1 ;

        // On sauvegarde le nom du commercial pour le message succes a la fin d'une commande réussis
        $nom_commercial = $update_commande->nom;

        // On update la table Commerciaux (on incrémente ici le nombre de commande)
        $update_commande->save();

        return back()->with('succes' , 'La commande de ' . $nom_commercial. 'a été ajouté');

    }


    public function liste()
    {


        $test = new Commerciaux;
        $liste =$test-> allCommande();

      //  dd($liste);



        return View('commande.commande-liste' , [
            'liste' => $liste
        ]);

    }



    public function coucou()
    {

        //$product = getAllPriceAndProduct();
        $pi = allCommande();

        dd($pi);


    }



}
