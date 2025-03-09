<?php

namespace App\Interfaces;

interface IssuerDetailRepositoryInterface
{
    public function createIssuerDetail(array $data);

    public function updateIssuerDetail(array $data, int $id);

}
