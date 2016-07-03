<?php

use Illuminate\Database\Seeder;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->truncate();
       $users = array(
           "user1" => array(
               "email" =>"admin@admin.ma",
                "name" => "admin",
                "password" =>"adminadmin",
                "type"=>"admin" 
               ),
           "user2" => array(
               "email" =>"root@root.indh",
                "name" => "root",
                "password" =>"rootroot",
                "type"=>"editor"
           ),
           "user3"=>array(
                "email" =>"bouh.oualid@gmail.com",
                "name"=>"oualid",
                "password"=>"pfa2016",
                "type"=>"visitor"
            )
           
       );
       DB::table('users')->insert($users);
    }
}
