<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelleZttsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcelle_ztts', function (Blueprint $table) {
            //$table->id();
            $table->integer('num')->unsigned()->primary();
            $table->string('bailleur');
            $table->string('type');
            $table->string('nom');
            $table->string('etat');
            $table->string('etat_pr');
            $table->integer('surface');
            $table->string('commune');
            $table->string('quartier');
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
        Schema::dropIfExists('parcelle_ztts');
    }
}
