<?php

namespace App\Http\Controllers\Auth;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Interfaces\RolePermissionRepositoryInterface;
use App\Services\RegisterService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    private RegisterService $registerService;
    private RolePermissionRepositoryInterface $rolePermissionRepository;

    public function __construct(RegisterService $registerService, RolePermissionRepositoryInterface $rolePermissionRepository)
    {
        $this->registerService = $registerService;
        $this->rolePermissionRepository = $rolePermissionRepository;
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'account' => 'required|string|max:255',
        ]);

        $user = $this->registerService->register($data);

		$token = $user->createToken('API Token')->plainTextToken;

        $role_permissions = $this->rolePermissionRepository->getUserRolesAndPermissions($user->id);

        return ApiResponseClass::success([
			'token' => $token,
			'me' => $user,
            'role_permissions' => $role_permissions
		], 'User registered successfully', 201);
    }
}
