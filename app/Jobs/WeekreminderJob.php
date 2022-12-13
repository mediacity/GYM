<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Weekreminder;
use Mail;
use Illuminate\Support\Carbon;
use App\Notifications\WeekreminderNotification;

class WeekreminderJob implements ShouldQueue
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

            $weekreminder = Weekreminder::whereHas('user')->with('user')->where('status','!=','success')->where('reminder_date', '=', date('d-m-Y'))->get();
    
            $weekreminder->each(function($item){
    
                $item->user->notify(new WeekreminderNotification($item));
    
                Weekreminder::where('id',$item->id)->update([
                    
                    'status' => 'success',
                    
                ]);
    
            });
               
                
            }
            catch(\Exception $e){
        
                \Log::error('Error sending notification: '.$e->getMessage());
    
            }
        
    }
    
}
