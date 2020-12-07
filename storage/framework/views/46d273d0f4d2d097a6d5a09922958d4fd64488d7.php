
<?php if($cantidad > 0): ?>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-end">
      <li class="page-item"></li>
      <?php for($i=1; $i <= $cantidad; $i++): ?>
      <li class="page-item <?php echo e($i==$numero?'active':''); ?>"><a class="page-link" href="#" onclick="busca_producto(<?php echo e($i); ?>)"><?php echo e($i); ?></a></li>
      <?php endfor; ?>
      <li class="page-item"></li>
    </ul>
  </nav>
  <?php endif; ?>
<?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/productos/conteos.blade.php ENDPATH**/ ?>