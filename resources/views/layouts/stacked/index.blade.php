<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }} @hasSection('title') - @yield('title') @endif</title>

	<!-- Tabler Theme -->
	<link rel="stylesheet" href="{{ asset('vendor/tabler/assets/app.css') }}">
	<script type="module" src="{{ asset('vendor/tabler/assets/app2.js') }}"></script>

	<!-- Datatable -->
	<x-tabler::datatable-assets></x-tabler::datatable-assets>

	<!-- Scripts -->
	@vite(['resources/sass/app.scss', 'resources/js/app.js'])
	@stack('style')
</head>

<body>
	<!-- Toasts -->
	<x-tabler::toast-group></x-tabler::toast-group>

	<div class="page">
		<!-- Header -->
		@include('tabler::layouts.stacked.header')

		<!-- Navbar -->
		@include('tabler::layouts.stacked.navbar')

		<!-- Contents -->
		<div class="page-wrapper">
			<div class="container-xl">
				@yield('header')
			</div>
			<div class="page-body">
				<div class="container-xl">
					@yield('content')
				</div>
			</div>
			@include('tabler::layouts.stacked.footer')
		</div>
	</div>
	@stack('script')
</body>

</html>