@extends('layouts.admin')


@section('contenu')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h3>Historie Commande
                            <a href="{{url('orders')}}" style="float: inline-end;" class="btn btn-warning">Nouveau Commande </a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="text-primary">
                                <tr>
                                    <th>Date commande</th>
                                    <th>Numéro commande</th>
                                    <th>Montant total</th>
                                    <th>Statut</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($commande as $item)
                                    <tr>
                                        <td>{{ date('d-m-Y',strtotime($item->created_at))}}</td>
                                        <td>{{ $item->numéro_commd}}</td>
                                        <td>{{ $item->facture->montant_total }} MAD</td>
                                        <td>{{ $item->statut_commd == '0' ? 'En attendant' : 'Complété'}}</td>
                                        <td>
                                            <a href="{{ url('admin/voir-commande/'.$item->id)}}" class="btn btn-primary">Voir</a>
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

@endsection
