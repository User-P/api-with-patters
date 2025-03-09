<?php

    namespace App\Http\Controllers\Invitation;

    use App\Classes\ApiResponseClass;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\InviteIssuerRequest;
    use App\Interfaces\InvitationRepositoryInterface;
    use App\Models\Account;
    use App\Services\InvitationService;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\Request;
    use Laravel\Sanctum\PersonalAccessToken;

    class InvitationController extends Controller
    {

        private InvitationRepositoryInterface $invitationRepository;
        protected InvitationService $invitationService;

        public function __construct(
            InvitationRepositoryInterface $invitationRepository,
            InvitationService             $invitationService
        )
        {
            $this->invitationRepository = $invitationRepository;
            $this->invitationService = $invitationService;
        }

        public function listInvitations()
        {
            $data = $this->invitationRepository->listInvitations();
        }

        public function invite(InviteIssuerRequest $request): JsonResponse
        {
            $user = PersonalAccessToken::findToken($request->bearerToken())->tokenable;
            $account = Account::where('user_id', $user->id)->first();
            if (!$account) {
                return ApiResponseClass::error('Account not found');
            }
            $data = $request->all();
            $data['account_id'] = $account->id;
            $invitation = $this->invitationService->sendInvitation($data);
            if (!$invitation) {
                return ApiResponseClass::error('Invite not sent');
            }
            return ApiResponseClass::success($invitation, 'Invite sent successfully');
        }

        public function checkInvitation(Request $request): JsonResponse
        {
            $invitation = $this->invitationRepository->searchInvitation($request->all());

            if (!$invitation) {
                return ApiResponseClass::error('Invite not found');
            }

            $invitation = $this->invitationService->checkInvitation($invitation);

            if (!$invitation) {
                return ApiResponseClass::error('Invite expired or already used');
            }

            return ApiResponseClass::success($invitation, 'Invite is valid');

        }

        public function acceptInvitation(Request $request): JsonResponse
        {
            $invitation = $this->invitationRepository->searchInvitation($request->all());

            if (!$invitation) {
                return ApiResponseClass::error('Invite not found');
            }

            $invitation = $this->invitationService->checkInvitation($invitation);

            if (!$invitation) {
                return ApiResponseClass::error('Invite expired or already used');
            }

            $invitation = $this->invitationService->acceptInvitation($invitation, $request->all());

            return ApiResponseClass::success($invitation, 'Invite accepted successfully');
        }


    }
