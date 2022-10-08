@extends('layouts.front')

@section('title')
    A Propos
@endsection


@section('content')
    <section class="text-center">
        <img src="{{asset('assets/images/artisanat.webp')}}" class="d-block w-100 figure-img img-fluid rounded" style="height: 300px; opacity:0.7;" alt="">
        <div style="  position: absolute;top: 30%;left: 50%;transform: translate(-50%, -50%);">
            <h1 ><b>A Propos</b></h1>
        </div>
    </section>
<!-- Content page -->
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-7 mb-4 mb-md-0">
                    <div class="pt-2">
                        <h3>
                            <b> Artisanat Marocain</b>
                        </h3>
                        <p style="opacity: 0.7;">
                            La richesse culturelle du Maroc passe aussi par son artisanat traditionnel qui, depuis quelques années déjà, existe aussi en version plus design.
                            Divers et multiples matériaux sont finement travaillés à la main avec des machines et des outils restés largement traditionnels, pour en faire des objets décoratifs
                            et usuels. Art de table, ameublement, bijoux et habillement.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-4 m-lr-auto">
                    <div class="opacity1">
                        <div class="hov-img0">
                            <img src="{{asset('assets/images/artisanat_marocain.jpg')}}" class="d-block img-fluid" alt="IMG">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-5">
                <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                    <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md col-md-11">
                        <h3 class="mtext-111 cl2 p-b-16">
                           <b>Les tapis marocains</b>
                        </h3>
                        <p style="opacity: 0.7;">
                            Une panoplie de produits d’artisanat marocain s’offrent à vous dont les tapis qui sont à l'honneur dans les médinas. Des motifs originaux et complexes,
                            tantôt en centre tantôt aux bords selon les usages, qui suscitent une grande réflexion portant sur leurs conceptions. Au Maroc, la valeur d’un tapis est étroitement
                            liée aux nombres de nœuds et des dessins qui le composent.
                        </p>
                    </div>
                </div>
                <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                    <div class="opacity1">
                        <div>
                            <img src="{{asset('assets/images/TAPIS-MAROC.jpg')}}" class="d-block img-fluid"  alt="IMG">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-md-12 col-lg-7 mb-4 mb-md-0">
                    <div class="cp-t-7 p-l-85 p-l-15-lg p-l-0-md col-md-11">
                        <h3 class="mtext-111 cl2 p-b-16">
                           <b>La céramique et la poterie</b>
                        </h3>
                        <p style="opacity: 0.7;">
                            Les poteries illustrent l'entremêlement de la culture Amazigh. La céramique marque aussi sa présence. Les formes et les couleurs utilisées varient selon les régions.
                            Rendez-vous à Taroudant pour découvrir des poteries uniques en leur genre, multicolores.
                        </p>
                    </div>
                </div>
                <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                    <div class="opacity1">
                        <div class="hov-img0">
                            <img src="{{asset('assets/images/la-poterie.jpg')}}" class="d-block img-fluid" style="height: 250px;" alt="IMG">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
