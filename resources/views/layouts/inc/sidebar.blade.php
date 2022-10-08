<div class="sidebar" data-color="purple" data-background-color="white" data-image="">
    <div class="logo" style="text-align: center;">
        <img src="{{asset('assets/logo/logo1.png')}}" class="cate-image" width="80px" height="80px" alt="logo">
      </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{ Request::is('dashboard')? 'active':''}}  ">
          <a class="nav-link" href="{{ url('dashboard')}}">
            <i class="material-icons">dashboard</i>
            <p>Tableau De Bord</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('orders')? 'active':''}}">
            <a class="nav-link" href="{{ url('orders') }}">
              <i class="material-icons">reorder</i>
              <p>Commandes</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('categorie')? 'active':''}}">
            <a class="nav-link" href="{{ url('categorie') }}">
              <i class="material-icons">category</i>
              <p>Catégories</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('add-categorie')? 'active':''}}">
            <a class="nav-link" href="{{ url('add-categorie') }}">
              <i class="material-icons">add_circle_outline </i>
              <p>Ajouter Catégories</p>
            </a>
          </li>
        <li class="nav-item {{ Request::is('product')? 'active':''}}">
          <a class="nav-link" href="{{ url('product') }}">
            <i class="material-icons">content_paste</i>
            <p>Produits</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('add-product')? 'active':''}}">
            <a class="nav-link" href="{{ url('add-product') }}">
              <i class="material-icons">add_circle_outline </i>
              <p>Ajouter Produits</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('stock')? 'active':''}}">
            <a class="nav-link" href="{{ url('stock') }}">
              <i class="material-icons">unarchive</i>
              <p>Stock</p>
            </a>
          </li>
        <li class="nav-item {{ Request::is('users')? 'active':''}} ">
            <a class="nav-link" href="{{ url('users') }}">
              <i class="material-icons">people</i>
              <p>Utilisateurs</p>
            </a>
          </li>
          <li class="nav-item {{ Request::is('messageUser')? 'active':''}} ">
            <a class="nav-link" href="{{ url('messageUser') }}">
              <i class="material-icons">message</i>
              <p>Messages Utilisateurs</p>
            </a>
          </li>
      </ul>
    </div>
  </div>
