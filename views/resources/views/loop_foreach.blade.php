@extends ('layout.meulayout')
<h1> Loop FOREACH - Arrays Associativos</h1>

@section('minha_secao_produtos')

@foreach($produtos as $p)

	<p>ID: {{$p['id']}} NOME: {{$p['nome']}} </p>
@endforeach

<hr>

@foreach($produtos as $p)

	<p>
		ID: {{$p['id']}} NOME: {{$p['nome']}}
		@if ($loop->first)
			Primeiro
		@endif

		@if ($loop->last)
			Último
		@endif

		<span class=" badge badge-secondary"> 
			{{$loop->index}} / {{ $loop->count }} / {{ $loop->remaining }}
		</span>

		<span class=" badge badge-warning"> 
			{{$loop->iteration}} / {{ $loop->count }}
		</span>
	</p>
@endforeach
@endsection
