@extends('layouts.app', ['activePage' => 'moneda', 'titlePage' => __('moneda')])
   
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-tabs card-header-success">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <h4 class="card-title nav-tabs-title">Monedas - Editar</h4>
                <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('moneda.index') }}">Regresar</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('moneda.update', $moneda->IdMoneda) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                         <strong>Nombre:</strong>
                         <input type="text" name="Descripcion" value="{{ $moneda->Descripcion }}" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                         <strong>Simbolo:</strong>
                         <input type="text" name="Simbolo" value="{{ $moneda->Simbolo }}" class="form-control" placeholder="QTZ">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Estado:</strong>
                        <select class="form-control" style="height:50px" name="Estado" >
                            @if($moneda->Estado==1)
                                <option value="{{$moneda->Estado}}" selected>Activo</option>
                                <option value="0">Inactivo</option>
                            @else
                                <option value="1">Activo</option>
                                <option value="{{$moneda->Estado}}" selected>Inactivo</option>
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