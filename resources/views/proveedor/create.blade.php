@extends('layouts.app', ['activePage' => 'proveedor', 'titlePage' => __('Proveedores')])
  
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-tabs card-header-success">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <h4 class="card-title nav-tabs-title">Nuevo Proveedor</h4>
                <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('proveedor.index') }}">Regresar</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('proveedor.store') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="Nombre" class="form-control" placeholder="Nombre proveedor" required>
                    <strong>Contacto:</strong>
                    <input type="text" name="Contacto" class="form-control" placeholder="Nombre persona de contacto" required>
                    <strong>Telefono:</strong>
                    <input type="text" name="TelefonoContacto" class="form-control" placeholder="59876489" required>
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