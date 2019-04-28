@extends('layout.app')

@section('body')
		
	<div class="row">
		<div class="container col-md-8 offset-md-2">
			<div class="card border">
				<div class="card-header bg-warning text-light">
					
					<div class="h2 card-title">
						Cadastro de Clientes
					</div>
				</div>

				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>Idade</th>
							<th>Endereço</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $cat as $t)
							<tr>
								<td>{{$t->id}}</td>
								<td>{{$t->nome}}</td>
								<td>{{$t->idade}}</td>
								<td>{{$t->endereco}}</td>
								<td>{{$t->email}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection