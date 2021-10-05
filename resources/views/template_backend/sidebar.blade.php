<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">SiLabu</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class=active><a class="nav-link" href="{{ url('announce') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Starter</li>
            <li class=active><a class="nav-link" href="{{ url('post') }}"><i class="far fa-square"></i> <span>List Data</span></a></li>
            @if($role == 0)
            <li class=active><a class="nav-link" href="{{ url('dashboard') }}"><i class="far fa-square"></i> <span>Upload Data</span></a></li>
            @endif
            <!-- <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-clipboard"></i> <span>Post</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ url('post') }}">List Post</a></li>
                <li><a class="nav-link" href="{{ url('dashboard') }}">Dashboard</a></li>
              </ul>

            </li> -->
            @if($role == 1)
            <li class=active><a class="nav-link" href="{{ url('user') }}"><i class="far fa-square"></i> <span>User Management</span></a></li>
            <li class=active><a class="nav-link" href="{{ url('mng_announce') }}"><i class="far fa-square"></i> <span>Announce Management</span></a></li>
            @endif
                    </aside>
       </div>