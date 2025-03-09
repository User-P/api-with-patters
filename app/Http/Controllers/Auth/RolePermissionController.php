<?php

    namespace App\Http\Controllers\Auth;

    use App\Classes\ApiResponseClass;
    use App\Http\Controllers\Controller;
    use App\Interfaces\RolePermissionRepositoryInterface;
    use Illuminate\Http\Request;

    class RolePermissionController extends Controller
    {

        protected $rolePermissionRepo;

        public function __construct(RolePermissionRepositoryInterface $rolePermissionRepo)
        {
            $this->rolePermissionRepo = $rolePermissionRepo;
        }

        public function getAllRoles()
        {
            return ApiResponseClass::success($this->rolePermissionRepo->getAllRoles(), 'Retrieved all roles');
        }

        public function getAllPermissions()
        {
            return ApiResponseClass::success($this->rolePermissionRepo->getAllPermissions(), 'Retrieved all permissions');
        }

        public function assignRole(Request $request, $userId)
        {
            $request->validate([
                'role' => 'required|string',
            ]);

            $roles = $this->rolePermissionRepo->assignRoleToUser($userId, $request->role);
            return ApiResponseClass::success(['roles' => $roles], 'Role assigned successfully');
        }

        public function assignPermission(Request $request, $userId)
        {
            $request->validate([
                'permission' => 'required|string',
            ]);

            $permissions = $this->rolePermissionRepo->assignPermissionToUser($userId, $request->permission);

            return ApiResponseClass::success(['permissions' => $permissions], 'Permission assigned successfully');
        }

        public function getUserRolesAndPermissions($userId)
        {
            return ApiResponseClass::success($this->rolePermissionRepo->getUserRolesAndPermissions($userId), 'Retrieved user roles and permissions');
        }
    }
