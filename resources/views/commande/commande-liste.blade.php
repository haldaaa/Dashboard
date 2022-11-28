@extends ('layout')


@section ('contenu')
<div class="container">

<table class="table ">
    <thead>
      <tr>

        <th scope="col">Commercial </th>
        <th scope="col">Nombre ventes</th>
        <th scope="col">Bénéfice</th>
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
        <p> Commande numéro : </p>
        <p> Effectué par : </p>
      
      </div>
      <div class="col-md-6 cadre">
        <p> Une div ici </p>
      </div>

    </div>
  </div>

@endsection
