<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Commandes;
use App\Models\Commerciaux;
use App\Models\DetailCommande;
use App\Models\Produits;
use App\Models\Clients;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\DB;


class AppController extends Controller
{
   
      // Fonction qui instancie l'application : créé des commerciaux, clients, produits et ventes
      public function createBuyerAndSeller()
      {
         // Création des commerciaux : 
          \App\Models\Commerciaux::factory(10)->create();

        // Création des clients :
          \App\Models\Clients::factory(5)->create();
  
          return view('myindex')->with('success' , 'La bdd a été créé');

      }



      // Fonction qui supprime les entrées des tables Commandes, DetailsCommandes, Commerciaux et Clients
      public function deleteAll()
      {
         
          // Methode très sale car je fais appel a 2 requêtes et en plus la table commerciaux n'est pas reset proprement non plus. A étudier.
          // La méthode marchait plus ou moins ( les données de la tables commandes et details commande étaient supprimé mais gros bordel sur les routes aprés)
          // La méthode marche aprés avoir utilisé return back.  Par contre la table commerciaux nest pas delete, on a tjrs le nombre de bénéfice et nombre de commande.
  
          // Obliger de déclarer ce statement car les tables sont liés par des clés étrangeres, peut être que définir les relations dans les models peut eviter ceci.
          DB::statement("SET foreign_key_checks=0");

          // On supprime toutes les entrées des tables
          
          Commandes::truncate();
          DetailCommande::truncate();
          Commerciaux::truncate();
          Clients::truncate();

          // Laligne ci dessous permis de reinitialiser le nombre de vente et commande de la table commerciaux a 0
          //DB::table('commerciaux')->update(['total_vente' => 0 , 'nbre_commande' => 0]);
          DB::statement("SET foreign_key_checks=1");
          
  
          return back()->with('success' , 'La bdd a été clean');
      }


      
      public function generateSell()
      {

        $randomCommande = rand(1,9);

        for($i=1 ; $i < $randomCommande ; $i++)
        { 
          // On selectionne un commercial au hasard
          $randomCommercial = DB::table('commerciaux')
          ->inRandomOrder()
          ->first();

        // On selectionne un client au hasard
          $randomClient = DB::table('clients')
          ->inRandomOrder()
          ->first();        
        
          // On selectionne un ou plusieurs produits (plus chaud)
          // On utilise limit pour générer aléatoirement le nombre de produits
          $randProduct = rand(1,4);
          $randomProduct = DB::table('produits')
          ->inRandomOrder()
          ->limit("$randProduct")
          ->get();

          
          $table_commande = new Commandes();
          $table_commande->commercial_id = $randomCommercial->commercial;
          $table_commande->client_id = $randomClient->client;

          $table_commande->save();


        

          foreach($randomProduct as $tableau => $valeur)
          {

              $table_detail = new DetailCommande();

              $table_detail->produit_id = $valeur->id;
              $table_detail->quantite = rand(1,99);
              $table_detail->commande_id = $table_commande->id;

              // On créé un objet produit pour récupéré le prix du produit
              $produitObjet = Produits::find("$valeur->id");
              $priceProduit = $produitObjet->prix;

              $table_detail->sous_total = $priceProduit * $table_detail->quantite;

              $table_detail->save();
        

          }

          // On incrémente le nombre de commande du Commercial
          $update_commande = Commerciaux::find("$randomCommercial->commercial");
          $update_commande->nbre_commande = $update_commande->nbre_commande + 1;

          // Ici on incrémente le total des bénéfices du commercial 
          $update_commande->total_vente = $update_commande->total_vente + $update_commande->totalCommande("$randomCommercial->commercial");

          $update_commande->save();
          
        }

        // Bug que je ne comprend pas : ici quand je fais un return sur commande liste, j'ai une erreur car liste n'est pas définis,
        // list est définis dans le controller CommandeController. alors je refais l'appel ici comme ca no soucis.
        $test = new Commerciaux;
        $liste =$test-> allCommande();


        return View('commande.commande-liste' , [
            'liste' => $liste
        ]);
    }



}
