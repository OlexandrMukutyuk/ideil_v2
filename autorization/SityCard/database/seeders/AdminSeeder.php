<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => "admin1",
            'email' => "admin1@gmail.com",
            'phone_number' => "000000000",
            'cart_number' => "380000000000",
            'password' => Hash::make('11111111'),
            'purse' => 0,
        ]);
        $user->assignRole('admin');
    }
}
