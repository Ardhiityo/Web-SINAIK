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
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-house-user"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Manajemen UMKM</li>
            <li class="nav-item {{ request()->routeIs('link-productive.verifications.*') ? 'active' : '' }}">
                <a href="{{ route('link-productive.verifications.index') }}" class="nav-link">
                    <i class="fas fa-info-circle"></i>
                    <span>Verifkasi</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('umkm.products.*') ? 'active' : '' }}">
                <a href="{{ route('umkm.products.index') }}" class="nav-link">
                    <i class="far fa-building"></i>
                    <span>Sektor</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('umkm.products.*') ? 'active' : '' }}">
                <a href="{{ route('umkm.products.index') }}" class="nav-link">
                    <i class="fas fa-chart-line"></i>
                    <span>Skala</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('umkm.products.*') ? 'active' : '' }}">
                <a href="{{ route('umkm.products.index') }}" class="nav-link">
                    <i class="fas fa-medal"></i>
                    <span>Sertifikasi</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('umkm.products.*') ? 'active' : '' }}">
                <a href="{{ route('umkm.products.index') }}" class="nav-link">
                    <i class="fas fa-envelope-open-text"></i>
                    <span>Dukungan</span>
                </a>
            </li>

            <li class="menu-header">Manajemen Layanan</li>
            <li class="nav-item {{ request()->routeIs('umkm.incomes.*') ? 'active' : '' }}">
                <a href="{{ route('umkm.incomes.index') }}" class="nav-link">
                    <i class="fas fa-bullhorn"></i>
                    <span>Layanan</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('umkm.incomes.*') ? 'active' : '' }}">
                <a href="{{ route('umkm.incomes.index') }}" class="nav-link">
                    <i class="fas fa-list"></i>
                    <span>Pendaftar</span>
                </a>
            </li>

            <li class="menu-header">Informasi UMKM</li>
            <li class="nav-item {{ request()->routeIs('umkm.products.*') ? 'active' : '' }}">
                <a href="{{ route('umkm.products.index') }}" class="nav-link">
                    <i class="fas fa-store"></i>
                    <span>UMKM</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
