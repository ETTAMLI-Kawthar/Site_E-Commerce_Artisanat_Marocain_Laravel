<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            Commande
        </title>
        {{-- font awsome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css" />
        <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet"/>
        <link type="text/css" rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
        <style>

        </style>
    </head>
    <body>
        <div class="main-panel">
            @include('layouts.user.usernavbar')
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3"><b>PANIER</b>
                    </h4>
                    <hr/>
                    <div class="card">
                        @if ($cartItem->count() > 0)
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Quantité</th>
                                            <th>Prix</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItem as $elem )
                                            <tr>
                                                <td>{{$elem->products->libelle}}</td>
                                                <td>{{$elem->prod_qty}}</td>
                                                <td>{{$elem->products->prix}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="card-body text-center">
                                <h3>Aucun produits dans panier <i class="fa fa-shopping-cart"></i></h3>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-8 order-md-1">
                    <h4 class="mb-3"> <b>INFORMATIONS PERSONNELLES</b>  </h4>
                    <hr/>
                    <div class="card">
                        <div class="card-body">
                            <form class="needs-validation"  action="{{url('payer')}}" method="POST">
                                 {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label name="name">Nom</label>
                                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name}}" placeholder="entrer votre nom">
                                        <div class="invalid-feedback"> Un nom valide est requis. </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label name="prenom">Prénom</label>
                                        <input type="text" class="form-control" name="prenom" value="{{ Auth::user()->prenom}}" placeholder="entrer votre prénom" >
                                        <div class="invalid-feedback"> Un prénom valide est requis. </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label name="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email}}" placeholder="you@gmail.com">
                                    <div class="invalid-feedback"> Please entrer un email valide. </div>
                                </div>
                                <div class="mb-3">
                                    <label name="tele">Numéro de téléphone</label>
                                    <input type="text" class="form-control" name="tele" value="{{ Auth::user()->tele}}" required="">
                                    <div class="invalid-feedback"> Please entrer votre numéro de telephone. </div>
                                </div>
                                <div class="mb-3">
                                    <label name="adresse">Adresse</label>
                                    <input type="text" class="form-control" name="adresse" value="{{ Auth::user()->adresse}}" required="">
                                    <div class="invalid-feedback"> Please entrer votre adresse. </div>
                                </div>
                                <div class="mb-3">
                                    <label name="codePostale">Code Postale</label>
                                    <input type="text" class="form-control" name="codePostale" value="{{ Auth::user()->codePostale}}" required="">
                                    <div class="invalid-feedback"> Please entrer votre numéro de telephone. </div>
                                </div>

                                <div class="col-auto mb-4">
                                    <div class="mb-3">
                                        <label name="dateLivr">Date & Heur livraison</label>
                                        <input type="text" class="form-control" name="dateLivraison" required="">
                                        <div class="invalid-feedback"> Please entrer une date. </div>
                                    </div>
                                    <h4 class="mb-3">Livraison</h4>
                                    <select class="custom-select  mr-sm-2" name="paymentMethod">
                                        @foreach ($livraison as $item )
                                            <option value="{{$item->mode_livraison}}">{{$item->mode_livraison}}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                <br>
                                @if ($cartItem->count() > 0)
                                    <button class="btn btn-dark btn-lg d-grid gap-2 col-6 mx-auto" type="submit">Valider la commande</button>
                                @endif
                                </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="pt-5">
            @include('layouts.inc.frontfooter')
        </div>
        <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('/js/bootstrap.js') }}" defer></script>

    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
    <script>
        swal('{{ session('status')}}');
    </script>
    @endif
        <script>
            (function () {
  'use strict'

  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation')

    // Loop over them and prevent submission
    Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  }, false)
}())
        </script>
    </body>
    </html>
