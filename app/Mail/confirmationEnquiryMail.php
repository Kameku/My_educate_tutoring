<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class confirmationEnquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public $infoMsg;
    public $linkEnrolment;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($infoMsg, $linkEnrolment)
    {
        $this->infoMsg = $infoMsg;
        $this->linkEnrolment = $linkEnrolment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.confirmationEnquiry')
            ->attach(asset('documentPdf/Overview_of_Services_Terms_of_Engagement.pdf'))
            ->attach(asset('documentPdf/Schedule_of_Fees_2022.pdf'));
    }
}
