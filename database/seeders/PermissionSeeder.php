<?php

namespace Database\Seeders;

use App\Interfaces\Repositories\PermissionRepositoryInterface;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder {

    private PermissionRepositoryInterface $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository) {
        $this->permissionRepository = $permissionRepository;
    }

    public function run() {
        $this->permissionRepository->create(["name" => 'admin']);
        $this->permissionRepository->create(["name" => 'edit_post']);
    }
}
