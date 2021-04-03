<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proveedor;
use Illuminate\Support\Facades\Validator;
use DB;
Use Alert;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $proveedor = proveedor::latest()->paginate(10);
        return view('proveedor.index',compact('proveedor'))->with('i',(request()->input('page',1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('proveedor.create');
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
            'Contacto' => 'required',
            'TelefonoContacto' => 'required',
            'Estado' => 'required',
        ]);

        proveedor::create($request->all());

        return redirect()->route('proveedor.index')->with('success','Proveedor creado');

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
    public function edit(proveedor $proveedor)
    {
        //
        return view('proveedor.edit',compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, proveedor $proveedor)
    {
        $validator = Validator::make($request->all(), [
            'Nombre' => 'required',
            'Contacto' => 'required',
            'TelefonoContacto' => 'required',
            'Estado' => 'required',

        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
    
        $proveedor->update($request->all());
        return redirect()->route('proveedor.index')->with('toast_success','Proveedor Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
