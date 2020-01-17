<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('name_app','Intranet v.1')</title>
    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/favicon.ico" rel="icon">
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    
    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fontawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">

    <!-- CSS -->
    <link type="text/css" href="{{ asset('argon')}}/css/argon.min.css?v=1.1.0" rel="stylesheet">

    <!-- Custom -->
    
    <link rel="stylesheet" href="{{ asset('css/custom.css')}}">
</head>

<body class="{{ $class ?? '' }}">
    @include('layouts.navbars.sidebar')
    <div class="main-content">

        @include('layouts.navbars.app')
        @include('layouts.headers.app')
        @yield('content')
    </div>

    @guest()
    @include('layouts.footers.app')
    @endguest

    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    @stack('js')


    <script src="{{ asset('argon')}}/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{ asset('argon')}}/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="{{ asset('argon')}}/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="{{ asset('argon')}}/vendor/moment/min/moment.min.js"></script>
    <script src="{{ asset('argon')}}/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="{{ asset('argon')}}/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="{{ asset('argon')}}/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>


    <!-- DataTables 
    <script src="{{ asset('argon')}}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('argon')}}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('argon')}}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('argon')}}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('argon')}}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('argon')}}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('argon')}}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('argon')}}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
-->
    <!-- Datepicker 
    <script src="{{ asset('argon')}}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
-->
    <!-- Argon JS -->
    <script src="{{ asset('argon') }}/js/argon.min.js?v=1.1.0"></script>



    <!-- Custom JS
    <script src="{{ asset('js')}}/follow-up/supplies/order.js"></script>
    <script src="{{ asset('js')}}/app.js"></script>
-->

</body>

</html>