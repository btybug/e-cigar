<?php

namespace App\Mail;

use App\Models\MailJob;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $job;
    public function __construct(MailJob $job)
    {
       $this->job=$job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->job->email->from)
            ->subject($this->job->email->subject)
            ->view('send_email')
            ->with([
            'email'=>$this->job->email
        ]);
    }
}
