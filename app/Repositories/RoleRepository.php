<?php

namespace App\Repositories;

use App\Interfaces\Repositories\RoleRepositoryInterface;
use \Illuminate\Database\Eloquent\Builder;
use \Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepositoryInterface {

    public function getById(int $id): mixed {
        return Role::findOrFail($id);
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getByName(string $name): mixed {
        return Role::where("name", $name)->first();
    }

    /**
     * @param array $parameter
     * @return Builder|Model
     */
    public function create(array $parameter): Builder|Model {
        return Role::create($parameter);
    }
}
