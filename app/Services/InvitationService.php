<?php

namespace App\Services;

use App\Events\InvitationIssuerEvent;
use App\Interfaces\InvitationRepositoryInterface;
use App\Models\Invitation;
use Illuminate\Support\Facades\DB;

class InvitationService
{
    protected InvitationRepositoryInterface $invitationRepository;
    protected IssuerService $issuerService;

    public function __construct(
        InvitationRepositoryInterface $invitationRepository,
        IssuerService $issuerService
    )
    {
        $this->invitationRepository = $invitationRepository;
        $this->issuerService = $issuerService;
    }

    public function sendInvitation(array $data)
    {
        return DB::transaction(function () use ($data) {
            $data['verification_code'] = random_int(100000, 999999);
            $invitation = $this->invitationRepository->createInvitation($data);

            InvitationIssuerEvent::dispatch($invitation);
            return $invitation;
        });
    }

    public function checkInvitation(Invitation $invitation)
    {
        if ($invitation->is_used === 1) {
            return false;
        }

        if ($invitation->expires_at  && now()->gt($invitation->expires_at)) {
            return false;
        }

        return $invitation;
    }

    public function acceptInvitation(Invitation $invitation, $request)
    {
        return DB::transaction(function () use ($invitation, $request) {
            $this->invitationRepository->acceptInvitation($invitation);
            $this->issuerService->createIssuerWithUser($invitation->account, $request);
        });
    }

}
