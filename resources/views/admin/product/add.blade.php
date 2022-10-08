@extends('layouts.admin')

@section('contenu')
    <div class="card">
        <div class="card-header card-header-primary">
            <h4>Ajouter Produit</h4>
        </div>
        <div class="card-body">
                <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data" class="needs-validation">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="">Prix (MAD)</label>
                            <input type="number" class="form-control" name="prix" required="">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="">Libelle</label>
                            <input type="text" class="form-control" name="libelle" required="">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="">Quantité</label>
                            <input type="number" class="form-control" name="quantite_prod" required="">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="">Description</label>
                            <textarea name="description" rows="3" class="form-control" required=""></textarea>
                        </div>
                        <div class="col-auto mb-4">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Categorie</label>
                            <select class="custom-select mr-sm-2" name="cate_id">
                                <option value="Choose a categorie">Choose a categorie</option>
                                @foreach ($categorie as $item )
                                    <option value="{{$item->id}}">{{$item->name_cat}}</option>
                                @endforeach
                            </select>
                          </div>
                        <div class="col-md-12 mb-4">
                            <label for="">Selectioner l'image du produit</label>
                            <input type="file" class="form-control-file" name="image">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="">populaire</label>
                            <input type="checkbox" name="populaire">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
