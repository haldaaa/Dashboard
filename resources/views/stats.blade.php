@extends ('layout')

@section ('contenu')

<h1> Statistiques </h1>
</br> </br> </br>

<div class="row">

    <div class="col-md-5">
      <h2> Graphique </h2> </br> 
      <h3 class="offset-3"> Meuilleur vendeur </h3> </br>
      <canvas id="graph-vendeur" width="400" height="400"> Les plus gros clients </canvas>
   </div>

   <div class="col-md-5">
    <h2> Graphique </h2> </br> 
    <h3 class="offset-3"> Meuilleur ventes </h3> </br>
    <canvas id="graph-client" width="400" height="400"> Les plus gros clients </canvas>
 </div>

</div> <!-- Div Row graphique -->



<div class="row"> <!-- Div Row commerciaux / produits-->
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



</div> <!-- Deuxième div row --> 

<!-- ChartJS -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

      var labels =  {{ Js::from($record_key) }};
      var users =  {{ Js::from($record_values) }};


  new Chart(document.getElementById("graph-vendeur"), {
      type: 'bar',
      data: {
        labels: Object.values(users),
        datasets: [
          {
            label: "Bénéfices (Euros)",
            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
            data: Object.values(labels),
          }
        ]
      },
      options: {
        legend: { display: false },
        title: {
          display: true,
          text: 'Predicted world population (millions) in 2050'
        }
      }
  });

  </script>


@endsection


