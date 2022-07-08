<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/cliente')->group(function () {
    Route::get('', [App\Http\Controllers\ClienteController::class, 'index'])->name('cliente.index');
    Route::post('', [App\Http\Controllers\ClienteController::class, 'store'])->name('cliente.store');
    Route::get('/edit-cliente/{id}', [App\Http\Controllers\ClienteController::class, 'edit']);
    Route::put('/update-cliente/{id}', [App\Http\Controllers\ClienteController::class, 'update']);
    Route::delete('/delete-cliente/{id}', [App\Http\Controllers\ClienteController::class, 'destroy']);
    Route::get('/modificarStatus', [App\Http\Controllers\ClienteController::class, 'modificarStatus']);
    Route::get('/modificarStatusPagamento', [App\Http\Controllers\ClienteController::class, 'modificarStatusPagamento']);

});

Route::prefix('/dependente')->group(function () {
    Route::get('', [App\Http\Controllers\DependenteController::class, 'index'])->name('dependente.index');
    Route::post('', [App\Http\Controllers\DependenteController::class, 'store'])->name('dependente.store');
    Route::get('/fetch-dependente/{id}',[App\Http\Controllers\DependenteController::class, 'fetchdependente'])->name('dependente.fetch');
    Route::get('/edit-dependente/{id}', [App\Http\Controllers\DependenteController::class, 'edit']);
    Route::put('/update-dependente/{id}', [App\Http\Controllers\DependenteController::class, 'update']);
    Route::delete('/delete-dependente/{id}', [App\Http\Controllers\DependenteController::class, 'destroy']);
});



