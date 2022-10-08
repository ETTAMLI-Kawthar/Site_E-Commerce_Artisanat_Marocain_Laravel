<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css" />
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">


    <title>Telecharger PDF</title>
</head>
<body>
    <style>
        .list1{
            font-size: 20px;
            line-height: 52px;
            text-align: left;
            list-style-type: none;
        }
        .list2{
            font-size: 20px;
            line-height: 52px;
            text-align: right;
            list-style-type: none;
        }
        table{
            width: 100%;
            height: 70px;
        }
        th, td {
            border-bottom: 1px solid #ddd;
        }

    </style>
    <div class="col-xl-8">
        <ul class="list1">
            <li><b>To:</b>  <span style="color:#af9d41 ;">{{$commandes->name.' '.$commandes->prenom}}</span></li>
            <li><b>Adresse:</b>  {{$commandes->adresse}}</li>
            <li><b>Code Postale:</b>  {{$commandes->codePostale}}</li>
            <li><b>Numéro téléphone:</b>  <i class="fa fa-phone"></i> {{$commandes->tele}}</li>
        </ul>
        <ul class="list2">
            <li><span
                class="fw-bold"><b>Date de création:</b>  </span>{{ date('d-m-Y',strtotime($commandes->created_at))}}</li>
                <li><span
                    class="fw-bold"><b>Date de livraison:</b>  </span>
                        {{ $commandes->dateLivraison}}
                </li>
                <li><span
                    class="fw-bold"><b>Lieu de livraison:</b>  </span>
                    @if ($commandes->paymentMethod == 'Livraison à domicile')
                        {{ $commandes->adresse}}
                    @else
                        {{ $commandes->paymentMethod}}
                    @endif
                    </li>
        </ul>
    </div>
    <div class="row my-2 mx-1 justify-content-center">
        <table class="table table-striped table-borderless">
            <thead style="background-color:#84B0CA ;">
                <tr>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commandes->commandeProduct as $item )
                    <tr>
                        <td>{{ $item->products->libelle}}</td>
                        <td>{{ $item->prix}}</td>
                        <td>{{ $item->qty}}</td>
                        {{-- <td><img src="{{ public_path('assets/uploads/product/'.$item->products->image)}}" width="50px" alt="image produit"></td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-xl-8">
        <p class="ms-3"></p>
    </div>
    <div class="col-xl-3">
        <ul class="list-unstyled">
            <li class="list2"><span style="list-style-type: none;" class="text-black me-4 text-muted">Montant Total :</span><b> {{ $commandes->facture->montant_total}} MAD</b></li>
        </ul>
    </div>
    <hr>
    <div class="text-center">
        <p style="font-size: 25px; text-align: center;"  ><b>Merci pour votre achat</b></p>
    </div>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</body>
</html>
