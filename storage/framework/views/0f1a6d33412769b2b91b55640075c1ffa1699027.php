<div style="color: white; background-color: #5C8293  !important;"class=" main-menu menu-fixed menu-dark menu-accordion menu-shadow" >
    <div class="main-menu-content " style="color: white; background-color: #5C8293  !important;">
      <ul style="color: white; background-color: #5C8293  !important;" class=" navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li style="color: white; background-color: #5C8293  !important;" class=" nav-item"><a href="/"><i class="ft-home"></i><span class="menu-title" data-i18n="">Administración</span></a>
          <ul style="color: white; background-color: #5C8293  !important;" class=" menu-content">
            <li class="<?php echo e(Request::is('clientes*') ? 'active nav-item' : ''); ?>"><a class="menu-item" href="<?php echo route('clientes.index'); ?>">Participantes</a></li>
            <li class="<?php echo e(Request::is('proyectos*') ? 'active' : ''); ?>"><a href="<?php echo route('proyectos.index'); ?>">Proyectos</a></li>
            <li class="<?php echo e(Request::is('fabricantes*') ? 'active nav-item' : ''); ?>"><a class="menu-item" href="<?php echo route('fabricantes.index'); ?>">Fabricantes</a></li>
            <li class="<?php echo e(Request::is('masivos*') ? 'active' : ''); ?>"><a href="<?php echo route('productos_masivo.index'); ?>"><span>Productos Masivo</span></a></li>
            <li class="<?php echo e(Request::is('catalogos_download*') ? 'active' : ''); ?>"><a href="<?php echo route('catalogos_download.index'); ?>"><span>Descarga catalogos</span></a></li>
          </ul>
        </li>
        <li class=" nav-item"><a href="/"><i class="ft-box"></i><span class="menu-title" data-i18n="">Catálogos</span></a>
          <ul class="menu-content">
            <li class="<?php echo e(Request::is('catalogos*') ? 'active' : ''); ?>"><a href="<?php echo route('catalogos.index'); ?>"><span>Catálogos</span></a></li>
            <li class="<?php echo e(Request::is('subBaldwins*') ? 'active' : ''); ?>"><a href="<?php echo route('subBaldwins.index'); ?>"><span>Baldwin</span></a></li>
            <li class="<?php echo e(Request::is('SubEmktek*') ? 'active' : ''); ?>"><a href="<?php echo route('subEmtek.index'); ?>"><span>Emtek</span></a></li>
            <li class="<?php echo e(Request::is('sufijos*') ? 'active' : ''); ?>"><a href="<?php echo route('sufijos.index'); ?>"><span>Sufijos</span></a></li>
            <li class="<?php echo e(Request::is('formulas*') ? 'active' : ''); ?>"><a href="<?php echo route('formulas.index'); ?>"><span>Formulas</span></a></li>
            <li class="<?php echo e(Request::is('selectores*') ? 'active' : ''); ?>"><a href="<?php echo route('selectores.index'); ?>"><span>Selectores</span></a></li>
            <li class="<?php echo e(Request::is('dependencia*') ? 'active' : ''); ?>"><a href="<?php echo route('dependencia.index'); ?>"><span>Dependecia vistas</span></a></li>
            <li class="<?php echo e(Request::is('costos*') ? 'active' : ''); ?>"><a href="<?php echo route('costos.index'); ?>"><span>Costos</span></a></li>
            <li class="<?php echo e(Request::is('tipoClientes*') ? 'active' : ''); ?>"><a href="<?php echo route('tipoClientes.index'); ?>"><span>Tipo Clientes</span></a></li>
            <li class="<?php echo e(Request::is('tipoProyectos*') ? 'active' : ''); ?>"><a href="<?php echo route('tipoProyectos.index'); ?>"><span>Tipo Proyectos</span></a></li>
            <li class="<?php echo e(Request::is('catalogos*') ? 'active' : ''); ?>"><a href="<?php echo route('catalogos_generales'); ?>"><span>Datos Generales</span></a></li>

          </ul>
        </li>
        <li class=" nav-item <?php echo e(Request::is('productos*') ? 'active' : ''); ?>"><a href="<?php echo route('productos.index'); ?>"><i class="ft-align-justify"></i><span class="menu-title" data-i18n="">Productos</span></a></li>        
        <li class=" nav-item"><a href="/"><i class="ft-server"></i><span class="menu-title" data-i18n="">Cotizaciones</span></a>
          <ul class="menu-content">
            <li class="<?php echo e(Request::is('cotizador*') ? 'active' : ''); ?>"><a href="<?php echo route('cotizador.index'); ?>"><span class="menu-title" data-i18n="">Cotizaciones</span></a></li>
            <li class="<?php echo e(Request::is('cotizaciones_lista*') ? 'active' : ''); ?>"><a href="<?php echo route('cotizador.lista'); ?>"><span class="menu-title" data-i18n="">Histórico</span></a></li>
           
          </ul>
        </li> 
        <li class=" nav-item"><a href="/"><i class="ft-server"></i><span class="menu-title" data-i18n="">OC</span></a>
          <ul class="menu-content">
            <li class="<?php echo e(Request::is('cotizaciones_oc*') ? 'active' : ''); ?>"><a href="<?php echo route('cotizador.oc'); ?>"><span class="menu-title" data-i18n="">OC Clientes</span></a></li>
            <li class="<?php echo e(Request::is('cotizaciones_oc*') ? 'active' : ''); ?>"><a href="<?php echo route('enviadas'); ?>"><span class="menu-title" data-i18n="">Envios</span></a></li>

          </ul>
        </li> 


        <li class=" nav-item"><a href="#"><i class="ft-server"></i><span class="menu-title" data-i18n="">Pedidos</span></a>
         <ul class="menu-content">
                <li class="<?php echo e(Request::is('tblOcFabs*') ? 'active' : ''); ?>"><a href="<?php echo route('tblOcFabs.index'); ?>"><span class="menu-title" data-i18n="">OC Fabricantes</span></a></li>
                <li class="<?php echo e(Request::is('tblOcFabs*') ? 'active' : ''); ?>"><a href="<?php echo route('pedidos'); ?>"><span class="menu-title" data-i18n="">Pedidos Fabricante</span></a></li>


          </ul>
        </li> 

     
          </ul>
        </li>        
      </ul>
    </div>
  </div>

<?php /**PATH C:\xampp\htdocs\laravel\hardware\resources\views/layouts/menu.blade.php ENDPATH**/ ?>