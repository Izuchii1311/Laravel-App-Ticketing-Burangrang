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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('cd_ticket')->unique();
            $table->string('name_ticket');
            $table->decimal('price', 10, 0);
            $table->time('start_time')->default('06:00:00');
            $table->time('end_time')->default('20:00:00');
            $table->string('status')->default('open');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
