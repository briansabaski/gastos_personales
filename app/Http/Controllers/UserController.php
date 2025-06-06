<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Usuarios;

class UserController extends Controller
{
    public function index() {
        $datos = Usuarios::getDatos();
        return view('usuario', ['datos'=>$datos]);
    }
}
