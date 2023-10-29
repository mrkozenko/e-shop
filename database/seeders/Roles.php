<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
           'id'=>1,
            'title'=>'user'

        ]);
        DB::table('roles')->insert([
            'id'=>2,
            'title'=>'admin'

        ]);
    }
}
