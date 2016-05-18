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
        		'name_labo'  => "ayachi",
        		'tel_labo' => "0659124800",
        		'fax_labo' => "0000000000",
        		'adresse_labo' => "oujda, ALQOS",
        		'email_labo' => "archi@farchi.com"
        	],
        	[
        		'name_labo'  => "oualid",
        		'tel_labo' => "0659124800",
        		'fax_labo' => "0000000000",
        		'adresse_labo' => "oujda, ALQOS",
        		'email_labo' => "bouh@archi.com"
        	],
        	[
        		'name_labo'  => "archi1",
        		'tel_labo' => "066666",
        		'fax_labo' => "65698",
        		'adresse_labo' => "oujda, ALQOS",
        		'email_labo' => "archi1@archi.com"
        	],
        	[
        		'name_labo'  => "archi 6",
        		'tel_labo' => "0659124800",
        		'fax_labo' => "54658",
        		'adresse_labo' => "oujda, ALQOS",
        		'email_labo' => "archi6@archi.com"
        	],
        	[
        		'name_labo'  => "soufiane",
        		'tel_labo' => "0659124800",
        		'fax_labo' => "5458",
        		'adresse_labo' => "oujda, ALQOS",
        		'email_labo' => "soufiane@chalouh.com"
        	],
        	);
        DB::table('laboratoires')->insert($laboratoires);
    }
}
