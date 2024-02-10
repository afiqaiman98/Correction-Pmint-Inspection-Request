<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand brand-logo" href="index.html"><img src="img/pmint.jpg" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="img/pmint.jpg" alt="logo" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="typcn typcn-th-menu"></span>
            </button>
        </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link" href="{{ url('/home') }}" data-toggle="dropdown" id="profileDropdown">
                    <img src="{{ asset('images/faces/face.png') }}" alt="profile" />
                    <span class="nav-profile-name">
                        <div>{{ Auth::user()->name }}</div>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();"
                            class="dropdown-item">
                            <i class="typcn typcn-eject text-primary"></i>
                            Logout

                        </a>
                    </form>
                </div>
            </li>

        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-date dropdown">
                <a class="nav-link d-flex justify-content-center align-items-center" href="javascript:;">
                    <h6 class="date mb-0">Today is: {{ date('Y-m-d') }}</h6>
                    <i class="typcn typcn-calendar"></i>
                </a>
            </li>




        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="typcn typcn-th-menu"></span>
        </button>
    </div>
</nav>
