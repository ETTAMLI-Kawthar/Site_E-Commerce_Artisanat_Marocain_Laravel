@extends('layouts.front')

@section('title')
    Artisanat Marocain
@endsection
@section('content')
    @include('layouts.inc.slider')
    <section class="">
        <div class="container py-5">
          <h2 class="mt-4 mb-5">
            <b>PRODUITS POPULAIRES</b></h2>
          <div class="row">
            @foreach ($pop_product as $item )
                <div class="text-center col-lg-4 col-md-12 mb-4">
                    <div class="card opacity1">
                        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                        data-mdb-ripple-color="light">
                        <a href="{{ url('product/'.$item->libelle) }}">
                        <img src="{{ asset('assets/uploads/product/'.$item->image) }}" alt="product image" class="w-100" />

                            <div class="hover-overlay">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </div>
                        </a>
                        </div>
                        <div class="card-body">
                        <a href="{{ url('product/'.$item->libelle) }}" class="text-reset">
                            <h5 class="card-title mb-3">{{ $item->libelle}}</h5>
                        </a>
                        <a href="{{ url('product/'.$item->libelle) }}" class="text-reset">
                            <p>{{$item->categorie->name_cat}}</p>
                        </a>
                        <h6 class="mb-3">{{ $item->prix }} MAD</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
      </section>
        <div class="container py-5">
          <h2 class="mt-4 mb-5">
            <b>LISTES DES PRODUITS</b></h2>
                <div id="navbarNav" class="col-auto mb-4" aria-label="Basic outlined example">
                    <label style="color: rgb(2, 40, 83); width: 70px;"><h5><b>Filtrer:</b> </h5></label>
                    <a href="{{'/'}}" style="color: #111;" class="ms-5">Tout Produit</a>
                    @foreach ($categorie as $elem )
                        <a href="{{url('select-prod-cat/'.$elem->id)}}" style="color: #111;" class="ms-5">{{$elem->name_cat}}</a>
                    @endforeach
                </div>

          <div class="row pt-5">
            @foreach ($product as $item )
                <div class="text-center col-lg-4 col-md-12 mb-4">
                    <div class="card opacity1">
                        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                        data-mdb-ripple-color="light">
                        <a  href="{{ url('product/'.$item->libelle) }}">
                        <img src="{{ asset('assets/uploads/product/'.$item->image) }}" alt="product image" class="w-100" />

                            <div class="hover-overlay">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </div>
                        </a>
                        </div>
                        <div class="card-body">
                        <a href="{{ url('product/'.$item->libelle) }}" class="text-reset">
                            <h5 class="card-title mb-3">{{ $item->libelle}}</h5>
                        </a>
                        <a href="{{ url('product/'.$item->libelle) }}" class="text-reset">
                            <p>{{$item->categorie->name_cat}}</p>
                        </a>
                        <h6 class="mb-3">{{ $item->prix }} MAD</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
      </section>



@endsection
