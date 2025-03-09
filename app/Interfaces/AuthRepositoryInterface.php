<?php

    namespace App\Interfaces;

    interface AuthRepositoryInterface
    {
        public function login(array $credentials);

        public function logout(string $token);

        public function me(string $token);
    }
