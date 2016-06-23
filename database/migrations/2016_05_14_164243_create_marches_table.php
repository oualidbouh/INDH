<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_budget');
            $table->string('objet');
            $table->string("year");
            $table->float('montant');
            $table->date('date_ouverture_plis');
            $table->date('date_debut_travaux');
            $table->date('date_fin_travaux');
            $table->integer('labo_id');
            $table->integer('archi_id');
            $table->integer('maitre_ouvrage_id');
            $table->integer('bet_id');
            $table->integer("societe_id");
            $table->float('sum_decomptes');
            $table->float('percentage_financial');
            $table->float('pourcentage_travaux');
            $table->integer('archive');
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
        Schema::drop('marches');
    }
}
