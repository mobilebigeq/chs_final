<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\MaintenanceBill;

class BillsMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $users_detail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($users_detail)
    {
        $this->users_detail = $users_detail;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Society Maintenance Bill')
                    ->markdown('mail');
    }
}
