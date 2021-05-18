@extends('layouts.app', ['activePage' => 'empleado', 'titlePage' => __('empleado')])
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-tabs card-header-success">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <h4 class="card-title nav-tabs-title">Empleados - Gestionar</h4>
                <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('empleado.index') }}">Regresar</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
          <form action="{{ route('empleado.store') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                  <strong>Nombre:</strong>
                  <input type="text" name="NombreCompleto" class="form-control" placeholder="Ingrese un nombre">
                  <strong>Email:</strong>
                  <input type="text" name="email" class="form-control" placeholder="Ingrese su email">
                  <strong>Password:</strong>
                  <input type="password" name="password" class="form-control" placeholder="Ingrese su password">
                  <strong>Estado:</strong>
                  <select class="form-control" style="height:50px" name="Estado" >
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
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