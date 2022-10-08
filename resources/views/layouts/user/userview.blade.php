<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css" />
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('/css/img.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">


</head>
<body>
    @include('layouts.user.usernavbar')
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
                        <label class="fw-bold">Prix: {{$product->prix}} DH</label>
                        <p class="mt-3">
                            {!! $product->description !!}
                        </p>
                        <hr>
                        @if ($product->stock->quantite_prod > 0)
                            <label class="badge bg-success">In stock</label>
                        @else
                            <label class="badge bg-danger">Out of stock</label>

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
                                    @if ($product->stock->quantite_prod >0)
                                        <button id="alertbtn" style="height: 50px; width:190px;"  class="btn btn-primary"><i class="fa fa-shopping-basket"></i> Ajouter au panier</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    @include('layouts.user.userbody')
    <div class="col-md-12">
        @include('layouts.inc.frontfooter')
    </div>
<script src="{{asset('js/custom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
@if (session('status'))
    <script>
        swal('{{ session('status')}}');
    </script>
    @endif
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
                alertbtn.addEventListener('click', function(event){
                event.preventDefault();
               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });

              $.ajax({
               method:"POST",
               url:"/add_to_cart",
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
</body>
</html>
