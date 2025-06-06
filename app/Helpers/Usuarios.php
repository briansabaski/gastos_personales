<?php

namespace App\Helpers;

use Carbon\Carbon;

class Usuarios {
 public static function getDatos(): array {
    $ahora = Carbon::now(); 

    $usuarios = [
        [
            'user_id' => 1,
            'name' => 'Geralt of Rivia',
            'email' => 'elbrujero@gmail.com',
            'password' => 'matabrujas123',
            'role_id' => '1',
            'email_verified_at' => $ahora,
            'remember_token' => "nope",
            'created_at' => $ahora,
            'updated_at' => $ahora,
        ],

        [
            'user_id' => 2,
            'name' => 'Joel Miller',
            'email' => 'joel_sara@gmail.com',
            'password' => 'apocalipsis123',
            'role_id' => '1',
            'email_verified_at' => $ahora,
            'remember_token' => "nope",
            'created_at' => $ahora,
            'updated_at' => $ahora,
        ],

        [
            'user_id' => 3,
            'name' => 'Golu',
            'email' => 'kamehameha@gmail.com',
            'password' => 'Genkidama',
            'role_id' => '1',
            'email_verified_at' => $ahora,
            'remember_token' => "nope",
            'created_at' => $ahora,
            'updated_at' => $ahora,
        ],
    ];


    return $usuarios;
 }
}