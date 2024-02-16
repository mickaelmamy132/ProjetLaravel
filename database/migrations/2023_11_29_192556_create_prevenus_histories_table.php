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
        Schema::create('prevenus_histories', function (Blueprint $table) {
            $table->id();
            $table->Integer('prevenus_id');
            $table->string('situation')->nullable();
            $table->date('date_situation')->nullable();
            $table->string('status')->nullable();
            $table->date('date_status')->nullable();
            $table->string('etat')->nullable();
            $table->date('date_etat')->nullable();
            $table->string('observation')->nullable();
            $table->date('date_observation')->nullable();
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
        Schema::dropIfExists('prevenus_histories');
    }
};
