<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->unsignedBigInteger('views')->default(0);
            $table->integer('runtime');
            $table->year('year');
            $table->string('genres');
            $table->string('type', 20);
            $table->text('directors');
            $table->text('actors');
            $table->string('poster')->nullable();
            $table->string('demo');
            $table->string('video');
            $table->longText('photos');
            $table->boolean('status');
            $table->string('country', 100)->default('Bénin');
            $table->timestamps();
            $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
