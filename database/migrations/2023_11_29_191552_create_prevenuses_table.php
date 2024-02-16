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
        Schema::create('prevenuses', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->string('type');
            $table->string('nom');
            $table->string('prenom')->nullable();
            $table->string('naissance');
            $table->string('district');
            $table->string('commune');
            $table->string('region');
            $table->string('lieu')->nullable();
            $table->string('cartier');
            $table->string('district');
            $table->string('commune');
            $table->string('region');
	        $table->string('cin')->nullable();
            $table->date('date_delivrance')->nullable();
            $table->string('nationalité');
            $table->string('profession');
            $table->string('pere')->nullable();
            $table->string('mere')->nullable();
            $table->string('marié')->nullable();
            $table->integer('enfant')->nullable();
            $table->string('adresse')->nullable();
            $table->string('cartier1');
            $table->string('district1');
            $table->string('commune1');
            $table->string('region1');
            $table->integer('contacte')->nullable();
            $table->string('categorie');
            $table->string('status')->nullable();
            $table->date('date_status')->nullable();
            $table->string('etat')->nullable();
            $table->date('date_etat')->nullable();
            $table->string('situation');
            $table->date('date_situation')->nullable();
            $table->string('sexe');
            $table->string('age');
            $table->integer('ageDate');
            $table->date('date_ecrou');
            $table->string('inculpation');
            $table->string('classification');
            $table->string('photo')->nullable();
            $table->string('peine')->nullable();
            $table->string('unite_peine')->nullable();
            $table->string('mandataire');
            $table->string('observation')->nullable();
            $table->date('date_fin_peine')->nullable();
            $table->integer('remise_peine')->nullable();
            $table->string('unite_remise_peine')->nullable();
            $table->date('date_fin_remise_peine')->nullable();
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
        Schema::dropIfExists('prevenuses');
    }
};
