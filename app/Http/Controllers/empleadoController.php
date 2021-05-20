<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\empleado;
use Illuminate\Http\Request;
use DB;
Use Alert;
class empleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $data = empleado::latest()->paginate(10);
    
        return view('empleado.index',compact('data'))->with('i', (request()->input('page', 1) - 1) * 10);*/
        $data = empleado::latest()->paginate(10);
        $data1 = DB::select('CALL spr_sel_index_empleados()');
        return view('empleado.index', compact('data'))
                                    ->with('i', (request()->input('page', 1) - 1) * 10)
                                    ->with('contador', 0)
                                    ->with('miemp', $data1);

                                    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('empleado.create');
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
            'NombreCompleto' => 'required',
            'email' => 'required',
            'password' => 'required',
            'Estado' => 'required',
        ]);
        $nombre=$request->input("NombreCompleto");
        $email=$request->input("email");
        $password=$request->input("password");
        $password2=Hash::make($password);
        $estado=$request->input("Estado");
        
        $respuesta = DB::select('CALL spr_ins_create_empleados(?,?,?,?)',array($nombre,$email,$password2,$estado));
        
     
        return redirect()->route('empleado.index')->with('toast_success','Categoria Creada');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($IdEmpleado)
    {
        $empleado = DB::select('CALL spr_sel_edit_empleados("'.$IdEmpleado.'")');
        //$empleado=empleado::findOrFail($IdEmpleado);
        return view('empleado.edit',compact('empleado',$empleado));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, empleado $empleado)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(empleado $empleado)
    {
        //
    }
}
