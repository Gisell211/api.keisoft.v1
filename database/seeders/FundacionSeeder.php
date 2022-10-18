<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FundacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fundacions')->insert([
            'id'  => '1',
            'nombre' => 'fundacion 1',
            'direccion' => 'popayan',
            'telefono' =>'38443',
            'noticias_id' =>'1',
         
        ]);
        DB::table('fundacions')->insert([
           'id'  => '2',
            'nombre' => 'fundacion 2',
            'direccion' => 'cali',
            'telefono' =>'38444653',
            'noticias_id' =>'2',
         
        ]);
        DB::table('fundacions')->insert([
            'id'  => '3',
            'nombre' => 'fundacion 3',
            'direccion' => 'medellin',
            'telefono' =>'384476653',
            'noticias_id' =>'2',
         
        ]);
    }
}
