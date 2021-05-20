<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use Illuminate\Http\Request;
use DB;
Use Alert;
class pedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Consulto los pedidos exceptuando los que estén en estado (Rechazado o Entregado)
        $data = pedidos::latest()->paginate(10);
        $data1 = DB::select('CALL spr_sel_index_pedidos()');
        return view('pedidos.index', compact('data'))
                                    ->with('i', (request()->input('page', 1) - 1) * 10)
                                    ->with('contador', 0)
                                    ->with('peds', $data1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function show(pedidos $pedidos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function edit($PedidoNo)
    {   
        
        $ped = DB::select('CALL spr_sel_edit_pedidos("'.$PedidoNo.'")');
        return view('pedidos.edit',compact('ped',$ped));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pedidos $pedidos)
    {
        $idp=$request->input('idpedido');
        $estado=$request->input('Estado');
        $comentario=$request->input('Comentario');

        $respuesta = DB::select('call spr_upd_edit_pedidos(?,?,?)',array($idp,$estado,$comentario));
        
        /*if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }*/

        return redirect()->route('pedidos.index')->with('toast_success','Pedido actualizado');;

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pedidos  $pedidos
     * @return \Illuminate\Http\Response
     */
    public function destroy(pedidos $pedidos)
    {
        //
    }
}
