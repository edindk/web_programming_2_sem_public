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
        {
            DB::table('users')->insert([
                'name' => 'Edin',
                'email' => 'edindkk@gmail.com',
                'password' => bcrypt('password22'),
                'role' => 'Admin'
            ]);
        }
        {
            DB::table('users')->insert([
                'name' => 'test',
                'email' => 'test@test.dk',
                'password' => bcrypt('password22'),
                'role' => 'Admin'
            ]);
        }
        {
            DB::table('users')->insert([
                'name' => 'John',
                'email' => 'John@gmail.com',
                'password' => bcrypt('password23'),
                'role' => 'Subscriber'
            ]);
        }
    }
}
