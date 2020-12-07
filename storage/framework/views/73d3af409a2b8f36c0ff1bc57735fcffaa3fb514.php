<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Hardware">
  <meta name="keywords" content="Hardware">
  <meta name="author" content="Hardware">
  <title>HC</title>
  <link rel="apple-touch-icon" href="<?php echo e(url('app-assets/images/ico/apple-icon-120.png')); ?>">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(url('app-assets/images/ico/favicon.ico')); ?>">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/css/vendors.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/vendors/css/extensions/unslider.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/vendors/css/weather-icons/climacons.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/fonts/meteocons/style.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/vendors/css/charts/morris.css')); ?>">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/css/app.css')); ?>">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/css/core/menu/menu-types/horizontal-menu.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/css/core/colors/palette-gradient.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/fonts/simple-line-icons/style.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/css/core/colors/palette-gradient.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/css/pages/timeline.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/vendors/css/tables/datatable/datatables.min.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/vendors/css/forms/selects/select2.min.css')); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('assets/css/style.css')); ?>">

</head>

<body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover"
data-menu="horizontal-menu" data-col="2-columns">
<?php if(!Auth::guest()): ?>
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-static-top navbar-dark bg-gradient-x-grey-blue navbar-border navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
              <h2 class="brand-text ">Hardware Collection</h2>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left"></ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="avatar avatar-online">
                  <img src="<?php echo e(url('app-assets/images/portrait/small/avatar-s-1.png')); ?>" alt="avatar"><i></i></span>
                <span class="user-name"><?php echo e(Auth::user()->name); ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="user-profile.html"><i class="ft-user"></i> Edit Profile</a>
                <a class="dropdown-item" href="email-application.html"><i class="ft-mail"></i> My Inbox</a>
                <a class="dropdown-item" href="user-cards.html"><i class="ft-check-square"></i> Task</a>
                <a
                class="dropdown-item" href="chat-application.html"><i class="ft-message-square"></i> Chats</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?php echo url('/logout'); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ft-power"></i> Logout</a>                
                <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                                <?php echo e(csrf_field()); ?>

                                            </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <?php echo $__env->make('layouts.menu_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-body">
        <section id="focus-cell">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <?php echo $__env->make('layouts.filtros', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="card-content">
                    <?php echo $__env->yieldContent('content'); ?>
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
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent"
        target="_blank">PIXINVENT </a>, All rights reserved. </span>
      <span class="float-md-right d-block d-md-inline-block d-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
  </footer>
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
<div class="modal fade" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document" id="modal_primary">
    <div class="modal-content">
      <div class="modal-header bg-primary white">
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
</div>


<?php /**PATH /home/altermed/public_html/hardwarecollection.mx/laravel/resources/views/layouts/master.blade.php ENDPATH**/ ?>