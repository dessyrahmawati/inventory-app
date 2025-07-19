                        @role('kurir')
                            <li class="nav-item">
                                <a href="{{ route('kurir.tugas') }}"
                                    class="nav-link {{ request()->routeIs('kurir.tugas') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-shipping-fast"></i>
                                    <p>
                                        Tugas Pengiriman Saya
                                    </p>
                                </a>
                            </li>
                        @endrole
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
                                        <a href="{{ route('stok-masuk.index') }}"
                                            class="nav-link {{ request()->routeIs('stok-masuk.*') ? 'active' : '' }}">
                                            <i class="nav-icon fas fa-arrow-down"></i>
                                            <p>
                                                {{ __('Stok Masuk') }}
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('laporan.stok') }}"
                                            class="nav-link {{ request()->routeIs('laporan.stok') ? 'active' : '' }}">
                                            <i class="nav-icon fas fa-file-alt"></i>
                                            <p>
                                                {{ __('Laporan Stok') }}
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('stok-keluar.index') }}"
                                            class="nav-link {{ request()->routeIs('stok-keluar.*') ? 'active' : '' }}">
                                            <i class="nav-icon fas fa-shipping-fast"></i>
                                            <p>
                                                Pengiriman Barang ke Cabang
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- /.sidebar-menu -->
                        </div>
                        <!-- /.sidebar -->
