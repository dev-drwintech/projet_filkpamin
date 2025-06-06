<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->uuid('id')->primary();
         #   $table->unsignedBigInteger('user_id');
          #  $table->unsignedBigInteger('video_id');
            $table->text('comment_text');
            $table->string('parent_id')->nullable();
            $table->string('replied_to_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
          #  $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           # $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
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
        Schema::dropIfExists('comments');
    }
}
