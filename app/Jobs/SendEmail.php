<?php

namespace App\Jobs;

use App\Mail\MailNotify;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;
    protected $order_details;
    /**
     * Create a new job instance.
     */
    public function __construct($data, $order_details)
    {
        $this->data = $data;
        $this->order_details = $order_details;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
            Mail::to($this->data->email)->send(new MailNotify($this->data, $this->order_details));
//            Mail::to("truong290803@gmail.com")->send(new MailNotify($this->data));
    }
}
