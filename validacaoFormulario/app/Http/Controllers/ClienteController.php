<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Cliente::all();
        return view('cliente', compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novo_cliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $regras = [
            'nome' => 'required|min:3|max:30|unique:clientes',
            'idade' => 'required',
            'endereco' => 'required|min:5',
            'email' => 'required|min:5|email|unique:clientes'
        ];

        $mensagens = [
            'required' => 'Campo :attribute é obrigatório.',
            'min' => 'Campo :attribute deve conter no mínimo :min caracteres.',
            'max' => 'Campo :attribute deve conter no máximo :max caracteres.',
            'email' => 'Endereço de email inválido.',
            'email.unique' => 'Endereço de Email já cadastrado.'
        ];

        $request->validate($regras , $mensagens);

        /*
        $request->validate([
            'nome' => 'required|min:3|max:30|unique:clientes',
            'idade' => 'required',
            'endereco' => 'required|min:5',
            'email' => 'required|min:5|email'
        ]);
        */
        $cat = new Cliente();

        $cat->nome = $request->input('nome');
        $cat->idade = $request->input('idade');
        $cat->endereco = $request->input('endereco');
        $cat->email = $request->input('email');
        $cat->save();

        return redirect(route('index.cliente'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
