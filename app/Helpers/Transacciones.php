<?php

namespace App\Helpers;

use Carbon\Carbon;

class Transacciones {
 public static function getDatos(): array {
    $ahora = Carbon::now(); 

    $transacciones = [
        [
            'user_id' => 1,
            'description' => 'Compra del supermecado',
            'amount' => 15004.23,
            'transaction_date' => '2025-01-14',
            'created_at' => $ahora,
            'updated_at' => $ahora,
        ],

        [
            'user_id' => 2,
            'description' => 'Pago factura electricidad',
            'amount' => 950000.21,
            'transaction_date' => '2025-05-14',
            'created_at' => $ahora,
            'updated_at' => $ahora,
        ],

        [
            'user_id' => 1,
            'description' => 'Cena en restaurante',
            'amount' => 8004.23,
            'transaction_date' => '2025-03-21',
            'created_at' => $ahora,
            'updated_at' => $ahora,
        ],
    ];


    return $transacciones;
 }
}