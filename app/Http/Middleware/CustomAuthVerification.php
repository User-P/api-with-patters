<?php

    namespace App\Http\Middleware;

    use App\Classes\ApiResponseClass;
    use Closure;
    use Laravel\Sanctum\PersonalAccessToken;

    class CustomAuthVerification
    {
        public function handle($request, Closure $next)
        {
            $token = $request->bearerToken();

            if ($token) {
                $tokenInstance = PersonalAccessToken::findToken($token);

                if (!$tokenInstance) {
                    return ApiResponseClass::success(null, 'Token inválido o no autenticado.', 401);
                }

                if ($tokenInstance->expires_at && now()->greaterThan($tokenInstance->expires_at)) {
                    return ApiResponseClass::success(null, 'Token expirado.', 401);
                }

                // Registrar la última vez que se usó el token
                $tokenInstance->forceFill(['last_used_at' => now()])->save();

                // Resolver el usuario autenticado
                $request->setUserResolver(function () use ($tokenInstance) {
                    return $tokenInstance->tokenable;
                });

                return $next($request);
            }

            return ApiResponseClass::success(null, 'No autenticado. Se requiere un token Bearer.', 401);
        }
    }
