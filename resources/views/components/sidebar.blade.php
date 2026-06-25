<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-brand">
            <img src="{{ asset('images/IICG logo.jpeg') }}" alt="IICG Logo" class="logo-img">
            <div class="sidebar-brand-text">
                Indonesian Institute for Corporate Governance
            </div>
        </div>
    </div>

    <div class="sidebar-menu">
        @auth
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('admin.pendaftaran.index') }}" class="sidebar-link {{ request()->routeIs('admin.pendaftaran.*') ? 'active' : '' }}">Pendaftaran CGPI</a>
                <a href="{{ route('admin.berita.index') }}" class="sidebar-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">Manajemen Berita</a>
                <a href="{{ route('admin.regulasi.index') }}" class="sidebar-link {{ request()->routeIs('admin.regulasi.*') ? 'active' : '' }}">Manajemen Regulasi</a>
                <a href="{{ route('admin.pengaturan.edit') }}" class="sidebar-link {{ request()->routeIs('admin.pengaturan.*') ? 'active' : '' }}">Pengaturan Kontak</a>
            @else
                <button class="submenu-toggle" onclick="toggleCGPI()">
                    <span>CGPI</span>
                    <span id="cgpiArrow">−</span>
                </button>

                <div id="cgpiMenu" class="submenu">
                    <a href="{{ route('cgpi.informasi') }}" class="sidebar-link {{ request()->routeIs('cgpi.informasi') ? 'active' : '' }}">Informasi</a>
                    <a href="{{ route('cgpi.pendaftaran') }}" class="sidebar-link {{ request()->routeIs('cgpi.pendaftaran') ? 'active' : '' }}">Pendaftaran</a>
                    <a href="{{ route('pendaftaran.status') }}" class="sidebar-link {{ request()->routeIs('pendaftaran.status') ? 'active' : '' }}">Status Pendaftaran</a>
                    
                    @php
                        // Menjemput data pendaftaran user yang sedang login
                        $checkPendaftaran = \App\Models\Pendaftaran::where('user_id', auth()->id())->latest()->first();
                    @endphp

                    {{-- Pengecekan status dengan case-insensitive agar tidak sensitif huruf besar/kecil --}}
                    @if($checkPendaftaran && strtolower($checkPendaftaran->status) == 'diterima')
                        <a href="{{ route('cgpi.kuesioner') }}" class="sidebar-link {{ request()->routeIs('cgpi.kuesioner') ? 'active' : '' }}">
                            Kuesioner
                        </a>
                    @endif
                </div>

                <a href="{{ route('regulasi.index') }}" class="sidebar-link {{ request()->routeIs('regulasi.*') ? 'active' : '' }}">Regulasi</a>
                <a href="{{ route('layanan.index') }}" class="sidebar-link {{ request()->routeIs('layanan.*') ? 'active' : '' }}">Layanan</a>
                <a href="{{ route('berita.index') }}" class="sidebar-link {{ request()->routeIs('berita.*') ? 'active' : '' }}">Berita</a>
                <a href="{{ route('kontak.index') }}" class="sidebar-link {{ request()->routeIs('kontak.*') ? 'active' : '' }}">Kontak</a>
            @endif
        @else
            <button class="submenu-toggle" onclick="toggleCGPI()">
                <span>CGPI</span>
                <span id="cgpiArrow">−</span>
            </button>
            <div id="cgpiMenu" class="submenu">
                <a href="{{ route('cgpi.informasi') }}" class="sidebar-link {{ request()->routeIs('cgpi.informasi') ? 'active' : '' }}">Informasi</a>
                <a href="{{ route('cgpi.pendaftaran') }}" class="sidebar-link {{ request()->routeIs('cgpi.pendaftaran') ? 'active' : '' }}">Pendaftaran</a>
            </div>
            <a href="{{ route('regulasi.index') }}" class="sidebar-link {{ request()->routeIs('regulasi.*') ? 'active' : '' }}">Regulasi</a>
            <a href="{{ route('layanan.index') }}" class="sidebar-link {{ request()->routeIs('layanan.*') ? 'active' : '' }}">Layanan</a>
            <a href="{{ route('berita.index') }}" class="sidebar-link {{ request()->routeIs('berita.*') ? 'active' : '' }}">Berita</a>
            <a href="{{ route('kontak.index') }}" class="sidebar-link {{ request()->routeIs('kontak.*') ? 'active' : '' }}">Kontak</a>
        @endauth
    </div>

    <div class="sidebar-footer">
        @auth
            <div class="dropup w-100">
                <a href="#" class="sidebar-user text-decoration-none dropdown-toggle d-flex align-items-center w-100 p-2 rounded" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer; color: inherit;">
                    <div class="sidebar-avatar">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</div>
                    <div class="text-start ms-2">
                        <div class="sidebar-user-name">{{ auth()->user()->name }}</div>
                        <div class="sidebar-user-role">{{ ucfirst(auth()->user()->role) }}</div>
                    </div>
                </a>
                <ul class="dropdown-menu shadow border-0 w-100 mb-2" aria-labelledby="dropdownUser">
                    <li><a class="dropdown-item fw-medium py-2" href="{{ route('profile.edit') }}"><i class="fas fa-user-circle me-2 text-muted"></i> Profil Saya</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger fw-medium py-2"><i class="fas fa-sign-out-alt me-2"></i> Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <a href="{{ route('login') }}" class="sidebar-btn">Login</a>
            <a href="{{ route('register') }}" class="sidebar-btn sidebar-btn-outline">Registrasi</a>
        @endauth
    </div>
</div>