<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        // Get some users to attach transactions to
        $users = User::all();

        if ($users->isEmpty()) {
            $this->command->info('No users found. Please seed users first.');
            return;
        }

        foreach ($users as $user) {
            // Create a few sample transactions per user
            Transaction::create([
                'user_id' => $user->id,
                'amount' => 1000,
                'transfer_bill' => 'TRX' . rand(10000, 99999),
                'payment_method' => 'KBZPay',
                'receiver_bank_account_no' => '1234567890',
                'note' => 'Sample transaction BAHT to MMK',
                'direction' => 'BAHT_TO_MMK',
                'from_amount' => 1000,
                'to_amount' => 45000,
                'exchange_rate' => 45.0,
                'status' => 'Completed',
            ]);

            Transaction::create([
                'user_id' => $user->id,
                'amount' => 45000,
                'transfer_bill' => 'TRX' . rand(10000, 99999),
                'payment_method' => 'Wave Money',
                'receiver_bank_account_no' => '0987654321',
                'note' => 'Sample transaction MMK to BAHT',
                'direction' => 'MMK_TO_BAHT',
                'from_amount' => 45000,
                'to_amount' => 1000,
                'exchange_rate' => 0.0222,
                'status' => 'Pending',
            ]);
        }
    }
}
