<?php

use App\Categoria;

Route::get('/', function () {
	$categorias = Categoria::all();
	foreach ($categorias as $c) {
		echo "ID: $c->id | NOME: $c->nome <br>";
	}
});

Route::get('/inserir/{nome}', function ($nome) {
	$cat = new Categoria();
	$cat->nome = $nome;
	$cat->save();
	return redirect('/');
});

Route::get('/categoria/{id}', function($id){
	$cat = Categoria::findOrFail($id);
	if (isset($cat)) {
		
		echo "ID: $cat->id | NOME: $cat->nome <br>";
	}else{
		echo "<h1>NOT FOUND</h1>";
	}
});
	
Route::get('/atualizar/{id}/{nome}', function($id,$nome){
	$cat = Categoria::find($id);
	if (isset($cat)){
		$cat->nome = $nome;
		$cat->save();
		return redirect('/');
	}else{
		echo "<h1>NOT FOUND</h1>";
	}
});

Route::get('/remover/{id}', function($id){
	$cat = Categoria::find($id);
	if (isset($cat)){
		$cat->delete();
		return redirect('/');
	}else{
		echo "<h1>NOT FOUND</h1>";
	}
});

Route::get('/categoriapornome/{nome}', function($nome){
	$cat = Categoria::where('nome', $nome)->get();
	foreach ($cat as $c) {
		
		echo "ID: $c->id | NOME: $c->nome <br>";
	}
});

Route::get('/categoriamaiorque/{id}', function($id){
	$cat = Categoria::where('id', '>',$id)->get();
	foreach ($cat as $c) {
		
		echo "ID: $c->id | NOME: $c->nome <br>";
	}
});

Route::get('/todas', function () {
	$categorias = Categoria::withTrashed()->get();
	foreach ($categorias as $c) {
		echo "ID: $c->id | NOME: $c->nome";
		if ($c->trashed()) {
			echo " (Apagado)";
		}
		echo "<br>";

	}
});


Route::get('/ver/{id}', function($id){
	//$cat = Categoria::withTrashed()->find($id);
	$cat = Categoria::withTrashed()->where('id', $id)->get()->first();
	if (isset($cat)) {
		
		echo "ID: $cat->id | NOME: $cat->nome <br>";
	}else{
		echo "<h1>NOT FOUND</h1>";
	}
});

Route::get('/somenteapagadas', function () {
	$categorias = Categoria::onlyTrashed()->get();
	foreach ($categorias as $c) {
		echo "ID: $c->id | NOME: $c->nome";
		if ($c->trashed()) {
			echo " (Apagado)";
		}
		echo "<br>";

	}
});

Route::get('/restaurar/{id}', function($id){
	$cat = Categoria::onlyTrashed()->find($id);
	if (isset($cat)) {
		$cat->restore();
		echo " $cat->nome restaurado";
		echo "<p><a href=\"/todas\">Ver todas</a></p>";
	}else{
		echo "<h1>Item não existe ou não foi excluido.</h1>";
	}
});

Route::get('/excluir/{id}', function($id){
	$cat = Categoria::withTrashed()->find($id);
	if (isset($cat)) {
		$cat->forceDelete();
		echo "<p>Item Deletado </p>";
		echo "<p><a href=\"/todas\">Ver todas</a></p>";

	}else{
		echo "Item não existe.";
	}
});
