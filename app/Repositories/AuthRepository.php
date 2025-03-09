<?php

    namespace App\Repositories;

    use App\Interfaces\AuthRepositoryInterface;
    use App\Models\User;
    use Illuminate\Support\Facades\Hash;
    use Laravel\Sanctum\PersonalAccessToken;

    class AuthRepository implements AuthRepositoryInterface
    {

        public function login(array $credentials)
        {
            $user = User::where('email', $credentials['email'])->first();

            if (!$user || !Hash::check($credentials['password'], $user->password)) {
                return null;
            }

            return $user->createToken('API Token', [], now()->addDays(7))->plainTextToken;
        }

        public function logout(string $token)
        {
            $token = PersonalAccessToken::findToken($token);
            $token->delete();
        }

        public function me(string $token)
        {
            $tokenInstance = PersonalAccessToken::findToken($token);
            return $tokenInstance?->tokenable;
        }
    }
