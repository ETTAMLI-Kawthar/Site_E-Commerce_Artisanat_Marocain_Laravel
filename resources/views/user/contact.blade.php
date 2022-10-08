<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        Contact
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="{{asset('/css/img.css')}}" />
    <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css" />
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />



</head>
<body>
    @include('layouts.user.usernavbar')
    <section class="text-center">
        <img src="{{asset('assets/images/artisanat.webp')}}" class="d-block w-100 figure-img img-fluid rounded" style="height: 300px; opacity:0.7;" alt="">
        <div style="  position: absolute;top: 30%;left: 50%;transform: translate(-50%, -50%);">
            <h1><b>Contact</b></h1>
        </div>
    </section>
    <!-- Content page -->
    <div class="container pt-5">
            <div class="row align-items-stretch no-gutters contact-wrap">
                <div class="col-md-7">
                    <div class="form h-100">
                        <h3>Contactez-nous</h3>
                        <form class="mb-5 needs-validation" method="POST" action="{{url('Message')}}"  name="contactForm">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6 form-group mb-5">
                                    <label for="" class="col-form-label">Name *</label>
                                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name}}" placeholder="Votre nom" required="">
                                    <div class="invalid-feedback"> Un nom valide est requis. </div>
                                </div>
                                <div class="col-md-6 form-group mb-5">
                                    <label for="" class="col-form-label">Email *</label>
                                    <input type="text" class="form-control" name="email" value="{{ Auth::user()->email}}" placeholder="Votre email" required="">
                                    <div class="invalid-feedback"> Un email valide est requis. </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group mb-5">
                                    <label for="" class="col-form-label">Phone</label>
                                    <input type="text" class="form-control" name="tele" value="{{Auth::user()->tele}}" required="">
                                    <div class="invalid-feedback"> Un numéro téléphone valide est requis. </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group mb-5">
                                    <label for="message" class="col-form-label">Message *</label>
                                    <textarea class="form-control" name="message" cols="30" rows="4"  placeholder="Rédigez votre message" required=""></textarea>
                                    <div class="invalid-feedback"> Un message valide est requis. </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-12 form-group">
                                <input type="submit" value="envoyer Message" class="btn btn-dark rounded-0 py-2 px-4">
                            </div>
                            </div>
                        </form>

                        <div id="form-message-warning mt-4"></div>
                        <div id="form-message-success">
                            Votre message a été envoyé. Merci!
                        </div>
                    </div>
                </div>
                <div class="bg-dark col-md-5 flex-w d-flex align-items-stretch">
                        <div style="color: white;" class="info-wrap w-100 p-md-5 p-4 py-5 img">
                            <div class="pt-5">
                                <h3>Informations de contact</h3>
                            <p style="opacity:0.7;" class="mb-4 ms-4" >Nous sommes ouverts à toute suggestion ou simplement pour discute.</p>
                            </div>
                            <div class="dbox w-100 d-flex align-items-start">
                                <span><i class="fa fa-map-marker"></i></span>
                                <div class="ms-4">
                                    <span> Address : </span>
                                    <p style="opacity:0.7;">Taroudant,Maroc</p>

                                </div>
                            </div>
                            <div class="dbox w-100 d-flex align-items-start">
                                <span><i class="fa fa-phone"></i></span>
                                <div class="ms-4">
                                    <span>Phone:</span>
                                    <p style="color: rgb(191, 191, 224)">+212 637109010</p>
                                </div>
                            </div>
                            <div class="dbox w-100 d-flex align-items-start">
                                <span><i class="fa fa-paper-plane"></i></span>
                                <div class="ms-4">
                                    <span> Email:</span>
                                    <p style="color: rgb(191, 191, 224)">info@example.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    <div class="pt-5">
        @include('layouts.inc.frontfooter')
    </div>
    <!--   Core JS Files   -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="/js/bootstrap.js" defer></script>
    <script src="/js/bootstrap.bundle.min.js" defer></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('/js/bootstrap.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
    <script>
        swal('{{ session('status')}}');
    </script>
    @endif
    @yield('scripts')
</body>
</html>
