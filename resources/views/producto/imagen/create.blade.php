@extends('layouts.app', ['activePage' => 'imagenes_prod', 'titlePage' => __('imagenes_prod')])
  
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-tabs card-header-success">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <h4 class="card-title nav-tabs-title">Imagenes - Gestionar</h4>
                <div class="pull-right">
                  <a class="btn btn-info" href="{{ url('producto/'.$idProd.'/imagen') }}">Regresar</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              @csrf
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>URL:</strong>
                    <input type="text" name="RutaImagen" class="form-control" placeholder="Ruta Imagen" required>
                  </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <div class="form-group">
                    <strong>Estado:</strong>
                    <select class="form-select form-select-sm" style="width: 130px" name="Estado" required>
                      <option value="1" selected>Activo</option>
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
@include('sweetalert::alert')
@endsection