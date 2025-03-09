<?php

    namespace App\Http\Controllers;

    use App\Classes\ApiResponseClass;
    use App\Http\Resources\GenderResource;
    use App\Models\Gender;
    use Illuminate\Http\JsonResponse;

    class GenderController extends Controller
    {

        public function __invoke(): JsonResponse
        {
            return ApiResponseClass::success(GenderResource::collection(Gender::all()));
        }
    }
