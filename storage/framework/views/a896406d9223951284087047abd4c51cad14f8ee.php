<?php $__env->startSection('titulo'); ?>OC Fabricantes
<div class="col text-right">
        <a style="color: white" class=" btn btn-danger btn-sm" href="<?php echo e(route('pedido.finaliza')); ?>" >Guardar  <?php echo e($id_pedido); ?></a>
        <span style="color: white" class=" btn btn-info btn-sm" id="mas_producto"  > + Producto</span>
    </div>    
 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-md-12" id="pedidos_table">
        <?php echo $__env->make('tbl_oc_fabs.pedidos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $("#mas_producto").click(function(){
          $("#agrega_producto").toggle();
        });
    </script>
<?php $__env->stopSection(); ?>








<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/tbl_oc_fabs/show.blade.php ENDPATH**/ ?>