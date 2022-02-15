<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<!-- index.html  29 Nov 2019 03:27:29 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Construction & Building HTML Template">
    <meta name="author" content="AlexaTheme">
    <title>Perbadanan Memajukan Iktisad | PMINT</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://iconape.com/wp-content/files/hm/134283/svg/134283.svg">

    <link rel="stylesheet" href="css/fontawesome.min.css">

    <link rel="stylesheet" href="css/themify-icons.css">

    <link rel="stylesheet" href="css/elegant-line-icons.css">

    <link rel="stylesheet" href="css/elegant-font-icons.css">

    <link rel="stylesheet" href="css/flaticon.css">

    <link rel="stylesheet" href="css/animate.min.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/slick.css">

    <link rel="stylesheet" href="css/slider.css">

    <link rel="stylesheet" href="css/odometer.min.css">

    <link rel="stylesheet" href="css/venobox/venobox.css">

    <link rel="stylesheet" href="css/owl.carousel.css">

    <link rel="stylesheet" href="css/main.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="/resources/demos/style.css">

    <link rel="stylesheet" href="css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="site-preloader-wrap">
        <div class="spinner"></div>
    </div>
    <header class="header">
        <div class="primary-header">
            <div class="container">
                <div class="primary-header-inner">
                    <div class="header-logo">
                        <a href="#"><img height=100px width=100px src="img/pmint.jpg" alt="Pmint"></a>
                    </div>
                    <div class="header-menu-wrap">
                        <ul class="dl-menu">
                            <li><a href="{{ url('/home') }}">Home</a>
                                <ul>
                                    <li><a href="index.html">Home Default</a></li>
                                    <li><a href="index-2.html">Home Modern</a></li>
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

                            <li>
                                <a href="{{ url('viewstatus') }}">Status Inspection</a>
                            </li>

                            @endauth

                            @endif
                            <li>
                                @if(Route::has('login'))

                                @auth
                                <a href="{{ url('request') }}">Request Inspection</a>

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


    @if (session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">X</button>
        {{ session()->get('message') }}

    </div>

    @endif
    <div class="container">
        <form action="{{ url('upload_request') }}" method="POST" enctype="multipart/form-data"
            style="padding: 100px; color:black">

            @csrf
            <div class="form-group">
                <label>Checklist Serial No</label>
                <input type="text" name="serial" class="form-control" placeholder="Please enter location">
            </div>

            <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" class="form-control" placeholder="Please enter location">
            </div>

            <div class="form-group">
                <label>Date/Time of Inspection </label>
                <div class='input-group date' id='datetimepicker'>
                    <input type='text' name="date" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Please enter location">
            </div>

            <div class="form-group">
                <label>Company</label>
                <input type="text" name="company" class="form-control" placeholder="Please enter location">
            </div>


            {{-- To choose Enginner for futher deveploment --}}
            {{-- <div class="form-group">
                <label>Engineer For Inspection</label>
                <select name="engineer" class="form-control">

                    <option class="hidden">-Select Engineer-</option>
                    @foreach ($engineer as $engineers)
                    <option value="{{ $engineers->name }}">
                        {{ $engineers->name }}
                    </option>


                    @endforeach
                </select>
            </div> --}}


            <div class="form-group">
                <label>Signature</label>
                <br>
                <input type="file" name="file">
            </div>

            <div class="form-group">
                <input type="submit" class="btn ">
            </div>
        </form>
    </div>


    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/vendor/tether.min.js"></script>

    <script src="js/vendor/headroom.min.js"></script>

    <script src="js/vendor/owl.carousel.min.js"></script>

    <script src="js/vendor/smooth-scroll.min.js"></script>

    <script src="js/vendor/venobox.min.js"></script>

    <script src="js/vendor/jquery.ajaxchimp.min.js"></script>

    <script src="js/vendor/slick.min.js"></script>

    <script src="js/vendor/waypoints.min.js"></script>

    <script src="js/vendor/odometer.min.js"></script>

    <script src="js/vendor/wow.min.js"></script>

    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript">
        $(function() {
           $('#datetimepicker').datetimepicker();
        });
    </script>

</body>



</html>