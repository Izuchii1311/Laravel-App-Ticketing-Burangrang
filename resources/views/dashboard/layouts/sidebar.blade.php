{{-- Sidebar Section --}}
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard.index') }}" class="app-brand-link">
        <span class="fs-3 demo menu-text fw-bold ms-2">Dashboard</span>
        </a>

        <a href="{{ route('dashboard.index') }}" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ Request::is('dashboard*') ? "active open" : "" }}">
            <a href="{{ route('dashboard.index') }}" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('dashboard') ? "active open" : "" }}">
                    <a href="{{ route('dashboard.index') }}" class="menu-link">
                        <div data-i18n="Home">Home</div>
                    </a>
                </li>
                @can('admin')
                <li class="menu-item {{ Request::is('dashboard/message*') ? "active open" : "" }}">
                    <a href="{{ route('dashboard.message.show') }}" class="menu-link">
                        <div data-i18n="PesanPengunjung">Pesan Pengunjung</div>
                    </a>
                </li>
                @endcan
            </ul>
        </li>

        @can('admin')
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Postingan</span></li>
            <li class="menu-item {{ Request::is('dashboard/posts*') ? "active" : "" }}">
                <a href="{{ route('posts.index') }}" class="menu-link">
                    <i class='menu-icon tf-icons bx bx-news'></i>
                    <div data-i18n="Postingan">Postingan</div>
                </a>
            </li>
        @endcan

        @can('cashier')
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Ticketing</span></li>
            <li class="menu-item {{ Request::is('dashboard/ticket*') ? "active" : "" }}">
                <a href="{{ route('ticket.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div data-i18n="Documentation">Tiket</div>
                </a>
            </li>
            <li class="menu-item {{ Request::is('dashboard/transaction*') ? "active" : "" }}">
                <a href="{{ route('transaction.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-wallet"></i>
                    <div data-i18n="Documentation">Transaksi Tiket</div>
                </a>
            </li>
        @endcan

        <li class="menu-header small text-uppercase"><span class="menu-header-text">Account</span></li>
        <li class="menu-item {{ Request::is('/') ? "active" : "" }}">
            <a href="{{ route('main.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-alt-2"></i>
                <div data-i18n="HalamanUtama">Halaman Utama</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('logout') ? "active" : "" }}" id="logout-li-sidebar" style="cursor: pointer;">
            <form action="{{ route('logout') }}" method="post" id="logout-form">
                <div class="menu-link">
                    <i class="menu-icon tf-icons bx bx-log-out"></i>
                    @csrf
                    <button type="button" class="align-middle border-0 bg-transparent" style="padding: 0; color: #697a8d;" data-i18n="Logout">Logout</button>
                </div>
            </form>
        </li>
    </ul>
</aside>
