@extends('layouts.app', ['activePage' => 'producto', 'titlePage' => __('producto')])
   
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-tabs card-header-success">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <h4 class="card-title nav-tabs-title">Productos - Gestionar</h4>
                <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('producto.index') }}">Regresar</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="{{ route('producto.update', $producto->IdProducto) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="Nombre" value="{{ $producto->Nombre }}" class="form-control" placeholder="Nombre" required>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Descripción:</strong>
                    <textarea class="form-control" style="height:150px" name="Descripcion" placeholder="Descripción del producto" required>
                      {{ $producto->Descripcion }}
                    </textarea>
                  </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <div class="form-group">
                    <strong>Precio Unitario:</strong>
                    <input class="form-control" value="{{ $producto->PrecioUnitario }}" type="number" name="PrecioUnitario" step="0.01" onblur="redondear(this)" required>
                  </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <div class="form-group">
                    <strong>Género:</strong>
                    <select class="form-select form-select-sm" style="width: 130px" name="Genero" required>
                      @if ($producto->Genero == 'F')
                        <option value="F" selected>Femenino</option>
                        <option value="M">Masculino</option>
                        <option value="U">Unisex</option>
                      @elseif ($producto->Genero == 'M')
                        <option value="F">Femenino</option>
                        <option value="M" selected>Masculino</option>
                        <option value="U">Unisex</option>
                      @else
                        <option value="F">Femenino</option>
                        <option value="M">Masculino</option>
                        <option value="U" selected>Unisex</option>
                      @endif
                    </select>
                  </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <div class="form-group">
                    <strong>Categoría:</strong>
                    <select class="form-select form-select-sm" style="width: 130px" name="IdCategoria" required>
                      @foreach ($categorias as $key => $value)
                        @if ($producto->IdCategoria == $value->IdCategoria)
                          <option value="{{ $value->IdCategoria }}" selected>{{ $value->Nombre }}</option>
                        @else
                          <option value="{{ $value->IdCategoria }}">{{ $value->Nombre }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <div class="form-group">
                    <strong>Marca:</strong>
                    <select class="form-select form-select-sm" style="width: 130px" name="IdMarcas" required>
                      @foreach ($marcas as $key => $value)
                        @if ($producto->IdMarcas == $value->IdMarcas)
                          <option value="{{ $value->IdMarcas }}" selected>{{ $value->Nombre }}</option>
                        @else
                          <option value="{{ $value->IdMarcas }}">{{ $value->Nombre }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <div class="form-group">
                    <strong>Proveedor:</strong>
                    <select class="form-select form-select-sm" style="width: 130px" name="IdProveedor" required>
                      @foreach ($proveedores as $key => $value)
                        @if ($producto->IdProveedor == $value->IdProveedor)
                          <option value="{{ $value->IdProveedor }}" selected>{{ $value->Nombre }}</option>
                        @else
                          <option value="{{ $value->IdProveedor }}">{{ $value->Nombre }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <div class="form-group">
                    <strong>Moneda:</strong>
                    <select class="form-select form-select-sm" style="width: 130px" name="IdMoneda" required>
                      @foreach ($monedas as $key => $value)
                        @if ($producto->IdMoneda == $value->IdMoneda)
                          <option value="{{ $value->IdMoneda }}" selected>{{ $value->Descripcion }}</option>
                        @else
                          <option value="{{ $value->IdMoneda }}">{{ $value->Descripcion }}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <div class="form-group">
                    <strong>Estado:</strong>
                    <select class="form-select form-select-sm" style="width: 130px" name="Estado" required>
                      @if ($producto->Estado == 1)
                        <option value="1" selected>Activo</option>
                        <option value="0">Inactivo</option>
                      @else
                        <option value="1">Activo</option>
                        <option value="0" selected>Inactivo</option>
                      @endif
                    </select>
                  </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <div class="form-group">
                    <strong>Empleado:</strong>
                    <select class="form-select form-select-sm" style="width: 130px" name="IdEmpleado" required>
                      <option value="1" selected>TEMPORAL</option>
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