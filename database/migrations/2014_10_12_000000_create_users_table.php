<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->boolean('is_blocked')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            // Mise a jour 
            $table->string('google2fa_secret')->nullable(); // Clé secrète pour 2FA
            $table->boolean('auth')->default(false); // Indique si 2FA est activé
            $table->string('password')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('avatar')->nullable();
            $table->text('fcm_token')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
            // Récupérer l'ID du rôle par défaut
            $defaultRoleId = DB::table('roles')->where('nom', 'utilisateur')->value('id');
            $table->foreignUuid('role_id')->default($defaultRoleId)->constrained('roles');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
