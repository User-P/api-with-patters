<?php

    namespace App\Services;

    use App\Interfaces\IssuerRepositoryInterface;
    use App\Interfaces\RolePermissionRepositoryInterface;
    use App\Interfaces\UserRepositoryInterface;
    use App\Models\Account;
    use Illuminate\Support\Facades\DB;

    class IssuerService
    {
        protected IssuerRepositoryInterface $issuerRepo;
        protected UserRepositoryInterface $userRepo;
        protected RolePermissionRepositoryInterface $rolePermissionRepository;

        public function __construct(
            IssuerRepositoryInterface         $issuerRepo,
            UserRepositoryInterface           $userRepo,
            RolePermissionRepositoryInterface $rolePermissionRepository
        )
        {
            $this->issuerRepo = $issuerRepo;
            $this->userRepo = $userRepo;
            $this->rolePermissionRepository = $rolePermissionRepository;
        }

        public function createIssuerWithUser(Account $account, array $data)
        {
            return DB::transaction(function () use ($data, $account) {
                $user = $this->userRepo->create($data);
                $data['user_id'] = $user->id;
                $issuer = $this->issuerRepo->createIssuer($data);
                $issuer->accounts()->attach($account->id);
                $this->rolePermissionRepository->assignRoleToUser($user->id, 'issuer');
                return $issuer;
            });
        }

        public function updateIssuerWithUser(array $data, int $id)
        {
            return DB::transaction(function () use ($data, $id) {
                $issuer = $this->issuerRepo->getIssuerById($id);
                if (!$issuer) {
                    return null;
                }
                $userData = collect($data)->only(['name', 'email', 'password'])->toArray();
                $issuerData = collect($data)->only(['business_name'])->toArray();
                $this->userRepo->update($userData, $issuer->user_id);
                $this->issuerRepo->updateIssuer($issuerData, $id);
                return $issuer->refresh();
            });
        }

        public function createIssuerWithDetails(int $accountID, array $data)
        {
            return DB::transaction(function () use ($data, $accountID) {

                $user = $this->userRepo->create([
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'password' => bcrypt($data['password_account'])
                ]);

                $issuer = $this->issuerRepo->createIssuer([
                    'business_name' => $data['business_name'],
                    'user_id' => $user->id,
                    'rfc' => $data['rfc'],
                    'postal_code' => $data['postal_code'],
                    'regime_id' => $data['regime_id'],
                ]);

                $issuer->accounts()->attach($accountID);

                $this->rolePermissionRepository->assignRoleToUser($user->id, 'issuer');

                $this->issuerRepo->createIssuerDetails($issuer->id,[
                    'curp' => $data['curp'],
                    'name' => $data['name'],
                    'last_name' => $data['last_name'],
                    'second_last_name' => $data['second_last_name'],
                    'birth_date' => $data['birth_date'],
                    'entity_birth' => $data['entity_birth'],
                    'gender_id' => $data['gender_id'],
                    'bank_id' => $data['bank_id'],
                    'clabe' => $data['clabe'],
                    'account_number' => $data['account_number'],
                ]);

                $this->issuerRepo->createCertificate([
                    'issuer_id' => $issuer->id,
                    'cer' => $data['cer'] ?? null,
                    'key' => $data['key'] ?? null,
                    'password_certificate' => $data['password_certificate'],
                ]);

                return $issuer;

            });
        }
    }
