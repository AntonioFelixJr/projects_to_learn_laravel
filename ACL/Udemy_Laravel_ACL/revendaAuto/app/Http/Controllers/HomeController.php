<?php

namespace App\Http\Controllers;

use Auth;
use App\Chamado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = Auth::user();

        //$chamados = Chamado::where('user_id','=', $user->id)->get();
        $chamados = Chamado::all();
        return view('home', compact('chamados'));
    }

    public function detalhe($id){


        $chamado = Chamado::find($id);
        /*
        if (Gate::denies('ver-chamado', $chamado)) {
            abort(403,"Acesso Negado.");
        }

        if (Gate::allows('ver-chamado', $chamado)) {

            return view('detalhe',compact('chamado'));
            
        }
        abort(403,"Acesso Negado.");
        */
        return view('detalhe',compact('chamado'));
        //$this->Authorize('ver-chamado',$chamado);

    }
}
