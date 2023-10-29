<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('categories')->insert([
            'title' => 'Конструктори',
        ]);
        DB::table('categories')->insert([
            'title' => 'Ляльки',
        ]);
        DB::table('categories')->insert([
            'title' => 'Книжки',
        ]);
        DB::table('categories')->insert([
            'title' => 'Машинки',
        ]);

    }
}
