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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = imagen::latest()->paginate(10);
        $data1 = DB::select('CALL spr_sel_index_imagenes(?)', array($id));
        return view('producto.imagen.index',compact('data'))
                                                ->with('i', (request()->input('page', 1) - 1) * 5)
                                                ->with('contador', 0)
                                                ->with('idProd', $id)
                                                ->with('miimg', $data1);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('producto.imagen.create')->with('idProd', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'RutaImagen' => 'required|max:1000',
            'Estado' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        imagen::create($request->all());
        return redirect()->route('producto.imagen.index')->with('toast_success','Imagen Creada');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $idImg)
    {
        $imagen = imagen::find($idImg);
        return view('producto.imagen.edit', compact('imagen'))->with('idProd', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'RutaImagen' => 'required',
            'Estado' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $imagen->update($request->all());
        return redirect()->route('producto.imagen.index')->with('toast_success','Imagen Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function destroy(imagen $imagen)
    {
        $imagen->delete();
    
        return redirect()->route('imagen.index')->with('success','Imagen borrada');
    }
}
