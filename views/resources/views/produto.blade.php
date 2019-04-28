<!DOCTYPE html>
<html>
<head>
	<title>Produtos </title>
	<link href="{{ asset('css/app.css')}}" rel="stylesheet" >
</head>
<body>
	@if(isset($produtos))
		@if(count($produtos) == 0)

			<h1>Nenhum produto</h1>

		@elseif(count($produtos) === 1)

			<h1>Temos um produto</h1>

		@else

			<h1>Temos vários produtos</h1>

			@foreach ($produtos as $produto)
				<p>{{$produto}}</p>

			@endforeach

		@endif

	@else
		<h1>Variável produtos não foi passada como paramêtro</h1>
	@endif

	@empty($produtos)
		<h2>Variável produtos está vazia.</h2>
	@endempty

	<script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
</body>
</html>