<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View as FlareClientView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContactRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Commandes;
use App\Models\Commerciaux;
use App\Models\DetailCommande;
use App\Models\Produits;
use Faker\Factory as FakerFactory;
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



    // Fonction qui enrengistre une commande dans les tables: Commandes, Details commandes et commerciaux.

    public function store(Request $request){

        $table_commande = new Commandes();

        // Récupération donnée Commandes via formulaire :
        $table_commande->commercial_id=$request->select_commercial;
        $table_commande->client_id=$request->select_client;

        // Sauvegarde dans la table Commandes
        $table_commande->save();

        // On récupére le tableau dans notre vue
      //  $tableau = $request->tableau;


        // On boucle sur le tableau, en indiquant de continuer lorsque la quantité est = a 0
         foreach($request->tableau as $produit_id => $quantite)
            {
                $table_detail = new DetailCommande();

                $table_detail->produit_id = $produit_id;
                $table_detail->quantite = $quantite;
                $table_detail->commande_id = $table_commande->id;

        // On créé un objet produit pour récupéré le prix du produit et updater son nombre vendu
                $produitObjet = Produits::find("$produit_id");
                $produitObjet->nombre_vendu = $produitObjet->nombre_vendu + $table_detail->quantite;
                $produitObjet->save();
                $priceProduit = $produitObjet->prix;


                $table_detail->sous_total = $priceProduit * $quantite;

                if($quantite == 0)
                {
                    continue;
                }
               $table_detail->save();
            }


        // On incrémente le nombre de commande du Commercial
        $update_commande = Commerciaux::find("$request->select_commercial");
        $update_commande->nbre_commande = $update_commande->nbre_commande + 1 ;

        // Ici on incrémente le total des bénéfices du commercial
        $update_commande->total_vente = $update_commande->total_vente + $update_commande->totalCommande("$request->select_commercial");

        // On sauvegarde le nom du commercial pour le message succes a la fin d'une commande réussis
        $nom_commercial = $update_commande->nom;

        // On update la table Commerciaux (on incrémente ici le nombre de commande)
        $update_commande->save();

        return back()->with('succes' , 'La commande de ' . $nom_commercial. 'a été ajouté');

    }


    // Fonction pour la page commande_liste. Affiche la liste des commerciaux et leur bénéfices totaux.
    public function liste()
    {


        // Pareil, on viens juste rajouter un ptit push
        // Ici on récupére toutes les commandes via la fonction créé dans me model Commerciaux
        $test = new Commerciaux;
        $liste =$test-> allCommande();
        

        // Objectif : obtenir le détail d'une commande (produit, quantité, client/com) a partir d'un id
        // Maj 10/12/2022 20h51 : Ici, on a le nom du vendeur et le total pour une commande donné

        $maCommande = DB::table('commandes')
        ->where('id' , '=' , '1')
        ->join('commerciaux' , 'commercial_id' , 'commercial') 
        ->select('id AS Id_commande' , 'commandes.created_at AS Création_commande' , 'nom AS Nom_vendeur' , 'total_vente AS Total commande')
        ->get();

        //$maCommande2 =  DB::table('details_commande')
        //->where('commande_id' , '=' , '2')
        //->join('produits' , 'produit_id' , 'produit_id')  
       
        //->select('quantite AS Quantité' , 'nom_produit AS Nom article' , 'prix AS Prix de base' , 'nombre_vendu AS Total vente du produit ' )
        //->get();


    


         $vendeurCommande = $maCommande["0"]->Nom_vendeur;
         $idLastCommande = $maCommande["0"]->Id_commande;

        
        // 17/12/2022 : 
        // Ou alors, on décompose : on recherche toute les commandes avec l'id souhaité dans détails commandes
        // Et ensuite on voit :

        $maCommande2 =  DB::table('details_commande')
        ->where('commande_id' , '=' , '1')
        ->get();
        $test = 0;
        $collection = $maCommande2->all();
        //dump($collection);
       
        
        // Ici on parcourt maCommande2 qui liste toute les commandes pour un ID donné
        // $valeur represente le premier tableau de maCommande2, soit le premier produit acheté
        // $produit represente le produit selon l'id dans la table details_commandes 

        foreach  ($maCommande2 as $valeur)
        {
           //dd($maCommande2);
        

            echo $valeur->quantite . " unités de : ";
            $produit = Produits::find("$valeur->produit_id");
            echo " " . $produit->nom_produit . " Sous-total : " . $valeur->sous_total . "</br>";
           
        
        }

    
      
        // 28/12
        // Ici on récupere tout les ID des commandes pour le select dans la page commande-liste
        // Par contre ici on récupere toute la table alors qu'on a besoin seulement de l'id, avoir plus tard
        $commandeSelect = DB::select('select * from commandes');

        return View('commande.commande-liste' , [
            'liste' => $liste,
            'vendeurCommande' => $vendeurCommande,
            'idLastCommande' => $idLastCommande,
            'commandeSelect' => $commandeSelect,
        ]);

    }






    public function test()
    {

        $best3Seller = DB::table('commerciaux')
        ->orderBy('total_vente' , 'desc')
        ->limit(3)
        ->get();

        $nameCommercial = DB::table('commerciaux')
        ->select('nom')
        ->pluck('nom');




        $record = DB::table('commerciaux')
        ->select("nom" , "total_vente")
        ->orderBy('total_vente' , 'desc')
        ->pluck('nom', "total_vente" );


        $record_values = $record->values();
        $record_key = $record->keys();


        return view('/test', compact('record_values', 'record_key'));

        // return View('/test' , [
         //   'best3Seller' => $best3Seller,
           // 'jsonData' => $jsonData,
            //'nameCommercial' => $nameCommercial,
            //'record' => $record,
            //'record_values' => $record_values,
            //'record_keys' => $record_key,
        //]);
    }



    // Fonction test : 
    public function coucou()
    {

        // Test et autres

        // Ici on parcours un tableau de tableau
        $test = new Produits;
        $produits = $test-> getAllPriceAndProduct();

        foreach ($produits as $clef => $produit)
        {
            echo "Valeur clef :" . $clef . "</br>";

            foreach ($produit as $carac => $valeur)
            {
                echo $carac . " : " . $valeur . "</br>";
            }
            echo "</br>";
        }

        $thatid = 4;
        // Méthode la plus simple pour récupéré la valeurd'une table dont on connait l'id, ici on veut recuperer le prix d'un produit.
        $test2 = Produits::find("$thatid");
        $prix = $test2->prix;

       // Experimentation de la librarie faker

        $fakeuser = FakerFactory::create();
        $name = $fakeuser->name();
       // dd($name);

       $benefice = new Commerciaux;
       $moula = $benefice->jeTest();

       //dd($moula);

    }



    public function maCommande()
    {

        // Notes : ici on créé une fonction pour récupéré selon un ID toutes les commandes d'un vendeurs
        // A la ligne 215 au select, j'ai tout mis dans une seul ligne : il faut bien différencier les noms selon les tables.
        // Pour les jointures, voici la syntaxte : join( 'table_a_joindre' , 'clé_primaire_tableAJoindre' , 'clé_primaire_tabledeBase')


           

        // 28/11/2022 4h00 
        // Ne marche pas : pour une commande, balance au  tant de resultat qu'on a de produit.

        // 28/11/2022 23h00 
        // Ne marche toujours pas : je dois trouver la commande X avec ses produits et son client / fournisseur 
        
      //  $maCommande = DB::table('details_commande')
        //->where('commande_id' , '=' , '1')
        //->select('quantite AS Quantité' , 'sous_total AS Sous Total' , 'nom_produit AS Nom' , 'prix AS Prix Unitaire')
        //->join('produits' , 'produit_id' , 'produit_id')  
        // dd($maCommande);
     
        $maCommande ="3";
    
      


        return View('commande.commande-liste' , [
            'maCommande' => $maCommande
        ]);
    }

}
