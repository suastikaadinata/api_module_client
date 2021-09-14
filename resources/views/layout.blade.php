<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>@yield('title') - {{ config('app.name') }}</title>
	<link href="https://fonts.googleapis.com/css?family=Cabin:400,600|Raleway:400,700" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('/fontawesome-free-5.13.1-web/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/datatables.css') }}">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<script src="{{ asset('/js/jquery.min.js') }}"></script>
	<script src="{{ asset('/js/popper-1-16-0.min.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/js/datatables.js') }}"></script>
	<script src="{{ asset('/js/main.js') }}"></script>
</head>

<body>
	<div class="content-container">
		@yield('content')
	</div>
</body>