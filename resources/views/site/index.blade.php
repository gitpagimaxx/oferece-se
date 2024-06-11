<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Save Money Pharma</title>
		<meta name="author" content="Graphicfort">
		<meta name="robots" content="index follow">
		<meta name="googlebot" content="index follow">
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="keywords" content="bason, HTML5, CSS3, Creative, MultiPurpose, Template, create professional website fast">
		<meta name="description" content="HTML5 MultiPurpose Template, create professional website fast">

		<!-- Mobile Configurations
		==================================================================== -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- fav icon
		==================================================================== -->
		<link rel="icon" href="/assets/images/favicon/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" href="/assets/images/favicon/favicon-192x192.png" sizes="192x192" />
		<link rel="apple-touch-icon" href="/assets/images/favicon/favicon-180x180.png" />
		<meta name="msapplication-TileImage" content="/assets/images/favicon/favicon-270x270.png" />

		<!-- Google Fonts
		==================================================================== -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<link href="/assets/css/custom.css" rel="stylesheet">

	</head>
	<body>
		
	<!-- header -->
	@include('site.header')
	
	<!-- header -->
	@include('site.search')

	<!-- content -->
	<section id="conteudo" class="container-fluid pt-4 pb-4 bg-container-content">
	
		@yield('content')		

	</section>

	<!-- footer -->
	@include('site.footer')

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/cd2c205552.js" crossorigin="anonymous"></script>

	</body>
</html>
