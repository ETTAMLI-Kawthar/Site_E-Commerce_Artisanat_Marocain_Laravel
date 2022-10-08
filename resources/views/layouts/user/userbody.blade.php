<section class="">
    <div class="text-center container py-5">
      <h2 class="mt-4 mb-5">
        <strong>LISTES DES PRODUITS</strong></h2>
        <div id="navbarNav" class="col-auto mb-4" aria-label="Basic outlined example">
            <label style="color: rgb(2, 40, 83); width: 70px;"><h5><b>Filtrer:</b> </h5></label>
            <a href="{{'/page_user'}}" style="color: #111;" class="ms-5">Tout Produit</a>
            @foreach ($categorie as $elem )
                <a href="{{url('select-cat/'.$elem->id)}}" style="color: #111;" class="ms-5">{{$elem->name_cat}}</a>
            @endforeach
        </div>
      <div class="row">
        @foreach ($products as $item )
            <div class="col-lg-4 col-md-12 mb-4">
                <div class="card opacity1">
                    <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                    data-mdb-ripple-color="light">
                    <a class="link-dark" href="{{ url('products/'.$item->libelle) }}">
                    <img src="{{ asset('assets/uploads/product/'.$item->image) }}" alt="product image" class="w-100" />

                        <div class="hover-overlay">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-3">{{ $item->libelle}}</h5>

                        <p>{{$item->categorie->name_cat}}</p>
                    </a>
                    <h6 class="mb-3">{{ $item->prix }} MAD</h6>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
  </section>
