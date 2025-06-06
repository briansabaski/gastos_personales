<?php

namespace App\Http\Controllers;

use App\Helpers\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    private $archivo;
    private $carpeta;

public function __construct()
{
    $this->carpeta = storage_path('app/datos');
    $this->archivo = $this->carpeta . '/user.json';

    //Crear carpeta storage/app/datos si no existe
    File::ensureDirectoryExists($this->carpeta);

    //Si el archivo user.json no existe, lo crea con un arreglo vacío
    if(!File::exists($this->archivo)){
        File::put($this->archivo, json_encode([]));
    }
}

    public function index() {
        $datos = $this->leerUser();
        return view('user.index', ['datos'=>$datos]);
    }

    public function create() {
        return view('user.create');

    }

    public function store(Request $request){
        //1. Leer datos del formulario (Se inyectan con la variable $request)
        //2. Validar datos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role_id' => 'required|integer',
            'name' => 'required|min:3|max:100',
        ]);
        //3. Guardar datos (en storage/app/datos/user.json)
    $nuevoUser = [
        'user_id' => 1,
        'name' => $request->input('name'),
        'password' => bcrypt($request->input('password')),
        'email' => $request->input('email'),
        'email_verified_at' => now()->toDateTimeString(),
        'remember_token' => null,
        'created_at' => now()->toDateTimeString(),
        'updated_at' => now()->toDateTimeString(),
        'role_id' => $request->input('role_id')
];


        $user = $this->leerUser();
        $user[] = $nuevoUser;
        $this->guardarUser($user);

        //4. Redirigir a una nueva ruta con un mensaje
        return redirect()
        ->route('user.index')
        ->with('exito', 'Usuario creado exitosamente.');
    }

    private function leerUser(): array {
        $contenido = File::get($this->archivo);
        return json_decode($contenido, true);
    }

    private function guardarUser(array $user):void {
        $contenido = json_encode($user, JSON_PRETTY_PRINT);
        File::put($this->archivo, $contenido);
    }
}
