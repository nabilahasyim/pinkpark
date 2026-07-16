<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin PinkPark',
            'email' => 'admin@pinkpark.com',
            'password' => Hash::make('bile123'),
        ]);

        User::create([
            'name' => 'Operator PinkPark',
            'email' => 'operator@pinkpark.com',
            'password' => Hash::make('120805'),
        ]);
    }
}
