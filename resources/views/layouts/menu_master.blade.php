<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-shadow menu-border"
  role="navigation" data-menu="menu-wrapper">
    <!-- Horizontal menu content-->
    <div class="navbar-container main-menu-content" data-menu="menu-container">
      <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="dropdown-toggle nav-link" href="{{ route('home')}}" data-toggle="dropdown"><i class="ft-home"></i>
            <span>Administración</span>
          </a>
          <ul class="dropdown-menu">
            <li class="{{ Request::is('clientes*') ? 'active nav-item' : '' }}" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="{!! route('clientes.index') !!}">Participantes<submenu class="name"></submenu></a></li>
            <li class="{{ Request::is('proyectos*') ? 'active nav-item' : '' }}" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="{!! route('proyectos.index') !!}">Proyectos<submenu class="name"></submenu></a></li>
            <li class="{{ Request::is('fabricantes*') ? 'active nav-item' : '' }}" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="{!! route('fabricantes.index') !!}">Fabricantes<submenu class="name"></submenu></a></li>
            <li class="{{ Request::is('masivos*') ? 'active' : '' }}" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="{!! route('productos_masivo.index') !!}">Productos Masivo<submenu class="name"></submenu></a></li>
            <li class="{{ Request::is('catalogos_download*') ? 'active' : '' }}" data-menu=""><a class="dropdown-item"  data-toggle="dropdown" href="{!! route('catalogos_download.index') !!}">Descarga catalogos<submenu class="name"></submenu></a></li>
          </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="dropdown-toggle nav-link" href="{{ route('home')}}" data-toggle="dropdown"><i class="ft-box"></i>
            <span>Catalogos</span>
          </a>
          <ul class="dropdown-menu">
            <li class="{{ Request::is('catalogos*') ? 'active' : '' }}" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="{!! route('catalogos.index') !!}">Catalogos<submenu class="name"></submenu></a></li>
            <li class="{{ Request::is('subBaldwins*') ? 'active' : '' }}" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="{!! route('subBaldwins.index') !!}">Baldwin<submenu class="name"></submenu></a></li>
            <li class="{{ Request::is('SubEmktek*') ? 'active' : '' }}" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="{!! route('subEmtek.index') !!}">Emtek<submenu class="name"></submenu></a></li>
            <li class="{{ Request::is('sufijos*') ? 'active' : '' }}" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="{!! route('sufijos.index') !!}">Sufijos<submenu class="name"></submenu></a></li>
            <li class="{{ Request::is('formulas*') ? 'active' : '' }}" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="{!! route('formulas.index') !!}">Formulas<submenu class="name"></submenu></a></li>
            <li class="{{ Request::is('selectores*') ? 'active' : '' }}" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="{!! route('selectores.index') !!}">Selectores<submenu class="name"></submenu></a></li>
            <li class="{{ Request::is('dependencia*') ? 'active' : '' }}" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="{!! route('dependencia.index') !!}">Dependecia vistas<submenu class="name"></submenu></a></li>
            <li class="{{ Request::is('costos*') ? 'active' : '' }}" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="{!! route('costos.index') !!}">Costos<submenu class="name"></submenu></a></li>
          </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="nav-link" href="{{ route('productos.index')}}"><i class="ft-align-justify"></i>
            <span>Productos</span>
          </a>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="dropdown-toggle nav-link" href="{{ route('home')}}" data-toggle="dropdown"><i class="ft-box"></i>
            <span>Cotizaciones</span>
          </a>
          <ul class="dropdown-menu">
            <li class="{{ Request::is('cotizador*') ? 'active' : '' }}" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="{{ route('cotizador.index')}}">Cotizador<submenu class="name"></submenu></a></li>
            <li class="{{ Request::is('cotizaciones_lista') ? 'active' : '' }}" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="{!! route('cotizador.lista') !!}">Historial<submenu class="name"></submenu></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>








