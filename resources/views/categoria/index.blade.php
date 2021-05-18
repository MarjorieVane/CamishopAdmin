@extends('layouts.app', ['activePage' => 'categoria', 'titlePage' => __('categoria')])
 
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-tabs card-header-primary">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <h4 class="card-title nav-tabs-title">Categorías</h4>
                <div class="pull-right">
                <a class="btn btn-success" href="{{ route('categoria.create') }}"> Nueva categoría</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
              <tr>
                <th>No.</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th width="280px">Acciones</th>
              </tr>
              @foreach ($data as $key => $value)
              <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $value->Nombre }}</td>
                
                @if ($value->Estado == 1)
                  <td><i class="material-icons text-success" style="cursor:pointer" title="Activo">check_circle</i></td>
                @else
                <td><i class="material-icons text-danger" style="cursor:pointer" title="Inactivo">highlight_off</i></td>
                @endif
                <td>
                <form action="{{ route('categoria.destroy',$value->IdCategoria) }}" method="POST">   
                     
                    <a class="btn btn-primary" href="{{ route('categoria.edit',$value->IdCategoria) }}">Editar</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Eliminar</button>
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