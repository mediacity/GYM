<?php
  
namespace App\Jobs;
   
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendEmailTest;
use App\Reminder;
use Mail;
use Illuminate\Support\Carbon;
use App\Notifications\OfferPushNotifications;
   
class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
  
   
    // public $reminders;
  
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        
      
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

            $item->user->notify(new OfferPushNotifications($item));

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