<?php

	namespace App\Repositories;

	use App\Models\Account;
	use App\Interfaces\AccountRepositoryInterface;

	class AccountRepository implements AccountRepositoryInterface
	{
		public function index()
		{
			return Account::all();
		}

		public function create(array $data)
		{
			return Account::create($data);
		}
	}
