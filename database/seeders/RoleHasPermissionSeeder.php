<?php

namespace Database\Seeders;

use App\Interfaces\Repositories\PermissionRepositoryInterface;
use App\Interfaces\Repositories\RoleRepositoryInterface;
use App\Interfaces\Repositories\UserRepositoryInterface;
use Illuminate\Database\Seeder;

class RoleHasPermissionSeeder extends Seeder {

    private RoleRepositoryInterface $roleRepository;
    private PermissionRepositoryInterface $permissionRepository;
    private UserRepositoryInterface $userRepository;

    public function __construct(
        RoleRepositoryInterface $roleRepository,
        PermissionRepositoryInterface $permissionRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
        $this->userRepository = $userRepository;
    }

    public function run() {
        $roleAdmin = $this->roleRepository->getByName("admin");
        $roleEditor = $this->roleRepository->getByName("editor");
        $permissionAdmin = $this->permissionRepository->getByName("admin");
        $permissionEditor = $this->permissionRepository->getByName("edit_post");
        $userAdmin = $this->userRepository->getByEmail("admin@gmail.com");
        $userEditor = $this->userRepository->getByEmail("editor@gmail.com");

        $roleEditor->givePermissionTo($permissionEditor);
        $userEditor->assignRole("editor");

        $roleAdmin->givePermissionTo($permissionAdmin);
        $userAdmin->assignRole("admin");
    }
}
