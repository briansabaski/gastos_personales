<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaccionesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PruebaController;

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

//Muestra pagina con listado de transacciones
Route::get('/transacciones', [TransaccionesController::class,  'index'])->name('transacciones.index');

//Muestra pagina con listado de usuarios
Route::get('/user', [UserController::class, 'index'])->name('user.index');

//Muestra pagina con el formulario de creacion de transacciones
Route::get('/transacciones/create', [TransaccionesController::class, 'create'])->name('transacciones.create');

//Muestra los datos del formulario de creacion de una transaccion
Route::post('/transacciones', [TransaccionesController::class,  'store'])->name('transacciones.store');


//Muestra pagina con el formulario de creacion de usuarios
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');

//Muestra los datos del formulario de creacion de una usuarios
Route::post('/user', [UserController::class,  'store'])->name('user.store');





