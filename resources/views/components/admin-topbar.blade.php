<div class="topbar">

    <div class="topbar-left">

        <button id="toggleSidebar"
                class="btn border-0">
            <i class="fas fa-bars"></i>
        </button>

        <h5 class="mb-0">
            Admin Panel IICG
        </h5>

    </div>

    <div class="topbar-right">

        <button class="notification-btn">
            <i class="fas fa-bell"></i>
        </button>

        <div class="user-profile">

            <div class="user-info">
                <div class="user-name">
                    {{ auth()->user()->name }}
                </div>

                <div class="user-role">
                    Administrator
                </div>
            </div>

            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name,0,1)) }}
            </div>

        </div>

    </div>

</div>