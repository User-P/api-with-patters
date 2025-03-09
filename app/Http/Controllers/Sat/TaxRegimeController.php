<?php

    namespace App\Http\Controllers\Sat;

    use App\Classes\ApiResponseClass;
    use App\Http\Controllers\Controller;
    use App\Http\Resources\TaxRegimeResource;
    use App\Models\TaxRegime;
    use Illuminate\Http\JsonResponse;

    class TaxRegimeController extends Controller
    {
        public function __invoke(): JsonResponse
        {
            return ApiResponseClass::success(TaxRegimeResource::collection(TaxRegime::all()));
        }
    }
