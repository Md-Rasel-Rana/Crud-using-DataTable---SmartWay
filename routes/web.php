<?php

use App\Http\Controllers\DemoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [DemoController::class,'UserForm']);
Route::post('/send-user-Data', [DemoController::class,'UserSubmitForm']);
Route::get('/List-data', [DemoController::class,'UserData']);
Route::get('/delete-user/{id}', [DemoController::class,'UserDelete']);
Route::delete('/delete-user/{id}', [DemoController::class,'UserDelete']);

// Route for fetching user data
Route::get('/get-user/{id}', [DemoController::class,'getUser']);

// Route for updating user data
Route::put('/update-user/{id}', [DemoController::class,'updateUser']);





