<html>
<head>
	<title> Meu Titulo - @yield('titulo') </title>
</head>
<body>

	@section('barra-lateral')
		<p>Esta seção é do template PAI</p>
	@show

	<div>
		@yield('conteudo')
	</div>
</body>
</html>
