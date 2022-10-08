@extends('layouts.admin')

@section('contenu')
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
                <div class="card-header">
                    <h4 class="card-title ">Détails d'utilisateurs
                        <a href="{{url('users')}}" style="float: inline-end;" class="btn btn-warning">Retour</a>
                    </h4>
                </div>
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mt-3">
                            <label for="">Role</label>
                            <div class="p-2 border">
                                {{ $users->role_as == '0' ? 'Utilisateur' : 'Admin' }}
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Nom</label>
                            <div class="p-2 border">
                                {{ $users->name}}
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Prénom</label>
                            <div class="p-2 border">
                                {{ $users->prenom}}
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Email</label>
                            <div class="p-2 border">
                                {{ $users->email}}
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Numéro téléphone</label>
                            <div class="p-2 border">
                                {{ $users->tele}}
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Adresse</label>
                            <div class="p-2 border">
                                {{ $users->adresse}}
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Code postale</label>
                            <div class="p-2 border">
                                {{ $users->codePostale}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>

@endsection
