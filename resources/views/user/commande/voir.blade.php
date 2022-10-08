<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        Voir Commande
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css" />
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">


</head>
<body>
    @include('layouts.user.usernavbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-gradient" style="--bs-bg-opacity: .5;background-color:rgb(143, 214, 231);">
                        <h4>Vue de la Commande
                            <a href="{{url('commande')}}" class="btn bg-dark bg-opacity-50 bg-gradient text-white float-end">Retour</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4 style="font-weight: 700;" >Détails d'Expédition</h4>
                                <hr>
                                <label for="">Nom</label>
                                <div class="border">{{ $commandes->name }}</div>
                                <label for="">Prénom</label>
                                <div class="border">{{ $commandes->prenom }}</div>
                                <label for="">Email</label>
                                <div class="border">{{ $commandes->email }}</div>
                                <label for="">Numéro téléphone</label>
                                <div class="border">{{ $commandes->tele }}</div>
                                <label for="">Adresse</label>
                                <div class="border">
                                    @if ($commandes->paymentMethod == 'Livraison à domicile')
                                        {{ $commandes->adresse}}
                                    @else
                                        {{ $commandes->paymentMethod}}
                                    @endif
                                </div>

                                <label for="">Code Postale</label>
                                <div class="border">{{ $commandes->codePostale }}</div>
                                <label for="">Date & Heur Livraison</label>
                                <div class="border">
                                        {{ $commandes->dateLivraison}}
                                </div>
                                <label for="">Livraison</label>
                                <div class="border">{{ $commandes->paymentMethod }}</div>
                            </div>
                            <div class="col-md-6">
                                <h4 style="font-weight: 700;">Détails de la Commande</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Quantité</th>
                                            <th>Prix</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($commandes->commandeProduct as $item )
                                            <tr>
                                                <td>{{ $item->products->libelle}}</td>
                                                <td>{{ $item->qty}}</td>
                                                <td>{{ $item->prix}}</td>
                                                <td><img src="{{ asset('assets/uploads/product/'.$item->products->image)}}" width="50px" alt="image produit"></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4 class="px-2">Montant Total : <span  class="float-end"> {{ $commandes->facture->montant_total}} MAD</span></h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-5">
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
</body>
</html>
