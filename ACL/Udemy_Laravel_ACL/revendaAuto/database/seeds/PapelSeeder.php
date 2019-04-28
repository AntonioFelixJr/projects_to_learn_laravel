<?php

use App\Papel;
use Illuminate\Database\Seeder;

class PapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$papel1 = Papel::firstOrCreate([
    		'nome' => 'Admin',
    		'descricao' => 'Acesso total ao sistema.'
    	]); 

       	$papel12 = Papel::firstOrCreate([
    		'nome' => 'Gerente',
    		'descricao' => 'Gerenciamento do sistema.'
    	]);

       	$papel13 = Papel::firstOrCreate([
    		'nome' => 'Usuario',
    		'descricao' => 'Acesso ao sistema como usúario.'
    	]);
	    echo "Papeis criado com sucesso";
    }

}
