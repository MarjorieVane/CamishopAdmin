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
                  <a class="btn btn-success" href="{{ url('producto/'.$idProd.'/imagen') }}">Regresar</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ url('producto/'.$idProd.'/imagen/edit') }}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>URL:</strong>
                    <input type="text" name="RutaImagen" value="{{ $imagen->RutaImagen }}" class="form-control" placeholder="Ruta Imagen" required>
                  </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <div class="form-group">
                    <strong>Estado:</strong>
                    <select class="form-select form-select-sm" style="width: 130px" name="Estado" required>
                      @if ($imagen->Estado == 1)
                        <option value="1" selected>Activo</option>
                        <option value="0">Inactivo</option>
                      @else
                        <option value="1">Activo</option>
                        <option value="0" selected>Inactivo</option>
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
@include('sweetalert::alert')
@endsection