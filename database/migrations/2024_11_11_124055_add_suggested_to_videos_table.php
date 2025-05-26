<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSuggestedToVideosTable extends Migration
{
    /**
     * Exécute les modifications de la migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->boolean('suggested')->default(false); // Ajoute la colonne 'suggested'
        });
    }

    /**
     * Annule les modifications de la migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('suggested'); // Supprime la colonne 'suggested'
        });
    }
}
