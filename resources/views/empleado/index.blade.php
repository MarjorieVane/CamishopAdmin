@extends('layouts.app', ['activePage' => 'empleado', 'titlePage' => __('empleado')])
 
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-tabs card-header-primary">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <h4 class="card-title nav-tabs-title">Empleados</h4>
                <div class="pull-right">
                <a class="btn btn-success" href="{{ route('empleado.create') }}"> Nuevo empleado</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
              <tr>
                <th>No.</th>
                <th>Nombre empleado</th>
                <th>email</th>
                <th>Estado</th>
                <th width="280px">Acciones</th>
              </tr>
              @foreach ($miemp as $emp)
              <tr>
                <td>{{ ++$contador }}</td>
                <td>{{ $emp->NombreCompleto}}</td>
                <td>{{ $emp->email}}</td>
                
                               
                @if ($emp->Estado == 1)
                  <td><i class="material-icons text-success" style="cursor:pointer" title="Activo">check_circle</i></td>
                @else
                <td><i class="material-icons text-danger" style="cursor:pointer" title="Inactivo">highlight_off</i></td>
                @endif
                <td>
                <form action="{{ route('empleado.destroy',$emp->IdEmpleado) }}" method="POST">   
                     
                    <a class="btn btn-primary" href="{{ route('empleado.edit',$emp->IdEmpleado) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
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