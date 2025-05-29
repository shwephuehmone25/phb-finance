<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('bank_account_name');
            $table->string('account_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->enum('bank_name', ['KBZPay', 'Wave Money', 'CB Pay', 'AYA Pay', 'PromptPay', 'TrueMoney Wallet', 'AirPay']);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_accounts');
    }
};
