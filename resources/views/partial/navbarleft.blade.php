<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('index') }}">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard / Index
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('commande') }} ">
              <span data-feather="file" class="align-text-bottom"></span>
              Passer une commande
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('produits') }} ">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Les différents produits
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('client') }}" >
              <span data-feather="users" class="align-text-bottom"></span>
              Liste des clients
            </a>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('commande-liste') }} ">
                  <span data-feather="shopping-cart" class="align-text-bottom"></span>
                  Listes des commandes
                </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('commerciaux') }}">
              <span data-feather="bar-chart-2" class="align-text-bottom"></span>
              Liste des commerciaux
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route ('delete-all') }}">
              <span data-feather="layers" class="align-text-bottom" title="Reset Commerciaux et Clients"></span>
              Reset B&S
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route ('createBandS') }}">
              <span data-feather="layers" class="align-text-bottom" title="Créé Commerciaux et Clients"></span>
              Create B&S
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route ('createVente') }}">
              <span data-feather="layers" class="align-text-bottom" title="Créé Commerciaux et Clients"></span>
              Create sells
            </a>
          </li>

        </ul>
      </div>


    </div>

    </nav>
