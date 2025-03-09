<?php

    namespace App\Interfaces;

    interface AccountRepositoryInterface
    {
        public function index();

        public function create(array $data);
    }
