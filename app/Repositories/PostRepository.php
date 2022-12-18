<?php

namespace App\Repositories;

use App\Interfaces\Repositories\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Support\Collection;

class PostRepository implements PostRepositoryInterface {

    /**
     * @return Collection
     */
    public function getList(): Collection {
        return collect(Post::query()->with(["user"])->get());
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id): mixed {
        return Post::with(["user"])->findOrFail($id);
    }

    /**
     * @param array $parameter
     * @return mixed
     */
    public function create(array $parameter): mixed {
        return Post::create($parameter);
    }
}
