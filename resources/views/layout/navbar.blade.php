<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{ auth()->user()->nama }}</span><span class="user-status text-uppercase">{{ auth()->user()->role }}</span></div><span class="avatar"><img class="round" src="{{ asset('app-assets/images/asset-company/foto-defa.png') }}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{ route('user.profile.edit') }}"><i class="mr-50" data-feather="user"></i> Profile</a>
                    <div class="dropdown-divider">
                    </div>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        @method('put')
                        <button class="dropdown-item w-100" href="page-auth-login-v2.html"><i class="mr-50" data-feather="power"></i> Logout</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- END: Header-->