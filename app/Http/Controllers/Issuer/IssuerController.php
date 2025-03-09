<?php

    namespace App\Http\Controllers\Issuer;

    use App\Classes\ApiResponseClass;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\StoreIssuerRequest;
    use App\Http\Requests\UpdateIssuerRequest;
    use App\Http\Resources\IssuerResource;
    use App\Interfaces\IssuerRepositoryInterface;
    use App\Models\User;
    use App\Services\IssuerService;
    use Illuminate\Http\JsonResponse;
    use Laravel\Sanctum\PersonalAccessToken;

    class IssuerController extends Controller
    {
        protected IssuerRepositoryInterface $issuerRepo;
        protected IssuerService $issuerService;
        protected User $user;

        public function __construct(
            IssuerRepositoryInterface $issuerRepo,
            IssuerService             $issuerService,
        )
        {
            $this->issuerRepo = $issuerRepo;
            $this->issuerService = $issuerService;
            $token = request()->bearerToken();
            $this->user = PersonalAccessToken::findToken($token)->tokenable;
        }

        public function index(): JsonResponse
        {
            $issuers = $this->issuerRepo->getAllIssuers($this->user->account->id, ['user']);
            return ApiResponseClass::success(IssuerResource::collection($issuers), 'Data retrieved successfully');
        }

        public function store(StoreIssuerRequest $request): JsonResponse
        {
            $issuer = $this->issuerService->createIssuerWithDetails($this->user->account->id, $request->all());

            if (!$issuer) {
                return ApiResponseClass::error('Issuer not created');
            }

            return ApiResponseClass::success(
                (new IssuerResource($issuer)),
                'Issuer created successfully');
        }

        public function show(int $id): JsonResponse
        {
            $data = $this->issuerRepo->getIssuerById($id);
            if (!$data) {
                return ApiResponseClass::error('Issuer not found');
            }
            return ApiResponseClass::success(new IssuerResource($data),
                'Data retrieved successfully');
        }

        public function update(UpdateIssuerRequest $request, int $id): JsonResponse
        {
            $data = $this->issuerRepo->getIssuerById($id);
            if (!$data) {
                return ApiResponseClass::error('Issuer not found');
            }

            $updatedIssuer = $this->issuerService->updateIssuerWithUser($request->all(), $id);
            if (!$updatedIssuer) {
                return ApiResponseClass::error('Issuer not updated');
            }

            return ApiResponseClass::success(new IssuerResource($updatedIssuer),
                'Issuer updated successfully'
            );
        }

        public function destroy(int $id): JsonResponse
        {
            return ApiResponseClass::success(
                $this->issuerRepo->deleteIssuer($id),
                'Issuer deleted successfully');
        }

    }
