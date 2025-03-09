<?php

namespace App\Repositories;

use App\Interfaces\InvitationRepositoryInterface;
use App\Models\Invitation;

class InvitationRepository implements InvitationRepositoryInterface
{

    public function listInvitations()
    {
        // List invitations logic
    }

    public function createInvitation(array $data)
    {
        return Invitation::create($data);
    }

    public function searchInvitation(array $data)
    {
        return Invitation::whereEmail($data['email'])
            ->whereVerificationCode($data['verification_code'])
            ->first();
    }

    public function acceptInvitation(Invitation $invitation)
    {
        $invitation->is_used = Invitation::USED;
        $invitation->save();
        return $invitation;
    }

    public function listAcceptedInvitations()
    {
        // List accepted invitations logic
    }
}
