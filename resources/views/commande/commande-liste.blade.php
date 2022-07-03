@extends ('layout')

@section ('contenu')

 @foreach($liste as $commandes)
 {
    <div class="card col-md-3">
        <img src="{{ $commandes->image }}" class="card-img-top" alt="...">
        <div class="card-body">
        <h5 class="card-title"> {{  $commandes->nom }}    </h5>
        <p class="card-text">Secteur : {{ $commandes->ville }}</p>
        <p class="card-text">Nombre ventes : {{ $commandes->nbre_commande }}</p>
        <a href="#" class="btn btn-primary">Profil id : {{ $commandes->commercial }} </a>
        </div>
    </div>
 }
@endforeach

    <p> Yo </p>
    <div id="app">

       <p v-if="seen"> Oui </p>
        @{{ message }}
      </div>

@endsection
