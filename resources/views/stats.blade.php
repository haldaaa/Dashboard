@extends ('layout')

@section ('contenu')

<h1> Statistiques </h1>
</br> </br> </br>

<div class="row">

    <div class="col-md-5">
        <h2 class='offset-2'> Meuilleurs commerciaux :</h2> </br>
        <table class="table table-striped ">
            <thead class="thead-light ">
              <tr>
           
                <th scope="col">Nom commercial</th>
                <th scope="col">Nombre commande</th>
                <th scope="col">Total vente</th>
              </tr>
            </thead>
            <tbody>
            @foreach($best3Seller as $data)
              <tr>
                <td scope="row">{{$data->nom }}</td>
                <td>{{$data->nbre_commande}}</td>
                <td>{{$data->total_vente}} €</td>
               
              </tr>
           @endforeach
            </tbody>
          </table>
    </div>

    <div class="col-md-5 offset-1">
        <h2 class="offset-2"> Meuilleurs produits : </h2> </br>
        <table class="table table-striped ">
            <thead class="thead-light ">
              <tr>
                <th scope="col">Nom produit</th>
                <th scope="col">Quantité vendu</th>
              </tr>
            </thead>
            <tbody>
                @foreach($bestProductSell as $data)
              <tr>
                <th scope="row">{{ $data -> nom_produit }}</th>
                <td>{{ $data -> nombre_vendu}}</td>
       
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div> <!-- Première div row --> 

</br> </br>
<div class="row">
    <div class="col-md-5">
        <h2 class='offset-2'> Plus gros clients :</h2> </br>
        <table class="table table-striped ">
            <thead class="thead-light ">
              <tr>
           
                <th scope="col">Nom client </th>
                <th scope="col">Nombre commande</th>
                <th scope="col">Total vente ( a venir)</th>
              </tr>
            </thead>
            <tbody>
            @foreach($bestClient as $data)
              <tr>
                <td scope="row">{{$data->nom_entreprise }}</td>
                <td>{{$data->nbre_commande}}</td>
                <td> Inc</td>
               
              </tr>
           @endforeach
            </tbody>
          </table>
    </div>
    <div class="col-md-5 offset-1">
      <h2 class='offset-2'> Plus gros clients :</h2> </br>
      <table class="table table-striped ">
          <thead class="thead-light ">
            <tr>
         
              <th scope="col">Nom client </th>
              <th scope="col">Nombre commande</th>
              <th scope="col">Total vente ( a venir)</th>
            </tr>
          </thead>
          <tbody>
          @foreach($bestClient as $data)
            <tr>
              <td scope="row">{{$data->nom_entreprise }}</td>
              <td>{{$data->nbre_commande}}</td>
              <td> Inc</td>
             
            </tr>
         @endforeach
          </tbody>
        </table>
    </div>

    <div class="row">
      <p> Du contenu soon </p>
    </div>

</div> <!-- Deuxième div row --> 

@endsection