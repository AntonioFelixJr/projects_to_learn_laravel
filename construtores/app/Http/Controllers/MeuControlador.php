<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuControlador extends Controller
{
    public function getNome()
    {
    	return "Nome";
    }

    public function getIdade()
    {
    	return "Idade";
    }

    public function multiplicar($n1, $n2)
    {
    	return $n1 * $n2;
    }

    public function getNomeById($id)
    {
    	$v = ['Antonio', 'Maria', 'Michele', 'Filipe'];

    	if ($id >= 0 && $id < count($v)) 
    		return $v[$id];
    	else
    		return "Não enontrado";
    }
}	
