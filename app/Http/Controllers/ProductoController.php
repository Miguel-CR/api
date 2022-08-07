<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         try {
            //Listar todos los productos y sus respectivas caracteristcias.
            $productos = Producto::orderBy('id', 'asc')->with(['categoria'])->get();
            $response = $productos;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    }

    public function getProductosByCategoria($categoria_id)
    {
        try {
            //Listar todas las Habitaciones con sus tipos y caracteristicas por el tipo.
            $productos = Producto::where('categoria_id',$categoria_id)->with(['categoria'])->orderBy('id', 'asc')->get();
            $response = $productos;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
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

     //Validar
   public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nombre' => 'required|min:2', 'detalle' => 'required|min:5',
                'precio' => 'required|numeric', 'categoria_id' => 'required|numeric',
                'promocion'=>'required|boolean',
                // , 'img' => 'required|image'
            ]
        );
        if ($validator->fails()) {

            return response()->json($validator->messages(), 422);
        }
        try {

            $p = new Producto();
            $p->nombre = $request->input('nombre');
            $p->detalle = $request->input('detalle');
            $p->precio = $request->input('precio');
            $p->categoria_id = $request->input('categoria_id');
            $p->promocion = $request->input('promocion');



            // $png_url = "product-".time().".png";
            // $path = public_path().'img/producto/' . $png_url;
            //  Image::make(file_get_contents($data->base64_image))->save($path);
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $nombreImagen = time() . "foto." . $file->getClientOriginalExtension();
                $imageUpload = Image::make($file->getRealPath());
                $path = 'img-producto/';
                $imageUpload->save(public_path($path) . $nombreImagen);
                $p->imageName = $nombreImagen;
                $p->imagePath = url($path) . "/" . $nombreImagen;
             }



// if($request->img){

// }





            if ($p->save()) {

                $response = '¡El producto fue creado de manera satisfactoria!';
                return response()->json($response, 201);
            } else {
                $response = ['msg' => 'Error durante la creación del producto'];
                echo $response;
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }
 /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         try {
            //Obtener un producto con la categoria.
            $producto = Producto::where('id', $id)->with(['categoria'])->first();
            $response = $producto;
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                  'nombre' => 'required|min:2', 'detalle' => 'required|min:5',
                'precio' => 'required|numeric', 'categoria_id' => 'required|numeric',
                'promocion'=>'required|boolean',
            ]
        );
        if ($validator->fails()) {

            return response()->json($validator->messages(), 422);
        }

        $p = Producto::find($id);
        $p->nombre = $request->input('nombre');
        $p->detalle = $request->input('detalle');
        $p->precio = $request->input('precio');
        $p->categoria_id = $request->input('categoria_id');
        $p->promocion = $request->input('promocion');

        if ($request->hasFile('img')) {

            $roomImage = public_path("assets/img-producto/{$r->imageName}");
            if (File::exists($roomImage)) {
                //Borrar imagen anterior
                File::delete($roomImage);
            }

            $file = $request->file('img');
            $nombreImagen = time() . "foto." . $file->getClientOriginalExtension();
            $imageUpload = Image::make($file->getRealPath());
            $path = 'img-producto/';
            $imageUpload->save(public_path($path) . $nombreImagen);
            $p->imageName = $nombreImagen;
            $p->imagePath = url($path) . "/" . $nombreImagen;


        }

        if ($p->update()) {
            $response = '¡El producto fue satisfactoriamente actualizado!';
            return response()->json($response, 200);
        }
        $response = [
            'msg' => 'Error durante la actualización del producto'
        ];

        return response()->json($response, 404);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(producto $producto)
    {
        //
    }
}
