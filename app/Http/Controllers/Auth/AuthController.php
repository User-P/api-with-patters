<?php

    namespace App\Http\Controllers\Auth;

    use App\Classes\ApiResponseClass;
    use App\Http\Controllers\Controller;
    use App\Interfaces\AuthRepositoryInterface;
    use App\Interfaces\RolePermissionRepositoryInterface;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\Request;

    class AuthController extends Controller
    {
        private AuthRepositoryInterface $authRepository;
        private RolePermissionRepositoryInterface $rolePermissionRepository;

        public function __construct(AuthRepositoryInterface $authRepository, RolePermissionRepositoryInterface $rolePermissionRepository)
        {
            $this->authRepository = $authRepository;
            $this->rolePermissionRepository = $rolePermissionRepository;
        }

        public function login(Request $request): JsonResponse
        {
            $credentials = $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);

            $token = $this->authRepository->login($credentials);

            if (!$token) {
                return ApiResponseClass::success(null, 'Invalid credentials', 401);
            }

            $me = $this->authRepository->me($token);
            $role_permissions = $this->rolePermissionRepository->getUserRolesAndPermissions($me->id);

            return ApiResponseClass::success([
                'token' => $token,
                'me' => $me,
                'role_permissions' => $role_permissions
            ], 'Login successful');
        }

        public function logout(Request $request): JsonResponse
        {
            $this->authRepository->logout($request->bearerToken());
            return ApiResponseClass::success(null, 'Logged out successfully');
        }

        public function me(Request $request)
        {
            $me = $this->authRepository->me($request->bearerToken());
            $role_permissions = $this->rolePermissionRepository->getUserRolesAndPermissions($me->id);

            return ApiResponseClass::success([
                'me' => $me,
                'role_permissions' => $role_permissions
            ], 'Retrieved user data');
        }
    }
