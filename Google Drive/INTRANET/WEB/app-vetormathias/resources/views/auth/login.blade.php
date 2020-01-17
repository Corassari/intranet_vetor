<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('name_app','Intranet v.1')</title>
    <!-- Favicon -->
    <link href="{{asset('argon')}}/img/brand/favicon.ico" rel="icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{asset('argon')}}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{asset('argon')}}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('argon')}}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('argon')}}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('argon')}}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">

    <!-- CSS -->
    <link type="text/css" href="{{asset('argon')}}/css/argon.css?v=1.1.0" rel="stylesheet">
    <link type="text/css" href="{{asset('css')}}/custom.css" rel="stylesheet">
    <!-- Custom -->
    <style type="text/css">
        body {
            background: url(/argon/img/theme/bg-login-001.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="main-content">

        <div class="container">
            <div class="row justify-content-center mt-6">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary shadow border-0">

                        <div class="card-header text-center bg-transparent">
                            <img class="img-responsive" height="85" src="{{ asset('argon') }}/img/brand/logo.png"
                                alt="Intranet">
                        </div>
                        <div class="card-body mt-2 px-lg-5 py-lg-4">
                            <form  id="appLogin" v-on:submit="login" role="form" method="POST" action="/auth/login">

                                {{ csrf_field() }}

                                <div class="form-group mb-3">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Email" v-model="inputEmail"
                                            type="email" name="mail" value="" required
                                            autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" name="pass" placeholder="Password"
                                            v-model="inputPass" type="password" value="secret" required>
                                    </div>

                                </div>
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block my-4" v-html="btnLogin"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                        </div>
                        <div class="col-6 text-right">
                            <!--<a href="#" class="text-light">
                                <small>Create new account</small>
                            </a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-5">
        <div class="container">
        </div>
    </footer>
    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/js-cookie/js.cookie.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js') }}/auth/login.js"></script>


</body>

</html>