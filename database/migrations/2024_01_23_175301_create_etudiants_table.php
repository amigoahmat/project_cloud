<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    public function up()
{
    Schema::create('etudiants', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->string('prenom');
        $table->string('groupe');
        $table->unsignedBigInteger('salle_id'); // Mettez à jour le nom de la colonne
        $table->foreign('salle_id')->references('id')->on('salles')->onDelete('cascade'); // Mettez à jour la clé étrangère
        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}
