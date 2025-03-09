<?php

    namespace App\Services;

    use App\Interfaces\AccountRepositoryInterface;
    use App\Interfaces\RolePermissionRepositoryInterface;
    use App\Interfaces\UserRepositoryInterface;
    use Illuminate\Support\Facades\DB;

    class RegisterService
    {
        private UserRepositoryInterface $userRepository;
        private AccountRepositoryInterface $accountRepository;
        private RolePermissionRepositoryInterface $rolePermissionRepository;

        public function __construct(
            UserRepositoryInterface           $userRepository,
            AccountRepositoryInterface        $accountRepository,
            RolePermissionRepositoryInterface $rolePermissionRepository
        )
        {
            $this->userRepository = $userRepository;
            $this->accountRepository = $accountRepository;
            $this->rolePermissionRepository = $rolePermissionRepository;
        }


        public function register(array $data)
        {
            return DB::transaction(function () use ($data) {
                $user = $this->userRepository->create([
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'password' => $data['password'],
                ]);

                $this->accountRepository->create([
                    'name' => $data['account'],
                    'user_id' => $user->id
                ]);

                $this->rolePermissionRepository->assignRoleToUser($user->id, 'admin');

                return $user;
            });
        }

    }
