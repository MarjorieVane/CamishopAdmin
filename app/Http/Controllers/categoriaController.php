<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;

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
        $request->validate([
            'Nombre' => 'required',
            'Estado' => 'required',
        ]);
    
        categoria::create($request->all());
     
        return redirect()->route('categoria.index')->with('success','Categoría creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
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
    public function update(Request $request, $IdCategoria)
    {
        $request->validate([
            
            'Nombre' => 'required',
            'Estado' => 'required',
           
        ]);
    
        $dcategoria=request()->except(['_token','_method']);
        categoria::where('IdCategoria','=',$IdCategoria)->update($dcategoria);
        return redirect()->route('categoria.index')
                        ->with('success','Categoría actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$IdCategoria)
    {


        $dcategoria=request()->except(['_token','_method']);
        categoria::where('IdCategoria','=',$IdCategoria)->delete($dcategoria);
        return redirect()->route('categoria.index')
                        ->with('success','Categoría eliminada');

      
    }
}
