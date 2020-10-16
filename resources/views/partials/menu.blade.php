<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">Project</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("admin.home") }} " class="nav-link {{ request()->is('admin/home*') ? 'active' : '' }}">
                        <p>
                            <i class="fas fa-tachometer-alt">

                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                

                @can('gestao_academica')
                    <li class="nav-item has-treeview {{ request()->is('admin/cursos*') ? 'menu-open' : '' }}  {{ request()->is('admin/turmas*') ? 'menu-open' : '' }}  {{ request()->is('inscricoes*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                        <i class="fas fa-leaf"></i>
                            <p>
                                <span>{{ trans('global.gestao_academica') }}</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                                <a href="{{ route('admin.cursos.index') }}" class="nav-link {{ request()->is('admin/cursos') || request()->is('admin/cursos/*') ? 'active' : '' }}">
                                <i class="fas fa-caret-right"></i>

                                <p>
                                    <span>{{ trans('global.curso.title') }}</span>
                                </p>
                                </a>
                            </li>
                  
                
                
                            <!--Inscrições-->
                            <li class="nav-item">
                                <a href="{{ route("inscricoes.index") }}" class="nav-link {{ request()->is('inscricoes') || request()->is('inscricoes/*') ? 'active' : '' }}">
                                    <i class="fas fa-caret-right"></i>

                                  <p>
                                     <span>{{ trans('global.inscricoes.title') }}</span>
                                    </p>
                                    </a>
                        </li>

                <!--Turmas-->
                @can('ver_turmas')
                <li class="nav-item">
                        <a href="{{ route("admin.turmas.index") }}" class="nav-link {{ request()->is('admin/turmas') || request()->is('admin/turmas/*') ? 'active' : '' }}">
                        <i class="fas fa-caret-right"></i>

                            <p>
                                <span>{{ trans('global.turma') }}</span>
                            </p>
                        </a>
                </li>
                @endcan

                           
                        </ul>
                    </li>
                @endcan



                @can('administracao')
                    <li class="nav-item has-treeview {{ request()->is('admin/formadores*') ? 'menu-open' : '' }} ">
                        <a class="nav-link nav-dropdown-toggle">
                        <i class="far fa-lightbulb"></i>
                            <p>
                                <span>{{ trans('global.administracao') }}</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                                <a href="{{ route('admin.formadores.index') }}" class="nav-link {{ request()->is('admin/formadores') || request()->is('admin/formadores/*') ? 'active' : '' }}">
                                <i class="fas fa-caret-right"></i>

                                <p>
                                    <span>{{ trans('global.formadores') }}</span>
                                </p>
                                </a>
                            </li>
                  
                               
                        </ul>
                    </li>
                @endcan
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('global.userManagement.title') }}</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                      
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>