{{--<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentationss</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
--}}
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mhaf iot platform</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicons
        ================================================== -->
    <link rel="shortcut icon" href="home/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="home/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="home/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="home/img/apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="home/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="home/fonts/font-awesome/css/font-awesome.css">

    <!-- Stylesheet
        ================================================== -->
    <link rel="stylesheet" type="text/css"  href="home/css/style.css">
    <link rel="stylesheet" type="text/css" href="home/css/prettyPhoto.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="home/js/modernizr.custom.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation -->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand page-scroll" href="#page-top"><i class="fa fa-moon-o fa-rotate-90"></i> mhaf iot</a> </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#page-top" class="page-scroll">Home</a></li>
                <li><a href="#services" class="page-scroll">Features</a></li>
                <li><a href="#about" class="page-scroll">About</a></li>
                <li><a href="#team" class="page-scroll">Team</a></li>
                <li><a href="#contact" class="page-scroll">Contact</a></li>
                @if (Route::has('login'))
                        @auth
                            <li><a class="page-scroll" href="{{ url('/home') }}">Home</a></li>
                            @else
                            <li> <a class="page-scroll" href="{{ route('login') }}">Sign Up</a></li>
                                @endauth
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<!-- Header -->
<header id="header">
    <div class="intro text-center">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="intro-text">
                        <h1>Welcome to <span class="brand">Mhaf iot Platform</span></h1>
                        <p>We are four engineers  who love what we do</p>
                        <a href="#services" class="btn btn-default btn-lg page-scroll">Learn More</a> </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Services Section -->
<div id="services" class="text-center">
    <div class="container">
        <div class="col-md-8 col-md-offset-2 section-title">
            <h2>Our Features</h2>

        </div>
        <div class="row">
            <div class="col-xs-6 col-md-3"> <i class="fa fa-desktop"></i>
                <h4>Applications</h4>
                <p>Create your own senarios thanks to mhaf IOT.</p>
            </div>
            <div class="col-xs-6 col-md-3"> <i class="fa fa-gears"></i>
                <h4>IOT For Beginners</h4>
                <p>Learn the iot developpement with mhaf iot .</p>
            </div>
            <div class="col-xs-6 col-md-3"> <i class="fa fa-rocket"></i>
                <h4>Predictions</h4>
                <p>mhaf iot provides predictions.</p>
            </div>
            <div class="col-xs-6 col-md-3"> <i class="fa fa-line-chart"></i>
                <h4>Data Analysis</h4>
                <p>mhaf iot provides the analysis of the data</p>
            </div>
        </div>
    </div>
</div>
<!-- About Section -->
<div id="about">
    <div class="container">
        <div class="col-md-8 col-md-offset-2 section-title text-center">
            <h2>About Us</h2>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-6"> <img src="home/img/about.jpg" class="img-responsive" alt=""> </div>
            <div class="col-xs-12 col-md-6">
                <div class="about-text">

                    <h4>Mhaf iot</h4>
                    <p>Mhaf iot is an IOT  platform that simplifies the interconnection of all your devices.
                        It makes you able to guaranty the communication between different electronic cards.

                        In fact,the main purpose of this platform is to collect and exchange the huge amount of data from the different devices and turn them into actionable insights and  meanful services.
                        Thanks to Mhaf IOT you will not only be able to just simply  collect  data but also it will be analyzed.

                        In addition to this you will benefet with some helpful predictions that costs a lot nowaday to do some wanted actions for chosen goals.
                        you can even create your own systems without writing any line of code.

                        But what if you a buiguiner in the iot field  you can use our  code generater feature in order to try some actions  where buiguiners can also learn  and benefets from the platform.

                        Finally Mhaf IOT is so simple. it saves money,time and efforts.</p>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Portfolio Section -->
<!-- Team Section -->
<div id="team" class="text-center">
    <div class="container">
        <div class="col-md-8 col-md-offset-2 section-title">
            <h2>Meet the Team</h2>
            <p>Mhaf iot platform was made by 4 ambitious engineers.</p>
        </div>
        <div id="row">
            <div class="col-md-3 col-sm-6 team">
                <div class="thumbnail"> <img src="home/img/team/mariam.jpg" alt="..." class="img-circle team-img">
                    <div class="caption">
                        <h3>Mariam Cheikh</h3>

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 team">
                <div class="thumbnail"> <img src="home/img/team/hamza.jpg" alt="..." class="img-circle team-img">
                    <div class="caption">
                        <h3>Hamza Faiza</h3>

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 team">
                <div class="thumbnail"> <img src="home/img/team/anis.jpg" alt="..." class="img-circle team-img">
                    <div class="caption">
                        <h3>Mohamed Anis Ben Salah</h3>

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 team">
                <div class="thumbnail"> <img src="home/img/team/firas.jpg" alt="..." class="img-circle team-img">
                    <div class="caption">
                        <h3>Firas Hakimi</h3>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Section -->
<div id="contact" class="text-center">
    <div class="overlay">
        <div class="container">
            <div class="col-md-8 col-md-offset-2 section-title">
                <h2>Get In Touch</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo nibh ante facilisis bibendum dolor apibus lornare diam commodo nibh.</p>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" id="name" class="form-control" placeholder="Name" required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" id="email" class="form-control" placeholder="Email" required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-default">Send Message</button>
                </form>
                <div class="social">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-github"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer">
    <div class="container text-center">
        <div class="fnav">
            <p>Copyright &copy; 2016 Studio7. Designed by <a href="http://www.templatewire.com" rel="nofollow">TemplateWire</a></p>
        </div>
    </div>
</div>
<script type="text/javascript" src="home/js/jquery.1.11.1.js"></script>
<script type="text/javascript" src="home/js/bootstrap.js"></script>
<script type="text/javascript" src="home/js/SmoothScroll.js"></script>
<script type="text/javascript" src="home/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="home/js/jquery.isotope.js"></script>
<script type="text/javascript" src="home/js/jqBootstrapValidation.js"></script>
<script type="text/javascript" src="js/contact_me.js"></script>
<script type="text/javascript" src="home/js/main.js"></script>
</body>
</html>