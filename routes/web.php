<?php


use App\Http\Controllers\Administrativo\SoporteIAController;
use App\Http\Controllers\Administrativo\ArticleController;
use App\Http\Controllers\Administrativo\MessengerController;
use App\Http\Controllers\Administrativo\UserController;
use App\Http\Controllers\Administrativo\CategoryController;
use App\Http\Controllers\Administrativo\DepartmentController;
use App\Http\Controllers\Administrativo\MoraController;
use App\Http\Controllers\Cliente\CMessegerController;
use App\Http\Controllers\Controller;
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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [Controller::class, 'index'])->name('dashboard');

    //USUARIOS
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');


    // Soporte IA
    Route::get('/soporte-ia', [SoporteIAController::class, 'index'])->name('soporte-ia.index');

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

    Route::get('/messengers/recomendaciones/recomendar', [MessengerController::class, 'recomendar'])->name('messengers.recomendaciones.recomendar');
    Route::post('/messengers/recomendaciones/recomendar/store', [MessengerController::class, 'recomendarStore'])->name('messengers.recomendaciones.recomendar.store');

    Route::get('/messengers/reclamos/reclamar', [MessengerController::class, 'reclamar'])->name('messengers.reclamos.reclamar');
    Route::post('/messengers/reclamos/reclamar/store', [MessengerController::class, 'reclamarStore'])->name('messengers.reclamos.reclamar.store');

    //MORA
    Route::get('/moras', [MoraController::class, 'index'])->name('moras.index');

     //MENSAJERIA CLIENTE
     Route::get('/messengers/cliente/solicitudes', [CMessegerController::class, 'solicitudes'])->name('messengers.clientes.solicitudes');
     Route::get('/messengers/cliente/recomendaciones', [CMessegerController::class, 'recomendaciones'])->name('messengers.clientes.recomendaciones');
     Route::get('/messengers/cliente/reclamos', [CMessegerController::class, 'reclamos'])->name('messengers.clientes.reclamos');

     Route::get('/messengers/cliente/solicitudes/solicitar', [CMessegerController::class, 'solicitar'])->name('messengers.clientes.solicitudes.solicitar');
     Route::get('/messengers/cliente/solicitudes/solicitar/show/{id}', [CMessegerController::class, 'solicitudShow'])->name('messengers.clientes.solicitudes.solicitar.show');
     Route::post('/messengers/cliente/solicitudes/solicitar/store', [CMessegerController::class, 'solicitarStore'])->name('messengers.clientes.solicitudes.solicitar.store');

     Route::get('/messengers/cliente/recomendaciones/recomendar', [CMessegerController::class, 'recomendar'])->name('messengers.clientes.recomendaciones.recomendar');
     Route::post('/messengers/cliente/recomendaciones/recomendar/store', [CMessegerController::class, 'recomendarStore'])->name('messengers.clientes.recomendaciones.recomendar.store');
 
     Route::get('/messengers/cliente/reclamos/reclamar', [CMessegerController::class, 'reclamar'])->name('messengers.clientes.reclamos.reclamar');
     Route::post('/messengers/cliente/reclamos/reclamar/store', [CMessegerController::class, 'reclamarStore'])->name('messengers.clientes.reclamos.reclamar.store');
 
    //ARTICULOS
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles/store', [ArticleController::class, 'store'])->name('articles.store');
    Route::post('/ckeditor/upload_image', [ArticleController::class, 'uploadImage'])->name('upload');
    Route::get('/articles/edit/{id}', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::post('/articles/update/{id}', [ArticleController::class, 'update'])->name('articles.update');
    Route::get('/articles/show/{id}', [ArticleController::class, 'show'])->name('articles.show');

});
