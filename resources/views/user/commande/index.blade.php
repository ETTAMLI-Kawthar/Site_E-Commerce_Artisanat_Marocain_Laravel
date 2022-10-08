<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        Mes Commandes
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css" />
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet"/>
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
                        <h4 class="">Mes Commandes</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Numéro commande</th>
                                    <th>Montant total (MAD)</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($commande as $item)
                                    <tr>
                                        <td>{{ $item->numéro_commd}}</td>
                                        <td>{{ $item->facture->montant_total }}</td>
                                        <td>{{ $item->statut_commd == '0' ? 'En attendant' : 'Complété'}}</td>
                                        <td>
                                            <a href="{{ url('voir-commande/'.$item->id)}}" class="btn bg-info bg-opacity-50 bg-gradient">Voir</a>
                                            @if ($item->statut_commd == '1')
                                            <a href="{{url('pdf/'.$item->id)}}" class="btn bg-info bg-opacity-50 bg-gradient"> <i class="fa fa-print"></i> Facture</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
          <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    @if (session('status'))
        <script>
            swal('{{ session('status')}}');
        </script>
        @endif
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>
</html>
