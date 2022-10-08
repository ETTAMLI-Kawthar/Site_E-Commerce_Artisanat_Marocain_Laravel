@extends('layouts.admin')

@section('contenu')
    <div class="card">
        <div class="card-header card-header-primary">
            <h4>Modifier stock</h4>
        </div>
        <div class="card-body">
                <form action="{{ url('update-stock/'.$product->id) }}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>Produit</th>
                                    <th></th>
                                    <th>Quantité</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{ asset('assets/uploads/product/'.$product->image)}}" class="cate-image" alt="Ici Image">
                                        </td>
                                        <td><h4><b>{{ $product->libelle}}</b></h4></td>
                                        <td><input name="qty" type="number" min="1" value="{{ $product->stock->quantite_prod }}"></td>
                                        <td><button type="submit" class="btn btn-primary">Modifier</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">

                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
