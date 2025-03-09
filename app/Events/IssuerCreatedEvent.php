<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Foundation\Events\Dispatchable;

class IssuerCreatedEvent
{
    use Dispatchable;
    public User $user;
	public string $password;

    public function __construct(User $user, string $password)
    {
        $this->user = $user;
		$this->password = $password;
    }
}
