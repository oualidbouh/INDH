<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class marchetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 DB::table('marches')->truncate();
        $societes = array(
        	[
        		"type_budget" => "BP",
    			"objet"=>"fjrf",
    			"year"=>"2012"
    			"montant"=>"12520"
    			"date_ouverture_plis"=>"2016-05-01"
    			"date_debut_travaux"=>"2016-02-05"
    			"date_fin_travaux"=>"2016-10-10"
    			"labo_id"=>"1"
    			"archi_id"=>"2"
    			"maitre_ouvrage_id"=>"2"
    			"bet_id"=>"3"
    			"societe_id"=>"5"
    			"percentage_financial"=>"0"
    			"sum_decomptes"=>"0"
    			"pourcentage_travaux"=>"10"
    			"created_at"=>Carbon::now(),
    			"updated_at"=> Carbon::now()
        	],
        	[
        		"type_budget" => "BG",
    			"objet"=>"fjrf",
    			"year"=>"2010"
    			"montant"=>"12520"
    			"date_ouverture_plis"=>"2016-05-01"
    			"date_debut_travaux"=>"2016-02-05"
    			"date_fin_travaux"=>"2016-10-10"
    			"labo_id"=>"1"
    			"archi_id"=>"2"
    			"maitre_ouvrage_id"=>"2"
    			"bet_id"=>"3"
    			"societe_id"=>"5"
    			"percentage_financial"=>"0"
    			"sum_decomptes"=>"0"
    			"pourcentage_travaux"=>"10"
    			"created_at"=>Carbon::now(),
    			"updated_at"=> Carbon::now()
        	],
        	[
        		"type_budget" => "BP",
    			"objet"=>"fjrf",
    			"year"=>"2010"
    			"montant"=>"12520"
    			"date_ouverture_plis"=>"2016-05-01"
    			"date_debut_travaux"=>"2016-02-05"
    			"date_fin_travaux"=>"2016-10-10"
    			"labo_id"=>"1"
    			"archi_id"=>"2"
    			"maitre_ouvrage_id"=>"2"
    			"bet_id"=>"3"
    			"societe_id"=>"5"
    			"percentage_financial"=>"0"
    			"sum_decomptes"=>"0"
    			"pourcentage_travaux"=>"10"
    			"created_at"=>Carbon::now(),
    			"updated_at"=> Carbon::now()
        	],
        	[
        		"type_budget" => "INDH",
    			"objet"=>"fjrf",
    			"year"=>"2000"
    			"montant"=>"12520"
    			"date_ouverture_plis"=>"2016-05-01"
    			"date_debut_travaux"=>"2016-02-05"
    			"date_fin_travaux"=>"2016-10-10"
    			"labo_id"=>"1"
    			"archi_id"=>"2"
    			"maitre_ouvrage_id"=>"2"
    			"bet_id"=>"3"
    			"societe_id"=>"5"
    			"percentage_financial"=>"0"
    			"sum_decomptes"=>"0"
    			"pourcentage_travaux"=>"10"
    			"created_at"=>Carbon::now(),
    			"updated_at"=> Carbon::now()
        	],

        	);
         DB::table('marches')->insert($societes);
    }
}
