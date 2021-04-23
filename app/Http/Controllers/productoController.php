<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Models\categoria;
use App\Models\marca;
use App\Models\proveedor;
use App\Models\Moneda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
Use Alert;

class productoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data1 = DB::select('CALL spr_sel_index_productos(1)');
        return view('producto.index')->with('contador', 0)->with('miprod', $data1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = categoria::where('Estado', '=', 1)->get();
        $marcas = marca::where('Estado', '=', 1)->get();
        $proveedores = proveedor::where('Estado', '=', 1)->get();
        $monedas = Moneda::where('Estado', '=', 1)->get();
        return view('producto.create', compact('categorias', 'marcas', 'proveedores', 'monedas'));
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
            'Descripcion' => 'required',
            'PrecioUnitario' => 'required',
            'Genero' => 'required',
            'Estado' => 'required',
            'IdCategoria' => 'required',
            'IdMarcas' => 'required',
            'IdEmpleado' => 'required',
            'IdProveedor' => 'required',
            'IdMoneda' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
    
        producto::create($request->all());
        return redirect()->route('producto.index')->with('toast_success','Producto Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(producto $producto)
    {
        $categorias = categoria::where('Estado', '=', 1)->get();
        $marcas = marca::where('Estado', '=', 1)->get();
        $proveedores = proveedor::where('Estado', '=', 1)->get();
        $monedas = Moneda::where('Estado', '=', 1)->get();
        return view('producto.edit', compact('producto', 'categorias', 'marcas', 'proveedores', 'monedas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, producto $producto)
    {
        $validator = Validator::make($request->all(), [
            'Nombre' => 'required|min:3',
            'Descripcion' => 'required',
            'PrecioUnitario' => 'required',
            'Genero' => 'required',
            'Estado' => 'required',
            'IdCategoria' => 'required',
            'IdMarcas' => 'required',
            'IdEmpleado' => 'required',
            'IdProveedor' => 'required',
            'IdMoneda' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
    
        $producto->update($request->all());
        return redirect()->route('producto.index')->with('toast_success','Producto Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(producto $producto)
    {
        $producto->delete();
    
        return redirect()->route('producto.index')->with('success','PRODUCTO BORRADO');
    }
}
