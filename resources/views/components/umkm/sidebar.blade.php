<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="">
                <div class="p-2 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('img/hero.png') }}" width="100" height="100" alt="link_productive"
                        class="rounded">
                </div>
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="">SNK</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Home</li>
            <li class="nav-item {{ request()->routeIs('umkm.dashboard') ? 'active' : '' }}">
                <a href="{{ route('umkm.dashboard') }}" class="nav-link">
                    <i class="fas fa-house-user"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Profil Bisnis</li>
            <li class="nav-item {{ request()->routeIs('umkm.verifications.index') ? 'active' : '' }}">
                <a href="{{ route('umkm.verifications.index') }}" class="nav-link">
                    <i class="fas fa-info-circle"></i>
                    <span>Verifikasi</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('umkm.biodatas.*') ? 'active' : '' }}">
                <a href="{{ route('umkm.biodatas.index') }}" class="nav-link">
                    <i class="fas fa-book"></i>
                    <span>Biodata</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('umkm.sector-category-umkms.*') ? 'active' : '' }}">
                <a href="{{ route('umkm.sector-category-umkms.index') }}" class="nav-link">
                    <i class="far fa-building"></i>
                    <span>Sektor</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('umkm.products.*') ? 'active' : '' }}">
                <a href="{{ route('umkm.products.index') }}" class="nav-link">
                    <i class="fas fa-shopping-bag"></i>
                    <span>Produk</span>
                </a>
            </li>

            <li class="menu-header">Pelaporan Bisnis</li>
            <li class="nav-item {{ request()->routeIs('umkm.incomes.*') ? 'active' : '' }}">
                <a href="{{ route('umkm.incomes.index') }}" class="nav-link">
                    <i class="fas fa-pen-alt"></i>
                    <span>Laporan</span>
                </a>
            </li>

            <li class="menu-header">Pusat UMKM</li>
            <li class="nav-item {{ request()->routeIs('umkm.umkms.*') ? 'active' : '' }}">
                <a href="{{ route('umkm.umkms.index') }}" class="nav-link">
                    <i class="fas fa-store"></i>
                    <span>UMKM</span>
                </a>
            </li>

            <li class="menu-header">Pusat Layanan</li>
            <li class="nav-item {{ request()->routeIs('umkm.services.*') ? 'active' : '' }}">
                <a href="{{ route('umkm.services.index') }}" class="nav-link">
                    <i class="fas fa-bullhorn"></i>
                    <span>Layanan</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('umkm.service-umkms.*') ? 'active' : '' }}">
                <a href="{{ route('umkm.service-umkms.index') }}" class="nav-link">
                    <i class="fas fa-list"></i>
                    <span>Layananku</span>
                </a>
            </li>

        </ul>
        <div class="p-3 mt-4 mb-4 hide-sidebar-mini">
        </div>
    </aside>
</div>
