@can('admin', \App\Models\User::class)

    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset(Auth::user()->image)}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>  {{Auth::user()->name}} </p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                       <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                   class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                    <a href="{{route('home')}}">
                        <i class="fa fa-edit"></i> <span>Dash</span>
                        <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{route('user.index')}}">
                        <i class="fa fa-edit"></i> <span>User List</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{route('job.index')}}">
                        <i class="fa fa-edit"></i> <span>Job List</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{route('company.index')}}">
                        <i class="fa fa-edit"></i> <span>Company List</span>
                        <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{route('category.index')}}">
                        <i class="fa fa-edit"></i> <span>Category List</span>
                        <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Comment List</span>
                        <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{route('role.index')}}">
                        <i class="fa fa-edit"></i> <span>Role-Permission</span>
                        <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i> <span>Exit</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

@endcan

@cannot('admin', \App\Models\User::class)

    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset(Auth::user()->image)}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>  {{Auth::user()->name}} </p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                    class="fa fa-search"></i>
                       </button>
                     </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                    <a href="{{route('home')}}">
                        <i class="fa fa-edit"></i> <span>Dash</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{route('user.edit',Auth::user()->id)}}">
                        <i class="fa fa-edit"></i> <span>About me</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{route('user.edit',Auth::user()->id)}}">
                        <i class="fa fa-edit"></i> <span>About me</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i> <span>Exit</span>
                        <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    @endcan
