<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\ThongBaoSV;
class NofitoSV extends Mailable
{
    use Queueable, SerializesModels;
    public $phananh;
    public $attachment;
    public $id_folder;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ThongBaoSV $phananh, $attachment, $id_folder)
    {
        //        
        $this->phananh = $phananh;
        $this->attachment = $attachment;
        $this->id_folder = $id_folder;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->view('page.view.mail.phananhtoiql');
        $mail->subject($this->phananh->sinhvien->email. ' && '. $this->phananh->tieude);
        $mail->from('admin@GreenDormitory.com', 'Green Dormitory');
        if ($this->attachment) {
            # code...
            foreach ($this->attachment as $files)
            $mail->attach(public_path().'/FileMail/ToSV/'.$this->id_folder.'/'.$files->filename);
        }

        return $mail;
    }
}
