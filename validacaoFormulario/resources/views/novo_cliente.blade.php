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
				<div class="card-body">
					<form action="{{ route('store.cliente') }}" method="POST">
						@csrf
						<div class="form-group">
							<label for="nome">Nome do Cliente: </label>
							<input class="form-control {{ $errors->has('nome') ? 'is-invalid' : ''}}" placeholder="Nome do Cliente" type="text" name="nome" id="nome">
@if($errors->has('nome'))
							<div class="invalid-feedback">
								{{ $errors->first('nome') }}							
							</div>
@endif
						</div>
						<div class="form-group">
							<label for="idade">Idade do Cliente: </label>
							<input class="form-control {{ $errors->has('idade') ? 'is-invalid' : '' }}" placeholder="Idade do Cliente" type="number" name="idade" id="idade">
@if( $errors->has('idade'))
							<div class="invalid-feedback">
								{{ $errors->first('idade') }}
							</div>
@endif							
						</div>
						<div class="form-group">
							<label for="endereco">Endereço do Cliente: </label>
							<input class="form-control {{ $errors->has('endereco')?'is-invalid':''}}" placeholder="Endereço do Cliente" type="text" name="endereco" id="endereco">

@if($errors->has('endereco'))
							<div class="invalid-feedback">
								{{ $errors->first('endereco') }}
							</div>
@endif							
						</div>
						<div class="form-group">
							<label for="email">Email do Cliente: </label>
							<input class="form-control {{ $errors->has('email')?'is-invalid':'' }}" placeholder="Email do Cliente" type="text" name="email" id="email">
@if($errors->has('email'))
							<div class="invalid-feedback">
								{{ $errors->first('email') }}
							</div>
@endif							
						</div>
						<button type="submit" class="btn btn-primary btn-sm">Salvar</button>
						<button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
							
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection