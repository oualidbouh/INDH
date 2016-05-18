<?php

use Illuminate\Database\Seeder;

class betSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bet')->truncate();
        $bets = array(
        	[
        		'name_bet'  => "ayachi",
        		'tel_bet' => "0659124800",
        		'fax_bet' => "0000000000",
        		'adresse_bet' => "oujda, ALQOS",
        		'email_bet' => "archi@farchi.com"
        	],
        	[
        		'name_bet'  => "oualid",
        		'tel_bet' => "0659124800",
        		'fax_bet' => "0000000000",
        		'adresse_bet' => "oujda, ALQOS",
        		'email_bet' => "bouh@archi.com"
        	],
        	[
        		'name_bet'  => "archi1",
        		'tel_bet' => "066666",
        		'fax_bet' => "65698",
        		'adresse_bet' => "oujda, ALQOS",
        		'email_bet' => "archi1@archi.com"
        	],
        	[
        		'name_bet'  => "archi 6",
        		'tel_bet' => "0659124800",
        		'fax_bet' => "54658",
        		'adresse_bet' => "oujda, ALQOS",
        		'email_bet' => "archi6@archi.com"
        	],
        	[
        		'name_bet'  => "soufiane",
        		'tel_bet' => "0659124800",
        		'fax_bet' => "5458",
        		'adresse_bet' => "oujda, ALQOS",
        		'email_bet' => "soufiane@chalouh.com"
        	],
        	);
         DB::table('bet')->insert($bets);
    }
}
