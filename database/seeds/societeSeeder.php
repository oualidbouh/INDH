<?php

use Illuminate\Database\Seeder;

class societeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 DB::table('societes')->truncate();
        $societes = array(
        	[
        		'name_societe'  => "ayachi",
        		'tel_societe' => "0659124800",
        		'fax_societe' => "0000000000",
        		'adresse_societe' => "oujda, ALQOS",
        		'email_societe' => "archi@farchi.com"
        	],
        	[
        		'name_societe'  => "oualid",
        		'tel_societe' => "0659124800",
        		'fax_societe' => "0000000000",
        		'adresse_societe' => "oujda, ALQOS",
        		'email_societe' => "bouh@archi.com"
        	],
        	[
        		'name_societe'  => "archi1",
        		'tel_societe' => "066666",
        		'fax_societe' => "65698",
        		'adresse_societe' => "oujda, ALQOS",
        		'email_societe' => "archi1@archi.com"
        	],
        	[
        		'name_societe'  => "archi 6",
        		'tel_societe' => "0659124800",
        		'fax_societe' => "54658",
        		'adresse_societe' => "oujda, ALQOS",
        		'email_societe' => "archi6@archi.com"
        	],
        	[
        		'name_societe'  => "soufiane",
        		'tel_societe' => "0659124800",
        		'fax_societe' => "5458",
        		'adresse_societe' => "oujda, ALQOS",
        		'email_societe' => "soufiane@chalouh.com"
        	],
        	);
         DB::table('societes')->insert($societes);
    }
}
