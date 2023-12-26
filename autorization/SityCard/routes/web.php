<?php

use App\Models\Role;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('index_admin');
    Route::delete('/delete-ticket/{id}', [App\Http\Controllers\AdminController::class, 'delete'])->name('delete_ticket');
    Route::post('/update-ticket/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('update_ticket');
    Route::put('/update-ticket/{id}', [App\Http\Controllers\AdminController::class, 'update_confirm'])->name('update_ticket');
    Route::get('/create-ticket', [App\Http\Controllers\AdminController::class, 'create'])->name('create_ticket');
    Route::post('/create-ticket', [App\Http\Controllers\AdminController::class, 'create_confirm'])->name('create_ticket');


});
