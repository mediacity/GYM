<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Halfreminder;
use Mail;
use Illuminate\Support\Carbon;
use App\Notifications\HalfreminderNotifications;

class HalfreminderJob implements ShouldQueue
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

            $halfreminder = Halfreminder::whereHas('user')->with('user')->where('status','!=','success')->where('reminder_date', '=', date('d-m-Y'))->get();
    
            $reminder->each(function($item){
    
                $item->user->notify(new HalfreminderNotification($item));
    
                Halfreminder::where('id',$item->id)->update([
                    
                    'status' => 'success',
                    
                ]);
    
            });
               
                
            }
            catch(\Exception $e){
        
                \Log::error('Error sending notification: '.$e->getMessage());
    
            }
        
    }
}
