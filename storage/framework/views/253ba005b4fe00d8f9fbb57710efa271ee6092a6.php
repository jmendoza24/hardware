<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Hardware">
  <meta name="keywords" content="Hardware">
  <meta name="author" content="Hardware">
  <meta name="author" content="HardwareCollection">
  <title>HC</title>
  <link rel="apple-touch-icon" href="<?php echo e(url('app-assets/images/ico/apple-icon-120.png')); ?>">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(url('app-assets/images/ico/favicon.ico')); ?>">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/css/vendors.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/vendors/css/tables/datatable/datatables.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/vendors/css/forms/selects/select2.min.css')); ?>">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/css/app.css')); ?>">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/vendors/css/ui/dragula.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/css/core/menu/menu-types/vertical-menu-modern.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/css/core/colors/palette-gradient.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/css/plugins/forms/extended/form-extended.css')); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('assets/css/style.css')); ?>">
  <!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<?php if(!Auth::guest()): ?>
<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-body">
        <section id="focus-cell">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title"><?php echo $__env->yieldContent('titulo'); ?></h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <?php echo $__env->yieldContent('submenus'); ?>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <?php echo $__env->yieldContent('content'); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2020 <a class="text-bold-800 grey darken-2" href="snappath.mx"
        target="_blank">Snappath.mx </a>, All rights reserved. </span>
    </p>
  </footer>
<?php else: ?>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="<?php echo url('/'); ?>">
                    InfyOm Generator
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo url('/home'); ?>">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="<?php echo url('/login'); ?>">Login</a></li>
                    <li><a href="<?php echo url('/register'); ?>">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- jQuery 3.1.1 -->
    <script src="<?php echo e(url('app-assets/vendors/js/vendors.min.js')); ?>" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="<?php echo e(url('app-assets/vendors/js/tables/datatable/datatables.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('app-assets/vendors/js/forms/extended/typeahead/bloodhound.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('app-assets/vendors/js/forms/extended/typeahead/handlebars.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('app-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('app-assets/vendors/js/forms/extended/maxlength/bootstrap-maxlength.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('app-assets/vendors/js/forms/select/select2.full.min.js')); ?>" type="text/javascript"></script>
 <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="<?php echo e(url('app-assets/js/core/app-menu.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('app-assets/js/core/app.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('app-assets/js/scripts/customizer.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('app-assets/vendors/js/tables/buttons.flash.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('app-assets/vendors/js/tables/jszip.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('app-assets/vendors/js/tables/pdfmake.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('app-assets/vendors/js/tables/vfs_fonts.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('app-assets/vendors/js/tables/buttons.html5.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('app-assets/vendors/js/tables/buttons.print.min.js')); ?>" type="text/javascript"></script>

  <script src="<?php echo e(url('app-assets/js/scripts/tables/datatables/datatable-basic.js')); ?>"  type="text/javascript"></script>
  <script src="<?php echo e(url('app-assets/js/scripts/forms/extended/form-typeahead.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('app-assets/js/scripts/forms/extended/form-inputmask.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('app-assets/js/scripts/forms/extended/form-maxlength.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('app-assets/js/scripts/navs/navs.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('assets/js/scripts.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('assets/js/jquery.blockUI.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(url('app-assets/js/scripts/forms/select/form-select2.js')); ?>" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="<?php echo e(url('app-assets/js/scripts/tables/datatables/datatable-advanced.js')); ?>" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <!-- END PAGE LEVEL JS-->
  <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<div class="modal fade" id="primary" tabindex="-1" data-backdrop="false" role="dialog" aria-labelledby="myModalLabel8" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document" id="modal_primary">
    <div class="modal-content">
      <div class="modal-header white" style=" background: #38445a  !important;">
        <h4 class="modal-title" id="myModalLabel8">Hardware Collection</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="contenido">
      </div>
      <div class="modal-footer" id="footer_primary">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div><?php /**PATH C:\wamp64\www\laravel\hardware\resources\views/layouts/app.blade.php ENDPATH**/ ?>