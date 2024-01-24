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

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nombre-marca' => 'required|string',
                'descripcion' => 'required|string',
                'precio' => 'required|integer',
            ]);
    
            $marcaCelular = MarcaCelular::find($id);
    
            if (!$marcaCelular) {
                return response()->json(['error' => 'Marca de celular no encontrada'], 404);
            }
    
            $marcaCelular->update([
                'nombre-marca' => $request->input('nombre-marca'),
                'descripcion' => $request->input('descripcion'),
                'precio' => $request->input('precio'),
            ]);
    
            return response()->json([
                'message' => 'Marca de celular actualizada exitosamente',
                'marcaCelular' => $marcaCelular
            ]);
    
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al actualizar la marca de celular'], 500);
        }
    }
    
    public function destroy($id)
    {
        try {
            $marcaCelular = MarcaCelular::find($id);
    
            if (!$marcaCelular) {
                return response()->json(['error' => 'Marca de celular no encontrada'], 404);
            }
    
            $marcaCelular->delete();
    
            return response()->json(['message' => 'Marca de celular eliminada exitosamente']);
    
        } catch (Exception $e) {
            return response()->json(['error' => 'Error al eliminar la marca de celular por favor intento de nuevo'], 500);
        }
    }   
}