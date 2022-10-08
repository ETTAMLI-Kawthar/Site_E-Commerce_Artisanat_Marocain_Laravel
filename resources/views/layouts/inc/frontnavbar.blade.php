<style>
    #navbarNav a {
  color: white;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>
<nav class="navbar navbar-dark navbar-expand-lg bg-dark" style="opacity: 0.9;">
    <div class="container ">
        <img src="{{asset('assets/logo/logo1.png')}}" class="cate-image" width="60px" height="60px" alt="logo">
      <a class="navbar-brand" style="font-family:serif;" href="{{ url('/')}}"> <h2 style="color: #ffffff;">Artisanat Marocain</h2>
        </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('/')}}"><i class="fa fa-home"></i> Home</a>
              </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/login')}}"><i class="fa fa-sign-in"></i> Connexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/register')}}"><i class="fa fa-user-plus"></i> Inscription</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url('About')}}"><i class="fa fa-info-circle"></i> A Propos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ url('Contact')}}"><i class="fa fa-address-book"></i> Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
