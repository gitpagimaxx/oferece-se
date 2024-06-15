<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<base href="{{ url(ENV('APP_URL')) }}/">
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<title>{{$perfil->Nome}}</title>

		<meta name="author" content="PAGIMAXX">
		<meta name="robots" content="index follow">
		<meta name="googlebot" content="index follow">
		<meta name="keywords" content="ofertas, oportunidades, descontos">
		<meta name="description" content="ofertas, oportunidades, descontos">

		<!-- Mobile Configurations
		==================================================================== -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- fav icon
		==================================================================== -->
		<link rel="icon" href="{{ url(ENV('APP_URL')) }}/images/thumb/{{$perfil->Logotipo}}" sizes="32x32" />
		<link rel="icon" href="{{ url(ENV('APP_URL')) }}/images/avatars/{{$perfil->Logotipo}}" sizes="192x192" />
		<link rel="apple-touch-icon" href="{{ url(ENV('APP_URL')) }}/images/avatars/{{$perfil->Logotipo}}" />
		<meta name="msapplication-TileImage" content="{{ url(ENV('APP_URL')) }}/images/avatars/{{$perfil->Logotipo}}" />

		<!-- Google Fonts
		==================================================================== -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<link href="{{env('APP_URL')}}/assets/css/custom.css" rel="stylesheet">

	</head>
	<body>
		
	<!-- header -->
	@include('site.header')
	
	<!-- header -->
	@include('site.section-search')

	<!-- content -->
	<section id="conteudo" class="container-fluid pt-4 pb-4 bg-container-content">
	
		@yield('content')		

	</section>

	<!-- delivery -->
	@include('site.section-delivery')

	<!-- avaliacoes -->
	@include('site.section-avaliacoes')

	<!-- footer -->
	@include('site.footer')

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/cd2c205552.js" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link href="{{env('APP_URL')}}/js/app.js" rel="stylesheet">

	</body>
</html>
