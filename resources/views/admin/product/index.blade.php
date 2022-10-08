@extends('layouts.admin')

@section('contenu')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
                <div class="card-header">
                    <h4 class="card-title ">Page Des Produits</h4>
                </div>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>Id</th>
                                <th>Prix (MAD)</th>
                                <th>Libelle</th>
                                <th>Description</th>
                                <th>Categorie</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->prix}}</td>
                                        <td>{{ $item->libelle }}</td>
                                        <td>{{ $item->description}}</td>
                                        <td>{{ $item->categorie->name_cat }}</td>
                                        <td>{{ $item->status_prod == '0' ? 'Activer' : 'Désactiver'}}</td>
                                        <td>
                                            <img src="{{ asset('assets/uploads/product/'.$item->image)}}" class="cate-image" alt="Ici Image">
                                        </td>
                                        <td>
                                            <a href="{{ url('edit-product/'.$item->id) }}"  class="btn btn-primary">Éditer</button>
                                            <a href="{{ url('delete-product/'.$item->id) }}"  class="btn btn-danger" style="width: 100px;">Effacer</button>
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
