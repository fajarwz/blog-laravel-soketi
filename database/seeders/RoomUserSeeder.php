<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('room_user')->insert([
            [
                'room_id' => 1,
                'user_id' => 1,
            ],
            [
                'room_id' => 1,
                'user_id' => 2,
            ],
            [
                'room_id' => 2,
                'user_id' => 1,
            ],
            [
                'room_id' => 2,
                'user_id' => 2,
            ],
            [
                'room_id' => 2,
                'user_id' => 3,
            ],
        ]);
    }
}
