<?php

namespace App\Interfaces;

use App\Models\Invitation;

interface InvitationRepositoryInterface
{
    public function listInvitations();

    public function createInvitation(array $data);

    public function searchInvitation(array $data);

    public function acceptInvitation(Invitation $invitation);

    public function listAcceptedInvitations();
}
