@extends('layouts.admin')

@section('contenu')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4>Vue de la Commande
                            <a href="{{url('orders')}}" style="float: inline-end;" class="btn btn-warning">Retour</a>
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
                                <label for="">Adresse Livraison</label>
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
                                <div class="form-floating mt-5 px-2">
                                    <label for="">Status Commande</label>
                                    <form action="{{url('update-orders/'.$commandes->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="order_status" class="custom-select mr-sm-2 form-select" aria-label="Floating label select example">
                                            <option {{ $commandes->statut_commd == '0'? 'selected' : '' }} value="0" >En attendant</option>
                                            <option {{ $commandes->statut_commd == '1'? 'selected' : '' }} value="1" >Complété</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary mt-3" style="float: inline-end;">Modifier</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
