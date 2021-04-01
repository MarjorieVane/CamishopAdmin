<?php

namespace App\Http\Controllers;

use App\Models\imagen;
use Illuminate\Http\Request;

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
        return view('imagen.index',compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imagen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        imagen::create($request->all());
        return redirect()->route('imagen.index')->with('success','Post created successfully.');
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
        return view('imagen.edit', compact('imagen'));
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
        $imagen->update($request->all());
    
        return redirect()->route('imagen.index')->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function destroy(imagen $imagen)
    {
        //
    }
}
