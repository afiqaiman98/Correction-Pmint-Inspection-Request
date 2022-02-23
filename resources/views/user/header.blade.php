<header class="header">
    <div class="primary-header">
        <div class="container">
            <div class="primary-header-inner">
                <div class="header-logo">
                    <a href="{{ url('/home') }}"><img height=100px width=100px src="{{ asset('img/pmint.jpg') }}"
                            alt="Pmint"></a>
                </div>
                <div class="header-menu-wrap">
                    <ul class="dl-menu">
                        <li><a href="{{ url('/home') }}">Home</a>
                            <ul>
                                <li><a href={{ url('/home') }}>Home Default</a></li>
                            </ul>
                        </li>


                        @if(Route::has('login'))

                        @auth


                        {{-- Error Maybe occured here --}}
                        <li>
                            <a href="{{ route('inspect.index')}}">Status Inspection</a>
                            {{-- <a href="{{ Route('form.index') }}">Status Inspection</a> --}}


                        </li>


                        @endauth

                        @endif


                        <li>
                            @if(Route::has('login'))

                            @auth
                            <a href="{{ route('inspect.create') }}">Request Inspection</a>

                            @else
                            <a href="{{ route('login') }}">Request Inspection</a>
                            @endauth

                            @endif

                        </li>



                        @if(Route::has('login'))

                        @auth
                        <li><a href="#">{{ Auth::user()->name }}</a>
                            <ul>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();this.closest('form').submit();">
                                        Logout
                                    </a>
                                </form>

                            </ul>
                        </li>

                        @else

                        <li><a class="menu-btn" href="{{ route('login') }}">Login</a></li>
                        <li><a class="menu-btn" href="{{ route('register') }}">Register</a></li>



                        @endauth

                        @endif


                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>