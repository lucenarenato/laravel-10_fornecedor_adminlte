<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FornecedorController;
use Illuminate\Support\Facades\Auth;

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
Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('fornecedores');
    Route::get('/fornecedores/cadastro', [FornecedorController::class, 'create'])->name('cadastroFornecedores');
    Route::post('/fornecedores/store', [FornecedorController::class, 'store'])->name('cadastrarFornecedores');
    Route::get('fornecedores/{id}', [FornecedorController::class, 'view'])->name('viewFornecedores');
    Route::get('fornecedores/{id}/editar', [FornecedorController::class, 'editar'])->name('editarFornecedores');
    Route::put('/fornecedores/update/{id}', [FornecedorController::class, 'update'])->name('updateFornecedores');
    Route::delete('fornecedores/{id}', [FornecedorController::class, 'destroy'])->name('destroyFornecedores');

    Route::get('cidade/{name}', [CityController::class,'getByName']);

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
