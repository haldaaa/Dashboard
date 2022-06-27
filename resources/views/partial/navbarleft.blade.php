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
              Commandes
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
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('commerciaux') }}">
              <span data-feather="bar-chart-2" class="align-text-bottom"></span>
              Liste des commerciaux
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers" class="align-text-bottom"></span>
              Integrations
            </a>
          </li>
        </ul>
      </div>
    </nav>
