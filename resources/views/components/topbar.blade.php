<div class="topbar">

    <div class="topbar-left">

        <button id="toggleSidebar"
                class="sidebar-toggle-btn">

            ☰

        </button>

        @php

        $pageTitle = 'Dashboard';

        if(request()->routeIs('cgpi.informasi')){
            $pageTitle = 'CGPI / Informasi';
        }
        elseif(request()->routeIs('cgpi.pendaftaran')){
            $pageTitle = 'CGPI / Pendaftaran';
        }
        elseif(request()->routeIs('pendaftaran.status')){
            $pageTitle = 'CGPI / Status Pendaftaran';
        }
        elseif(request()->routeIs('cgpi.kuesioner')){
            $pageTitle = 'CGPI / Kuesioner';
        }
        elseif(request()->routeIs('regulasi.*')){
            $pageTitle = 'Regulasi';
        }
        elseif(request()->routeIs('layanan.*')){
            $pageTitle = 'Layanan';
        }
        elseif(request()->routeIs('berita.*')){
            $pageTitle = 'Berita';
        }
        elseif(request()->routeIs('kontak.*')){
            $pageTitle = 'Kontak';
        }
        elseif(request()->routeIs('admin.dashboard')){
            $pageTitle = 'Dashboard';
        }
        elseif(request()->routeIs('admin.pendaftaran.*')){
            $pageTitle = 'Pendaftaran CGPI';
        }
        elseif(request()->routeIs('admin.berita.*')){
            $pageTitle = 'Manajemen Berita';
        }
        elseif(request()->routeIs('admin.regulasi.*')){
            $pageTitle = 'Manajemen Regulasi';
        }
        elseif(request()->routeIs('admin.pengaturan.*')){
            $pageTitle = 'Pengaturan Kontak';
        }

        @endphp

        <div class="page-title">
            {{ $pageTitle }}
        </div>

    </div>

    @auth

    <div class="topbar-user">

        <div class="topbar-avatar">

            {{ strtoupper(substr(auth()->user()->name,0,1)) }}

        </div>

        <div>

            <div class="topbar-user-name">

                {{ auth()->user()->name }}

            </div>

            <div class="topbar-user-role">

                {{ ucfirst(auth()->user()->role) }}

            </div>

        </div>

    </div>

    @endauth

</div>