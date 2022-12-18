<?php

namespace App\Http\Controllers;

use App\Interfaces\Repositories\PostRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    private PostRepositoryInterface $postRepository;
    public function __construct(PostRepositoryInterface $postRepository) {
        $this->postRepository = $postRepository;
    }

    public function index() {
        return response()->api($this->postRepository->getList());
    }

    public function show(int $id) {
        return response()->api($this->postRepository->getById($id));
    }

    public function store(Request $request) {

        if (!Auth::user() || (!Auth::user()->hasPermissionTo('edit_post') && !Auth::user()->hasPermissionTo('admin'))) {
            return response()->api([], "", 403);
        }

        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'content' => ['required'],
        ]);

        $validatedData['user_id'] = Auth::id();

        return response()->api($this->postRepository->create($validatedData));
    }
}
