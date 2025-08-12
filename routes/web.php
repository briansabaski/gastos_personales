<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaccionesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\ComprobantesController;
use App\Http\Controllers\CategoriasController;


Route::get('/inicio', function () {
    return view('welcome');
})->name('inicio');



Route::get('/numero_azar', function(){
// Genera un número aleatorio entre 1 y 100
$numero_aleatorio = rand(1, 100);


// Muestra el número generado
echo "Número aleatorio generado: " . $numero_aleatorio;

});

Route::get('/prueba', [PruebaController::class,  'index'])->name('prueba.index');


// Muestra pagina con listado de usuarios
Route::get('/user', [UserController::class, 'index'])->name('user.index');
// Muestra pagina con el formulario de creacion de usuarios
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');

// Muestra los datos del formulario de creacion de una usuarios
Route::post('/user', [UserController::class,  'store'])->name('user.store');

// Muestra pagina con listado de transacciones
Route::get('/transacciones', [TransaccionesController::class,  'index'])->name('transacciones.index');




/*// Muestra pagina con el formulario de creacion de transacciones
Route::get('/transacciones/create', [TransaccionesController::class, 'create'])->name('transacciones.create');

// Muestra los datos del formulario de creacion de una transaccion
Route::post('/transacciones', [TransaccionesController::class,  'store'])->name('transacciones.store');

// Muestra una transacción especifica
Route::get('/transacciones/{transaccion}', [TransaccionesController::class, 'show'])->name('transacciones.show');

// Muestra un formulario para editar una transacción especifica
Route::get('/transacciones/{transaccion}/edit', [TransaccionesController::class, 'edit'])->name('transacciones.edit');

// Actualiza una transacción especifica
Route::PUT('/transacciones/{transaccion}', [TransaccionesController::class, 'update'])->name('transacciones.update');

// Muestra un formulario para editar una transacción especifica
Route::delete('/transacciones/{transaccion}', [TransaccionesController::class, 'destroy'])->name('transacciones.destroy');*/

//Esto permite crear los 7 recursos (las 7 rutas de transacciones)
Route::resource('transacciones', TransaccionesController::class);

// Route::resource('transacciones', TransaccionesController::class)->except(['destroy']);  
//(el except al final nos permite evitar una aplicacion)

Route::resource('user', UserController::class);


Route::resource('comprobantes', ComprobantesController::class)
->except(['show', 'edit', 'update', 'destroy']);



// Creación de ruta para el examen
Route::resource('categorias', CategoriasController::class);











