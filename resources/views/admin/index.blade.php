@extends('layouts.admin')
<?php
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\UserController;
$total_cat = CategoryController::categorieItem();
$total_prod = ProductController::productItem();
$total_user = UserController::userItem();
?>
@section('contenu')

    <div class="card">
        <div class="card-body">
                <h1>Bonjour <b style="text-transform: uppercase;">{{Auth::user()->name}}</b></h1>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_paste</i>
                  </div>
                  <p class="card-category">Produits</p>
                  <h3 class="card-title">{{$total_prod}}
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">more</i>
                    <a href="{{url('product')}}" style="color: gray;">Details</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">category</i>
                    </div>
                    <p class="card-category">Catégories</p>
                    <h3 class="card-title">+{{$total_cat}}
                    </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i>
                    <a href="{{url('categorie')}}" style="color: gray;">Details</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Stock</p>
                  <h3 class="card-title"></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">settings</i><a href="{{url('stock')}}" style="color: gray;">Details</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">group_add</i>
                  </div>
                  <p class="card-category">Utilisateurs</p>
                  <h3 class="card-title">+{{$total_user}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">info</i><a href="{{url('users')}}" style="color: gray;">Details</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

