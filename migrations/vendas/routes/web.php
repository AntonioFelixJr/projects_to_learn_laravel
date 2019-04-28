<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function () {
	echo "<p>Seleciona tudo da tabela categorias.</p>";
	$cats = DB::table('categorias')->get();
	foreach ($cats as $c) {
		echo "id: " . $c->id . "; ";
		echo "nome: " . $c->nome . ";<br>";
	}
	echo "<hr>";
	echo "<p>Seleciona os nomes da tabela categorias.</p>";
	$nomes = DB::table('categorias')->pluck('nome');
	foreach ($nomes as $nome) {
		echo "$nome <br>";
	}
	echo "<hr>";
	echo "<p>Seleciona tudo onde o id for igual a 3 na tabela categorias.</p>";
	$cats = DB::table('categorias')->where('id',3)->get();
	foreach ($cats as $cat) {
		echo "ID = ".$cat->id. " | ";
		echo "Nome = ".$cat->nome. "; <br>";
	}
	echo "<hr>";
	echo "<p>Seleciona um unico registro onde  o id for igual a 2 na tabela categorias.</p>";
	$cat = DB::table('categorias')->where('id',2)->first();
	echo "ID = ".$cat->id. " | ";
	echo "Nome = ".$cat->nome. "; <br>";

	echo "<hr>";
	echo "<p>Seleciona por LIKE pesquisa aproximada. Todos que tem a letra 'a'.</p>";
	$cat = DB::table('categorias')->where('nome','like','%a%')->get();
	foreach ($cat as $c) {
		echo "ID: ". $c->id ." | NOME: ". $c->nome .". <br>";
	}

	echo "<hr>";
	echo "<p>Where com OR id = 2 ou id = 4.</p>";
	$cat = DB::table('categorias')->where('id',2)->orWhere('id',4)->get();
	foreach ($cat as $c) {
		echo "ID: ". $c->id ." | NOME: ". $c->nome .". <br>";
	}

	echo "<hr>";
	echo "<p>WhereBetween intervalo de id = 2 a id = 4.</p>";
	$cat = DB::table('categorias')->whereBetween('id',[2,4])->get();
	foreach ($cat as $c) {
		echo "ID: ". $c->id ." | NOME: ". $c->nome .". <br>";
	}

	echo "<hr>";
	echo "<p>WhereNotBetween fora do intervalo de id = 2 a id = 4.</p>";
	$cat = DB::table('categorias')->whereNotBetween('id',[2,4])->get();
	foreach ($cat as $c) {
		echo "ID: ". $c->id ." | NOME: ". $c->nome .". <br>";
	}


	echo "<hr>";
	echo "<p>WhereIn conjuto de id = 2, id = 4 e id = 1.</p>";
	$cat = DB::table('categorias')->whereIn('id',[2,4,1])->get();
	foreach ($cat as $c) {
		echo "ID: ". $c->id ." | NOME: ". $c->nome .". <br>";
	}

	echo "<hr>";
	echo "<p>WhereNotIn fora do conjuto de id = 2, id = 4 e id = 1.</p>";
	$cat = DB::table('categorias')->whereNotIn('id',[2,4,1])->get();
	foreach ($cat as $c) {
		echo "ID: ". $c->id ." | NOME: ". $c->nome .". <br>";
	}

	echo "<hr>";
	echo "<p>Where com AND nome = livros and id = 3.</p>";
	$cat = DB::table('categorias')->where([
		['id',3],
		['nome','Livros']
	])->get();
	foreach ($cat as $c) {
		echo "ID: ". $c->id ." | NOME: ". $c->nome .". <br>";
	}

	echo "<hr>";
	echo "<p>Order By Nome asc.</p>";
	$cats = DB::table('categorias')->orderBy('nome')->get();
	foreach ($cats as $cat) {
		echo "ID = ".$cat->id. " | ";
		echo "Nome = ".$cat->nome. "; <br>";

	}

	echo "<hr>";
	echo "<p>Order By Nome DESC.</p>";
	$cats = DB::table('categorias')->orderBy('nome','desc')->get();
	foreach ($cats as $cat) {
		echo "ID = ".$cat->id. " | ";
		echo "Nome = ".$cat->nome. "; <br>";

	}

	echo "<hr>";
	echo "<pre>";
		var_dump($cats);die();
	echo "</pre>";	
});

Route::get('/novascategorias', function(){
	/*
	DB::table('categorias')->insert([
		['nome'=>'Cozinha'],
		['nome'=>'Móveis'],
		['nome'=>'Pet'],
		['nome'=>'Carro']
	]);
	*/
	$id = DB::table('categorias')->insertGetId(
		['nome'=> 'Robô']
	);
	echo "ID $id Inserido com sucesso;";
});
Route::get('/atualizandocategorias', function(){
 	$cat = DB::table('categorias')->where('id',9)->first();
 	echo "<h5>Antes do Update</h5>";
 	echo "<h6>ID: $cat->id | NOME: $cat->nome </h6>";

 	$cat = DB::table('categorias')->where('id',9)
 		->update(['nome' => 'Android']);

 	$cat = DB::table('categorias')->where('id',9)->first();
 	echo "<h5>Depois do Update</h5>";
 	echo "<h6>ID: $cat->id | NOME: $cat->nome </h6>";

 });

Route::get('/removendocategorias', function(){

 	$cat = DB::table('categorias')->get();
 	echo "<h5>Antes do Delete</h5>";
 	foreach ($cat as $c) {
 
	 	echo "<h4>ID: $c->id | NOME: $c->nome</h4>";
  	}


 	DB::table('categorias')->where('id',8 )->delete();

 	$cat = DB::table('categorias')->get();
 	echo "<h5>Depois do Delete</h5>";
 	foreach ($cat as $c) {
 
	 	echo "<h4>ID: $c->id | NOME: $c->nome</h4>";
  	}


});
