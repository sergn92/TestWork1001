<?php

namespace App\Interfaces\Repositories;

interface PermissionRepositoryInterface {
    /**
     * @param int $id
     * @return mixed
     * @throw ModelNotFoundException
     */
    public function getById(int $id): mixed;

    /**
     * @param string $name
     * @return mixed
     */
    public function getByName(string $name): mixed;

    /**
     * @param array $parameter
     * @return mixed
     */
    public function create(array $parameter): mixed;
}
