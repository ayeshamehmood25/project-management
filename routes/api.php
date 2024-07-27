<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TimesheetController;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Laravel\Passport\Http\Controllers\AuthorizationController;
use Laravel\Passport\Http\Controllers\PersonalAccessTokenController;
use Laravel\Passport\Http\Controllers\TransientTokenController;
use Laravel\Passport\Http\Controllers\ClientController;
use Laravel\Passport\Http\Controllers\ScopeController;
use Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');

Route::middleware('auth:api')->group(function () {
    Route::post('/oauth/token', [AccessTokenController::class, 'issueToken']);
    Route::get('/oauth/authorize', [AuthorizationController::class, 'authorize']);
    Route::post('/oauth/token/refresh', [TransientTokenController::class, 'refresh']);
    Route::post('/oauth/personal-access-tokens', [PersonalAccessTokenController::class, 'store']);
    Route::delete('/oauth/personal-access-tokens/{token_id}', [PersonalAccessTokenController::class, 'destroy']);
    Route::resource('/oauth/clients', ClientController::class)->except(['create', 'edit']);
    Route::resource('/oauth/scopes', ScopeController::class)->only(['index']);
    Route::resource('/oauth/tokens', AuthorizedAccessTokenController::class)->only(['index', 'destroy']);
    Route::resource('users', UserController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('timesheets', TimesheetController::class);
});
