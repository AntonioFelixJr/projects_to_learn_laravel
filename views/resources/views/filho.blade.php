@extends('layout.app')

@section('titulo', 'Filho')

@section('barra-lateral')
	<p>Essa é a parte é do FILHO</p>
	@parent	
@endsection

@section('conteudo')
	<p>Este é o conteúdo do filho.</p>
@endsection
