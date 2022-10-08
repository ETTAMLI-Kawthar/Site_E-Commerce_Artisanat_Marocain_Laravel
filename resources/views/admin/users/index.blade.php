@extends('layouts.admin')

@section('contenu')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
                <div class="card-header">
                    <h4 class="card-title ">Utilisateurs enregistrés</h4>
                </div>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Numéro téléphone</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name. ' '.$item->prenom}}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->tele}}</td>
                                        <td>
                                            <a href="{{ url('view-users/'.$item->id) }}"  class="btn btn-primary">VOIR</button>
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
