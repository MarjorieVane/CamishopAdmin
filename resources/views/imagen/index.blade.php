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
<!-- estilos -->
<style>
  /* Style the Image Used to Trigger the Modal */
  #myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
  }
  
  #myImg:hover {opacity: 0.7;}
  
  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 99; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
  }
  
  /* Modal Content (Image) */
  .modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
  }
  
  /* Caption of Modal Image (Image Text) - Same Width as the Image */
  #caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
  }
  
  /* Add Animation - Zoom in the Modal */
  .modal-content, #caption {
    animation-name: zoom;
    animation-duration: 0.6s;
  }
  
  @keyframes zoom {
    from {transform:scale(0)}
    to {transform:scale(1)}
  }
  
  /* The Close Button */
  .close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
    z-index: 99;
  }
  
  .close:hover,
  .close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
  }
  
  /* 100% Image Width on Smaller Screens */
  @media only screen and (max-width: 700px){
    .modal-content {
      width: 100%;
    }
  }
</style>
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