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
        Schema::create('tracking_paiements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('track_id')->unique();
            $table->foreignUuid('user_id')->on("users")->onDelete('cascade');
            $table->string('status')->default('pending'); // pending, success, failed
            $table->string('payment_method')->nullable(); // ex: moneroo, stripe
            $table->integer('amount')->nullable(); // en centimes ou unité XOF
            $table->string('plan')->nullable(); // Basique, Standard, etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracking_paiements');
    }
};
