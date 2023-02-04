@extends ('layout')


@section ('contenu')

  <div class="container">

    <div class="row">
      <div class="col-md-8">

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
      </div> <!-- Fin Div Tableau -->
    </div> <!-- Fin Div Row -->
 

    </br></br></br><div class="row">
  
      <div class="col-md-5 cadre cadreDetailCommande">
        <p> Dernière commande : : </p>
      @if(isset($vendeurCommande))
        <p> Effectué par : {{ $vendeurCommande }}  (ID :{{ $idLastCommande }} )</p>
        @endif
      
      </div>
      <div class="col-md-3 cadre">
        
        <p> Commande à inspecter : </p>
        
        @if(isset($commandeSelect))
      
          <select id="select" name="select_commandeId" class="custom-select " aria-describedby="selectHelpBlock">

            @foreach ($commandeSelect  as $nom )
                <option value="{{ $nom -> id }} ">{{ $nom -> id }}  </option>
            @endforeach
          @endif
          
          </select>
        
          <button name="submit" type="submit" class="btn btn-primary " id="btn_inspecterCommande">Inspecter commande</button>
        </form>
      </div>
    </div> <!-- Fin Div Row -->
    


  </div> <!-- Fin Div Container -->

@endsection
