<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="/css/log.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Inscription</title>
</head>
<body>
    <div id="booking" class="section">
        @include('layouts.inc.frontnavbar')
        <div class="section-center">
          <div class="container">
            <div class="row">
              <div class="booking-form">
                <div class="booking-bg">
                  <div class="form-header">
                    <h2>INSCRIPTION</h2>
                  </div>
                </div>
                <form action="{{ route('register') }}" method="POST">
                @csrf
                  <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <span class="form-label">Nom</span>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="UserName" required autocomplete="name" autofocus value="{{ old('email') }}">
                        @error('name')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <span class="form-label">Mot de passe</span>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" name="mot de passe" placeholder="Password" required autocomplete="new-password" data-type="password">
                        @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <span class="form-label">Email</span>
                            <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" placeholder="Adresse_email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                      <div class="form-group">
                        <span class="form-label">Confirmer password</span>
                        <input id="password-confirm" type="password" name="password_confirmation" class="form-control" placeholder="Confirmer_password" required autocomplete="new-password" data-type="password">
                      </div>
                    </div>
                  </div>
                  <div class="form-btn">
                    <button class="submit-btn" >Inscription</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>

