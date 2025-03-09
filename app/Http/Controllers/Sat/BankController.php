<?php

namespace App\Http\Controllers\Sat;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Resources\BankResource;
use App\Models\Bank;
use Illuminate\Http\JsonResponse;

class BankController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return ApiResponseClass::success(BankResource::collection(Bank::all()));
    }
}
