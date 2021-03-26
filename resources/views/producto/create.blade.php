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
            <form action="{{ route('producto.store') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="Nombre" class="form-control" placeholder="Nombre" required>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                    <strong>Descripción:</strong>
                    <textarea class="form-control" style="height:150px" name="Descripcion" placeholder="Descripción del producto" required></textarea>
                  </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <div class="form-group">
                    <strong>Precio Unitario:</strong>
                    <input class="form-control" type="number" name="PrecioUnitario" step="0.01" onblur="redondear(this)" required>
                  </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <div class="form-group">
                    <strong>Género:</strong>
                    <select class="form-select form-select-sm" style="width: 130px" name="Genero" required>
                      <option value="F">Femenino</option>
                      <option value="M">Masculino</option>
                      <option value="U">Unisex</option>
                    </select>
                  </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <div class="form-group">
                    <strong>Categoría:</strong>
                    <select class="form-select form-select-sm" style="width: 130px" name="IdCategoria" required>
                      @foreach ($categorias as $key => $value)
                        <option value="{{ $value->IdCategoria }}">{{ $value->Nombre }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <div class="form-group">
                    <strong>Marca:</strong>
                    <select class="form-select form-select-sm" style="width: 130px" name="IdMarcas" required>
                      @foreach ($marcas as $key => $value)
                        <option value="{{ $value->IdMarcas }}">{{ $value->Nombre }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                  <div class="form-group">
                    <strong>Proveedor:</strong>
                    <select class="form-select form-select-sm" style="width: 130px" name="IdProveedor" required>
                      @foreach ($proveedores as $key => $value)
                        <option value="{{ $value->IdProveedor }}">{{ $value->Nombre }}</option>
                      @endforeach
                    </select>
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
            <!-- datos de un array -->
            <!-- <table>
              <tr>
                <th>juegos</th>
                <th>consola</th>
              </tr>
              <?php for($i = 0; $i < count($games); $i++) : ?>
                <tr>
                    <td><?= $games[$i]?></td>
                    <td><?= $consolas[$i]?></td>
                </tr>
              <?php endfor ?>
            </table> -->
            <!-- datos de una tabla -->
            <!-- <table>
              <tr>
                <th>no</th>
                <th>id</th>
                <th>categoria</th>
              </tr>
              @foreach ($categorias as $key => $value)
                <tr>
                  <td></td>
                  <td>{{ $value->IdCategoria }}</td>
                  <td>{{ $value->Nombre }}</td>
                </tr>
              @endforeach
            </table> -->
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