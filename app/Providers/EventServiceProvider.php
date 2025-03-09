<?php

    namespace App\Providers;

    use App\Events\InvitationIssuerEvent;
    use App\Events\IssuerCreatedEvent;
    use App\Listeners\SendIssuerWelcomeEmail;
    use App\Listeners\SendVerificationCodeNotification;
    use Illuminate\Support\ServiceProvider;

    class EventServiceProvider extends ServiceProvider
    {
        protected $listen = [
            IssuerCreatedEvent::class => [
                SendIssuerWelcomeEmail::class,
            ],
            InvitationIssuerEvent::class => [
                SendVerificationCodeNotification::class,
            ],

        ];
    }
