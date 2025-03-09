<?php

    namespace App\Interfaces;

    interface RolePermissionRepositoryInterface
    {
        public function getAllRoles();

        public function getAllPermissions();

        public function createRole(array $data);

        public function createPermission(array $data);

        public function assignRoleToUser(int $userId, string $role);

        public function assignPermissionToUser(int $userId, string $permission);

        public function getUserRolesAndPermissions(int $userId);
    }
