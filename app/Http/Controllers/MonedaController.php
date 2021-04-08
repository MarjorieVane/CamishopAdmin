<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Moneda;
class MonedaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Moneda::paginate(10);
        //dd($monedas);
        return view('Moneda.index',compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);


        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('moneda.create');
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
            'Descripcion' => 'required',
            'Simbolo' => 'required',
            'Estado' => 'required',
        ]);
    
        Moneda::create($request->all());
     
        return redirect()->route('moneda.index')->with('success','Moneda Creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Moneda $moneda)
    {
        return view('Moneda.edit',compact('moneda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Moneda $moneda)
    {
        $request->validate([
            'Descripcion' => 'required',
            'Simbolo'     => 'required',
            'Estado'      => 'required',  
        ]);
    
        $moneda->update($request->all());
    
        return redirect()->route('moneda.index')->with('success','Moneda actualizada !');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Moneda $moneda)
    {
        $moneda->delete();
        return redirect()->route('moneda.index')->with('success','Moneda eliminada!');
    }
}
