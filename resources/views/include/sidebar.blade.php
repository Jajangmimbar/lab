        <div class="logo">
        <a href="#" class="simple-text logo-normal">
         Lab.Perancangan Mesin
        </a></div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            {{-- <img src="{{ asset('assets/img/IMG-20200925-WA0005.jpg') }}"> --}}
            <img src="{{ asset('storage/user') }}/{{ Auth::User()->name }}/{{ Auth::User()->foto }}">
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#" class="username">
              <span style="text-transform: uppercase;">
                {{ Auth::User()->name }}
              </span>
            </a>
          </div>
        </div>
        <ul class="nav" id="nav">
            <li class="nav-item side1">
                <a class="nav-link" href="{{ url('/home') }}">
                  <i class="material-icons">apps</i>
                   <span class="sidebar-normal">Dashboard</span>
                </a>
            </li>
            <li class="nav-item side1 admin">
              <a class="nav-link" href="{{ url('/user') }}">
                  <i class="material-icons">supervised_user_circle</i>
                  <span class="sidebar-normal">Daftar User</span>
              </a>
          </li>
          <li class="nav-item side1">
            <a class="nav-link" href="{{ url('/daftar-alat') }}">
                <i class="material-icons">build</i>
                <span class="sidebar-normal">Daftar Alat</span>
            </a>
          </li>
            <li class="nav-item side1 admin">
              <a class="nav-link" href="{{ url('/alat') }}">
                <i class="material-icons">add_circle_outline</i>
                  <span class="sidebar-normal">Tambah Alat</span>
              </a>
          </li>
          <li class="nav-item side1">
            <a class="nav-link" href="{{ url('/riwayat-service') }}">
              <i class="material-icons">history</i>
                <span class="sidebar-normal">Riwayat Service</span>
            </a>
          </li>
          <li class="nav-item side1">
              <a class="nav-link" href="{{ url('/pinjam-alat') }}">
                <i class="material-icons">book</i>
                  <span class="sidebar-normal">Pinjam Alat</span>
              </a>
          </li>
          <li class="nav-item side1">
              <a class="nav-link" href="{{ url('/riwayat-peminjaman') }}">
                <i class="material-icons">history</i>
                  <span class="sidebar-normal">Riwayat Peminjaman</span>
              </a>
          </li>
        </ul>
      </div>
  

