 <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top bg-gradient-x-grey-blue">
    <div class="navbar-wrapper">
      <div class="navbar-header" >
        <ul class="nav navbar-nav flex-row position-relative">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item mr-auto" >
            <a class="navbar-brand" href="{{ route('home')}}" >
              <h2 class="brand-text"><img src="{{ url('app-assets/images/logo_hc.png')}}" style="width: 100px; margin-top: -8px;"></h2>
            </a>
          </li>
          <li class="nav-item d-none d-md-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="avatar avatar-online">
                  <img src="../../../app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span>
                <span class="user-name white">
                    {{ Auth::user()->name}}
            </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="user-profile.html"><i class="ft-user"></i> Edit Profile</a>
                <a class="dropdown-item" href="email-application.html"><i class="ft-mail"></i> My Inbox</a>
                <a class="dropdown-item" href="user-cards.html"><i class="ft-check-square"></i> Task</a>
                <a class="dropdown-item" href="chat-application.html"><i class="ft-message-square"></i> Chats</a>
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
@include('layouts.menu')