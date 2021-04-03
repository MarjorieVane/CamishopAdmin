@extends('layouts.app', ['activePage' => 'proveedor', 'titlePage' => __('Editar Proveedor')])
   
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-tabs card-header-success">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <h4 class="card-title nav-tabs-title">Proveedor - Gestionar</h4>
                <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('proveedor.index') }}">Regresar</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('proveedor.update', $proveedor->IdProveedor) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="Nombre" value="{{ $proveedor->Nombre }}" class="form-control" placeholder="Nombre">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Contacto:</strong>
                    <input type="text" name="Contacto" value="{{ $proveedor->Contacto }}" class="form-control" placeholder="Nombre de persona de contacto">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Telefono:</strong>
                    <input type="text" name="TelefonoContacto" value="{{ $proveedor->TelefonoContacto }}" class="form-control" placeholder="38984223">
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Estado:</strong>
                        <select class="form-control" style="height:50px" name="Estado" >
                            @if($proveedor->Estado==1)
                                <option value="{{$proveedor->Estado}}" selected>Activo</option>
                                <option value="0">Inactivo</option>
                            @else
                                <option value="1">Activo</option>
                                <option value="{{$proveedor->Estado}}" selected>Inactivo</option>
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
<!-- @extends('layouts.app', ['activePage' => 'proveedor', 'titlePage' => __('Editar Proveedor')])
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar proveedor</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('proveedor.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{route('proveedor.update',$proveedor->IdProveedor) }}" method="POST">
    @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    
                    
                    
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection -->