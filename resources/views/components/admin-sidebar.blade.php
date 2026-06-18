<div class="sidebar" id="sidebar">

    <div class="sidebar-header">
        <div class="logo-container">
            <img src="{{ asset('images/IICG logo.jpeg') }}" alt="IICG Logo" class="logo-img">
        </div>
    </div>

    <div class="sidebar-menu">

        <a href="{{ route('admin.dashboard') }}"
           class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-chart-pie"></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.berita.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
            <i class="fas fa-newspaper"></i>
            <span>Kelola Berita</span>
        </a>

        <a href="{{ route('admin.regulasi.index') }}"
           class="sidebar-link {{ request()->routeIs('admin.regulasi.*') ? 'active' : '' }}">
            <i class="fas fa-book"></i>
            <span>Kelola Regulasi</span>
        </a>

        <hr class="text-secondary">

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit"
                    class="sidebar-link border-0 bg-transparent text-start w-100">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>

    </div>

</div>