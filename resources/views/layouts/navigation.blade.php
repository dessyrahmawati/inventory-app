            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('home') }}"
                                class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    {{ __('Dashboard') }}
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                                class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    {{ __('Users') }}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}"
                                class="nav-link {{ request()->routeIs('roles.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-shield"></i>
                                <p>
                                    {{ __('Role') }}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('barang.index') }}"
                                class="nav-link {{ request()->routeIs('barang.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    {{ __('Barang') }}
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('supplier.index') }}"
                                class="nav-link {{ request()->routeIs('supplier.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-truck"></i>
                                <p>
                                    {{ __('Suppliers') }}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cabang.index') }}"
                                class="nav-link {{ request()->routeIs('cabang.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-building"></i>
                                <p>
                                    {{ __('Cabang') }}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kurir.index') }}"
                                class="nav-link {{ request()->routeIs('kurir.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-motorcycle"></i>
                                <p>
                                    {{ __('Kurir') }}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('about') }}"
                                class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                                <i class="nav-icon far fa-address-card"></i>
                                <p>
                                    {{ __('About us') }}
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-circle nav-icon"></i>
                                <p>
                                    Two-level menu
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Child menu</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
