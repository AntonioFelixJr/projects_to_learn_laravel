<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert(
            [ 
                'nome' => 'Camiseta Polo', 
                'preco' => 99.99, 
                'quantidade' => 500, 
                'categoria_id' => 1, 
            ]
        );

        DB::table('produtos')->insert(
            [ 
                'nome' => 'Boné', 
                'preco' => 25.99, 
                'quantidade' => 1000, 
                'categoria_id' => 1, 
            ]
        );


        DB::table('produtos')->insert(
            [ 
                'nome' => 'Mouse', 
                'preco' => 45.99, 
                'quantidade' => 7600, 
                'categoria_id' => 4, 
            ]
        );

        DB::table('produtos')->insert(
            [ 
                'nome' => 'Teclado', 
                'preco' => 159.99, 
                'quantidade' => 600, 
                'categoria_id' => 4, 
            ]
        );

        DB::table('produtos')->insert(
            [ 
                'nome' => 'Microondas', 
                'preco' => 700.00, 
                'quantidade' => 100, 
                'categoria_id' => 2, 
            ]
        );

        DB::table('produtos')->insert(
            [ 
                'nome' => 'Cama Box', 
                'preco' => 1000.00, 
                'quantidade' => 40, 
                'categoria_id' => 3, 
            ]
        );

        DB::table('produtos')->insert(
            [ 
                'nome' => 'Kiwi', 
                'preco' => 0.99, 
                'quantidade' => 100000, 
                'categoria_id' => 5, 
            ]
        );
        
    }
}
