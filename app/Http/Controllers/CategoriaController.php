<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            //Listar todas las categorias.
            $categorias = Categoria::orderBy('id', 'asc')->get();
            $response = $categorias;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
 /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        try {
            //Obtener una categoria.
            $categoria = Categoria::where('id', $id)->first();
            $response = $categoria;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    }
}
