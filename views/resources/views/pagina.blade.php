<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap </title>
	<link href="{{ asset('css/app.css')}}" rel="stylesheet" >
</head>
<body>
	@alerta(['tipo' => 'secondary', 'titulo' => 'TITULO' ])
		<strong>Erro: </strong> Sua mensagem de erro.
		@slot('nomeslot')
			<I>conteudo</I>
		@endslot
	@endalerta

	@alerta(['tipo'=> 'dark', 'titulo'=>'ERRO FATAL'])
		<strong>Erro: </strong> Sua mensagem de erro.
	@endalerta
	
	@alerta(['tipo'=> 'sucess', 'titulo'=>'ERRO FATAL'])
		<strong>Erro: </strong> Sua mensagem de erro.
	@endalerta

	@alerta(['tipo'=> 'danger', 'titulo'=>'ERRO FATAL'])
		<strong>Erro: </strong> Sua mensagem de erro.
	@endalerta

	@alerta(['tipo'=> 'warning', 'titulo'=>'ERRO FATAL'])
		<strong>Erro: </strong> Sua mensagem de erro.
	@endalerta

	<script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
</body>
</html>