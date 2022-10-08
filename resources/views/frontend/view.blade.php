@extends('layouts.front')

@section('title',$product->libelle)


@section('content')
<div class="container">
    <div class="card shadaw">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{ asset('assets/uploads/product/'.$product->image) }}" class="w-100">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{ $product->libelle}}
                        @if ($product->populaire == '1')
                        <label class="float-end badge bg-danger trending_tag" style="font-size: 16px;">Populaire </label>
                        @endif
                    </h2>
                    <hr>
                    <label class="fw-bold">Prix: {{$product->prix}} MAD</label>
                    <p class="mt-3">
                        {!! $product->description !!}
                    </p>
                    <hr>
                    @if ( $product->stock->quantite_prod  > 0)
                        <label class="badge bg-success">En stock</label>
                    @else
                        <label class="badge bg-danger">Rupture de tock</label>

                    @endif
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <input id="prod_id" type="hidden" value="{{$product->id }}" name="prod_id">
                                <label for="quantite">Quantite</label>
                                <div class="input-group text-center mb-3" style="width: 150px;">
                                    <button id="decrement_btn" class="input-group-text ">-</button>
                                    <input id="input" name="input"  type="text" value="1" class="form-control text-center" />
                                    <button id="increment_btn" class="input-group-text ">+</button>
                                </div>
                        </div>
                        <div class="d-grid gap-2 mx-auto d-md-flex justify-content-md-end">
                            @if ($product->stock->quantite_prod > 0)
                                <button id="alertbtn" style="height: 50px; width:190px;"  class="btn btn-primary"><i class="fa fa-shopping-basket"></i> Ajouter au panier</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer " style="background-color:#ffff;">
            <div class="col-6">
                <h3><b>Description</b></h3>
                <p>{{$product->categorie->description}}</p>
            </div>
        </div>
    </div>
    <section>
        <div class=" container py-5">
          <h2 class="mt-4 mb-5">
            <b>LISTES DES PRODUITS</b></h2>
          <div class="row">
            @foreach ($products as $item )
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
</div>
@endsection
@section('scripts')
    <script>
    var increment_btn = document.querySelector('#increment_btn');
    var decrement_btn = document.querySelector('#decrement_btn');
    var input = document.querySelector('#input');

    increment_btn.addEventListener('click', () =>{
        if(input.value<10){
            input.value = parseInt(input.value) + 1;
        }

    });

    decrement_btn.addEventListener('click', () =>{
        if(input.value >1){
            input.value = parseInt(input.value) - 1;
        }

    });
    alertbtn.addEventListener('click', function(event){
         event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

       $.ajax({
        method:"POST",
        url:"/addtocart",
        data:{
            'prod_id':prod_id.value,
            'input':input.value,
        },
        success: function (response){
            swal(response.status);
        }
       });
    });

    </script>
@endsection
