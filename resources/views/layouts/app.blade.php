<?php
setlocale(LC_MONETARY, 'pt_BR');

?>

<!doctype html>
<html lang="pt-br" translate="no">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ url(ENV('APP_URL')) }}/">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }} @yield('titulo')</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <script src="https://kit.fontawesome.com/60279106a5.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ url(ENV('APP_URL')) }}/css/app.css" rel="stylesheet">

    <link rel="icon" href="{{ url(ENV('APP_URL')) }}/images/picone.png" />
    
</head>
<body>
    <div id="app">
        
        @include('layouts.nav')

        <main class="py-4 mb-4">
            @yield('content')
        </main>

        @include('layouts.app-footer')

    </div>

    <script src="{{ url(ENV('APP_URL')) }}/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
    
    <script src="{{ url(ENV('APP_URL')) }}/js/custom.js"></script>

</body>
</html>
