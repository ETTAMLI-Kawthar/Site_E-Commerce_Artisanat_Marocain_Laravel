<?php
use App\Http\Controllers\Frontend\CartsController;
$total = CartsController::cartItem();
?>
<style>
    #navbarNav a {
  color: white;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>
<nav class="navbar navbar-dark navbar-expand-lg bg-dark" style="opacity: 0.9;">
    <div class="container">
        <img src="{{asset('assets/logo/logo1.png')}}" class="cate-image" width="50px" height="50px" alt="logo">
      <a class="navbar-brand" href="{{ url('/page_user')}}"><h2 style="color: #ffffff;">Artisanat Marocain</h2></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('/page_user')}}"><i class="fa fa-home"></i> Home</a>
            </li>
            <li class="nav-item">

                <a class="nav-link" style="position: relative;display: inline-block;border-radius: 2px;" aria-current="page" href="{{ url('panier')}}"><i class="fa fa-shopping-cart"></i> <span>Panier</span><span class="badge bg-info" style="position: absolute;
                    top: -1px;right: -7px;padding: 3px 7px;border-radius: 65%; color: white;">{{ $total }}</span>
                </a>
            </li>
            <li>
                <a class="nav-link" aria-current="page" href="{{url('commande')}}"><i class="fa fa-th-list "></i> Commandes</a>
            </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ url('contact')}}"><i class="fa fa-address-book"></i> Contact</a>
              </li>
            <li>
                <a class="nav-link" aria-current="page" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out "></i> Déconnexion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

        </ul>
      </div>
    </div>
  </nav>
