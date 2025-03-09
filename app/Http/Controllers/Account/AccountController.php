<?php

namespace App\Http\Controllers\Account;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Interfaces\AccountRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    private AccountRepositoryInterface $accountRepositoryInterface;

    public function __construct(AccountRepositoryInterface $accountRepositoryInterface)
    {
        $this->accountRepositoryInterface = $accountRepositoryInterface;
    }

    public function index(): JsonResponse
    {
        $data = $this->accountRepositoryInterface->index();

        return ApiResponseClass::success($data, 'Data retrieved successfully');
    }
}
