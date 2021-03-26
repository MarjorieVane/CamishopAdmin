@extends('layouts.app', ['activePage' => 'proveedor', 'titlePage' => __('Proveedores')])
 
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-tabs card-header-primary">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <h4 class="card-title nav-tabs-title">Proveedores</h4>
                <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('proveedor.create') }}">Nuevo Proveedor</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th>No</th>
                  <th>Nombre</th>
                  <th>Contacto</th>
                  <th>Telefono</th>
                  <th> </th>
                </tr>
                @foreach ($proveedor as $key => $value)
                <tr>
                    
                    <td>{{ $value->IdProveedor }}</td>
                    <td>{{ $value->Nombre }}</td>
                    <td>{{ $value->Contacto }}</td>
                    <td>{{ $value->TelefonoContacto }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('proveedor.edit',$value->IdProveedor) }}">Editar</a>  
                    </td>
                </tr>
                @endforeach
              </table>
              <div id="seccionPaginacion">
                {{ $proveedor->render("pagination::bootstrap-4") }}
              </div>
            </div>
          </div>    
        </div>
      </div>
    </div>
  </div>
</div>
@endsection