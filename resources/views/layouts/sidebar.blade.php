<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard.index') }}" class="brand-link text-center">
        <span class="brand-text font-weight-bold">zoprobotik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar ">
        <div class="user-panel mt-3 pb-3 mb-3 text-center">
            <div class="info ">
                <a class="">Aplikasi Pendataan <br>Barang Robotik</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-star"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('barangs.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Data Barang
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transaksis.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Transaksi Barang
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('suppliers.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Data Supplier
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <i class="ml-3 nav-icon fas fa-arrow-circle-left"></i>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); 
                    document.getElementById('logout-form').submit();">{{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
