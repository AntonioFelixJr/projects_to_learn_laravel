<?php

use App\Permissao;
use Illuminate\Database\Seeder;

class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */  
    public function run()
    {
        $usuario1 = Permissao::firstOrCreate([
    		'nome' => 'usuario-view',
    		'descricao' => 'Acesso a lista de Usuarios.'
    	]); 

        $usuario2 = Permissao::firstOrCreate([
    		'nome' => 'usuario-create',
    		'descricao' => 'Adicionar Usuarios.'
    	]); 

        $usuario3 = Permissao::firstOrCreate([
    		'nome' => 'usuario-edit',
    		'descricao' => 'Editar Usuarios.'
    	]); 
    	
        $usuario4 = Permissao::firstOrCreate([
    		'nome' => 'usuario-delete',
    		'descricao' => 'Deletar Usuarios.'
    	]);

        $papeis1 = Permissao::firstOrCreate([
    		'nome' => 'papel-view',
    		'descricao' => 'Listar Papéis.'
    	]); 
    
        $papeis2 = Permissao::firstOrCreate([
    		'nome' => 'papel-create',
    		'descricao' => 'Adicionar Papéis.'
    	]);   

        $papeis3 = Permissao::firstOrCreate([
    		'nome' => 'papel-edit',
    		'descricao' => 'Editar Papéis.'
    	]);

        $papeis4 = Permissao::firstOrCreate([
    		'nome' => 'papel-delete',
    		'descricao' => 'Deletar Papéis.'
    	]); 

        $favoritos1 = Permissao::firstOrCreate([
    		'nome' => 'favoritos-view',
    		'descricao' => 'Acessi aos favoritos.'
    	]); 

        $perfil1 = Permissao::firstOrCreate([
    		'nome' => 'perfil-view',
    		'descricao' => 'Acesso ao perfil.'
    	]);

        $chamados1 = Permissao::firstOrCreate([
    		'nome' => 'chamados-view',
    		'descricao' => 'Acesso aos chamados.'
    	]); 

        $chamados2 = Permissao::firstOrCreate([
    		'nome' => 'chamados-create',
    		'descricao' => 'Adicionar chamados.'
    	]);

        $chamados3 = Permissao::firstOrCreate([
    		'nome' => 'chamados-edit',
    		'descricao' => 'Editar chamados.'
    	]); 

        $chamados4 = Permissao::firstOrCreate([
    		'nome' => 'chamados-delete',
    		'descricao' => 'Deletar chamados.'
    	]); 
    
    }

}
