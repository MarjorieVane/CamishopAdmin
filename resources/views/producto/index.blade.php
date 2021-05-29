@extends('layouts.app', ['activePage' => 'producto', 'titlePage' => __('producto')])
 
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-tabs card-header-primary">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <h4 class="card-title nav-tabs-title">Productos</h4>
                <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('producto.create') }}">Nuevo</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <!-- datos de un spr -->
              <table class="table">
                <tr>
                  <th>No</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Precio Unitario</th>
                  <th>Categoría</th>
                  <th>Marca</th>
                  <th>Proveedor</th>
                  <th>Imagenes</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
                <tbody>
                @foreach ($productos as $prod)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $prod->Nombre }}</td>
                  <td>{{ $prod->Descripcion }}</td>
                  <td>{{ $prod->precio_format }}</td>
                  <td>{{ $prod->NombreCat }}</td>
                  <td>{{ $prod->NombreMar }}</td>
                  <td>{{ $prod->NombrePrv }}</td>
                  <td>
                    <a
                      href="{{ url('producto/'.$prod->IdProducto.'/imagen') }}"
                      title="Imagenes"  
                      class="btn btn-link btn-primary">
                      <i class="material-icons">photo_library</i>
                      <span style="font-size: 12px;" class="badge badge-success">{{ $prod->contImg }}</span>
                    </a>
                  </td>
                  <td>
                    @if ($prod->Estado == 1)
                      <i class="material-icons text-success" style="cursor:pointer" title="Activo">check_circle</i>
                    @else
                      <i class="material-icons text-danger" style="cursor:pointer" title="Inactivo">highlight_off</i>
                    @endif
                  </td>
                  <td>
                    <form action="" method="POST">   
                      <a class="btn btn-primary" href="{{ route('producto.edit',$prod->IdProducto) }}">Editar</a>   
                    </form>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
              <div id="seccionPaginacion">
                {{ $productos->render("pagination::bootstrap-4") }}
              </div>
            </div>
          </div>    
        </div>
      </div>
    </div>
  </div>
</div>
@endsection