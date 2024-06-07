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
        Schema::create('votes', function (Blueprint $table) {
                    $table->id('id_vote');
                    $table->date('date_vote')->nullable();
                    $table->timestamp('heure_vote')->useCurrent();
                    $table->unsignedBigInteger('id_candidat')->nullable();
                    $table->foreign('id_candidat')->references('id_candidat')->on('candidats')->onDelete('cascade');
                    $table->unsignedBigInteger('id_user');
                    $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade'); // Référence la clé primaire 'id' de la table 'users'
                    $table->unsignedBigInteger('id_poste')->nullable();
                    $table->foreign('id_poste')->references('id_poste')->on('postes')->onDelete('cascade');
                    $table->timestamps();
                });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
