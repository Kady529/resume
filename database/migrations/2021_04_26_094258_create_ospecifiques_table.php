<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOspecifiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ospecifiques', function (Blueprint $table) {
            $table->integer('num_indicateur')->unsigned()->primary();
            $table->string("intitulé_indicateur",255)->nullable->change;
            $table->integer("val_2019",11)->nullable->change;
            $table->integer("val_2020",11)->nullable->change;
            $table->integer("val_2021",11)->nullable->change;
            $table->integer("val_2022",11)->nullable->change;
            $table->string("val_cible",255)->nullable->change;
            $table->string("unite",255)->nullable->change;
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
        Schema::dropIfExists('ospecifiques');
    }
}
