<?php

namespace App\Interfaces\Repositories;

interface UserRepositoryInterface {

    /**
     * @param int $id
     * @return mixed
     * @throw ModelNotFoundException
     */
    public function getById(int $id): mixed;

    /**
     * @param string $email
     * @return mixed
     */
    public function getByEmail(string $email): mixed;

    /**
     * @param array $parameter
     * @return mixed
     */
    public function createUser(array $parameter): mixed;

}
