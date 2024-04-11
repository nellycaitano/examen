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
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('codeProjet')->unique();
            $table->string('nomProjet');
            $table->date('dateLancement');
            $table->integer('duree');
            $table->unsignedBigInteger('localite_id');
            $table->foreign('localite_id')->references('codLocalite')->on('localites');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
