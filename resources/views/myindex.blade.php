
@extends ('layout')


@section('contenu')

<h1 class="sucepute"> Description projet </h1>
</br>
<p> L'idée est de créé un site back end pour une entreprise qui vendrait des meubles en bois. </br> </br>
Il y'aura <b>5 pages</b> : </br> </br>
- une page avec la liste des commandes, </br>
- une page avec la liste des commerciaux, </br>
- une page avec la liste des produits que vend l'entreprise, </br>
- une page pour réaliser les commandes et voir les commandes passés et en cours, </br> </br>


<h2> Plan du projet  </h2> </br> </br>

<p> A faire : </br>  </br>
    - Une page par commerciaux avec toutes ses ventes : faire un tableau qui liste toutes les commandes et bénéfices </br>
    - Une page par entreprise / client avec toute ses commandes </br>
    - Rajouter un menu déroulant : Commandes : Toutes les commandes / Commandes par commerciaux par exemple </br> </br> </br>

    MAJ : 11/08/2022 : </br>
    - Faire une verification formulaire : verifié qu'on rentre des chiffres et qu'on rentre au moins un produit : soit on rend l'input Valider impossible
    a cliquer, soit on fait autrement. </br>
    - Générer une page par commercial avec toutes ses ventes </br> 
    - Dans liste de produit, voir le produit le plus vendu </br>
    - But ultime : générer une instance du site : commerciaux, clients, produits et ventes. </br>
    - Intégrer Js Charts </br> </br> </br>

    MAJ : 27/11/2022 : </br>
    - Peaufinage du site </br>
    - Objectif : : créé template / page commande </br> 
    - Objectif : créé une fonction php qui se lance toutes les heures afin d'automatiser l'application </br>
    - A finir : vérification formulaire. </br>
    - Notes : on en revient t oujours au même, la conception de la bdd est a chié : je galere a recupere les infos d'une commande seulement,
    alors que cela devrait être simple. </br>
     - Fichier CommandeController la fonction a la fin </br>

     MAJ 08/12/2022 : </br>
     - CICD presque fonctionelle ! </br>

</br> </br>

    MAJ : 13/12/2022 00h10 </br> 
    - Réparation routes défectueuses </br> 
    - Ajout fonctionalité dans liste commande : dernière commande Effectué </br> 
    - CICD fonctionnelle !  </br> 
    - A faire : page d'une commande , </br>
    - A faire : page avec toutes les commandes dans un tableau </br>
    
</br></br> 
    MAJ : 15/12/2022 : </br>
    - Résultat de la requête d'une commande en double :  a résoudre </br>

    

</p>
@if (session('succes'))
<div class="alert alert-succes">
 <p>  {{ session('succes')}}  </p>
</div>
@else 
<p> No !! </p>

@endif



@endsection
