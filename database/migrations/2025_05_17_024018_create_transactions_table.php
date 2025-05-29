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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->decimal('amount', 15, 2);
            $table->string('transfer_bill')->nullable();
            $table->enum('payment_method', ['KBZPay', 'Wave Money', 'CB Pay', 'AYA Pay', 'PromptPay', 'TrueMoney Wallet', 'AirPay']);
            $table->string('receiver_bank_account_no');
            $table->text('note')->nullable();
            $table->enum('direction', ['BAHT_TO_MMK', 'MMK_TO_BAHT']);
            $table->decimal('from_amount', 15, 2);
            $table->decimal('to_amount', 15, 2);
            $table->decimal('exchange_rate', 10, 4);
            $table->enum('status', ['Pending', 'Completed', 'Failed'])->default('Pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
