<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class CategoriasController extends Controller
{
    private $archivo;
    private $carpeta;

public function __construct()
{
    $this->carpeta = storage_path('app/datos');
    $this->archivo = $this->carpeta . '/categorias.json';

    //Crear carpeta storage/app/datos si no existe
    File::ensureDirectoryExists($this->carpeta);
 
    //Si el archivo transacciones.json no existe, lo crea con un arreglo vacío
    if(!File::exists($this->archivo)){
        File::put($this->archivo, json_encode([])); 
    }
}


    public function index()
    {
        $datos = $this->leerCategorias();
        return view('categorias.index', ['datos'=>$datos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
               // 1. Buscar la transacción
        $categoria = $this->buscarCategoria($id);
        // 2. Si no existe, redirigir con error
        if(!$categoria){
            return redirect()
                ->route('categorias.index')
                ->with('error', 'Categoría no encontrada.');

        }
        // 3. Si existe, devolver la vista de categoriass.show
        return view('categorias.show', ['categoria'=>$categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

        private function leerCategorias(): array {
        $contenido = File::get($this->archivo);
        return json_decode($contenido, true);
    }


        private function buscarCategoria(string $id): ?array {
        $categorias = $this->leerCategorias();
        foreach($categorias as $categoria) {
            if ($categoria['id'] == $id){
                return $categoria;
            }
        }
        return null;
    }
}
