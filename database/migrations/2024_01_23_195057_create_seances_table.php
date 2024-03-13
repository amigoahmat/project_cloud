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
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->string('jour_semaine');
            $table->time('heure');
            $table->string('groupe');
            $table->unsignedBigInteger('salle_id');
            $table->unsignedBigInteger('ens_id');
            $table->foreign('salle_id')->references('id')->on('salles')->onDelete('cascade');
            $table->foreign('ens_id')->references('id')->on('enseignants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seances');
    }
};
