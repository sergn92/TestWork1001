<?php

namespace App\Http\Controllers;

use App\Interfaces\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function show(Request $request): JsonResponse {
        $userId = $request->route('id');
        try {
            return response()->api($this->userRepository->getById($userId), "");
        } catch (ModelNotFoundException $e) {
            return response()->api([], $e->getMessage(), 400);
        }
    }
}
