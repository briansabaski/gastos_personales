<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaccion extends Model
{
    use SoftDeletes;
    
    // Indicar a Laravel que la tabla relacionada se llama Transacciones
    protected $table = 'transacciones';

   // protected $fillable = ['descripcion', 'monto', 'fecha_transaccion'];

    //Permitir usar create() para crear una transaccion
    protected $guarded = [];

}
