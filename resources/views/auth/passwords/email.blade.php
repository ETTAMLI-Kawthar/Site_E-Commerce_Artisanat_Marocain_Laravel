<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{asset('/css/Login.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
	<title>Connexion</title>
</head>
<body>
    <div id="booking" class="section">
        <div class="section-center">
          <div class="container">
            <div class="row">
              <div class="booking-form">
                <div class="booking-bg">
                  <div class="form-header">
                    <h2>MODIFIER MOT DE PASSE</h2>
                  </div>
                </div>
                <form action="{{ route('password.email') }}" method="POST">
                @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">Email</label>
                        <input id="user" class="form-control @error('email') is-invalid @enderror" name="email" type="email" placeholder="Adresse_email"required autocomplete="email" autofocus value="{{ old('email') }}">
                        @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="form-btn">
                    <button class="btn btn-secondary" >Réinitialisation du mot de passe </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
