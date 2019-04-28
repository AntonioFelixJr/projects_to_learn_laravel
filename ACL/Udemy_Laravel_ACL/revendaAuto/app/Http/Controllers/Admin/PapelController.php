<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permissao;
use App\Papel;

class PapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $this->nivelAcesso('papel-view');

      $registros = Papel::all();
      $caminhos = [
      ['url'=>'/admin','titulo'=>'Admin'],
      ['url'=>'','titulo'=>'Papéis']
      ];
      return view('admin.papel.index',compact('registros','caminhos'));
    }

    public function permissoes($id)
    {
        $papel = Papel::find($id);
        $permissao = Permissao::all();

        $caminhos = [

            ['url' => '/admin', 'titulo' => 'Admin'],
            ['url'=>route('papeis.index'),'titulo'=>'Papéis'],
            ['url' => '', 'titulo' => 'Permissões']
        
        ];

        return view('admin.papel.permissao', compact('papel','permissao','caminhos'));
    }

    public function permissoesStore(Request $request, $id)
    {
        $this->nivelAcesso('papel-edit');
        $papel = Papel::find($id);
        $dados = $request->all();
        $permissao = Permissao::find($dados['permissao_id']);
        $papel->adicionaPermissao($permissao);

        return redirect()->back();
    }

    public function permissoesDestroy($id, $permissao_id)
    {
        $this->nivelAcesso('papel-edit');

        $papel = Papel::find($id);
        $permissao = Permissao::find($permissao_id);
        $papel->removePermissao($permissao);

        return redirect()->back();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $this->nivelAcesso('papel-create');

      $caminhos = [
      ['url'=>'/admin','titulo'=>'Admin'],
      ['url'=>route('papeis.index'),'titulo'=>'Papéis'],
      ['url'=>'','titulo'=>'Adicionar']
      ];

      return view('admin.papel.adicionar',compact('caminhos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->nivelAcesso('papel-create');

      if($request['nome'] && $request['nome'] != "Admin"){
          Papel::create($request->all());

          return redirect()->route('papeis.index');
      }

      return redirect()->back();
    }

    public function edit($id)
    {
      $this->nivelAcesso('papel-edit');

      if(Papel::find($id)->nome == "Admin"){
          return redirect()->route('papeis.index');
      }

      $registro = Papel::find($id);

      $caminhos = [
      ['url'=>'/admin','titulo'=>'Admin'],
      ['url'=>route('papeis.index'),'titulo'=>'Papéis'],
      ['url'=>'','titulo'=>'Editar']
      ];

      return view('admin.papel.editar',compact('registro','caminhos'));
    }

    public function update(Request $request, $id)
    {
      $this->nivelAcesso('papel-edit');

      if(Papel::find($id)->nome == "Admin"){
          return redirect()->route('papeis.index');
      }
      if($request['nome'] && $request['nome'] != "Admin"){
        Papel::find($id)->update($request->all());
      }

      return redirect()->route('papeis.index');
    }

    public function destroy($id)
    {
      $this->nivelAcesso('papel-delete');
      if(Papel::find($id)->nome == "Admin"){
          return redirect()->route('papeis.index');
      }
      Papel::find($id)->delete();
      return redirect()->route('papeis.index');
    }

    public function nivelAcesso($funcao)
    {
      if (Gate::denies($funcao)) 
      {
        abort(403, "Acesso Negado!");
      }
    }

}