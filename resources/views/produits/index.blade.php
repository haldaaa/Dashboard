@extends ('layout')

@section('contenu')



@foreach ($produits as $products )
<div class="card col-md-3 card_produit">
    <img src="{{ $products->image }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"> {{  $products->nom_produit }}    </h5>
      <p class="card-text">Prix : {{ $products->prix  }}</p>
      <a href="#" class="btn btn-primary">Profil id : {{ $products->id }} </a>
    </div>
  </div>


@endforeach


@endsection
