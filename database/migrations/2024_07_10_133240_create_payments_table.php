<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('PlanAbonnement')->nullable();
            $table->string('transaction_id')->nullable();
            $table->decimal('amount')->nullable();
            $table->string('status')->nullable();
            $table->string('method')->nullable();
            $table->timestamp('renouvellement_date')->nullable();
            $table->timestamp('expire_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
