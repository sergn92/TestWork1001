<?php

namespace Database\Seeders;

use App\Interfaces\Repositories\RoleRepositoryInterface;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder {

    private RoleRepositoryInterface $roleRepository;
    public function __construct(RoleRepositoryInterface $roleRepository) {
        $this->roleRepository = $roleRepository;
    }

    public function run() {
        $this->roleRepository->create(["name" => 'admin']);
        $this->roleRepository->create(["name" => 'editor']);
    }
}
