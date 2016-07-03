<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBETsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_e_t_s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_bet');
            $table->string('tel_bet');
            $table->string('fax_bet');
            $table->string('adresse_bet');
            $table->string('email_bet');
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
        Schema::drop('b_e_t_s');
    }
}
