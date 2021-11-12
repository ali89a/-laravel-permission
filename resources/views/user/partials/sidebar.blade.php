<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{ asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Gauwal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link {{ (Request::segment(1) == 'home' )?' active-color':''}}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>{{ __('sidebar.dashboard')}}</p>
                </a>
            </li>         
            <li class="nav-item has-treeview {{ ( Request::segment(1) == 'access-control' )?'menu-open':''}}">
                <a href="#" class="nav-link {{ ( Request::segment(1) == 'access-control')?'active-color':''}}">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Settings
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="margin-left: 15px;">
                    <li class="nav-item">
                        <a href="{{route('user.index')}}" class="nav-link {{ ( Request::segment(2) == 'user' )?'active-color':''}}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <p>&nbsp; Users</p>
                        </a>
                    </li>
                  
                    <li class="nav-item">
                        <a href="{{route('role.index')}}" class="nav-link {{ ( Request::segment(2) == 'role' )?'active-color':''}}">
                            <i class="fa fa-list" aria-hidden="true"></i>
                            <p>&nbsp; Role</p>
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