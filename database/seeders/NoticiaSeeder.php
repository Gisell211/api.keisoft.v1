<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoticiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('noticias')->insert([
            'id'  => '1',
            'nombre' => 'vacunacion',
            'descripcion' => 'vacunacion el dia martes',
            
         
        ]);
        DB::table('noticias')->insert([
           'id'  => '2',
           'nombre' => 'vacunacion',
           'descripcion' => 'vacunacion el dia jueves',
           
         
        ]);
        DB::table('noticias')->insert([
            'id'  => '3',
            'nombre' => 'vacunacion',
            'descripcion' => 'vacunacion el dia sabado',
            
         
        ]);
    }
}
