<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function(){
	return view('hello');
});

//Route::view('/hello','hello');
Route::view('/hellovisitante','hello_nome',['nome' => 'Antônio','sobrenome' => 'Felix']);

Route::get('/hellonome/{nome}/{sobrenome}', function($nome,$sn){
	return view('hello_nome',['nome'=> $nome, 'sobrenome' => $sn]);
});

Route::get('/nome/{nome}/{sobrenome}', function($nome, $sobrenome){

	return "<h1>Olá, $nome $sobrenome</h1>";
});

Route::get('/seunomecomregra/{nome}/{n}', function($nome, $n){

	for ($i=1; $i <= $n ; $i++) { 
		echo "<h1>Olá, $nome $i º</h1>";
	}

	
})->where('n','[0-9]+')->where('nome', '[A-Za-z]+');


Route::get('/seunomesemregra/{nome?}', function($nome = null){

	if (isset($nome)) {

		echo "<h1>Olá, $nome</h1>";

	}else{

		echo "<h1>Nome não encontrado.</h1>";
	}

	
});

Route::prefix('app')->group(function(){

	Route::get('/', function(){
		return 'Página APP';
	});

	Route::get('profile', function(){
		return 'Página profile';
	});

	Route::get('about', function(){
		return 'Página About';
	});

});

Route::redirect('/ola','hello', 301);

Route::get('/rest/hello', function(){     
	return 'Hello (GET)'; 
});

Route::post('/rest/hello', function(){     
	return 'Hello (POST)'; 
});

Route::put('/rest/hello', function(){     
	return 'Hello (PUT)'; 
});

Route::delete('/rest/hello', function(){     
	return 'Hello (DELETE)'; 
});

Route::patch('/rest/hello', function(){     
	return 'Hello (PATCH)'; 
});

Route::options('/rest/hello', function(){     
	return 'Hello (OPTIONS)'; 
});

Route::post('/rest/imprimir', function(Request $req){
	$nome = $req->input('nome');
	$idade = $req->input('idade');

	return "Hello $nome , de $idade anos(POST)"; 
});

Route::match(['get','post'],'/rest/hello2', function(){
	return "Hello2";
});

Route::any('/rest/hello3', function(){
	return "Hello 3";
});

Route::get('/produtos', function(){
	echo "<h1>Produtos:</h1>";
	echo "<ol>";
	echo "<li>Memória RAM</li>";
	echo "<li>Hard Disk</li>";
	echo "<li>Monitor</li>";
	echo "</ol>";
})->name('meusprodutos');

Route::get('/meusprodutos', function(){
	$url =  route('meusprodutos') ;
	echo "<a href=$url>Lista de Produtos</a>";
});

Route::get('/redirecionarprodutos', function(){
	return redirect()->route('meusprodutos');
});





