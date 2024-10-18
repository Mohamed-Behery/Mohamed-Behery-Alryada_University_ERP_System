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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('account_number');
            $table->string('location');
            $table->decimal('opening_balance', 30, 2)->default(0);
            $table->decimal('total_incoming', 30, 2)->default(0);
            $table->decimal('total_outgoing', 30, 2)->default(0);
            $table->decimal('current_balance', 30, 2)->default(0);
            $table->string('responsible_person')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
