{{-- Header --}}
<header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center justify-content-between position-relative">

        <div class="logo">
            <h1 class="text-light"><a href="{{ route('main.index') }}"><span>Kampung Nyalindung</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
        <ul>
            <li>
                <a class="nav-link scrollto {{ Request::is('') ? 'active' : '' }}" href="{{ route('main.index') }}">Beranda</a>
            </li>
            <li>
                <a class="nav-link scrollto {{ Request::is('berita') ? 'active' : '' }}" href="{{ route('main.news') }}">Berita</a>
            </li>
            <li>
                <a class="nav-link scrollto {{ Request::is('wisata') ? 'active' : '' }}" href="{{ route('main.tour') }}">Wisata</a>
            </li>
            <li>
                <a class="nav-link scrollto {{ Request::is('tentang-kami') ? 'active' : '' }}" href="{{ route('main.about-us') }}">Tentang Kami</a>
            </li>
            <li class="dropdown">
                <a href="" class="{{ Request::is('profile*') ? 'active' : '' }}">
                    <span>Profile</span>
                    <i class="bi bi-chevron-down"></i>
                </a>
                <ul>
                    <li><a href="{{ route('main.history') }}">Sejarah Nyalindung</a></li>
                    <li><a href="{{ route('main.about-burangrang') }}">Tentang Burangrang</a></li>
                    <li><a href="{{ route('main.cooperation') }}">Kerja Sama</a></li>
                </ul>
            </li>
        </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

    </div>
</header>