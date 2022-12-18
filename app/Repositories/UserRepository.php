<?php

namespace App\Repositories;

use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface {

    /**
     * @param int $id
     * @return mixed
     * @throw ModelNotFoundException
     */
    public function getById(int $id): mixed {

        return User::findOrFail($id);
    }

    /**
     * @param string $email
     * @return mixed
     */
    public function getByEmail(string $email): mixed {
        return User::where("email", $email)->first();
    }

    /**
     * @param array $parameter
     * @return mixed
     */
    public function createUser(array $parameter): mixed {
        return User::create($parameter);
    }
}
