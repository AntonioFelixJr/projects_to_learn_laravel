@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Detalhe</h1>

        @can('view', $chamado)

        <h3>Titulo: {{ $chamado->titulo }}</h3>

        @else

        <h3>Você não tem permissão para acessar este chamado.</h3>

        @endcan
    </div>
</div>
@endsection
