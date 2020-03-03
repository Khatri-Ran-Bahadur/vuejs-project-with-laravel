  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="{{url('/')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PSS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PSS</b>
      </span>

    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li style="float:left; font-size:25px; font-weight: bold; "><a href="#" class="dropdown-toggle">
              <span class="hidden-xs">हुलाक सेवा विभाग सल्यान  
</span>
            </a>
          </li>
          <li style="float:left; font-size:25px; font-weight: bold; "><a href="#" class="dropdown-toggle">
              <span class="hidden-xs"></span>
            </a>
          </li>
          <li style="float:left; font-size:25px; font-weight: bold; "><a href="#" class="dropdown-toggle">
              <span class="hidden-xs"></span>
            </a>
          </li>
          <li style="float:left; font-size:25px; font-weight: bold; "><a href="#" class="dropdown-toggle">
              <span class="hidden-xs"></span>
            </a>
          </li>
          <li style="float:left; font-size:25px; font-weight: bold; "><a href="#" class="dropdown-toggle">
              <span class="hidden-xs"></span>
            </a>
          </li>
          <li style="float:left; font-size:25px; font-weight: bold; "><a href="#" class="dropdown-toggle">
              <span class="hidden-xs"></span>
            </a>
          </li>
          <li style="float:left; font-size:25px; font-weight: bold; "><a href="#" class="dropdown-toggle">
              <span class="hidden-xs"></span>
            </a>
          </li>
          <li style="float:left; font-size:25px; font-weight: bold; "><a href="#" class="dropdown-toggle">
              <span class="hidden-xs"></span>
            </a>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset(Auth::user()->image)}}" class="user-image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="#" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }}
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('/account/profile')}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>