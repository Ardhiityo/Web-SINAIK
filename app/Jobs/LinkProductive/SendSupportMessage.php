<?php

namespace App\Jobs\LinkProductive;

use App\Mail\SupportUmkm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSupportMessage implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public $subject, public $content)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('aryaadi229@gmail.com')->send(new SupportUmkm(
            $this->subject,
            $this->content,
        ));
    }
}
