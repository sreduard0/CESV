<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class reportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $info;

    public function __construct($values)
    {
        $this->info = $values;
    }
    public function build()
    {
        return $this->subject('Relatório de missão')
            ->view('Mail.mail')
            ->attach(storage_path('pdfmake/' . $this->info['pdfName']));

    }
}
