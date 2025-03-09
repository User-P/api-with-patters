<?php

    namespace App\Repositories;

    use App\Interfaces\RolePermissionRepositoryInterface;
    use App\Models\User;
    use Spatie\Permission\Models\Permission;
    use Spatie\Permission\Models\Role;

    class RolePermissionRepository implements RolePermissionRepositoryInterface
    {

        public function getAllRoles()
        {
            return Role::all();
        }

        public function getAllPermissions()
        {
            return Permission::all();
        }

        public function createRole(array $data)
        {
            return Role::create($data);
        }

        public function createPermission(array $data)
        {
            return Permission::create($data);
        }

        public function assignRoleToUser(int $userId,string $role)
        {
            $user = User::findOrFail($userId);
            $user->assignRole($role);
            return $user->roles;
        }

        public function assignPermissionToUser(int$userId,string $permission)
        {
            $user = User::findOrFail($userId);
            $user->givePermissionTo($permission);
            return $user->permissions;
        }

        public function getUserRolesAndPermissions(int $userId): array
        {
            $user = User::findOrFail($userId);
            return [
                'roles' => $user->getRoleNames(),
                'permissions' => $user->getAllPermissions()->pluck('name'),
            ];
        }
    }
