<div class="header-navbar navbar-expand-sm navbar navbar-horizontal  navbar-light navbar-shadow menu-border"
  role="navigation">
    <!-- Horizontal menu content-->
    <div class="navbar-container main-menu-content" style="width: 100%;">
      <div class="row" id="div_cliente_proyecto">
        <?php echo $__env->make('cotizador.cliente_proyecto', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
      <ul class="nav navbar-nav" id="main-menu-navigation">
        <li class="dropdown nav-item" data-menu="dropdown">
          <a class="dropdown-toggle nav-link" href="<?php echo e(route('home')); ?>" data-toggle="dropdown">
            <span>Fabricantes</span>
          </a>
          <ul class="dropdown-menu">
            <?php $__currentLoopData = $fabricantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a class="dropdown-item" data-toggle="dropdown" onclick="obtiene_catalogo2(1,<?php echo e($f->id_fabricante); ?>,'lista_catalogos')" ><?php echo e($f->fabricante); ?><submenu class="name"></submenu></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown" style="display: none;" id="l_catalogos">
          <a class="dropdown-toggle nav-link" href="<?php echo e(route('home')); ?>" data-toggle="dropdown">
            <span>Catalogos</span>
          </a>
          <ul class="dropdown-menu" id="lista_catalogos" style="max-height: 400px; overflow-y: scroll;"></ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown" style="display: none;" id="l_familias">
          <a class="dropdown-toggle nav-link" href="<?php echo e(route('home')); ?>" data-toggle="dropdown">
            <span>Familias</span>
          </a>
          <ul class="dropdown-menu" id="lista_familias"style="max-height: 400px; overflow-y: scroll;"></ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown" style="display: none;" id="l_categorias">
          <a class="dropdown-toggle nav-link" href="<?php echo e(route('home')); ?>" data-toggle="dropdown">
            <span>Categorias</span>
          </a>
          <ul class="dropdown-menu" id="lista_categorias" style="max-height: 400px; overflow-y: scroll;"></ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown" style="display: none;" id="l_subcategorias">
          <a class="dropdown-toggle nav-link" href="<?php echo e(route('home')); ?>" data-toggle="dropdown">
            <span>Subcategorias</span>
          </a>
          <ul class="dropdown-menu" id="lista_subcategorias" style="max-height: 400px; overflow-y: scroll;"></ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown" style="display: none;" id="l_disenios">
          <a class="dropdown-toggle nav-link" href="<?php echo e(route('home')); ?>" data-toggle="dropdown">
            <span>Diseños</span>
          </a>
          <ul class="dropdown-menu" id="lista_disenios" style="max-height: 400px; overflow-y: scroll;"></ul>
        </li>
        <li class="dropdown nav-item" data-menu="dropdown" style="display: none;" id="l_items">
          <a class="dropdown-toggle nav-link" href="<?php echo e(route('home')); ?>" data-toggle="dropdown">
            <span>Items</span>
          </a>
          <ul class="dropdown-menu" id="lista_items" style="max-height: 400px; overflow-y: scroll;"></ul>
        </li>
      </ul>
    </div>
  </div>








<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/layouts/filtros.blade.php ENDPATH**/ ?>