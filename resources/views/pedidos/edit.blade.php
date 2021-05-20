@extends('layouts.app', ['activePage' => 'pedidos', 'titlePage' => __('pedidos')])
   
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-tabs card-header-success">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <h4 class="card-title nav-tabs-title">Gestionar - Agregar actividad al pedido</h4>
                <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('pedidos.index') }}">Regresar</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('pedidos.update', $ped[0]->PedidoNo) }}" method="POST">
            <input type="hidden" name="idpedido"  value="{{$ped[0]->PedidoNo }}" class="form-control" placeholder="idpedido">
              @csrf
              @method('PUT')
              <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                         <strong>Recibe:</strong>
                         <input type="text" name="Recibe" disabled value="{{ $ped[0]->Recibe }}" class="form-control" placeholder="Recibe">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                         <strong>Fecha:</strong>
                         <input type="text" name="Fecha" disabled value="{{ $ped[0]->Fecha }}" class="form-control" placeholder="Fecha">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                         <strong>Comentario:</strong>
                         <input type="text" name="Comentario"  value="{{$ped[0]->Comentario}}" class="form-control" placeholder="Comentario">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Estado:</strong>
                        <select class="form-control" style="height:50px" name="Estado" >
                            @if($ped[0]->Estado==1)
                                <option value="{{$ped[0]->Estado}}" selected>Generada</option>
                                <option value="2">Cancelada</option>
                                <option value="3">En preparación</option>
                                <option value="4">En ruta</option>
                                <option value="5">Entregada</option>
                                <option value="6">Finalizada</option>
                            @endif
                            @if($ped[0]->Estado==2)
                                <option value="1">Generada</option>
                                <option value="{{$ped[0]->Estado}}" selected>Cancelada</option>
                                <option value="3">En preparación</option>
                                <option value="4">En ruta</option>
                                <option value="5">Entregada</option>
                                <option value="6">Finalizada</option>
                                
                            @endif
                            @if($ped[0]->Estado==3)
                                <option value="1">Generada</option>
                                <option value="2">Cancelada</option>
                                <option value="{{$ped[0]->Estado}}" selected>En preparación</option>
                                <option value="4">En ruta</option>
                                <option value="5">Entregada</option>
                                <option value="6">Finalizada</option>
                                
                            @endif
                            @if($ped[0]->Estado==4)
                                <option value="1">Generada</option>
                                <option value="2">Cancelada</option>
                                <option value="3" >En preparación</option>
                                <option value="{{$ped[0]->Estado}}"selected>En ruta</option>
                                <option value="5">Entregada</option>
                                <option value="6">Finalizada</option>
                                
                            @endif
                            @if($ped[0]->Estado==5)
                                <option value="1">Generada</option>
                                <option value="2">Cancelada</option>
                                <option value="3" >En preparación</option>
                                <option value="4">En ruta</option>
                                <option value="{{$ped[0]->Estado}}"selected>Entregada</option>
                                <option value="6">Finalizada</option>
                                
                            @endif
                            @if($ped[0]->Estado==6)
                                <option value="1">Generada</option>
                                <option value="2">Cancelada</option>
                                <option value="3" >En preparación</option>
                                <option value="4">En ruta</option>
                                <option value="5">Entregada</option>
                                <option value="{{$ped[0]->Estado}}"selected>Finalizada</option>
                                
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
           </div>
        </form>
         
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function redondear(element) {
    element.value = parseFloat(element.value).toFixed(2);
  }
</script>
@endsection