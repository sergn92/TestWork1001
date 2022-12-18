<?php

namespace Database\Seeders;

use App\Interfaces\Repositories\UserRepositoryInterface;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder {

    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function run(): void {

        $this->userRepository->createUser([
            'name' => Str::random(10),
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $this->userRepository->createUser([
            'name' => Str::random(10),
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $this->userRepository->createUser([
            'name' => Str::random(10),
            'email' => 'editor@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }

}
