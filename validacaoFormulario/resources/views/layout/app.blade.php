<html>
	<head>
		<title> </title>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
		<style>
			body{ padding: 20px; }
		</style>
		<meta name="csrf-token" content="{{ csrf_token() }}">
	</head>
	<body>
		<main role="main">
			

			@yield('body')
		</main>

		<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
	</body>
</html>
