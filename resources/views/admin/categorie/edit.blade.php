@extends('layouts.admin')

@section('contenu')
    <div class="card">
        <div class="card-header card-header-primary">
            <h4>Modifier Categorie</h4>
        </div>
        <div class="card-body">
                <form action="{{ url('update-category/'.$categorie->id) }}" method="Post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="">Nom Catégorie</label>
                            <input type="text" value="{{ $categorie->name_cat }}" class="form-control" name="nom">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="">Description</label>
                            <textarea name="description" rows="3" class="form-control">{{ $categorie->description }}</textarea>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="">Désactiver</label>
                            <input type="checkbox" {{ $categorie->etat_cat == '1' ? 'checked':'' }} name="statut">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
