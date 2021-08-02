<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voiries', function (Blueprint $table) {
            $table->integer('lot')->unsigned()->primary();
            $table->string('prestataire',255)->nullable->change;
            $table->string('type',255)->nullable->change;
            $table->string('rue',255)->nullable->change;
            $table->string('commune',255)->nullable->change;
            $table->string('quartier',255)->nullable->change;
            $table->float('avancement')->nullable->change;
            $table->float('evolution')->nullable->change;
            $table->float('superficiequartier')->nullable->change;
            $table->string('activites',255)->nullable->change;
            $table->date('dateMiseAjour')->nullable->change;
            $table->string('ChantierEcole',255)->nullable->change;
            $table->integer('ouvriersAprenants',11)->nullable->change;
            $table->integer('nbfemmes',11)->nullable->change;
            $table->string('himo',50)->nullable->change;
            $table->float('drainage')->nullable->change;
            $table->float('pavage')->nullable->change;
            $table->float('beton')->nullable->change;
            $table->integer('dalot',11)->nullable->change;
            $table->string('amenagement',255)->nullable->change;
            $table->string('provisoire',255)->nullable->change;
            $table->string('definitive',255)->nullable->change;
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
        Schema::dropIfExists('voiries');
    }
}
