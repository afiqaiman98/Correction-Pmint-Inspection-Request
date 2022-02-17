<header class="header">
    <div class="primary-header">
        <div class="container">
            <div class="primary-header-inner">
                <div class="header-logo">
                    <a href="#"><img height=100px width=100px src="{{ asset('img/pmint.jpg') }}" alt="Pmint"></a>
                </div>
                <div class="header-menu-wrap">
                    <ul class="dl-menu">
                        <li><a href="{{ url('/home') }}">Home</a>
                            <ul>
                                <li><a href="index.html">Home Default</a></li>
                            </ul>
                        </li>
                        {{-- <li><a href="#">About</a>
                            <ul>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="about-company.html">About Company</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Services</a>
                            <ul>
                                <li><a href="services-1.html">Services 01</a></li>
                                <li><a href="services-2.html">Services 02</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Pages</a>
                            <ul>
                                <li><a href="projects.html">Our Projects</a></li>
                                <li><a href="project-single.html">Project Single</a></li>
                                <li><a href="team.html">Our Team</a></li>
                                <li><a href="testimonial.html">Testimonial</a></li>
                                <li><a href="404.html">404 Error</a></li>
                            </ul>
                        </li> --}}

                        @if(Route::has('login'))

                        @auth

                        
                            {{-- Error Maybe occured here --}}
                        <li>
                            <a href="{{ Route('form.show',$form) }}">Status Inspection</a>
                            {{-- <a href="{{ Route('form.index') }}">Status Inspection</a> --}}
                           

                        </li>


                        @endauth

                        @endif


                        <li>
                            @if(Route::has('login'))

                            @auth
                            <a href="{{ Route('form.create') }}">Request Inspection</a>

                            @else
                            <a href="{{ route('login') }}">Request Inspection</a>
                            @endauth

                            @endif

                        </li>



                        @if(Route::has('login'))

                        @auth
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();this.closest('form').submit();">
                                    Logout
                                </a>
                            </form>
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