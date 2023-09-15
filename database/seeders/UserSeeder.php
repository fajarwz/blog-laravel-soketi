<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('users')->insert([
            [
                'name' => 'Fajar',
                'email' => 'fajar@test.com',
                'password' => bcrypt('fajarfajar'),
            ],
            [
                'name' => 'Dadang',
                'email' => 'dadang@test.com',
                'password' => bcrypt('dadangdadang'),
            ],
            [
                'name' => 'Roni',
                'email' => 'roni@test.com',
                'password' => bcrypt('ronironi'),
            ],
        ]);
    }
}
