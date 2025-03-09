<?php

	namespace App\Listeners;

	use App\Events\IssuerCreatedEvent;
	use App\Mail\IssuerWelcomeMail;
	use Illuminate\Contracts\Queue\ShouldQueue;
	use Illuminate\Foundation\Queue\Queueable;
	use Illuminate\Queue\InteractsWithQueue;
	use Illuminate\Support\Facades\Mail;

	class SendIssuerWelcomeEmail implements ShouldQueue
	{
		use InteractsWithQueue, Queueable;

		public function handle(IssuerCreatedEvent $event): void
		{
			$user = $event->user;
			$password = $event->password;

			Mail::to($user->email)->send(new IssuerWelcomeMail($user, $password));
		}
	}
