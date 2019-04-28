<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function index()
	{
		$caminhos = [
			['url' => '/admin', 'titulo' => 'Admin']
		];
    	return view('admin.index', compact('caminhos'));
	}
}
