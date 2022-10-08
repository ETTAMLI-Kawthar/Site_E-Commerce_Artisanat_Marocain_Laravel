@extends('layouts.admin')

@section('contenu')
    <div class="card">
        <div class="card-header card-header-primary">
            <h4>Modifier Produit</h4>
        </div>
        <div class="card-body">
                <form action="{{ url('update-product/'.$product->id) }}" method="Post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="">Prix DH</label>
                            <input type="number" value="{{ $product->prix }}" class="form-control" name="prix">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="">Libelle</label>
                            <input type="text" value="{{ $product->libelle }}" class="form-control" name="libelle">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="">Description</label>
                            <textarea name="description" rows="3" class="form-control">{{ $product->description }}</textarea>
                        </div>
                        <div class="col-auto mb-4">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Categorie</label>
                            <select class="custom-select mr-sm-2" name="cate_id">
                                    <option value="{{$product->cate_id}}">{{ $product->categorie->name_cat }}</option>
                            </select>

                        </div>
                        <div class="col-md-12 mb-4">
                            @if ($product->image)
                            <img src="{{ asset('assets/uploads/product/'.$product->image) }}" alt="Image de produit">
                        @endif
                            <input type="file" class="form-control-file" name="image">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="">Populaire</label>
                            <input type="checkbox" {{ $product->populaire == '1' ? 'checked':'' }} name="populaire">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="">Désactiver</label>
                            <input type="checkbox" {{ $product->status_prod == '1' ? 'checked':'' }} name="statut">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
