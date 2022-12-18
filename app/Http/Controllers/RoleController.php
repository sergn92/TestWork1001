<?php

namespace App\Http\Controllers;

use App\Interfaces\Repositories\PermissionRepositoryInterface;
use App\Interfaces\Repositories\RoleRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{

    private RoleRepositoryInterface $roleRepository;
    private PermissionRepositoryInterface $permissionRepository;
    public function __construct(RoleRepositoryInterface $roleRepository, PermissionRepositoryInterface $permissionRepository) {
        $this->middleware('auth:api');
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function store(Request $request) {
        if (!Auth::user()->hasPermissionTo('admin')) {
            return response()->api([], "", 403);
        }

        $validatedData = $request->validate([
            'name' => ['required', 'unique:roles', 'max:255'],
            'guard_name' => ['max:255'],
        ]);

        try {
            return response()->api($this->roleRepository->create($validatedData));
        } catch (\Exception $e) {
            return response()->api($e, $e->getMessage(), 500);
        }
    }

    public function addPermission(Request $request) {
        if (!Auth::user()->hasPermissionTo('admin')) {
            return response()->api([], "", 403);
        }

        $validatedData = $request->validate([
            'role_id' => ['required', 'exists:roles,id'],
            'permission_id' => ['required', 'exists:permissions,id'],
        ]);

        $role = $this->roleRepository->getById($validatedData['role_id']);
        $permission = $this->permissionRepository->getById($validatedData['permission_id']);

        $role->givePermissionTo($permission);

        return response()->api([]);
    }
}
