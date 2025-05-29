<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $data = [
            [
                'from_currency' => 'USD',
                'to_currency' => 'MMK',
                'rate' => 2100.500000,
                'effective_date' => '2025-05-15',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'from_currency' => 'EUR',
                'to_currency' => 'USD',
                'rate' => 1.100000,
                'effective_date' => '2025-05-15',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'from_currency' => 'THB',
                'to_currency' => 'MMK',
                'rate' => 64.329124,
                'effective_date' => '2025-05-15',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'from_currency' => 'MMK',
                'to_currency' => 'THB',
                'rate' => 0.015545059,
                'effective_date' => '2025-05-15',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('currency_rates')->insert($data);
    }
}
