<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="/css/log.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Connexion</title>
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
                        <h2>CONNEXION</h2>
                      </div>
                    </div>
                    <form action="{{ route('login') }}" method="POST">
                    @csrf
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <span class="form-label">Email</span>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Adresse_email"required autocomplete="email" autofocus value="{{ old('email') }}">
                            @error('email')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <span class="form-label">Mot de passe</span>
                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" data-type="password" autocomplete="current-password" placeholder="password" required>
                            @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                        </div>
                      </div>
                      <div class="form-btn">
                        <button class="submit-btn" >Connexion</button>
                      </div>
                      {{-- <hr> --}}
                      {{-- <div class="hr"></div> --}}
                      {{-- @if (Route::has('password.request'))
                      <div class="foot-lnk">
                        <a class="link-dark" href="{{ route('password.request') }}">Forgot Password?</a>
                      </div>
                      @endif --}}
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
</body>
</html>


