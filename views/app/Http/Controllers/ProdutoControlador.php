<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class produtoControlador extends Controller
{
    public function listar()
    {
    	$produtos = [
    		"Notebook Asus i7 16GB",
    		"Mouse e Teclado Microsoft USB",
    		"Impressora Multifuncional HP",
    		"SSD 512 GB Kingston"
    	];
    	return view('produto', compact('produtos'));
    }

    public function secaoprodutos($palavra)
    {
    	return view('secao_produtos',compact('palavra'));
    }
    public function mostrar_opcoes()
    {
    	return view('mostrar_opcoes');
    }    

    public function opcoes($opcao)
    {
    	return view('opcoes', compact('opcao'));
    }

    public function loopFor($n)
    {
    	return view('loop_for',compact('n'));
    }

    public function loopForeach()
    {
    	$produtos = [
    		["id"=> 1, "nome"=>"computador"],
    		["id"=> 2, "nome"=>"teclado"],
    		["id"=> 3, "nome"=>"mouse"],
    		["id"=> 4, "nome"=>"headset"],
    		["id"=> 5, "nome"=>"webcam"]
    	];
    	return view('loop_foreach',compact('produtos'));
    }
}
