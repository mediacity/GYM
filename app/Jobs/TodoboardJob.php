<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Reminder;
use Illuminate\Support\Carbon;
use App\Notifications\TodoboardNotification;

class TodoboardJob implements ShouldQueue
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

            $reminder = Reminder::whereHas('user')->with('user')->where('status','!=','success')->where('reminder_date', '=', date('d-m-Y'))->get();
    
            $reminder->each(function($item){
    
                $item->user->notify(new TodoboardNotification($item));
    
                Reminder::where('id',$item->id)->update([
                    
                    'status' => 'success',
                    
                ]);
    
            });
               
                
            }
            catch(\Exception $e){
        
                \Log::error('Error sending notification: '.$e->getMessage());
    
            }
        
    }
}
