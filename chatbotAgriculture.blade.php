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

    <title>AgriConnect</title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="bootstrap.css" />
    <!-- fonts awesome style -->
    <link href="font-awesome.min.css" rel="stylesheet" />
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,,600,700|Poppins:400,500,700&display=swap"
        rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
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
                        <a class="" href="PagedacceuilPFA.blade.php">
                            Acceuil
                        </a>
                        <a class="" href="marketplace.html">
                            Marketplace
                        </a>
                        <a class="" href="chatbotAgriculture.blade.php">
                            Chatbot
                        </a>
                        <a class="" href="Gestiondesfermes.html">
                            Gestion des fermes
                        </a>
                        <a class="" href="InscriptionAgriculteur.blade.php">
                            Inscription
                        </a>
                        <a class="" href="ConnexionAgriculteur.blade.php">
                            Connexion
                        </a>
                        <a class="" href="jeudesimulation.html">
                            Jeu de simulation
                        </a>
                        <a class="" href="contact.blade.php">
                            Contact
                        </a>
                    </div>
                </div>
                <a class="navbar-brand" href="PagedacceuilPFA.blade.php">
                    <span>
                        AgriConnect
                    </span>
                </a>
                <div class="user_option">
                    <form class="form-inline">
                        <button class="btn  nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                    <a href="">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                </div>
            </nav>
        </header>
        <!-- end header section -->
    </div>


    <!-- choose section -->

    <section class="choose_section layout_padding section_pl ">
        <div class="container py_mobile_45">
            <div class="heading_container heading_center">
                <h2>Chatbot<span> Agriculturel</span></h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="chat-container">
                        <div class="chat-box" id="chat-box"></div>
                        <input type="text" id="user-input" placeholder="Type a message...">
                        <button onclick="sendMessage()">
                            <i class="fas fa-comment"></i> <!-- Font Awesome chat icon -->
                        </button>
                    </div>
                    <script src="script.js" defer></script>
                </div>
            </div>
    </section>

    <!-- end choose section -->

    <!-- info section -->

    <section class="info_section layout_padding section_pl">
        <div class="container">
            <div class="info_logo">
                <a href="">
                    AgriConnect
                </a>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="info_contact">
                        <h4>
                            Address
                        </h4>
                        <div class="contact_link_box">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>
                                    Location
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    Call +01 1234567890
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>
                                    Email : demo@gmail.com
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="info_social">
                        <a href="">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info_link_box">
                        <h4>
                            Links
                        </h4>
                        <div class="info_links">
                            <a class="" href="PagedacceuilPFA.blade.php">
                                Acceuil
                            </a>
                            <a class="" href="marketplace.html">
                                Marketplace
                            </a>
                            <a class="" href="chatbotAgriculture.blade.php">
                                Chatbot
                            </a>
                            <a class="" href="Gestiondesfermes.html">
                                Gestion des fermes
                            </a>
                            <a class="" href="InscriptionAgriculteur.blade.php">
                                Inscription
                            </a>
                            <a class="" href="ConnexionAgriculteur.blade.php">
                                Connexion
                            </a>
                            <a class="" href="jeudesimulation.html">
                                Jeu de simulation
                            </a>
                            <a class="" href="contact.blade.php">
                                Contact
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info_detail">
                        <h4>
                            Products
                        </h4>
                        <p>
                            necessary, making this the first true generator on the Internet. It uses a dictionary of
                            over 200 Latin
                            words, combined with a handful
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

    <script src="jquery-3.4.1.min.js"></script>
    <script src="bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="custom.js"></script>

</body>

</html>
