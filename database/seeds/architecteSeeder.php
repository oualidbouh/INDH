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
        		'name_archi'  => "archi1",
        		'tel_archi' => "0659124800",
        		'fax_archi' => "0000000000",
        		'adresse_archi' => "oujda, ALQOS",
        		'email_archi' => "archi1@archi.com"
        	],
        	[
        		'name_archi'  => "archi2",
        		'tel_archi' => "0659124800",
        		'fax_archi' => "0536506143",
        		'adresse_archi' => "oujda, ALQOS",
        		'email_archi' => "archi2@archi.com"
        	],
        	[
        		'name_archi'  => "archi3",
        		'tel_archi' => "0666666666",
        		'fax_archi' => "0505056569",
        		'adresse_archi' => "oujda, ALQOS",
        		'email_archi' => "archi1@archi.com"
        	],
        	[
        		'name_archi'  => "archi4",
        		'tel_archi' => "0659124800",
        		'fax_archi' => "0563505458",
        		'adresse_archi' => "oujda, ALQOS",
        		'email_archi' => "archi4@archi.com"
        	],
        	);
         DB::table('architectes')->insert($architectes);
    }
}
