<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Models\categoria;
use App\Models\marca;
use App\Models\proveedor;
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
        $data = producto::latest()->paginate(10);
        $data1 = DB::select('CALL spr_sel_index_productos(1)');
        return view('producto.index', compact('data'))
                                    ->with('i', (request()->input('page', 1) - 1) * 10)
                                    ->with('contador', 0)
                                    ->with('miprod', $data1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data1['games'] = ['AC', 'Zelda', 'Apex'];
        $data1['consolas'] = ['suish', 'xbox', 'ps4'];
        $categorias = categoria::where('Estado', '=', 1)->get();
        $marcas = marca::where('Estado', '=', 1)->get();
        $proveedores = proveedor::where('Estado', '=', 1)->get();
        return view('producto.create', $data1, compact('categorias', 'marcas', 'proveedores'));
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
            'IdProveedor' => 'required'
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
        $data1['games'] = ['AC', 'Zelda', 'Apex'];
        $data1['consolas'] = ['suish', 'xbox', 'ps4'];
        $categorias = categoria::where('Estado', '=', 1)->get();
        $marcas = marca::where('Estado', '=', 1)->get();
        $proveedores = proveedor::where('Estado', '=', 1)->get();
        return view('producto.edit', $data1, compact('producto', 'categorias', 'marcas', 'proveedores'));
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
            'IdProveedor' => 'required'
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
