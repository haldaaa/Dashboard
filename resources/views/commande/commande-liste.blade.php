@extends ('layout')

@section ('contenu')


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
        <td>50</td>
      </tr>
@endforeach
    </tbody>

  </table>
@endsection
