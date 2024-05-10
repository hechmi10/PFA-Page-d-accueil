<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Fallah Connect</title>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

<!-- bootstrap core css -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
<!-- fonts awesome style -->
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
<!-- fonts style -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,,600,700|Poppins:400,500,700&display=swap" rel="stylesheet" />

<!-- Custom styles for this template -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
<!-- responsive style -->
<link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
<!-- Google Fonts Link For Icons -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-dGGveJcYKRuT2TZ7o1hqJXcPv9A5paq+Cy6+3wW3PAMnImDfnPj3kkwJ90xYwV0L" crossorigin="anonymous">

</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <div class="custom_menu-btn">
                    <button onclick="openNav()">
                        <span class="s-1"> </span>
                        <span class="s-2"> </span>
                        <span class="s-3"> </span>
                    </button>
                </div>
                <div id="myNav" class="overlay">
                    <div class="menu_btn-style ">
                        <button onclick="closeNav()">
                            <span class="s-1"> </span>
                            <span class="s-2"> </span>
                            <span class="s-3"> </span>
                        </button>
                    </div>
                    <div class="overlay-content">
                        <a class="" href="{{ route('home') }}">
                            Acceuil
                        </a>
                        <a class="" href="{{ route('marketplace') }}">
                            Marketplace
                        </a>
                        <a class="" href="{{ route('farm_management') }}">
                            Gestion des fermes
                        </a>
                        <a class="" href="{{ route('register_farmer') }}">
                            Inscription
                        </a>
                        <a class="" href="{{ route('login_farmer') }}">
                            Connexion
                        </a>
                        <a class="" href="{{ asset('jeudesimulation') }}">
                            Simulation
                        </a>
                        <a class="" href="{{ route('contact') }}">
                            Contact
                        </a>
                    </div>
                </div>
                <a class="navbar-brand" href="{{route('home')}}">
                    <span>
                        Fallah Connect
                    </span>
                </a>
                
            </nav>
        </header>
        <!-- end header section -->
        <!-- slider section -->
        <section class="slider_section position-relative">
            <a class="navbar-brand" href="{{ route('home') }}">
                <span>
                    Fallah Connect
                </span>
            </a>
            <div class="box">
                <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-lg-10 ml-auto">
                                    <div class="detail-box">
                                        <h1>
                                            Agriculture <br />
                                            et Gestion des Fermes
                                        </h1>
                                        <div class="btn-box">
                                            <a href="{{route('contact')}}" class="btn-2">
                                                Contactez-nous
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- end slider section -->
    </div>


    <!-- end client section -->

    <!-- info section -->

    <section class="info_section layout_padding section_pl">
        <div class="container">
            <div class="info_logo">
                <a href="">
                    Fallah Connect
                </a>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="info_contact">
                        <h4>
                            Adresse
                        </h4>
                        <div class="contact_link_box">
                            <a href="">
                                <span>
                                    Location
                                </span>
                            </a>
                            <a href="">
                                <span>
                                    Contactez-nous +01 1234567890
                                </span>
                            </a>
                            <a href="">
                                <span>
                                    Email : demo@gmail.com
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info_link_box">
                        <h4>
                            Links
                        </h4>
                        <div class="info_links">
                            <a class="" href="{{ route('home') }}">
                                Acceuil
                            </a>
                            <a class="" href="{{ route('marketplace') }}">
                                Marketplace
                            </a>
                            <a class="" href="{{ route('farm_management') }}">
                                Gestion des fermes
                            </a>
                            <a class="" href="{{ route('register_farmer') }}">
                                Inscription
                            </a>
                            <a class="" href="{{ route('login_farmer') }}">
                                Connexion
                            </a>
                            <a class="" href="{{ route('jeudesimulation') }}">
                                Jeu de simulation
                            </a>
                            <a class="" href="{{ route('contact') }}">
                                Contact
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info_detail">
                        <h4>
                            Produits
                        </h4>
                        <p>
                            necessary, making this the first true generator on the Internet. It uses a dictionary of
                            over
                            200 Latin words, combined with a handful
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4>
                        Subscribe
                    </h4>
                    <form action="">
                        <input type="text" placeholder="Your Email" />
                        <button type="submit">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- end info section -->

    <!-- footer section -->
    <footer class="footer_section">
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved. Design by
                <a href="https://html.design/">Free Html Templates</a>
            </p>
        </div>
    </footer>
    <!-- footer section -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="{{ asset('js/custom.js') }}"></script>

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->

</body>

</html>