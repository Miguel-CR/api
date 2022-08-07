<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $categoria = new \App\Models\Categoria();
        $categoria->nombre = 'Desayuno';
        $categoria->save();

        //1
        $categoria = new \App\Models\Categoria();
        $categoria->nombre = 'Almuerzo';
        $categoria->save();

        //1
        $categoria = new \App\Models\Categoria();
        $categoria->nombre = 'Cena';
        $categoria->save();

        //1
        $categoria = new \App\Models\Categoria();
        $categoria->nombre = 'Postre';
        $categoria->save();
    }
}
