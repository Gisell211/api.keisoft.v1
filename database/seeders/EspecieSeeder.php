<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('especies')->insert([
            'id'  => '1',
            'nombre' => 'nico',
            'edad' => '2 años',
            'raza' => 'pitbull',
            'genero' =>'perro',
         
        ]);
        DB::table('especies')->insert([
            'id'  => '2',
            'nombre' => 'pepe',
            'edad' => '1 años',
            'raza' => 'pitbull',
            'genero' =>'perro',
         
        ]);
        DB::table('especies')->insert([
            'id'  => '3',
            'nombre' => 'mishi',
            'edad' => '3 años',
            'raza' => 'pitbull',
            'genero' =>'perro',
         
        ]);
    }
}
