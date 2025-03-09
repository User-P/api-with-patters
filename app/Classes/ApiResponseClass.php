<?php

    namespace App\Classes;

    use Exception;
    use Illuminate\Http\Exceptions\HttpResponseException;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    use Throwable;

    class ApiResponseClass
    {
        public static function success($data = null, $message = 'Operation successful', $code = 200): JsonResponse
        {
            return response()->json([
                'success' => true,
                'message' => $message,
                'data' => $data
            ], $code);
        }

        public static function error($message = 'An error occurred', $errors = [], $code = 500): JsonResponse
        {
            return response()->json([
                'success' => false,
                'message' => $message,
                'errors' => $errors
            ], $code);
        }

        public static function handleException(Throwable $exception): JsonResponse
        {
            Log::error('Exception: ', ['message' => $exception->getMessage(), 'trace' => $exception->getTraceAsString()]);

            return self::error(
                'An unexpected error occurred',
                config('app.debug') ? $exception->getMessage() : null);
        }
    }
