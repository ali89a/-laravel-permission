<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('dashboard')}}" class="brand-link">
    <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="Emotobazar Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">EMoto Bazar</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{route('dashboard')}}" class="nav-link {{ (Request::segment(1) == 'dashboard' )?' active':''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        
        <li class="nav-item {{ (Request::segment(2) == 'roles'|| Request::segment(2) == 'users' )?'menu-open':''}}">
          <a href="#" class="nav-link {{ (Request::segment(2) == 'roles'||Request::segment(2) == 'users' )?' active':''}}">
            <i class="nav-icon fa fa-shield-alt" aria-hidden="true"></i>
            <p>
              Access Control
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('user.roles.index') }}" class="nav-link {{ (Request::segment(2) == 'roles' )?' active-color':''}}">
                <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                <p>Role</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('user.users.index') }}" class="nav-link {{ (Request::segment(2) == 'users' )?' active-color':''}}">

                <i class="far fa-circle nav-icon" aria-hidden="true"></i>
                <p>User</p>
              </a>
            </li>

          </ul>
        </li>
      
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>