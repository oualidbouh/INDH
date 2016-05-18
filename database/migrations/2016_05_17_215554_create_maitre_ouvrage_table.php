<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaitreOuvrageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maitre_ouvrages', function (Blueprint $table) {
            $table->increments('maitre_ouvrage_id');
            $table->string('name_maitre_ouvrage');
            $table->string('tel_maitre_ouvrage');
            $table->string('fax_maitre_ouvrage');
            $table->string('email_maitre_ouvrage');
            $table->string('adresse_maitre_ouvrage');
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
         Schema::drop('maitre_ouvrages');
    }
}
