<?php

use App\Produto;
use App\Categoria;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function(){
    $categorias = Categoria::all();
    
    foreach($categorias as  $c){
        echo "<h4>". $c->id . " - " . $c->nome . "</h4>";
    }

});

Route::get('/produtos', function(){
    $produtos = Produto::all();
    
    echo "<table>";
    echo "<thead>";

    echo "<tr>";

    echo "<td>";
    echo "#";
    echo "</td>";

    echo "<td>";
    echo "Nome";
    echo "</td>";
    
    echo "<td>";
    echo "Preço";
    echo "</td>";

    
    echo "<td>";
    echo "Quantidade";
    echo "</td>";

    
    echo "<td>";
    echo "Categoria";
    echo "</td>";

    echo "</tr>";

    echo "</thead>";
    echo "<tbody>";

    foreach($produtos as  $p){
        echo "<tr>";
        echo "<td>". $p->id . "</td>";
        echo "<td>". $p->nome . "</td>";
        echo "<td>". $p->preco . "</td>";
        echo "<td>". $p->quantidade . "</td>";
        echo "<td>". $p->categoria->nome . "</td>";
        echo "</tr>";

    }
    echo "</tbody>";
    echo "</table>";
});

Route::get('/categoriasprodutos', function(){
    $categorias = Categoria::all();
    
    foreach($categorias as  $c){
        echo "<h4>". $c->id . " - " . $c->nome . "</h4>";
        $produtos = $c->produtos;

        if ( count($produtos) > 0 ) {
            echo "<ul>";

            foreach ($produtos as $p ) {
                echo "<li>";
                echo $p->nome;
                echo "</li>";
            }
            echo "</ul>";
        }
        
    }

});

Route::get('/categoriasprodutos/json', function(){
    $cat = Categoria::with('produtos')->get();
    return $cat->toJson();
});

Route::get('/adicionandoproduto', function(){
    $cat = Categoria::find(2);
    $prod = new Produto();
    $prod->nome = 'Ps4';
    $prod->preco =  1.499 ;
    $prod->quantidade =  12 ;
    $prod->categoria()->associate($cat);
    $prod->save();
    return $prod->toJson();
});

Route::get('/removerprodutocategoria', function(){
    $prod = Produto::find(5);

    $prod->categoria()->dissociate();
    $prod->save();
    return $prod->toJson();
});


Route::get('/adicionandoproduto/{cat}', function($catid){
    $cat = Categoria::with('produtos')->find($catid);

    $prod = new Produto();
    $prod->nome = 'Ps5';
    $prod->preco =  4.499 ;
    $prod->quantidade =  22 ;
    $cat->produtos()->save($prod);
    $cat->load('produtos');
    return $cat->toJson();
});
