<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Додавання початкових даних до таблиці user__city_cards
        DB::table('user__city_cards')->insert([
            [
                'name' => 'test User',
                'phone_number' => '380982803051',
                'city' => 'Example City',
                'purse' => 100.00,
                'login' => 'test_user',
                'password' => bcrypt('password123'),
                'roles' => 'admin',
            ],

        ]);
    }
}
