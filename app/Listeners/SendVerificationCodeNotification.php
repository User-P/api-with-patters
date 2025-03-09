<?php

namespace App\Listeners;

use App\Events\InvitationIssuerEvent;
use App\Mail\VerificationCodeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendVerificationCodeNotification implements ShouldQueue
{
    use InteractsWithQueue, Queueable;

    public function handle(InvitationIssuerEvent $event): void
    {
        $email = $event->invitation->email;

        Mail::to($email)->send(new VerificationCodeMail($event->invitation));

    }
}
