<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="{{asset('/css/img.css')}}" />
    <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css" />
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />



</head>
<body>
    <div class="wrapper">
        <div class="main-panel">
            @include('layouts.user.usernavbar')
            <div class="content">
                @yield('content')
            </div>

        </div>
        @include('layouts.user.userbody')
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
