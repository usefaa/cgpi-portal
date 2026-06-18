<div class="sidebar" id="sidebar">

    <div class="sidebar-header">

        <div class="sidebar-brand">

            <img src="{{ asset('images/IICG logo.jpeg') }}"
                alt="IICG Logo"
                class="logo-img">

            <div class="sidebar-brand-text">

                Indonesian Institute for
                Corporate Governance

            </div>

        </div>

    </div>

    <div class="sidebar-menu">

        @auth

            @if(auth()->user()->role === 'admin')

                <a href="{{ route('admin.dashboard') }}"
                   class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>

                <a href="{{ route('admin.pendaftaran.index') }}"
                   class="sidebar-link {{ request()->routeIs('admin.pendaftaran.*') ? 'active' : '' }}">
                    Pendaftaran CGPI
                </a>

                <a href="{{ route('admin.berita.index') }}"
                   class="sidebar-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
                    Manajemen Berita
                </a>

                <a href="{{ route('admin.regulasi.index') }}"
                   class="sidebar-link {{ request()->routeIs('admin.regulasi.*') ? 'active' : '' }}">
                    Manajemen Regulasi
                </a>

                <a href="{{ route('tentang.index') }}"
                   class="sidebar-link {{ request()->routeIs('tentang.*') ? 'active' : '' }}">
                    Kontak
                </a>

            @else

                <button class="submenu-toggle"
                        onclick="toggleCGPI()">

                    <span>CGPI</span>

                    <span id="cgpiArrow">−</span>

                </button>

                <div id="cgpiMenu" class="submenu">

                    <a href="{{ route('cgpi.informasi') }}"
                       class="sidebar-link {{ request()->routeIs('cgpi.informasi') ? 'active' : '' }}">
                        Informasi
                    </a>

                    <a href="{{ route('cgpi.pendaftaran') }}"
                       class="sidebar-link {{ request()->routeIs('cgpi.pendaftaran') ? 'active' : '' }}">
                        Pendaftaran
                    </a>

                    <a href="{{ route('pendaftaran.status') }}"
                       class="sidebar-link {{ request()->routeIs('pendaftaran.status') ? 'active' : '' }}">
                        Status Pendaftaran
                    </a>

                    @php
                        $pendaftaran = \App\Models\Pendaftaran::where(
                            'user_id',
                            auth()->id()
                        )->latest()->first();
                    @endphp

                    @if($pendaftaran && $pendaftaran->status == 'Diterima')

                        <a href="{{ route('cgpi.kuesioner') }}"
                           class="sidebar-link">
                            Kuesioner
                        </a>

                    @endif

                </div>

                <a href="{{ route('regulasi.index') }}"
                   class="sidebar-link {{ request()->routeIs('regulasi.*') ? 'active' : '' }}">
                    Regulasi
                </a>

                <a href="{{ route('layanan.index') }}"
                   class="sidebar-link {{ request()->routeIs('layanan.*') ? 'active' : '' }}">
                    Layanan
                </a>

                <a href="{{ route('berita.index') }}"
                   class="sidebar-link {{ request()->routeIs('berita.*') ? 'active' : '' }}">
                    Berita
                </a>

                <a href="{{ route('tentang.index') }}"
                   class="sidebar-link {{ request()->routeIs('tentang.*') ? 'active' : '' }}">
                    Kontak
                </a>

            @endif

        @else

            <button class="submenu-toggle"
                    onclick="toggleCGPI()">

                <span>CGPI</span>

                <span id="cgpiArrow">−</span>

            </button>

            <div id="cgpiMenu" class="submenu">

                <a href="{{ route('cgpi.informasi') }}"
                   class="sidebar-link {{ request()->routeIs('cgpi.informasi') ? 'active' : '' }}">
                    Informasi
                </a>

                <a href="{{ route('cgpi.pendaftaran') }}"
                   class="sidebar-link {{ request()->routeIs('cgpi.pendaftaran') ? 'active' : '' }}">
                    Pendaftaran
                </a>

            </div>

            <a href="{{ route('regulasi.index') }}"
               class="sidebar-link {{ request()->routeIs('regulasi.*') ? 'active' : '' }}">
                Regulasi
            </a>

            <a href="{{ route('layanan.index') }}"
               class="sidebar-link {{ request()->routeIs('layanan.*') ? 'active' : '' }}">
                Layanan
            </a>

            <a href="{{ route('berita.index') }}"
               class="sidebar-link {{ request()->routeIs('berita.*') ? 'active' : '' }}">
                Berita
            </a>

            <a href="{{ route('tentang.index') }}"
               class="sidebar-link {{ request()->routeIs('tentang.*') ? 'active' : '' }}">
                Kontak
            </a>


        @endauth

    </div>


    <div class="sidebar-footer">

        @auth

            <div class="sidebar-user">

                <div class="sidebar-avatar">
                    {{ strtoupper(substr(auth()->user()->name,0,1)) }}
                </div>

                <div>

                    <div class="sidebar-user-name">
                        {{ auth()->user()->name }}
                    </div>

                    <div class="sidebar-user-role">
                        {{ ucfirst(auth()->user()->role) }}
                    </div>

                </div>

            </div>

            <form method="POST"
                action="{{ route('logout') }}">

                @csrf

                <button type="submit"
                        class="sidebar-btn">

                    Logout

                </button>

            </form>

        @else

            <a href="{{ route('login') }}"
            class="sidebar-btn">

                Login

            </a>

            <a href="{{ route('register') }}"
            class="sidebar-btn sidebar-btn-outline">

                Registrasi

            </a>

        @endauth

    </div>

</div>