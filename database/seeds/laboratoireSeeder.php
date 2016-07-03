<?php

use Illuminate\Database\Seeder;

class laboratoireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('laboratoires')->truncate();
        $laboratoires = array(
        	[
        		'name_labo'  => "labo1",
        		'tel_labo' => "0659124800",
        		'fax_labo' => "0000000000",
        		'adresse_labo' => "oujda, ALQOS",
        		'email_labo' => "labo@labo1.com"
        	],
        	[
        		'name_labo'  => "labo2",
        		'tel_labo' => "0659124800",
        		'fax_labo' => "0000000000",
        		'adresse_labo' => "oujda, ALQOS",
        		'email_labo' => "labo@labo2.com"
        	],
        	[
        		'name_labo'  => "labo3",
        		'tel_labo' => "066666",
        		'fax_labo' => "65698",
        		'adresse_labo' => "oujda, ALQOS",
        		'email_labo' => "labo@labo3.com"
        	],
        	[
        		'name_labo'  => "labo4",
        		'tel_labo' => "0659124800",
        		'fax_labo' => "54658",
        		'adresse_labo' => "oujda, ALQOS",
        		'email_labo' => "labo@labo4.com"
        	],
        	[
        		'name_labo'  => "labo5",
        		'tel_labo' => "0659124800",
        		'fax_labo' => "5458",
        		'adresse_labo' => "oujda, ALQOS",
        		'email_labo' => "labo5"
        	],
        	);
        DB::table('laboratoires')->insert($laboratoires);
    }
}
