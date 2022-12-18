<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/user/{id}', [UserController::class, "show"]);

Route::prefix("auth")->controller(AuthenticationController::class)->group(function() {
    Route::post("/login", "login");
});

Route::prefix("role")->controller(RoleController::class)->group(function() {
    Route::post("/", "store");
    Route::post("/add_permission", "addPermission");
});

Route::prefix("/posts")->controller(PostController::class)->group(function() {
    Route::get("/", "index");
    Route::get("/{id}", "show");
    Route::post("/", "store");
});
