<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\User;
use Illuminate\Support\Carbon;
use App\Notifications\BirthdayNotification;

class BirthdayJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{

            $date = new Carbon;
            $today = $date->format('Y-m-d');
            $user = User::where('dob', '>=', $today)->get();
    
            $user->each(function($item){
    
                $item->user->notify(new BirthdayNotification($item));
    
            });
               
                
            }
            catch(\Exception $e){
        
                \Log::error('Error sending notification: '.$e->getMessage());
    
            }
    }
}
