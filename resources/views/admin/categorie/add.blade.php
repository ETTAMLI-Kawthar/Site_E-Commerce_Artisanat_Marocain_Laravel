@extends('layouts.admin')

@section('contenu')
    <div class="card">
        <div class="card-header card-header-primary">
            <h4>Ajouter Catégorie</h4>
        </div>
        <div class="card-body">
                <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="">Nom Catégorie</label>
                            <input type="text" class="form-control" name="nom" required="">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="">Description</label>
                            <textarea name="description" rows="3" class="form-control" required=""></textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
