<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthJWT;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\PowerController;
use App\Http\Controllers\SpecificationController;
use App\Http\Controllers\MonsterController;

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

Route::controller(AuthController::class)->group(function () {
    Route::post('/auth/login', 'login');
});

Route::middleware('token')->group(function () {
    Route::controller(CategoryController::class)->group(function () {
        Route::post('/categories', 'store');
        Route::put('/categories/{id}', 'update');
        Route::delete('/categories/{id}', 'destroy');
    });
    Route::controller(TypeController::class)->group(function () {
        Route::post('/types', 'store');
        Route::put('/types/{id}', 'update');
        Route::delete('/types/{id}', 'destroy');
    });
    Route::controller(PowerController::class)->group(function () {
        Route::post('/powers', 'store');
        Route::put('/powers/{id}', 'update');
        Route::delete('/powers/{id}', 'destroy');
    });
    Route::controller(SpecificationController::class)->group(function () {
        Route::post('/specifications', 'store');
        Route::put('/specifications/{id}', 'update');
        Route::delete('/specifications/{id}', 'destroy');
    });

    Route::controller(MonsterController::class)->group(function () {
        Route::post('/monsters', 'store');
        Route::put('/monsters/{id}', 'update');
        Route::delete('/monsters/{id}', 'destroy');
        Route::post('/monsters/{id}/marks', 'marks');
    });

});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index');
    Route::get('/categories/{id}', 'show');
});

Route::controller(TypeController::class)->group(function () {
    Route::get('/types', 'index');
    Route::get('/types/{id}', 'show');
});

Route::controller(PowerController::class)->group(function () {
    Route::get('/powers', 'index');
    Route::get('/powers/{id}', 'show');
});

Route::controller(SpecificationController::class)->group(function () {
    Route::get('/specifications', 'index');
    Route::get('/specifications/{id}', 'show');
});

Route::controller(MonsterController::class)->group(function () {
    Route::get('/monsters', 'index');
    Route::get('/monsters/{id}', 'show');
});
