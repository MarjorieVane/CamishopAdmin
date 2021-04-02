@extends('layouts.app', ['activePage' => 'imagenes_prod', 'titlePage' => __('imagenes_prod')])
 
@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-tabs card-header-primary">
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <h4 class="card-title nav-tabs-title">Imagenes</h4>
                <div class="pull-right">
                  <a class="btn btn-success" href="{{ route('imagen.create') }}">Nuevo</a>
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
                  <th>Producto</th>
                  <th>Vista Previa</th>
                  <th>URL</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
                <tbody>
                @foreach ($miimg as $img)
                <tr>
                  <td>{{ ++$contador }}</td>
                  <td>{{ $img->NombreProd }}</td>
                  <td>
                    <img
                      id="{{ $img->IdImagenes_prod }}"
                      src="{{ $img->RutaImagen }}"
                      style="height: 60px !important; width:60px !important; cursor: zoom-in;"
                      title="Ampliar"
                      alt="Imagen"
                      onclick="hacerZoom(this)">
                  </td>
                  <td>
                    <span title="{{ $img->RutaImagen }}">{{ \Str::limit($img->RutaImagen, 30) }}</span>
                  </td>
                  <td>
                    @if ($img->Estado == 1)
                      <i class="material-icons text-success" style="cursor:pointer" title="Activo">check_circle</i>
                    @else
                      <i class="material-icons text-danger" style="cursor:pointer" title="Inactivo">highlight_off</i>
                    @endif
                  </td>
                  <td>
                    <form action="{{ route('imagen.destroy', $img->IdImagenes_prod) }}" method="POST">   
                      <a class="btn btn-primary" href="{{ route('imagen.edit', $img->IdImagenes_prod) }}">Editar</a>   
                      @csrf
                      @method('DELETE')      
                      <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>    
        </div>
      </div>
    </div>
  </div>
</div>
<!-- modal -->
<div id="myModal" class="modal">
  <span class="close" title="Cerrar" onclick="cerrar()">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<!-- estilos en public\material\demo\global.css -->
<!-- funciones -->
<script>
  // ejemplo: https://www.w3schools.com/howto/howto_css_modal_images.asp
  function hacerZoom (imgTag) {
    var modal = document.getElementById("myModal");
    var img = imgTag.id;
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    modal.style.display = "block";
    modalImg.src = imgTag.src;
    captionText.innerHTML = "";
    var span = document.getElementsByClassName("close")[0];
  }
  function cerrar () {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
  }
</script>
@endsection