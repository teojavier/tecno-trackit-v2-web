<?php

use App\Http\Controllers\Administrativo\MessengerController;
use App\Http\Controllers\Administrativo\UserController;
use App\Http\Controllers\Administrativo\CategoryController;
use App\Http\Controllers\Administrativo\DepartmentController;
use App\Models\Department;
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

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //USUARIOS
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');

     //CATEGORIAS
     Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
     Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
     Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
     Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
     Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
     
     //DEPARTAMENTOS
     Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
     Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
     Route::post('/departments/store', [DepartmentController::class, 'store'])->name('departments.store');
     Route::get('/departments/edit/{id}', [DepartmentController::class, 'edit'])->name('departments.edit');
     Route::post('/departments/update/{id}', [DepartmentController::class, 'update'])->name('departments.update');
 
    //MENSAJERIA
    Route::get('/messengers/solicitudes', [MessengerController::class, 'solicitudes'])->name('messengers.solicitudes');
    Route::get('/messengers/recomendaciones', [MessengerController::class, 'recomendaciones'])->name('messengers.recomendaciones');
    Route::get('/messengers/reclamos', [MessengerController::class, 'reclamos'])->name('messengers.reclamos');

    Route::get('/messengers/solicitudes/solicitar', [MessengerController::class, 'solicitar'])->name('messengers.solicitudes.solicitar');
    Route::get('/messengers/solicitudes/solicitar/show/{id}', [MessengerController::class, 'solicitudShow'])->name('messengers.solicitudes.solicitar.show');
    Route::post('/messengers/solicitudes/solicitar/store', [MessengerController::class, 'solicitarStore'])->name('messengers.solicitudes.solicitar.store');

   
});
