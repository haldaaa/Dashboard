
@extends ('layout')

@section ('contenu')




<form class="col-md-6" action="" method="POST">
    @csrf

    <div class="form-group row">
        <label for="select" class="col-4 col-form-label">Nom commercial</label>
        <div class="col-8">
          <select id="select" name="select_commercial" class="custom-select selectname" aria-describedby="selectHelpBlock">
              @foreach ($nom_commercial  as $nom )
                  <option value="{{ $nom -> commercial }} ">{{ $nom -> nom }} </option>
              @endforeach
          </select>
          <span id="selectHelpBlock" class="form-text text-muted">Renseignez le nom du client selon la liste enrengistré</span>
        </div>
      </div>


    <div class="form-group row">
      <label for="select" class="col-4 col-form-label">Nom client</label>
      <div class="col-8">
        <select id="select" name="select_client" class="custom-select" aria-describedby="selectHelpBlock">
            @foreach ($nom_clients  as $nom )
                <option value="{{ $nom -> client }} ">{{ $nom -> nom_entreprise }} </option>
            @endforeach
        </select>
        <span id="selectHelpBlock" class="form-text text-muted">Renseignez le nom du client selon la liste enrengistré</span>
      </div>
    </div>

    <div class="form-group row">
      <label class="col-4">Produits</label>
      <div class="col-8">

        @foreach ($nom_produits as $nom_produit)

        @php
            $tableau = array ('produit' => 'nombre');

        @endphp


            <div class="form-check">


                <label class="form-check-label" for="flexCheckDefault">
                {{ $nom_produit -> nom_produit }}
                <div class="form-group col-md-4">
                    <input type="number" class="form-control" name="tableau[{{ $nom_produit -> id }}]" value="">
                  </div>
                </label>
            </div>
        @endforeach
        <span id="radioHelpBlock" class="form-text text-muted">Selectionner le(s) produit(s) vendus</span>
      </div>
    </div>


    <div class="form-group row">
      <div class="offset-2 col-1">
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
      </div>
      <div class="offset-2 col-1">
        <button name="reset" type="reset" class="btn btn-primary">Reset</button>
      </div>
    </div>
  </form>
  @if (session('succes'))
  <div class="alert alert-succes">
   <p>  {{ session('succes')}} </p>
  </div>

@endif



@endsection

