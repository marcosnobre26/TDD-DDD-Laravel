<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\ClinicController;
use App\Http\Controllers\Admin\SchedulingController;
use App\Http\Controllers\Admin\SpecialtyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfessionalController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\GalleriesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

use App\Http\Controllers\AuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/address', [AddressController::class, 'store']);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::post('refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
    Route::get('user-profile', [AuthController::class, 'userProfile'])->middleware('auth:api');

    Route::group(['prefix'=>'clinic'], function(){
        Route::get('/', [ClinicController::class, 'all'])->middleware('auth:api');
        Route::post('/', [ClinicController::class, 'store'])->middleware('auth:api');
        Route::put('/{id}', [ClinicController::class, 'update'])->middleware('auth:api');
        Route::get('/{id}', [ClinicController::class, 'get'])->middleware('auth:api');
        Route::delete('/{id}', [ClinicController::class, 'delete'])->middleware('auth:api');
    });

    Route::group(['prefix'=>'scheduling'], function(){
        Route::get('/', [SchedulingController::class, 'all'])->middleware('auth:api');
        Route::post('/', [SchedulingController::class, 'store'])->middleware('auth:api');
        Route::put('/{id}', [SchedulingController::class, 'update'])->middleware('auth:api');
        Route::get('/{id}', [SchedulingController::class, 'get'])->middleware('auth:api');
        Route::delete('/{id}', [SchedulingController::class, 'delete'])->middleware('auth:api');
    });

    Route::group(['prefix'=>'specialty'], function(){
        Route::get('/', [SpecialtyController::class, 'all'])->middleware('auth:api');
        Route::post('/', [SpecialtyController::class, 'store'])->middleware('auth:api');
        Route::put('/{id}', [SpecialtyController::class, 'update'])->middleware('auth:api');
        Route::get('/{id}', [SpecialtyController::class, 'get'])->middleware('auth:api');
        Route::delete('/{id}', [SpecialtyController::class, 'delete'])->middleware('auth:api');
    });

    Route::group(['prefix'=>'users'], function(){
        Route::get('/', [UserController::class, 'all'])->middleware('auth:api');
        Route::post('/', [UserController::class, 'store'])->middleware('auth:api');
        Route::put('/{id}', [UserController::class, 'update'])->middleware('auth:api');
        Route::get('/{id}', [UserController::class, 'get'])->middleware('auth:api');
        Route::delete('/{id}', [UserController::class, 'delete'])->middleware('auth:api');
    });

    Route::group(['prefix'=>'professionals'], function(){
        Route::get('/', [ProfessionalController::class, 'all'])->middleware('auth:api');
        Route::post('/', [ProfessionalController::class, 'store'])->middleware('auth:api');
        Route::put('/{id}', [ProfessionalController::class, 'update'])->middleware('auth:api');
        Route::get('/{id}', [ProfessionalController::class, 'get'])->middleware('auth:api');
        Route::delete('/{id}', [ProfessionalController::class, 'delete'])->middleware('auth:api');
    });

    Route::group(['prefix'=>'services'], function(){
        Route::get('/', [ServiceController::class, 'all'])->middleware('auth:api');
        Route::post('/', [ServiceController::class, 'store'])->middleware('auth:api');
        Route::put('/{id}', [ServiceController::class, 'update'])->middleware('auth:api');
        Route::get('/{id}', [ServiceController::class, 'get'])->middleware('auth:api');
        Route::delete('/{id}', [ServiceController::class, 'delete'])->middleware('auth:api');
    });

    Route::group(['prefix'=>'agendas'], function(){
        Route::get('/', [AgendaController::class, 'all'])->middleware('auth:api');
        Route::post('/', [AgendaController::class, 'store'])->middleware('auth:api');
        Route::put('/{id}', [AgendaController::class, 'update'])->middleware('auth:api');
        Route::get('/{id}', [AgendaController::class, 'get'])->middleware('auth:api');
        Route::delete('/{id}', [AgendaController::class, 'delete'])->middleware('auth:api');
    });

    Route::group(['prefix'=>'galleries'], function(){
        Route::get('/', [GalleriesController::class, 'all'])->middleware('auth:api');
        Route::post('/', [GalleriesController::class, 'store'])->middleware('auth:api');
        Route::put('/{id}', [GalleriesController::class, 'update'])->middleware('auth:api');
        Route::get('/{id}', [GalleriesController::class, 'get'])->middleware('auth:api');
        Route::delete('/{id}', [GalleriesController::class, 'delete'])->middleware('auth:api');
    });

});
