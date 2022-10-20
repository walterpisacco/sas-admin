<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\TypeOfCaseController;
use App\Http\Controllers\UserController;
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
    return view('admin/welcome');
})->name('index');

//Route::prefix('admin')->group(function () {
    
    Route::get('/login',[UserController::class,'loginView'])->name('usuario.login.view');
    Route::post('/login',[UserController::class,'login'])->name('admin.login');
    
    Route::middleware(['auth','verified'])->group(function () {
        Route::get('/menu',[UserController::class,'menu'])->name('admin.menu');
        Route::get('/usuarios',[UserController::class,'index'])->name('admin.usuarios');
        Route::get('/usuario/create', [UserController::class,'create'])->name('admin.usuario.create');
        Route::post('/usuario/store', [UserController::class,'store'])->name('admin.usuario.store'); 
        Route::get('/usuario/edit/{usuario}', [UserController::class,'edit'])->name('admin.usuario.edit'); 
        Route::post('/usuario/update/{usuario}', [UserController::class,'update'])->name('admin.usuario.update');
        Route::post('/usuario/delete/{usuario}', [UserController::class,'destroy'])->name('admin.usuario.delete');

        Route::get('/tiposTs',[TypeOfCaseController::class,'index'])->name('admin.tiposTs');
        Route::get('/tiposT/create', [TypeOfCaseController::class,'create'])->name('admin.tiposT.create');
        Route::post('/tiposT/store', [TypeOfCaseController::class,'store'])->name('admin.tiposT.store'); 
        Route::get('/tiposT/edit/{tipo}', [TypeOfCaseController::class,'edit'])->name('admin.tiposT.edit'); 
        Route::post('/tiposT/update/{tipo}', [TypeOfCaseController::class,'update'])->name('admin.tiposT.update');
        Route::post('/tiposT/delete/{tipo}', [TypeOfCaseController::class,'destroy'])->name('admin.tiposT.delete');

        Route::get('/clientes',[ClientController::class,'index'])->name('usuario.clientes');
        Route::get('/clientes/create', [ClientController::class,'create'])->name('usuario.cliente.create');
        Route::post('/clientes/store', [ClientController::class,'store'])->name('usuario.cliente.store'); 
        Route::get('/clientes/edit/{cliente}', [ClientController::class,'edit'])->name('usuario.cliente.edit'); 
        Route::post('/clientes/update/{cliente}', [ClientController::class,'update'])->name('usuario.cliente.update');
        Route::post('/clientes/delete', [ClientController::class,'destroy'])->name('usuario.cliente.delete');

        Route::post('/logout',[UserController::class,'logout'])->name('admin.logout');
   });

//});
