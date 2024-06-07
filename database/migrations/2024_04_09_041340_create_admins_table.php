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
            Schema::create('admins', function (Blueprint $table) {
                        $table->id('id_admin');
                        $table->string('nom_admin', 255);
                        $table->string('prenom_admin', 255);
                        $table->string('mot_de_passe_admin', 255);
                        $table->string('mail_admin', 255)->unique();
                        $table->string('photo')->nullable();
                        $table->timestamps();
                    });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
