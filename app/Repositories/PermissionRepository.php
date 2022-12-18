<?php

namespace App\Repositories;

use App\Interfaces\Repositories\PermissionRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface {

    /**
     * @param int $id
     * @return mixed
     * @throw ModelNotFoundException
     */
    public function getById(int $id): mixed {
        return Permission::findOrFail($id);
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getByName(string $name): mixed {
        return Permission::where("name", $name)->first();
    }

    /**
     * @param array $parameter
     * @return Builder|Model
     */
    public function create(array $parameter): Builder|Model {
        return Permission::create($parameter);
    }
}
