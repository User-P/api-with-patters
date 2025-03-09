<?php

    namespace App\Repositories;

    use App\Interfaces\IssuerRepositoryInterface;
    use App\Models\Account;
    use App\Models\Issuer;

    class IssuerRepository implements IssuerRepositoryInterface
    {
        public function getAllIssuers(int $accountID, array $relations = [])
        {
            $account = Account::find($accountID);
            return $account->issuers()->with($relations)->get();
        }

        public function getIssuerById(int $id)
        {
            return Issuer::find($id);
        }

        public function createIssuer(array $data)
        {
            return Issuer::create($data);
        }

        public function updateIssuer(array $data, int $id)
        {
            return Issuer::find($id)->update($data);
        }

        public function deleteIssuer(int $id)
        {
            return Issuer::find($id)->delete();
        }

        public function createCertificate(array $data)
        {
            return Issuer::find($data['issuer_id'])->certificate()->create($data);
        }

        public function createIssuerDetails(int $issuerID, array $data)
        {
            return Issuer::find($issuerID)->issuerDetail()->create($data);
        }
    }
