<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('rooms')->insert([
            [
                'name' => null,
            ],
            [
                'name' => 'Jajan kuy!',
            ],
        ]);
    }
}
