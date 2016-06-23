<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Mail;
use Carbon\Carbon;
use App\Marche;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
       $schedule->call(function () {

            $m = Marche::all();

            $today = Carbon::today();

            foreach ($m as $key => $value) {

                    if($today->diffInDays(new Carbon($m[$key]->date_fin_travaux))<10){

                        $s = $m[$key]->societe;

                        $name = $s->name_societe;

                        $email = $s->email_societe;

                        $data = array('email'=>$email,'name'=>$name);

                        Mail::raw("le marché ".$m[$key]->id." lui reste une durée de ".$today->diffInDays(new Carbon($m[$key]->date_fin_travaux))." jours", function($message) use ($data) {
                                $message->to($data['email'], $data['name'])->subject('Danger Fin de travaux');
                    });
                }
          
      }
        })->dailyAt('13:19');

    }
}
