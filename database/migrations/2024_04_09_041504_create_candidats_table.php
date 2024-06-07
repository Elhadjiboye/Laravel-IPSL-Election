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
        Schema::create('candidats', function (Blueprint $table) {
                            $table->id('id_candidat');
                            $table->string('nom_candidat');
                            $table->string('prenom_candidat');
                            $table->string('mail_candidat')->nullable();
                            $table->longtext('programme_detude')->nullable();
                            $table->integer('nombre_de_votant')->nullable();
                            $table->unsignedBigInteger('id_poste')->nullable();
                            $table->string('photo')->nullable();
                            $table->timestamps();

                            // Clé étrangère vers la table `election`
                            $table->foreign('id_poste')->references('id_poste')->on('postes')->onDelete('cascade');
                        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats');
    }
};
