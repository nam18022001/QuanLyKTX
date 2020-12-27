<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\VerifySV;
class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $sendmail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(VerifySV $sendmail)
    {
        //
        $this->sendmail = $sendmail;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('page.view.mail.sendtokenverify')->from('hnvnam.19it3@vku.udn.vn', 'Green Dormitory Verification')->subject('Xác nhận email');
    }
}
