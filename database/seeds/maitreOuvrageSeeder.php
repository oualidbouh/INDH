<?php

use Illuminate\Database\Seeder;

class maitreOuvrageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('maitre_ouvrages')->truncate();
        $architectes = array(
        	[
        		'name_maitre_ouvrage'  => "ayachi",
        		'tel_maitre_ouvrage' => "0659124800",
        		'fax_maitre_ouvrage' => "0000000000",
        		'adresse_maitre_ouvrage' => "oujda, ALQOS",
        		'email_maitre_ouvrage' => "archi@farchi.com"
        	],
        	[
        		'name_maitre_ouvrage'  => "oualid",
        		'tel_maitre_ouvrage' => "0659124800",
        		'fax_maitre_ouvrage' => "0000000000",
        		'adresse_maitre_ouvrage' => "oujda, ALQOS",
        		'email_maitre_ouvrage' => "bouh@archi.com"
        	]
        	);
         DB::table('maitre_ouvrages')->insert($architectes);
    }
}
