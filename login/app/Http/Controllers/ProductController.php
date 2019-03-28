<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
	}
    public function index()
    {
    	echo "<h4>Lista de Produtos</h4>";
    	echo "
    	<ul>
    		<li>Monitor</li>	
    		<li>Computador</li>	
    		<li>Notbook</li>	
    		<li>Fones de Ouvido</li>	
    		<li>Teclado</li>	
    		<li>Mouse</li>	
    	</ul>";
    }
}
