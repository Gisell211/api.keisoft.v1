<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdopcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('adopcions')->insert([
            'id'  => '1',
            'user_id' => '2',
            'especie_id' => '1',
            'fundacion_id' =>'1',
         
        ]);
        DB::table('adopcions')->insert([
            'id'  => '2',
            'user_id' => '1',
            'especie_id' => '1',
            'fundacion_id' =>'1',
         
        ]);
        DB::table('adopcions')->insert([
            'id'  => '3',
            'user_id' => '3',
            'especie_id' => '2',
            'fundacion_id' =>'1',
         
        ]);
    }
}
