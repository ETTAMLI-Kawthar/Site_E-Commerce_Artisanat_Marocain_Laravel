@extends('layouts.admin')

@section('contenu')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
                <div class="card-header">
                    <h4 class="card-title ">Page Des Catégories</h4>
                </div>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Etat</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name_cat}}</td>
                                        <td>{{ $item->description}}</td>
                                        <td>{{ $item->etat_cat ==  '0' ? 'Activer' : 'Désactiver' }}</td>
                                        <td>
                                            <a href="{{ url('edit-category/'.$item->id) }}"  class="btn btn-primary">Editer</button>
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
  </div>

@endsection
