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
            <li class="nav-item {{ request()->routeIs('link-productive.dashboard') ? 'active' : '' }}">
                <a href="{{ route('link-productive.dashboard') }}" class="nav-link">
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
            <li class="nav-item {{ request()->routeIs('link-productive.supports.*') ? 'active' : '' }}">
                <a href="{{ route('link-productive.supports.index') }}" class="nav-link">
                    <i class="fas fa-envelope-open-text"></i>
                    <span>Dukungan</span>
                </a>
            </li>

            <li class="menu-header">Manajemen Bisnis</li>
            <li class="nav-item {{ request()->routeIs('link-productive.sector-categories.*') ? 'active' : '' }}">
                <a href="{{ route('link-productive.sector-categories.index') }}" class="nav-link">
                    <i class="far fa-building"></i>
                    <span>Sektor</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('link-productive.business-scales.*') ? 'active' : '' }}">
                <a href="{{ route('link-productive.business-scales.index') }}" class="nav-link">
                    <i class="fas fa-chart-line"></i>
                    <span>Skala</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('link-productive.certifications.*') ? 'active' : '' }}">
                <a href="{{ route('link-productive.certifications.index') }}" class="nav-link">
                    <i class="fas fa-medal"></i>
                    <span>Sertifikasi</span>
                </a>
            </li>

            <li class="menu-header">Manajemen Layanan</li>
            <li class="nav-item {{ request()->routeIs('link-productive.services.*') ? 'active' : '' }}">
                <a href="{{ route('link-productive.services.index') }}" class="nav-link">
                    <i class="fas fa-bullhorn"></i>
                    <span>Layanan</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('link-productive.service-categories.*') ? 'active' : '' }}">
                <a href="{{ route('link-productive.service-categories.index') }}" class="nav-link">
                    <i class="fas fa-tag"></i>
                    <span>Kategori</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('link-productive.service-umkms.*') ? 'active' : '' }}">
                <a href="{{ route('link-productive.service-umkms.index') }}" class="nav-link">
                    <i class="fas fa-list"></i>
                    <span>Pendaftar</span>
                </a>
            </li>

            <li class="menu-header">Informasi UMKM</li>
            <li
                class="nav-item {{ (request()->routeIs('link-productive.umkms.*') ? 'active' : '' || request()->routeIs('link-productive.incomes.*')) ? 'active' : '' }}">
                <a href="{{ route('link-productive.umkms.index') }}" class="nav-link">
                    <i class="fas fa-store"></i>
                    <span>UMKM</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
