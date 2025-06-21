<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">
                <div class="p-2 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('img/unival.png') }}" width="100" height="100" alt="unival">
                </div>
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">SKA</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fas fa-house-user"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Disposisi Surat</li>
            <li class="nav-item {{ request()->query('category') === 'dean_of_faculty' ? 'active' : '' }}">
                <a href="{{ route('dispositions.edit', ['category' => 'dean_of_faculty']) }}" class="nav-link">
                    <i class="fas fa-id-card"></i>
                    <span>Dekan Fakultas</span>
                </a>
            </li>
            <li class="nav-item {{ request()->query('category') === 'vice_rector' ? 'active' : '' }}">
                <a href="{{ route('dispositions.edit', ['category' => 'vice_rector']) }}" class="nav-link">
                    <i class="fas fa-id-card"></i>
                    <span>Wakil Rektor I</span>
                </a>
            </li>

            <li class="menu-header">Informasi Umum</li>
            <li class="nav-item {{ request()->is('lectures*') ? 'active' : '' }}">
                <a href="{{ route('lectures.index') }}" class="nav-link">
                    <i class="far fa-user"></i>
                    <span>Dosen</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('students*') ? 'active' : '' }}">
                <a href="{{ route('students.index') }}" class="nav-link">
                    <i class="far fa-user"></i>
                    <span>Mahasiswa</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('rooms*') ? 'active' : '' }}">
                <a href="{{ route('rooms.index') }}" class="nav-link">
                    <i class="fas fa-building"></i>
                    <span>Ruangan</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('academic-calendars*') ? 'active' : '' }}">
                <a href="{{ route('academic-calendars.index') }}" class="nav-link">
                    <i class="fas fa-calendar-days"></i>
                    <span>Tahun Akademik</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('council-hubs*') ? 'active' : '' }}">
                <a href="{{ route('council-hubs.index') }}" class="nav-link">
                    <i class="fas fa-tower-cell"></i>
                    <span>Pusat Sidang</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('proposals*') || request()->is('final-projects*') ? 'active' : '' }}">
                <a href="{{ route('proposals.index') }}" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-book-open-reader"></i>
                    <span>Galeri Sidang</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('proposals*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('proposals.index') }}">Seminar</a>
                    </li>
                    <li class="{{ request()->is('final-projects*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('final-projects.index') }}">Skripsi & TA</a>
                    </li>
                </ul>
            </li>

            <li class="menu-header">Agenda Sidang</li>
            @foreach ($academicCalendars as $academicCalendar)
                <li class="nav-item {{ request()->is('periodes/' . $academicCalendar->id . '/*') ? 'active' : '' }}">
                    <a href="{{ route('periodes.show', ['periode' => $academicCalendar->id]) }}"
                        class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-calendar"></i>
                        <span>{{ $academicCalendar->periode_year }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ request()->is("periodes/$academicCalendar->id/proposals") ? 'active' : '' }}">
                            <a class="nav-link"
                                href="{{ route('periodes.proposals', ['periode' => $academicCalendar->id]) }}">Seminar</a>
                        </li>
                        <li
                            class="{{ request()->is("periodes/$academicCalendar->id/final-projects") ? 'active' : '' }}">
                            <a class="nav-link"
                                href="{{ route('periodes.final-projects', ['periode' => $academicCalendar->id]) }}">Skripsi
                                & TA</a>
                        </li>
                    </ul>
                </li>
            @endforeach
        </ul>
    </aside>
</div>
