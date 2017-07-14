<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Crisp | Home</title>

    {!! Html::script('js/jquery-3.2.1.min.js') !!}

    @include('layouts.stylesheet')
</head>

<body>
    <div id="big-wrapper" style="height:100%">
        <div class="container-fluid" style="padding:0;height:100%">
            @yield('content')
        </div>
    </div>

    @include('layouts.javascript')
</body>
</html>
