<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Test User',
            'phone_number' => '+959123456789',
            'nrc' => '12/ABC(N)123456',
            'country' => 'Myanmar',
            'city' => 'Yangon',
            'password' => Hash::make('password'),
            'is_verified' => 1,
        ]);

        User::factory()->count(5)->create();
    }
}
