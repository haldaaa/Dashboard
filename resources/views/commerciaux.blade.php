@extends ('layout')

@section('contenu')

@foreach ($commerciaux as $nom )
<div class="card col-md-3">
    <img src="{{ $nom->image }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"> {{  $nom->nom }}    </h5>
      <p class="card-text">Secteur : {{ $nom->ville }}</p>
      <p class="card-text">Nombre ventes : {{ $nom->nbre_commande }}</p>
      <a href="#" class="btn btn-primary">Profil id : {{ $nom->id }} </a>
    </div>
  </div>


@endforeach


@endsection
