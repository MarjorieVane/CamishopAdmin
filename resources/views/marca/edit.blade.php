@extends('layouts.app', ['activePage' => 'marca', 'titlePage' => __('Editar Marca')])
   
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-tabs card-header-success">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <h4 class="card-title nav-tabs-title">Marca - Gestionar</h4>
                <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('marca.index') }}">Regresar</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('marca.update', $marca->IdMarcas) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="Nombre" value="{{ $marca->Nombre }}" class="form-control" placeholder="Nombre">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Estado:</strong>
                        <select class="form-control" style="height:50px" name="Estado" >
                            @if($marca->Estado==1)
                                <option value="{{$marca->Estado}}" selected>Activo</option>
                                <option value="0">Inactivo</option>
                            @else
                                <option value="1">Activo</option>
                                <option value="{{$marca->Estado}}" selected>Inactivo</option>
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
<script>
  function redondear(element) {
    element.value = parseFloat(element.value).toFixed(2);
  }
</script>
@endsection
