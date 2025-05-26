<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Portefeuille extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portefeuilles', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID pour l'ID
            $table->uuid('user_id'); // UUID pour l'utilisateur associé

            // Clé étrangère vers la table users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Champs pour le solde et le solde retiré
            $table->decimal('solde', 10, 2)->default(0.00); // Format décimal pour les montants
            $table->decimal('solde_retire', 10, 2)->default(0.00); // Format décimal pour les montants retirés
            $table->string('status')->default('0'); // Statut (par défaut "0")

            // Ajout des timestamps (created_at et updated_at)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portefeuilles');
    }
}
