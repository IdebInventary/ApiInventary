<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EntranceController; // Add this line
use App\Http\Controllers\OutputController; // Add this line
use App\Http\Controllers\LoanController; // Add this line

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
    
//Rutas de productos
Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

//Rutas de productos
Route::get('/suppliers', [SupplierController::class, 'index']);
Route::post('/suppliers', [SupplierController::class, 'store']);
Route::get('/suppliers/{id}', [SupplierController::class, 'show']);
Route::put('/suppliers/{id}', [SupplierController::class, 'update']);
Route::delete('/suppliers/{id}', [SupplierController::class, 'destroy']);

//Rutas de projects
Route::get('/projects', [ProjectController::class, 'index']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::put('/projects/{id}', [ProjectController::class, 'update']);
Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);

// Add entrace
Route::post('/entrances', [EntranceController::class, 'store']);
Route::get('/entrances', [EntranceController::class, 'index']);
Route::get('/entrances/{id}', [EntranceController::class, 'show']);
Route::put('/entrances/{id}', [EntranceController::class, 'update']);
Route::delete('/entrances/{id}', [EntranceController::class, 'destroy']);

// Add Output
Route::post('/outputs', [OutputController::class, 'store']);
Route::get('/outputs', [OutputController::class, 'index']);
Route::get('/outputs/{id}', [OutputController::class, 'show']);
Route::put('/outputs/{id}', [OutputController::class, 'update']);
Route::delete('/outputs/{id}', [OutputController::class, 'destroy']);


// Add Loans
Route::post('/loans', [LoanController::class, 'store']);
Route::get('/loans', [LoanController::class, 'index']);
Route::get('/loans/{id}', [LoanController::class, 'show']);
Route::put('/loans/{id}', [LoanController::class, 'update']);
Route::delete('/loans/{id}', [LoanController::class, 'destroy']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

 
}); // Add this closing bracket