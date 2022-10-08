<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            Mon Panier
        </title>
        {{-- font awsome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css" />
        <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet"/>
        <link type="text/css" rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    </head>
    <body>
        <div class="main-panel">
            @include('layouts.user.usernavbar')
        </div>
        <!-- Shoping Cart -->
        <div class="container my-5">
            <div class="card shadow">
                @if ($cartitem->count() > 0)
                    <div class="card-body">
                            <div class="row data">
                                @php
                                    $total=0;
                                @endphp

                                    @foreach ($cartitem as $item )
                                    <div class="col-md-2">
                                        <img class="rounded" src="{{ asset('assets/uploads/product/'.$item->products->image)}}" height="80px" width="80px" alt="image">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6>{{$item->products->libelle}}</h6>
                                            </div>

                                            <div class="col-sm-4">
                                                <h6>{{$item->products->prix}} MAD</h6>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $total_prix=$item->products->prix * $item->prod_qty;
                                    @endphp
                                    <div class="col-md-3 quantity">
                                        @if ($item->products->stock->quantite_prod >= $item->prod_qty)
                                            <form action="{{url('update-cart/'.$item->id)}}" method="POST">
                                            @csrf
                                                <div class="input-group text-center mb-3">
                                                    <input id="input" name="input" type="number"  value="{{ $item->prod_qty }}"min="1" class="form-control text-center qty-input" style="width: 40px;" />
                                                    <button type="submit" class="btn btn-primary input-group-text " value="Actualiser"><i class="fa fa-refresh"></i> Valider</button>
                                                </div>
                                            </form>
                                        @else
                                                <label class="badge bg-danger">Rupture de stock</label>
                                        @endif

                                        @php
                                            $total += $item->products->prix * $item->prod_qty ;
                                        @endphp
                                    </div>

                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <a href="{{ url('delete-cart-item/'.$item->id)}}" class="btn btn-danger"><i class="fa fa-trash-o">Supprimer</i></a>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                                <br>
                            </div>
                            <br>
                    </div>
                    <div class="card-footer">
                        <h6>Prix Total : {{ $total}} MAD
                            <a href="{{ url('commander')}}" class="btn btn-outline-success float-end"> Commander</a>
                        </h6>
                    </div>
                @else
                    <div class="card-body text-center">
                        <h2>Votre <i class="fa fa-shopping-cart"></i> panier est vide</h2>
                        <a href="{{ url('page_user')}}" class="btn btn-outline-secondary float-end">Continuer vos achats</a>
                    </div>
                @endif


            </div>
        </div>
        <div class="pt-5">
            @include('layouts.inc.frontfooter')
        </div>
    <!--   Core JS Files   -->
    <script src="/js/bootstrap.js" defer></script>
    <script src="/js/bootstrap.bundle.min.js" defer></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('/js/bootstrap.js') }}" defer></script>
    <script src="{{asset('js/custom.js')}}"></script>

    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    @if (session('status'))
    <script>
        swal('{{ session('status')}}');
    </script>
    @endif
{{-- <script>
    var input = document.querySelector('#input');
    var prod_id=document.querySelector('#prod_id');
    $(".changeQuantite").click(function(event){
                event.preventDefault();
                alert(input);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

               $.ajax({
                method:"POST",
                url:"update-cart",
                data: {
                    'prod_id' :prod_id.value,
                    'input' : input.value,
                },
                success: function (response){
                    swal(response);
                }
               });
            });

    //         increment_btn.addEventListener('click',function(event){
    //             event.preventDefault();

    //             $.ajaxSetup({
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 }
    //             });

    //            $.ajax({
    //             method:"POST",
    //             url:"update_cart",
    //             data: {
    //                 'prod_id' :prod_id.value,
    //                 'input' : input.value,
    //             },
    //             success: function (response){
    //                 window.location.reload();
    //             }
    //            });
    //         });
</script> --}}
    </body>
</html>

