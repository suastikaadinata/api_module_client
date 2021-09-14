<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/home', [InventoryController::class, 'index']);
Route::get('/add', [InventoryController::class, 'add']);
Route::post('/add', [InventoryController::class, 'addInventory']);
