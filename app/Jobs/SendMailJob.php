<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\OrderMail;
use Mail;
class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
//public $request;
   // public $data;
   //
    /**
     * Create a new job instance.
     */
   // public  $data;
    public function __construct($request,$data)
    {
    //  $this->request = $request;
      // $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
      //dd($data);
     // Mail::to($this->request->email)->send(new OrderMail($this->data,$this->request));
    }
}
