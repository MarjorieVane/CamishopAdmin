<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
Use Alert;

class categoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = categoria::latest()->paginate(10);
    
        return view('categoria.index',compact('data'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
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
            'Nombre' => 'required|min:3',
            'Estado' => 'required',
         
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
    
        categoria::create($request->all());
        return redirect()->route('categoria.index')->with('toast_success','Categoria Creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(categoria $categoria)
    {
        //return view('categoria.show',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($IdCategoria)
    {
        $categoria=categoria::findOrFail($IdCategoria);
        return view('categoria.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,categoria $categoria )
    {
        $validator = Validator::make($request->all(), [
            'Nombre' => 'required|min:3',
            'Estado' => 'required',
            
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()-> all()[0])->withInput();
        }
    
        $categoria->update($request->all());
        return redirect()->route('categoria.index')->with('toast_success','Categoría Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categoria.index')->with('toast_success','Categoría eliminada');

      
    }
}
