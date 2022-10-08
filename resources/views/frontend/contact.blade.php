@extends('layouts.front')

@section('title')
   Contact
@endsection


@section('content')
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
                            <form class="mb-5 needs-validation" method="POST" action="{{url('message')}}" name="contactForm">
                                {{ csrf_field() }}
                                <div class="row">
                                <div class="col-md-6 form-group mb-5">
                                    <label for="" class="col-form-label">Name *</label>
                                    <input type="text" class="form-control" name="name" placeholder="Votre nom" required="">
                                    <div class="invalid-feedback"> Un nom valide est requis. </div>
                                </div>
                                <div class="col-md-6 form-group mb-5">
                                    <label for="" class="col-form-label">Email *</label>
                                    <input type="text" class="form-control" name="email" placeholder="Votre email" required="">
                                    <div class="invalid-feedback"> Un email valide est requis. </div>
                                </div>
                                </div>

                                <div class="row">
                                <div class="col-md-6 form-group mb-5">
                                    <label for="" class="col-form-label">Phone</label>
                                    <input type="text" class="form-control" name="tele"  placeholder="Phone" required="">
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
                                        <p style="color: rgb(191, 191, 224)">+212 808557915</p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-start">
                                    <span><i class="fa fa-paper-plane"></i></span>
                                    <div class="ms-4">
                                        <span> Email:</span>
                                        <p style="color: rgb(191, 191, 224)">info@bleu.ma</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>

@endsection
