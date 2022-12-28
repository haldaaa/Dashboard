@extends ('layout')


@section ('contenu')
<div class="container">
  <h1 style="center"> Listes des commandes : </h1> </br> </br>
<table class="table ">
    <thead>
      <tr>
        <th scope="col">Commercial </th>
        <th scope="col">Nombre de commandes</th>
        <th scope="col">Bénéfice total</th>
      </tr>
    </thead>
    <tbody>
      <tr>
@foreach ($liste as $data)
        <td>{{ $data->nom }}</td>
        <td> {{ $data->nbre_commande}} </td>
        <td> {{ $data ->total_vente }}</td>
      </tr>
@endforeach
    </tbody>

  </table>

 
    <div class="row">
  
      <div class="col-md-6 cadre cadreDetailCommande">
        <p> Derniière commande : : </p>
        <p> Effectué par : {{ $vendeurCommande }}  (ID :{{ $idLastCommande }} )</p>

      
      </div>
      <div class="col-md-6 cadre">
        <select id="select" name="select_commandeId" class="custom-select selectname" aria-describedby="selectHelpBlock">
          @foreach ($commandeSelect  as $nom )
              <option value="{{ $nom -> id }} ">{{ $nom -> id }} </option>
          @endforeach
      </div>

    </div>
  </div>

@endsection
