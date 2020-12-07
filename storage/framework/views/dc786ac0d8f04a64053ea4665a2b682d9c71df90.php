<div  class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-shadow menu-border"
  role="navigation" data-menu="menu-wrapper">
    <!-- Horizontal menu content-->
    <div class="navbar-container main-menu-content" data-menu="menu-container">
      <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="dropdown-toggle nav-link" href="<?php echo e(route('home')); ?>" data-toggle="dropdown"><i class="ft-home"></i>
            <span>Administración</span>
          </a>
          <ul class="dropdown-menu">
            <li class="<?php echo e(Request::is('clientes*') ? 'active nav-item' : ''); ?>" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="<?php echo route('clientes.index'); ?>">Participantes<submenu class="name"></submenu></a></li>
            <li class="<?php echo e(Request::is('proyectos*') ? 'active nav-item' : ''); ?>" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="<?php echo route('proyectos.index'); ?>">Proyectos<submenu class="name"></submenu></a></li>
            <li class="<?php echo e(Request::is('fabricantes*') ? 'active nav-item' : ''); ?>" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="<?php echo route('fabricantes.index'); ?>">Fabricantes<submenu class="name"></submenu></a></li>
            <li class="<?php echo e(Request::is('masivos*') ? 'active' : ''); ?>" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="<?php echo route('productos_masivo.index'); ?>">Productos Masivo<submenu class="name"></submenu></a></li>
            <li class="<?php echo e(Request::is('catalogos_download*') ? 'active' : ''); ?>" data-menu=""><a class="dropdown-item"  data-toggle="dropdown" href="<?php echo route('catalogos_download.index'); ?>">Descarga catalogos<submenu class="name"></submenu></a></li>
          </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="dropdown-toggle nav-link" href="<?php echo e(route('home')); ?>" data-toggle="dropdown"><i class="ft-box"></i>
            <span>Catálogos</span>
          </a>
          <ul class="dropdown-menu">
            <li class="<?php echo e(Request::is('catalogos*') ? 'active' : ''); ?>" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="<?php echo route('catalogos.index'); ?>">Catalogos<submenu class="name"></submenu></a></li>
            <li class="<?php echo e(Request::is('subBaldwins*') ? 'active' : ''); ?>" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="<?php echo route('subBaldwins.index'); ?>">Baldwin<submenu class="name"></submenu></a></li>
            <li class="<?php echo e(Request::is('SubEmktek*') ? 'active' : ''); ?>" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="<?php echo route('subEmtek.index'); ?>">Emtek<submenu class="name"></submenu></a></li>
            <li class="<?php echo e(Request::is('sufijos*') ? 'active' : ''); ?>" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="<?php echo route('sufijos.index'); ?>">Sufijos<submenu class="name"></submenu></a></li>
            <li class="<?php echo e(Request::is('formulas*') ? 'active' : ''); ?>" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="<?php echo route('formulas.index'); ?>">Formulas<submenu class="name"></submenu></a></li>
            <li class="<?php echo e(Request::is('selectores*') ? 'active' : ''); ?>" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="<?php echo route('selectores.index'); ?>">Selectores<submenu class="name"></submenu></a></li>
            <li class="<?php echo e(Request::is('dependencia*') ? 'active' : ''); ?>" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="<?php echo route('dependencia.index'); ?>">Dependecia vistas<submenu class="name"></submenu></a></li>
            <li class="<?php echo e(Request::is('costos*') ? 'active' : ''); ?>" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="<?php echo route('costos.index'); ?>">Costos<submenu class="name"></submenu></a></li>
            <li class="<?php echo e(Request::is('tipoClientes*') ? 'active' : ''); ?>"  data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="<?php echo route('tipoClientes.index'); ?>"><span>Tipo Clientes<submenu class="name"></submenu></span></a></li>
            <li class="<?php echo e(Request::is('tipoProyectos*') ? 'active' : ''); ?>" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="<?php echo route('tipoProyectos.index'); ?>"><span>Tipo Proyectos<submenu class="name"></submenu></span></a></li>
            <li class="<?php echo e(Request::is('catalogos*') ? 'active' : ''); ?>"  data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="<?php echo route('catalogos_generales'); ?>"><span>Datos Generales<submenu class="name"></submenu></span></a></li>
          </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="nav-link" href="<?php echo e(route('productos.index')); ?>"><i class="ft-align-justify"></i>
            <span>Productos</span>
          </a>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="dropdown-toggle nav-link" href="<?php echo e(route('home')); ?>" data-toggle="dropdown"><i class="ft-box"></i>
            <span>Cotizaciones</span>
          </a>
          <ul class="dropdown-menu">
            <li class="<?php echo e(Request::is('cotizador*') ? 'active' : ''); ?>" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="<?php echo route('cotizador.index'); ?>">Cotizador<submenu class="name"></submenu></a></li>
            <li class="<?php echo e(Request::is('cotizador.lista*') ? 'active' : ''); ?>" data-menu=""><a class="dropdown-item" data-toggle="dropdown" href="<?php echo route('cotizador.lista'); ?>">Histórico<submenu class="name"></submenu></a></li>
          </ul>
        </li>
        
      </ul>
    </div>
  </div>








<?php /**PATH /home/altermed/public_html/demo.cotiza.tech/laravel/resources/views/layouts/menu_master.blade.php ENDPATH**/ ?>