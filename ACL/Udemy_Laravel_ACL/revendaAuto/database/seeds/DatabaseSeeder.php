<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PapelSeeder::class);
        $this->call(PermissaoSeeder::class);

        echo "Todos as Seeds foram executadas";
    }
}
