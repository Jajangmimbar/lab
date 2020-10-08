<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <div class="navbar-minimize">
          <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
            <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
            <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
          </button>
        </div>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">
        <form class="navbar-form" method="get" action="{{ url('/cari') }}">
          <div class="input-group no-border">
            <input type="text" value="" name="cari" class="form-control" placeholder="Cari Alat" style="color: #fff;">
            <button type="submit" class="btn btn-white btn-round btn-just-icon">
              <i class="fa fa-search"></i>
              <div class="ripple-container"></div>
            </button>
          </div>
        </form>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user-circle"></i>
              Hallo, {{ Auth::User()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  
                  <i class="fa fa-power-off" style="margin: 0 10px 0 0;"></i> Keluar
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
 
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="panel-header panel-header-sm">
    <h1 class="header-text">SISTEM PEMANTAUAN & PEMELIHARAAN ALAT LAB. PERANCANGAN MESIN</h1>
  </div>

