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

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('style')
</head>

<body>
    <!-- Toasts -->
	@if(session('success'))
	<x-tabler::toast color="success" title="Success!" :message="session('success')"></x-tabler::toast>
	@endif
	@if(session('status'))
	<x-tabler::toast color="primary" title="Info!" :message="session('status')"></x-tabler::toast>
	@endif
	@if(session('error'))
	<x-tabler::toast color="danger" title="Error!" :message="session('error')"></x-tabler::toast>
	@endif
	@if($errors->count())
	<x-tabler::toast color="danger" title="Error!" :message="session('error')">
		<ul class="list-unstyled mb-0">
			@foreach($errors->all() as $error)
			<li><i class="ti ti-x icon me-1 text-danger"></i>{{ $error }}</li>
			@endforeach
		</ul>
	</x-tabler::toast>
	@endif

    <div class="page page-center">
        @yield('content')
    </div>
    @stack('script')
</body>

</html>