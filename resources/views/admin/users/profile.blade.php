@extends('layouts.admin')

@section('contenu')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
                <div class="card-header">
                    <h4 class="card-title ">Profile</h4>
                </div>
            </div>
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{url('update-profile')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <label for="">Nom</label>
                                    <input style="opacity: 80%;" name="nom" class="p-2 border" value="{{ $user->name}}"/>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Prénom</label>
                                    <input style="opacity: 80%;" name="prenom" class="p-2 border" value="{{ $user->prenom}}"/>

                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Email</label>
                                    <input style="opacity: 80%;" name="email" class="p-2 border" value="{{ $user->email}}"/>

                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Numéro<br>téléphone</label>
                                    <input style="opacity: 80%;" name="tele" class="p-2 border" value="{{ $user->tele}}"/>

                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Adresse</label>
                                    <input style="opacity: 80%;" name="adresse" class="p-2 border" value=" {{ $user->adresse}}"/>

                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Code<br>postale</label>
                                    <input style="opacity: 80%;" name="codePostale" class="p-2 border" value="{{ $user->codePostale}}"/>

                                </div>

                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary" style="float: inline-end;">Modifier</button>
                        </form>

                    </div>
                    </div>
                </div>
            </div>
        </div>
  </div>

@endsection
