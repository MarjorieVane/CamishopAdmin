<?php

namespace App\Http\Controllers;

use App\Models\imagen;
use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
Use Alert;

class imagenController extends Controller
{
    public function index($id)
    {
        // imagenes del producto
        $imagenes = imagen::where('IdProducto', '=', $id)->paginate(10);
        // datos del producto
        $producto = producto::find($id);
        return view('producto.imagen.index', compact('imagenes'))
                                                ->with('i', (request()->input('page', 1) - 1) * 10)
                                                ->with('idProd', $id)
                                                ->with('nombreProd', $producto->Nombre);
    }

    public function create($id)
    {
        return view('producto.imagen.create')->with('idProd', $id);
    }

    public function store(Request $request, $id)
    {
        // la funcion dd lista en pantalla el contenido de request
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'RutaImagen' => 'required|max:1000',
            'Estado' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $imagen = new imagen();
        $imagen->IdProducto = $id;
        $imagen->RutaImagen = $request->input('RutaImagen');
        $imagen->Estado = $request->input('Estado');
        $imagen->save();
        return redirect('producto/'.$id.'/imagen')->with('toast_success','Imagen Creada');
    }

    public function edit($id, $idImg)
    {
        $imagen = imagen::find($idImg);
        return view('producto.imagen.edit', compact('imagen'))->with('idProd', $id)->with('idImg', $idImg);
    }

    public function update(Request $request, $id, $idImg)
    {
        $validator = Validator::make($request->all(), [
            'RutaImagen' => 'required|max:1000',
            'Estado' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        $imagen = imagen::find($idImg);
        $imagen->RutaImagen = $request->input('RutaImagen');
        $imagen->Estado = $request->input('Estado');
        $imagen->save();
        return redirect('producto/'.$id.'/imagen')->with('toast_success','Imagen Actualizada');
    }

    public function destroy(Request $request, $id, $idImg)
    {
        $imagen = imagen::find($idImg);
        $imagen->delete();
        return redirect('producto/'.$id.'/imagen')->with('toast_success','Imagen borrada');
    }
}
