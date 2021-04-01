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
    public function index()
    {
        $data = imagen::latest()->paginate(10);
        $data1 = DB::select('CALL spr_sel_index_imagenes(1)');
        return view('imagen.index',compact('data'))
                                                ->with('i', (request()->input('page', 1) - 1) * 5)
                                                ->with('contador', 0)
                                                ->with('miimg', $data1);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = producto::where('Estado', '=', 1)->get();
        return view('imagen.create', compact('producto'));
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
            'IdProducto' => 'required',
            'RutaImagen' => 'required|max:1000',
            'Estado' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        imagen::create($request->all());
        return redirect()->route('imagen.index')->with('toast_success','Imagen Creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function show(imagen $imagen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function edit(imagen $imagen)
    {
        $producto = producto::where('Estado', '=', 1)->get();
        return view('imagen.edit', compact('imagen', 'producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, imagen $imagen)
    {
        $validator = Validator::make($request->all(), [
            'IdProducto' => 'required',
            'RutaImagen' => 'required',
            'Estado' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $imagen->update($request->all());
        return redirect()->route('imagen.index')->with('toast_success','Imagen Actualizada');
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
