<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->uuid('id')->primary();
           # $table->unsignedBigInteger('user_id');
           # $table->unsignedBigInteger('video_id');
            $table->string('title', 50);
            $table->text('body');
            $table->decimal('rating', 3, 1);
            $table->timestamps();
            $table->softDeletes();

            // $table->unique(['user_id', 'video_id']);

           # $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            #$table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');

            $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignUuid('video_id')->references('id')->on('videos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
