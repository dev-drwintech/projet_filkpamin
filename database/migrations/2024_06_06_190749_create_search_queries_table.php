<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchQueriesTable extends Migration
{
    public function up()
    {
        Schema::create('search_queries', function (Blueprint $table) {
            $table->id(); 
            $table->string('query');
            $table->foreignUuid('video_id')->nullable()->references('id')->on('videos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('search_queries');
    }
}

