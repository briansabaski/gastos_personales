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
        'password' =>($request->input('password')),
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

        public function show(string $id) {
        // 1. Buscar la transacción
        $user = $this->buscarUser($id);
        // 2. Si no existe, redirigir con error
        if(!$user){
            return redirect()
                ->route('user.index')
                ->with('error', 'Usuario no encontrado.');

        }
        // 3. Si existe, devolver la vista de transacciones.show
        return view('user.show', ['user'=>$user]);

    }

        public function edit(string $id) {
        // 1. Buscar la transacción
        $user = $this->buscarUser($id);
        // 2. Si no existe, redirigir con error
        if(!$user){
            return redirect()
                ->route('user.index')
                ->with('error', 'Usuario no encontrado.');

        }
        // 3. Si existe, devolver la vista de transacciones.show
        return view('user.edit', ['user'=>$user]);

    }


    public function update(Request $request, string $id) {
                //1. Leer datos del formulario (Se inyectan con la variable $request)
        //2. Validar datos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role_id' => 'required|integer',
            'name' => 'required|min:3|max:100',
        ]);
        //3. Actualizar los datos (en storage/app/datos/transacciones.json)
        $users = $this->leerUser();
        $encontrado = false;
    foreach ($users as $key => $user) {
        if ($user['user_id'] == $id) {
            $users[$key]['name'] = $request->input('name');
            $users[$key]['email'] = $request->input('email');
            $users[$key]['password'] = $request->input('password');
            $users[$key]['role_id'] = $request->input('role_id');
            $users[$key]['updated_at'] = now()->toDateTimeString();
            $encontrado = true;
            break;
        }
    }

    if (!$encontrado) {
        return redirect()->route('user.index')->with('error', 'Usuario no encontrado.');
    }

    $this->guardarUser($users);


        //4. Redirigir a una nueva ruta con un mensaje
        return redirect()
        ->route('user.index')
        ->with('exito', 'Usuario actualizado exitosamente.');
    }


    public function destroy(string $id) {
        return redirect()
        ->route('user.index')
        ->with('exito', 'Usuario eliminado exitosamente.');
    }

    private function leerUser(): array {
        $contenido = File::get($this->archivo);
        return json_decode($contenido, true);
    }

    private function guardarUser(array $user):void {
        $contenido = json_encode($user, JSON_PRETTY_PRINT);
        File::put($this->archivo, $contenido);
    }


        private function buscarUser(string $id): ?array {
        $users = $this->leerUser();
        foreach($users as $user) {
            if ($user['user_id'] == $id){
                return $user;
            }
        }
        return null;
    }
}
