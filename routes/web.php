<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaccionesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\ComprobantesController;
use App\Http\Controllers\CategoriasController;
use App\Models\Transaccion;
use App\Models\Usuario;


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


Route::get('/test', function() {
   // $transacciones = SELECT * FROM transacciones; 
    
    // $transacciones = Transaccion::all();

    // Obtener un registro de la tabla
    //$transacciones = Transaccion::find(1);
    //dd($transacciones);
    // El registro se busca, si no encuentra falla, se utiliza Transaccion::findOrFail(1)

   // $transaccion = Transaccion::where('id', 1)->get();
   // dd($transaccion);

   // Permite obtener los id que sean mayores a 1
    /*$transaccion = Transaccion::where('id', '>=', 1)
    ->select('descripcion')
    ->first();
    dd($transaccion);*/

    //INSERT FORMA LARGA
    /*
    $transaccion = new Transaccion();
    $transaccion->descripcion = 'Pagué Youtube';
    $transaccion->monto = 54000;
    $transaccion->fecha_transaccion = date('Y-m-d');
    $transaccion->save();

    $transacciones = Transaccion::all();
    dd($transacciones);*/

    //INSERT FORMA CORTA
/*  Transaccion::create([
        'descripcion' => 'Compré un juego en Steam',
        'monto' => 67000,
        'fecha_transaccion' => date('Y-m-d'),
    ]);

    $transacciones = Transaccion::all();
    dd($transacciones);/*

    // UPDATE
    
    /*Transaccion::where('id', 4)
    ->update([
        'monto' => 24654
    ]);
    $transacciones = Transaccion::all();
    dd($transacciones); */

    // DELETE
    // Transaccion::destroy(5);
   /*Transaccion::where('id', '>', 2)->delete();
    $transacciones = Transaccion::all();
    dd($transacciones);*/

    // $transacciones = Transaccion::withTrashed()  //onlyTrashed (Muestra solo los eliminados)
    // ->where('id', 4)->get();
    // dd($transacciones);



    // $usuarios = Usuario::create([
    //     'nombre' => 'Geralt',
    //     'email' => 'Geralt@gmail.com',
    //     'password' => 'espadachin123',
    //     'email_verificado' => now(),
    //     'rol_id' => 1,
    //     'remember_token' => 'Si'
    // ]);
    // $usuarios = Usuario::all();
    // dd($usuarios);
});










