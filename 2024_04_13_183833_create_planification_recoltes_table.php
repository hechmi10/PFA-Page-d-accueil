<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanificationRecoltesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planification_recoltes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->date('date_recolte_prevue');
            $table->string('main_oeuvre');
            $table->string('equipement');
            $table->unsignedBigInteger('culture_id')->foreign('culture_id')->references('id')->on('cultures')->onDelete('cascade');
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
        Schema::dropIfExists('planification_recoltes');
    }
}
