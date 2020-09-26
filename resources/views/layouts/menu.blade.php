<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="/"><i class="ft-home"></i><span class="menu-title" data-i18n="">Administración</span></a>
          <ul class="menu-content">
            <li class="{{ Request::is('clientes*') ? 'active nav-item' : '' }}"><a class="menu-item" href="{!! route('clientes.index') !!}">Participantes</a></li>
            <li class="{{ Request::is('proyectos*') ? 'active' : '' }}"><a href="{!! route('proyectos.index') !!}">Proyectos</a></li>
            <li class="{{ Request::is('fabricantes*') ? 'active nav-item' : '' }}"><a class="menu-item" href="{!! route('fabricantes.index') !!}">Fabricantes</a></li>
            <li class="{{ Request::is('masivos*') ? 'active' : '' }}"><a href="{!! route('productos_masivo.index') !!}"><span>Productos Masivo</span></a></li>
            <li class="{{ Request::is('catalogos_download*') ? 'active' : '' }}"><a href="{!! route('catalogos_download.index') !!}"><span>Descarga catalogos</span></a></li>
          </ul>
        </li>
        <li class=" nav-item"><a href="/"><i class="ft-box"></i><span class="menu-title" data-i18n="">Catalogos</span></a>
          <ul class="menu-content">
            <li class="{{ Request::is('catalogos*') ? 'active' : '' }}"><a href="{!! route('catalogos.index') !!}"><span>Catalogos</span></a></li>
            <li class="{{ Request::is('subBaldwins*') ? 'active' : '' }}"><a href="{!! route('subBaldwins.index') !!}"><span>Baldwin</span></a></li>
            <li class="{{ Request::is('SubEmktek*') ? 'active' : '' }}"><a href="{!! route('subEmtek.index') !!}"><span>Emtek</span></a></li>
            <li class="{{ Request::is('sufijos*') ? 'active' : '' }}"><a href="{!! route('sufijos.index') !!}"><span>Sufijos</span></a></li>
            <li class="{{ Request::is('formulas*') ? 'active' : '' }}"><a href="{!! route('formulas.index') !!}"><span>Formulas</span></a></li>
            <li class="{{ Request::is('selectores*') ? 'active' : '' }}"><a href="{!! route('selectores.index') !!}"><span>Selectores</span></a></li>
            <li class="{{ Request::is('dependencia*') ? 'active' : '' }}"><a href="{!! route('dependencia.index') !!}"><span>Dependecia vistas</span></a></li>
            <li class="{{ Request::is('costos*') ? 'active' : '' }}"><a href="{!! route('costos.index') !!}"><span>Costos</span></a></li>
            <li class="{{ Request::is('tipoClientes*') ? 'active' : '' }}"><a href="{!! route('tipoClientes.index') !!}"><span>Tipo Clientes</span></a></li>
            <li class="{{ Request::is('tipoProyectos*') ? 'active' : '' }}"><a href="{!! route('tipoProyectos.index') !!}"><span>Tipo Proyectos</span></a></li>
          </ul>
        </li>
        <li class="{{ Request::is('productos*') ? 'active' : '' }}"><a href="{!! route('productos.index') !!}"><i class="ft-align-justify"></i><span>Productos</span></a></li>
        <li class=" nav-item"><a href="/"><i class="ft-server"></i><span class="menu-title" data-i18n="">Cotizaciones</span></a>
          <ul class="menu-content">
            <li class="{{ Request::is('cotizador*') ? 'active' : '' }}"><a href="{!! route('cotizador.index') !!}"><span>Cotizador</span></a></li>
            <li class="{{ Request::is('cotizaciones_lista*') ? 'active' : '' }}"><a href="{!! route('cotizador.lista') !!}"><span>Historial</span></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>












