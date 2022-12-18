<?php

namespace App\Interfaces\Repositories;

use \Illuminate\Database\Eloquent\Builder;
use \Illuminate\Database\Eloquent\Model;

interface RoleRepositoryInterface {
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
     * @return Builder|Model
     */
    public function create(array $parameter): Builder|Model;
}
