<?php

use Illuminate\Database\Seeder;

class architecteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('architectes')->truncate();
        $architectes = array(
        	[
        		'name_archi'  => "ayachi",
        		'tel_archi' => "0659124800",
        		'fax_archi' => "0000000000",
        		'adresse_archi' => "oujda, ALQOS",
        		'email_archi' => "archi@farchi.com"
        	],
        	[
        		'name_archi'  => "oualid",
        		'tel_archi' => "0659124800",
        		'fax_archi' => "0000000000",
        		'adresse_archi' => "oujda, ALQOS",
        		'email_archi' => "bouh@archi.com"
        	],
        	[
        		'name_archi'  => "archi1",
        		'tel_archi' => "066666",
        		'fax_archi' => "65698",
        		'adresse_archi' => "oujda, ALQOS",
        		'email_archi' => "archi1@archi.com"
        	],
        	[
        		'name_archi'  => "archi 6",
        		'tel_archi' => "0659124800",
        		'fax_archi' => "54658",
        		'adresse_archi' => "oujda, ALQOS",
        		'email_archi' => "archi6@archi.com"
        	],
        	[
        		'name_archi'  => "soufiane",
        		'tel_archi' => "0659124800",
        		'fax_archi' => "5458",
        		'adresse_archi' => "oujda, ALQOS",
        		'email_archi' => "soufiane@chalouh.com"
        	],
        	);
         DB::table('architectes')->insert($architectes);
    }
}
