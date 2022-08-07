<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class productoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           //1
        $Producto1 = \App\Models\Producto::create([
            'nombre' => 'Avena',
            'detalle' => 'Avena, Quiwi, fresay arandanos.',
            'precio' => '3000',
            'promocion' => true,
            'categoria_id' => 1,
            'imageName' => '1.jpg',
            'imagePath' =>  'assets/img-producto/1.jpg',
        ]);
        $Producto1->save();



           //2
        $Producto2 = \App\Models\Producto::create([
            'nombre' => 'Casado',
            'detalle' => 'Arroz, frijoles, ensalada y carne o pollo.',
            'precio' => '4000',
            'promocion' => true,
            'categoria_id' => 2,
            'imageName' => '2.jpg',
            'imagePath' =>  'assets/img-producto/2.jpg',
        ]);
        $Producto2->save();

           //3
        $Producto3 = \App\Models\Producto::create([
            'nombre' => 'Cena de pescado',
            'detalle' => 'Pescado con hongos a la mantequilla.',
            'precio' => '6000',
            'promocion' => true,
            'categoria_id' => 3,
            'imageName' => '3.jpg',
            'imagePath' =>  'assets/img-producto/3.jpg',
        ]);
        $Producto3->save();

           //4
        $Producto4 = \App\Models\Producto::create([
            'nombre' => 'Pie de maracuya',
            'detalle' => 'Postre de la casa, Pie de maracuya',
            'precio' => '2000',
            'promocion' => true,
            'categoria_id' => 4,
            'imageName' => '4.jpg',
            'imagePath' =>  'assets/img-producto/4.jpg',
        ]);
        $Producto4->save();
    }
}
