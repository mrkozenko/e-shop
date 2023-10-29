<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            DB::table('users')->insert([
                'name' =>'Admin admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('admin.'),
                'role_id'=>2,
                'phone'=>'380989910100'
            ]);
    }
}
