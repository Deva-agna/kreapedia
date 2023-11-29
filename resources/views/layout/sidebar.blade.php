<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="/">
                    <img src="{{ asset('app-assets/images/asset-company/logotrans.png') }}" width="28" alt="Logo BPR">
                    <h2 class="brand-text">BPR Lingga</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="@yield('dashboard') nav-item">
                <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                    <i data-feather='monitor'></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span>
                </a>
            </li>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Master</span><i data-feather="more-horizontal"></i>
            </li>
            @if(auth()->user()->role == 'sadmin')
            <li class="@yield('master-user') nav-item">
                <a class="d-flex align-items-center" href="{{ route('user') }}">
                    <i data-feather="users"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Master User</span>
                </a>
            </li>
            @endif
            <li class="@yield('master-berita') nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Master Berita</span></a>
                <ul class="menu-content">
                    <li class="@yield('kategori')">
                        <a class="d-flex align-items-center" href="{{ route('kategori') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="List">Kelola Kategori</span>
                        </a>
                    </li>
                    <li class="@yield('berita')">
                        <a class="d-flex align-items-center" href="{{ route('berita') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Preview">Kelola Berita</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="@yield('master-event') nav-item">
                <a class="d-flex align-items-center" href="{{ route('event') }}">
                    <i data-feather='calendar'></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Master Event</span>
                </a>
            </li>
            <li class="@yield('master-testimoni') nav-item">
                <a class="d-flex align-items-center" href="{{ route('testimoni') }}">
                    <i data-feather='star'></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Master Testimoni</span>
                </a>
            </li>
            <li class="@yield('master-literasi') nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='package'></i><span class="menu-title text-truncate" data-i18n="Invoice">Master Literasi</span></a>
                <ul class="menu-content">
                    <li class="@yield('kategori-literasi')">
                        <a class="d-flex align-items-center" href="{{ route('kategori.literasi') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="List">Kelola Kategori</span>
                        </a>
                    </li>
                    <li class="@yield('literasi')">
                        <a class="d-flex align-items-center" href="{{ route('literasi') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Preview">Kelola Literasi</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="@yield('master-faq') nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='help-circle'></i><span class="menu-title text-truncate" data-i18n="Invoice">Master FAQ</span></a>
                <ul class="menu-content">
                    <li class="@yield('kategori-faq')">
                        <a class="d-flex align-items-center" href="{{ route('kategori.faq') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="List">Kelola Kategori</span>
                        </a>
                    </li>
                    <li class="@yield('faq')">
                        <a class="d-flex align-items-center" href="{{ route('faq') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Preview">Kelola FAQ</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Company</span><i data-feather="more-horizontal"></i>
            </li>
            <li class="@yield('welcome-section') nav-item">
                <a class="d-flex align-items-center" href="{{ route('welcome.section') }}">
                    <i data-feather='airplay'></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Welcome Section</span>
                </a>
            </li>
            <li class="@yield('service') nav-item">
                <a class="d-flex align-items-center" href="{{ route('service') }}">
                    <i data-feather='tool'></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Service</span>
                </a>
            </li>
            <li class="@yield('profil-perusahaan') nav-item">
                <a class="d-flex align-items-center" href="{{ route('profile.company') }}">
                    <i data-feather='home'></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Profil Perusahaan</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->