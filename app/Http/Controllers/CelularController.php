<?php

namespace App\Http\Controllers;

use App\Models\Celular;
use Illuminate\Http\Request;
use Exception;

class CelularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            //iniciar variables
            $celulares = Celular::all();

            return response()->json([
                'celulares' => $celulares
            ]);
        } catch (Exception $e){
            //caso de error
            return response()->json(['error'=>'error al obtener lso nombre de los celulares'], 500);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'Nombre_celular'=> 'required|string',
                'descripcion'=> 'required|string',
                'precio_unitario' => 'required|integer',
            ]);

            $celular = Celular::create([
                'Nombre_celular'=> $request->input('Nombre_celular'),
                'descripcion'=> $request->input('descripcion'),
                'precio_unitario' =>   $request->input('precio_unitario'),
            ]);
            
            return response()->json([
                'message' => 'Celular creado exitosamente',
                'celular' => $celular
            ]);
        
        } catch (Exception $e){
            return response()->json(['error' => 'Error al crear celular', 'details' => $e->getMessage()], 500);
        }
            
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Celular  $celular
     * @return \Illuminate\Http\Response
     */
    public function show(Celular $celular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Celular  $celular
     * @return \Illuminate\Http\Response
     */
    public function edit(Celular $celular)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Celular  $celular
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Celular $celular)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Celular  $celular
     * @return \Illuminate\Http\Response
     */
    public function destroy(Celular $celular)
    {
        //
    }
}
