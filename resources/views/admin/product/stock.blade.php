@extends('layouts.admin')

@section('contenu')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
              <div class="card-header">
                  <h4 class="card-title ">Page de Stock</h4>
              </div>
          </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table">
                          <thead class=" text-primary">
                              <th>Id</th>
                              <th>Produit</th>
                              <th></th>
                              <th>Quantité</th>
                              <th>Action</th>
                          </thead>
                          <tbody>
                              @foreach ($product as $item)
                                  <tr>
                                      <td>{{ $item->id }}</td>
                                      <td><img src="{{ asset('assets/uploads/product/'.$item->image)}}" class="cate-image" alt="Ici Image"></td>
                                      <td>{{ $item->libelle}}</td>
                                      <td>{{ $item->stock->quantite_prod }}</td>
                                      <td>
                                          <a href="{{ url('edit-stock/'.$item->id) }}"  class="btn btn-primary">Editer</a>
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
