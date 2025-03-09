<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roles = [
            'admin',
            'issuer',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $permissions = [
            'create user',
            'read user',
            'update user',
            'delete user',
            'create account',
            'read account',
            'update account',
            'delete account',
            'assign role',
            'revoke role',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $rolePermissions = [
            'admin' => [
                'create user',
                'read user',
                'update user',
                'delete user',
                'create account',
                'read account',
                'update account',
                'delete account',
                'assign role',
                'revoke role',
            ],
            'issuer' => [
                'read user',
                'read account',
            ],
        ];

        foreach ($rolePermissions as $role => $permissions) {
            $role = Role::findByName($role);
            $role->syncPermissions($permissions);
        }
    }
}
