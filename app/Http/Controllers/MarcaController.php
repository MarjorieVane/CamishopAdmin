<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\marca;
use Illuminate\Support\Facades\Validator;
use DB;
Use Alert;
class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $marca = marca::latest()->paginate(10);
    
        return view('marca.index',compact('marca'))->with('i', (request()->input('page', 1) - 1) * 10);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('marca.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Nombre' => 'required',
            'Estado' => 'required',
        ]);

        marca::create($request->all());

        return redirect()->route('marca.index')->with('success','Marca creada');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(marca $marca)
    {
        //
        return view('marca.edit',compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, marca $marca)
    {
        $validator = Validator::make($request->all(), [
            'Nombre' => 'required',
            'Estado'=> 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
    
        $marca->update($request->all());
        return redirect()->route('marca.index')->with('toast_success','Marca Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(marca $marca)
    {
        //
        $marca->delete();
        return redirect()->route('marca.index')->with('success','Marca borrada');
        
    }
}
