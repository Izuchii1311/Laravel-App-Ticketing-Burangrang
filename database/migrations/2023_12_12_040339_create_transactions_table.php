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
            $table->foreignId('user_id');
            $table->string('name_cashier');
            $table->foreignId('ticket_id');
            $table->string('cd_ticket');
            $table->string('name_ticket');
            $table->decimal('price', 10, 0);
            $table->decimal('amount', 10, 0);
            $table->decimal('total', 10, 0);
            $table->string('cus_name');
            $table->string('cd_transaction')->unique();
            $table->text('description');
            $table->time('transaction_date');
            $table->timestamps();
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
