@extends('layouts.app', ['activePage' => 'marca', 'titlePage' => __('Marca')])
 
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-tabs card-header-primary">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <h4 class="card-title nav-tabs-title">Marcas</h4>
                <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('marca.create') }}">Nueva Marca</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th>No</th>
                  <th>Nombre</th>
                  
                </tr>
                @foreach ($marca as $key => $value)
                <tr>
                    
                    <td>{{ $value->IdMarcas }}</td>
                    <td>{{ $value->Nombre }}</td>
                    
                </tr>
                @endforeach
              </table>
              <div id="seccionPaginacion">
                {{ $marca->render("pagination::bootstrap-4") }}
              </div>
            </div>
          </div>    
        </div>
      </div>
    </div>
  </div>
</div>
@endsection