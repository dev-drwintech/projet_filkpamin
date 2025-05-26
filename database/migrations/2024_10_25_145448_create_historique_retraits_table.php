<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriqueRetraitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historique_retraits', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID pour l'ID du retrait
            $table->uuid('portefeuille_id'); // Référence au portefeuille
            $table->uuid('user_id'); // Référence à l'utilisateur qui retire
            $table->uuid('parametre_retraits_id');
            $table->decimal('montant', 10, 2); // Montant retiré
            $table->string('status')->default('0'); // Statut du retrait (en attente, approuvé, etc.)
            $table->timestamps(); // Créé les champs created_at et updated_at

            // Clés étrangères
            $table->foreign('parametre_retraits_id')->references('id')->on('parametre_retraits')->onDelete('cascade');
            $table->foreign('portefeuille_id')->references('id')->on('portefeuilles')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historique_retraits');
    }
}
