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
            // Cashier
            $table->foreignId('user_id');
            $table->string('name_cashier');
            // Ticket
            $table->foreignId('ticket_id')->on('tickets')->onDelete('cascade');
            $table->string('cd_ticket');
            $table->string('name_ticket');
            $table->decimal('price', 10, 0);
            // Transaction
            $table->decimal('amount', 10, 0);
            $table->decimal('total', 10, 0);
            $table->string('cus_name');
            $table->string('cd_transaction')->unique()->nullable();
            $table->text('description');
            $table->timestamp('transaction_date');
            $table->softDeletes();
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
