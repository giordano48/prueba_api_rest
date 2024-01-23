<?php



namespace App\Http\Controllers;

use App\Models\MarcaCelular;
use Illuminate\Http\Request;
use Exception;

class MarcaCelularController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Inicializar variables
            $marcaCelulares = MarcaCelular::all();

          
            return response()->json([
                'marcaCelulares' => $marcaCelulares
            ]);

        } catch (Exception $e) {
            // Caso de error
            return response()->json(['error' => 'Error al obtener datos de marcaCelulares'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre-marca' => 'required|string',
                'descripcion' => 'required|string',
                'precio' => 'required|integer',
            ]);

            $marcaCelular = MarcaCelular::create([
                'nombre-marca' => $request->input('nombre-marca'),
                'descripcion' => $request->input('descripcion'),
                'precio' => $request->input('precio'),
            ]);

            return response()->json([
                'message' => 'Marca de celular creada exitosamente',
                'marcaCelular' => $marcaCelular
            ]);

        } catch (Exception $e) {
            return response()->json(['error' => 'Error al crear la marca de celular'], 500);
        }
    }

   
}