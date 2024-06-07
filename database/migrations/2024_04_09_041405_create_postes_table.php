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
        Schema::create('postes', function (Blueprint $table) {
                            $table->id('id_poste');
                            $table->datetime('date_debut')->nullable();
                            $table->datetime('date_fin')->nullable();
                            $table->string('type_poste')->nullable();
                            $table->integer('max_vote')->default(1);
                            $table->integer('priority')->default(0);
                            $table->timestamps();
                        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postes');
    }
};
