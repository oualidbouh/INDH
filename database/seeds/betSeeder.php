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
        DB::table('b_e_t_s')->truncate();
        $bets = array(
        	[
        		'name_bet'  => "bet1",
        		'tel_bet' => "0659124800",
        		'fax_bet' => "0000000000",
        		'adresse_bet' => "oujda, ALQOS",
        		'email_bet' => "bet1@bet.com"
        	],
        	[
        		'name_bet'  => "bet2",
        		'tel_bet' => "0659124800",
        		'fax_bet' => "0000000000",
        		'adresse_bet' => "Casablanca, Maarif",
        		'email_bet' => "bet2@bet.com"
        	],
        	[
        		'name_bet'  => "bet3",
        		'tel_bet' => "0659124800",
        		'fax_bet' => "0659124800",
        		'adresse_bet' => "oujda, ALQOS",
        		'email_bet' => "bet3@bet.com"
        	],
        	[
        		'name_bet'  => "bet4",
        		'tel_bet' => "0659124800",
        		'fax_bet' => "0659124800",
        		'adresse_bet' => "oujda, ALQOS",
        		'email_bet' => "bet4@bet.com"
        	],
        	[
        		'name_bet'  => "bet5",
        		'tel_bet' => "0659124800",
        		'fax_bet' => "0659124800",
        		'adresse_bet' => "oujda, ALQOS",
        		'email_bet' => "bet5@chalouh.com"
        	],
        	);
         DB::table('b_e_t_s')->insert($bets);
    }
}
