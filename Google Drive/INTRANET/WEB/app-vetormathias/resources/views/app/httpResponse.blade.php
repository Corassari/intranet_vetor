<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $param->cod }} - {{ $param->description }}</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Passion+One:900" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{asset('argon') }}/css/argon.css " />

</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-9">
            <div class="col-lg-1 col-md-1 mt--4">
                <h1 class="text-{{$param->class}}" style="font-size:6em">:(</h1>
            </div>
            <div class="col-lg-5 col-md-7">
                <p class="text-uppercase mb--2">Ops erro {{ $param->cod }} </p>
                <h1 class="text-uppercase text-weight">{{ $param->description }}</h1>
                <p class="text-muted">{{ $param->message }}</p>
            </div>

        </div>
    </div>
</body>

</html>