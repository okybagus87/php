<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/dashboard" class="brand-link">
        <img src="{{asset('Logo pln.png')}}" class="brand-image">
        <span class="brand-text font-weight-light">FP TLN</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('getDashboard')}}" class="nav-link {{request()->is('dashboard', '/') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item {{request()->is('master/dataPeserta', 'master/dataPenguji', 'master/dataPeserta/add') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{request()->is('master/dataPeserta', 'master/dataPenguji', 'master/dataPeserta/add') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Master
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('getPeserta')}}" class="nav-link {{request()->is('master/dataPeserta', 'master/dataPeserta/add') ? 'active' : ''}}">
                                <p>Data Peserta</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('getPenguji')}}" class="nav-link {{request()->is('master/dataPenguji') ? 'active' : ''}}">
                                <p>Data Penguji</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{request()->is('fit-proper/pendaftaran') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{request()->is('fit-proper/pendaftaran') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            Fit & Proper
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('fitProper.pendaftaran')}}" class="nav-link {{request()->is('fit-proper/pendaftaran') ? 'active' : ''}}">
                                <p>Pendaftaran Fit & Proper</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Pendaftaran Wawancara</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Penilaian Fit & Proper</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Penilaian Wawancara</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Report
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Rekap Nilai Fit & Proper</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Rekap Manual Nilai Fit & Proper</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Cetak Nilai Fit & Proper</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Rekap Nilai Wawancara</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p>Cetak Nilai Wawancara</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('fitProper.pencarian')}}" class="nav-link {{request()->is('fit-proper/pencarian') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Pencarian Fit Proper
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Administrasi User
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
