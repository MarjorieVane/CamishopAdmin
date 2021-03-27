<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a class="simple-text logo-normal">
      {{ __('Camishop') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <!-- <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li> -->
      <!-- <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Laravel Examples') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li> -->
      <!-- <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('table') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Table List') }}</p>
        </a>
      </li> -->
      <!-- <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('typography') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Typography') }}</p>
        </a>
      </li> -->
      <li class="nav-item{{ $activePage == 'moneda' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('moneda.index') }}">
          <i class="material-icons">attach_money</i>
            <p>{{ __('moneda') }}</p>
        </a>
      </li>
     <li class="nav-item{{ $activePage == 'empleado' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('empleado.index') }}">
          <i class="material-icons">account_circle</i>
            <p>{{ __('empleado') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'categoria' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('categoria.index') }}">
          <i class="material-icons">list</i>
            <p>{{ __('categoria') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'producto' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('producto.index') }}">
          <i class="material-icons">style</i>
            <p>{{ __('Producto') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'marca' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('marca.index') }}">
          <i class="material-icons">branding_watermark</i>
            <p>{{ __('Marcas') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'proveedor' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('proveedor.index') }}">
          <i class="material-icons">contacts</i>
            <p>{{ __('Proveedores') }}</p>
        </a>
      </li>
      <!-- <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('icons') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li> -->
      <!-- <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li> -->
      <!-- <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li> -->
      <!-- <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('language') }}">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li> -->
      <!-- <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
        <a class="nav-link text-white bg-danger" href="{{ route('upgrade') }}">
          <i class="material-icons text-white">unarchive</i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li> -->
    </ul>
  </div>
</div>
