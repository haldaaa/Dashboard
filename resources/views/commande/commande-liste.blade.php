@extends ('layout')


@section ('contenu')

Rajouter class div container et row
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
    <div class="col-md-6">
      <p> Une div ici </p>
    </div>

  </div>

@endsection
