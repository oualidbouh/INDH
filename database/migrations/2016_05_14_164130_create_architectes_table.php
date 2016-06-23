<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchitectesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('architectes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_archi');
            $table->string('tel_archi');
            $table->string('fax_archi');
            $table->string('email_archi');
            $table->string('adresse_archi');
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
        Schema::drop('architectes');
    }
}
