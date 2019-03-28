<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
    	echo "<h4>Lista de Categorias</h4>";
    	echo "
    	<ul>
    		<li>Informática</li>	
    		<li>Eletrônicos</li>	
    		<li>Móveis</li>	
    		<li>Alimentos</li>	
    	</ul>";

    	if (Auth::Check()) {
    		$user = Auth::user();
    		echo "Seja bem-vindo ". $user->name ."<br>Email:". $user->email;
		}
    }
}
