<?php

namespace App\Interfaces\Repositories;

interface PostRepositoryInterface {

    /**
     * @return mixed
     * @throw ModelNotFoundException
     */
    public function getList(): mixed;
    /**
     * @param int $id
     * @return mixed
     * @throw ModelNotFoundException
     */
    public function getById(int $id): mixed;

    /**
     * @param array $parameter
     * @return mixed
     */
    public function create(array $parameter): mixed;
}
