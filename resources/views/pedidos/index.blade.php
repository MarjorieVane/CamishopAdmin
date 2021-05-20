@extends('layouts.app', ['activePage' => 'pedidos', 'titlePage' => __('pedidos')])
 
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-tabs card-header-primary">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <h4 class="card-title nav-tabs-title">Seguimiento a pedidos</h4>
                <!--<div class="pull-right">
                <a class="btn btn-success" href="{{ route('pedidos.create') }}"> Seguimiento a pedidos</a>
                </div>-->
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
              <tr>
                <th>No.</th>
                <th>Pedido No.</th>
                <th>Fecha</th>
                <th>Recibe</th>
                <th>Estado</th>
                <th width="280px">Acciones</th>
              </tr>
              @foreach ($peds as $ped)
              <tr>
                <td>{{ ++$contador }}</td>
                <td>{{ $ped->PedidoNo}}</td>
                <td>{{ $ped->Fecha}}</td>
                <td>{{ $ped->Recibe}}</td>
                <td>{{ $ped->Estado}}</td> 
                <!--@if ($ped->Estado == 1)
                  <td><i class="material-icons text-success" style="cursor:pointer" title="Activo">check_circle</i></td>
                @else
                <td><i class="material-icons text-danger" style="cursor:pointer" title="Inactivo">highlight_off</i></td>
                @endif-->
                <td>
                <form action="{{ route('pedidos.destroy',$ped->PedidoNo) }}" method="POST">   
                     
                    <a class="btn btn-primary" href="{{ route('pedidos.edit',$ped->PedidoNo) }}">Cambiar de estado</a>   
                    @csrf
                    @method('DELETE')      
                    <!--<button type="submit" class="btn btn-danger">Delete</button>-->
                </form>
                </td>
              </tr>
              @endforeach
              </table>
              <div id="seccionPaginacion">
                {{ $data->render("pagination::bootstrap-4") }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection