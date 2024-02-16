<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liberers', function (Blueprint $table) {
            $table->id();
            $table->string('ecrou_prevenus');
            $table->string('nom');
            $table->string('prenom');
            $table->date('naissance');
            $table->string('district');
            $table->string('commune');
            $table->string('region');
            $table->string('lieu');
            $table->string('cartier');
            $table->string('district');
            $table->string('commune');
            $table->string('region');
            $table->string('nationalité');
            $table->string('profession');
            $table->string('pere');
            $table->string('mere');
            $table->string('marié');
            $table->integer('enfant');
            $table->string('adresse');
            $table->string('cartier1');
            $table->string('district1');
            $table->string('commune1');
            $table->string('region1');
            $table->integer('contacte');
            $table->string('categorie');
            $table->string('status');
            $table->string('sexe');
            $table->string('age');
            $table->integer('ageDate');
            $table->date('date_ecrou');
            $table->string('inculpation');
            $table->string('photo');
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
        Schema::dropIfExists('liberers');
    }
};
