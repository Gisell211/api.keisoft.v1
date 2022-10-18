<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'  => '1',
            'name' => 'Gisell',
            'email' => 'gisell@gmail.com',
            'password' => bcrypt('12345678'),
         
        ]);
        DB::table('users')->insert([
            'id'  => '2',
            'name' => 'andres',
            'email' => 'andres@gmail.com',
            'password' => bcrypt('12345678'),
         
        ]);
        DB::table('users')->insert([
            'id'  => '3',
            'name' => 'juanr',
            'email' => 'juan@gmail.com',
            'password' => bcrypt('12345678'),
         
        ]);
    }
}
