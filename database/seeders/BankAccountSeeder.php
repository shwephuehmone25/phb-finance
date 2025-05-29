<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bank_accounts')->insert([
            [
                'bank_account_name' => 'John Doe',
                'account_number' => '1234567890',
                'phone_number' => '09501234567',
                'bank_name' => 'KBZPay',
                'image' => 'bank_images/kbz.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bank_account_name' => 'Jane Smith',
                'account_number' => '0987654321',
                'phone_number' => '09609876543',
                'bank_name' => 'Wave Money',
                'image' => 'bank_images/wave.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bank_account_name' => 'Alice Johnson',
                'account_number' => null,
                'phone_number' => '09700001111',
                'bank_name' => 'PromptPay',
                'image' => 'bank_images/prompt.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
