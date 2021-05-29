<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Models\categoria;
use App\Models\marca;
use App\Models\proveedor;
use App\Models\Moneda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;
Use Alert;

class productoController extends Controller
{
    public function index()
    {
        $data0 = DB::select('CALL spr_sel_index_productos(1)');
        $productos = $this->paginate($data0, 10);
        return view('producto.index', compact('productos'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function paginate($items, $perPage)
    {
        $pageStart = \Request::get('page', 1);
        $offSet = ($pageStart * $perPage) - $perPage;
        $itemsForCurrentPage = array_slice($items, $offSet, $perPage, true);

        return new LengthAwarePaginator($itemsForCurrentPage, count($items), $perPage,Paginator::resolveCurrentPage(), array('path' => Paginator::resolveCurrentPath()));
    }

    public function create()
    {
        $categorias = categoria::where('Estado', '=', 1)->get();
        $marcas = marca::where('Estado', '=', 1)->get();
        $proveedores = proveedor::where('Estado', '=', 1)->get();
        $monedas = Moneda::where('Estado', '=', 1)->get();
        return view('producto.create', compact('categorias', 'marcas', 'proveedores', 'monedas'));
    }

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

    public function edit(producto $producto)
    {
        $categorias = categoria::where('Estado', '=', 1)->get();
        $marcas = marca::where('Estado', '=', 1)->get();
        $proveedores = proveedor::where('Estado', '=', 1)->get();
        $monedas = Moneda::where('Estado', '=', 1)->get();
        return view('producto.edit', compact('producto', 'categorias', 'marcas', 'proveedores', 'monedas'));
    }

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

    public function destroy(producto $producto)
    {
       //
    }
}
