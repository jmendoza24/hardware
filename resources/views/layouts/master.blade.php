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
  <link rel="apple-touch-icon" href="{{ url('app-assets/images/ico/apple-icon-120.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ url('app-assets/images/ico/favicon.ico')}}">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/vendors.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/extensions/unslider.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/weather-icons/climacons.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/fonts/meteocons/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/charts/morris.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/app.css')}}">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/core/menu/menu-types/horizontal-menu.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/core/colors/palette-gradient.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/fonts/simple-line-icons/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/core/colors/palette-gradient.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/css/pages/timeline.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ url('app-assets/vendors/css/forms/selects/select2.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{ url('assets/css/style.css')}}">
</head>

<body class="horizontal-layout horizontal-menu 2-columns   menu-expanded" data-open="hover"
data-menu="horizontal-menu" data-col="2-columns">
@if (!Auth::guest())
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-static-top navbar-dark bg-gradient-x-grey-blue navbar-border navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="index.html">
              <img class="brand-logo" alt="stack admin logo" src="../../../app-assets/images/logo/stack-logo-light.png">
              <h2 class="brand-text">Stack</h2>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
            <li class="dropdown nav-item mega-dropdown"><a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Mega</a>
              <ul class="mega-dropdown-menu dropdown-menu row">
                <li class="col-md-2">
                  <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="fa fa-newspaper-o"></i> News</h6>
                  <div id="mega-menu-carousel-example">
                    <div>
                      <img class="rounded img-fluid mb-1" src="../../../app-assets/images/slider/slider-2.png"
                      alt="First slide"><a class="news-title mb-0" href="#">Poster Frame PSD</a>
                      <p class="news-content">
                        <span class="font-small-2">January 26, 2016</span>
                      </p>
                    </div>
                  </div>
                </li>
                <li class="col-md-3">
                  <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-random"></i> Drill down menu</h6>
                  <ul class="drilldown-menu">
                    <li class="menu-list">
                      <ul>
                        <li>
                          <a class="dropdown-item" href="layout-2-columns.html"><i class="ft-file"></i> Page layouts & Templates</a>
                        </li>
                        <li><a href="#"><i class="ft-align-left"></i> Multi level menu</a>
                          <ul>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-bookmark-o"></i>  Second level</a></li>
                            <li><a href="#"><i class="fa fa-lemon-o"></i> Second level menu</a>
                              <ul>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-heart-o"></i>  Third level</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-file-o"></i> Third level</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-trash-o"></i> Third level</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-clock-o"></i> Third level</a></li>
                              </ul>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-hdd-o"></i> Second level, third link</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-floppy-o"></i> Second level, fourth link</a></li>
                          </ul>
                        </li>
                        <li>
                          <a class="dropdown-item" href="color-palette-primary.html"><i class="ft-camera"></i> Color pallet system</a>
                        </li>
                        <li><a class="dropdown-item" href="sk-2-columns.html"><i class="ft-edit"></i> Page starter kit</a></li>
                        <li><a class="dropdown-item" href="changelog.html"><i class="ft-minimize-2"></i> Change log</a></li>
                        <li>
                          <a class="dropdown-item" href="https://pixinvent.ticksy.com/"><i class="fa fa-life-ring"></i> Customer support center</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="col-md-3">
                  <h6 class="dropdown-menu-header text-uppercase"><i class="fa fa-list-ul"></i> Accordion</h6>
                  <div id="accordionWrap" role="tablist" aria-multiselectable="true">
                    <div class="card border-0 box-shadow-0 collapse-icon accordion-icon-rotate">
                      <div class="card-header p-0 pb-2 border-0" id="headingOne" role="tab"><a data-toggle="collapse" data-parent="#accordionWrap" href="#accordionOne"
                        aria-expanded="true" aria-controls="accordionOne">Accordion Item #1</a></div>
                      <div class="card-collapse collapse show" id="accordionOne" role="tabpanel" aria-labelledby="headingOne"
                      aria-expanded="true">
                        <div class="card-content">
                          <p class="accordion-text text-small-3">Caramels dessert chocolate cake pastry jujubes bonbon.
                            Jelly wafer jelly beans. Caramels chocolate cake liquorice
                            cake wafer jelly beans croissant apple pie.</p>
                        </div>
                      </div>
                      <div class="card-header p-0 pb-2 border-0" id="headingTwo" role="tab"><a class="collapsed" data-toggle="collapse" data-parent="#accordionWrap"
                        href="#accordionTwo" aria-expanded="false" aria-controls="accordionTwo">Accordion Item #2</a></div>
                      <div class="card-collapse collapse" id="accordionTwo" role="tabpanel" aria-labelledby="headingTwo"
                      aria-expanded="false">
                        <div class="card-content">
                          <p class="accordion-text">Sugar plum bear claw oat cake chocolate jelly tiramisu
                            dessert pie. Tiramisu macaroon muffin jelly marshmallow
                            cake. Pastry oat cake chupa chups.</p>
                        </div>
                      </div>
                      <div class="card-header p-0 pb-2 border-0" id="headingThree" role="tab"><a class="collapsed" data-toggle="collapse" data-parent="#accordionWrap"
                        href="#accordionThree" aria-expanded="false" aria-controls="accordionThree">Accordion Item #3</a></div>
                      <div class="card-collapse collapse" id="accordionThree" role="tabpanel" aria-labelledby="headingThree"
                      aria-expanded="false">
                        <div class="card-content">
                          <p class="accordion-text">Candy cupcake sugar plum oat cake wafer marzipan jujubes
                            lollipop macaroon. Cake dragée jujubes donut chocolate
                            bar chocolate cake cupcake chocolate topping.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="col-md-4">
                  <h6 class="dropdown-menu-header text-uppercase mb-1"><i class="fa fa-envelope-o"></i> Contact Us</h6>
                  <form class="form form-horizontal">
                    <div class="form-body">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputName1">Name</label>
                        <div class="col-sm-9">
                          <div class="position-relative has-icon-left">
                            <input class="form-control" type="text" id="inputName1" placeholder="John Doe">
                            <div class="form-control-position pl-1"><i class="fa fa-user-o"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputEmail1">Email</label>
                        <div class="col-sm-9">
                          <div class="position-relative has-icon-left">
                            <input class="form-control" type="email" id="inputEmail1" placeholder="john@example.com">
                            <div class="form-control-position pl-1"><i class="fa fa-envelope-o"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="inputMessage1">Message</label>
                        <div class="col-sm-9">
                          <div class="position-relative has-icon-left">
                            <textarea class="form-control" id="inputMessage1" rows="2" placeholder="Simple Textarea"></textarea>
                            <div class="form-control-position pl-1"><i class="fa fa-commenting-o"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12 mb-1">
                          <button class="btn btn-primary float-right" type="button"><i class="fa fa-paper-plane-o"></i> Send</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </li>
              </ul>
            </li>
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
            <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
              <div class="search-input">
                <input class="input" type="text" placeholder="Explore Stack...">
              </div>
            </li>
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="avatar avatar-online">
                  <img src="{{ url('app-assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar"><i></i></span>
                <span class="user-name">{{ Auth::user()->name}}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="user-profile.html"><i class="ft-user"></i> Edit Profile</a>
                <a class="dropdown-item" href="email-application.html"><i class="ft-mail"></i> My Inbox</a>
                <a class="dropdown-item" href="user-cards.html"><i class="ft-check-square"></i> Task</a>
                <a
                class="dropdown-item" href="chat-application.html"><i class="ft-message-square"></i> Chats</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{!! url('/logout') !!}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ft-power"></i> Logout</a>                
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  @include('layouts.menu_master')
    <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-body">
        <section id="focus-cell">
          <div class="row">
            <div class="col-12">
              <div class="card">
                @include('layouts.filtros')
                <div class="card-content">
                    @yield('content')
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
@endif

    <!-- jQuery 3.1.1 -->
    <script src="{{ url('app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{ url('app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.js')}}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/forms/extended/typeahead/bloodhound.min.js')}}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/forms/extended/typeahead/handlebars.js')}}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js')}}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/forms/extended/maxlength/bootstrap-maxlength.js')}}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
 <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="{{ url('app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{ url('app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <script src="{{ url('app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/tables/buttons.flash.min.js')}}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/tables/jszip.min.js')}}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/tables/pdfmake.min.js')}}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/tables/vfs_fonts.js')}}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/tables/buttons.html5.min.js')}}" type="text/javascript"></script>
  <script src="{{ url('app-assets/vendors/js/tables/buttons.print.min.js')}}" type="text/javascript"></script>

  <script src="{{ url('app-assets/js/scripts/tables/datatables/datatable-basic.js') }}"  type="text/javascript"></script>
  <script src="{{ url('app-assets/js/scripts/forms/extended/form-typeahead.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/js/scripts/forms/extended/form-inputmask.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/js/scripts/forms/extended/form-maxlength.js') }}" type="text/javascript"></script>
  <script src="{{ url('app-assets/js/scripts/navs/navs.js')}}" type="text/javascript"></script>
  <script src="{{ url('assets/js/scripts.js')}}" type="text/javascript"></script>
  <script src="{{ url('assets/js/jquery.blockUI.js')}}" type="text/javascript"></script>
  <script src="{{ url('app-assets/js/scripts/forms/select/form-select2.js') }}" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="{{ url('app-assets/js/scripts/tables/datatables/datatable-advanced.js') }}" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <!-- END PAGE LEVEL JS-->
  @yield('scripts')
</body>
</html>
<div class="modal fade" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document" id="modal_primary">
    <div class="modal-content">
      <div class="modal-header bg-primary white">
        <h4 class="modal-title" id="myModalLabel8">Hardware collection</h4>
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


