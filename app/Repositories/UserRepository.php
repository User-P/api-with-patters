<?php

	namespace App\Repositories;

	use App\Interfaces\UserRepositoryInterface;
	use App\Models\User;

	class UserRepository implements UserRepositoryInterface
	{
		public function create(array $data)
		{
			return User::create($data);
		}

		public function update(array $data, int $id)
		{
			$user = User::find($id);
			$user->update($data);
			return $user;
		}
	}
