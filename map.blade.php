<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('css/responsives.css') }}" />
    <!-- color css -->
    <link rel="stylesheet" href="{{ asset('css/colors.css') }}" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{ asset('css/perfect-scrollbar.css') }}" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    <!-- calendar file css -->
    <link rel="stylesheet" href="{{ asset('css/semantic.min.css') }}" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="inner_page map">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar_blog_1">
                    <div class="sidebar-header">
                        <div class="logo_section">
                            <a href="{{ route('home') }}"><img class="logo_icon img-responsive"
                                    src="{{ asset('images/logo/logoapp.png') }}" alt="#" /></a>
                        </div>
                    </div>
                    <div class="sidebar_user_info">
                        <div class="icon_setting"></div>
                        <div class="user_profle_side">
                            <div class="user_img"><img class="img-responsive"
                                    src="{{ asset('images/layout_img/Moi.jpg') }}" alt="#" /></div>
                            <div class="user_info">
                                <h6>Ghassen Belgacem </h6>
                                <p><span class="online_animation"></span> Online</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar_blog_2">
                    <h4>General</h4>
                    <ul class="list-unstyled components">
                        <li class="active">

                            <ul class="collapse list-unstyled" id="dashboard">
                                <li>
                                    <a href="dashboard.html">> <span>Default Dashboard</span></a>
                                </li>
                                <li>
                                    <a href="dashboard_2.html">> <span>Dashboard style 2</span></a>
                                </li>
                            </ul>
                        </li>

                        <li>

                            <ul class="collapse list-unstyled" id="element">
                                <li><a href="general_elements.html">> <span>General Elements</span></a></li>
                                <li><a href="media_gallery.html">> <span>Media Gallery</span></a></li>
                                <li><a href="icons.html">> <span>Icons</span></a></li>
                                <li><a href="invoice.html">> <span>Invoice</span></a></li>
                            </ul>
                        </li>

                        <li>

                            <ul class="collapse list-unstyled" id="apps">
                                <li><a href="email.html">> <span>Email</span></a></li>
                                <li><a href="calendar.html">> <span>Calendar</span></a></li>
                                <li><a href="media_gallery.html">> <span>Media Gallery</span></a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('contact2') }}">
                                <i class="fa fa-paper-plane red_color"></i> <span>Contact</span></a>
                        </li>
                        <li class="active">

                            <ul class="collapse list-unstyled" id="additional_page">
                                <li>
                                    <a href="{{ route('Profile') }}">> <span>Profile</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('project') }}">> <span>Projects</span></a>
                                </li>
                                <li>
                                    <a href="{{ route('login_farmer') }}">> <span>Login</span></a>
                                </li>
                                <li>
                                    <a href="404_error.html">> <span>404 Error</span></a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{ route('map') }}"><i class="fa fa-map purple_color2"></i> <span>Map</span></a>
                        </li>

                        <li><a href="{{ route('settings') }}"><i class="fa fa-cog yellow_color"></i>
                                <span>Message</span></a></li>
                        <li><a href="{{ route('jeudesimulation') }}"><i class="fa fa-cog yellow_color"></i>
                                <span>Simulation</span></a></li>
                    </ul>
                </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                <div class="topbar">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="full">
                            <div class="logo_section">
                                <a href="{{ route('home') }}"><img class="img-responsive"
                                        src="{{ asset('images/logo/logoapp.png') }}" alt="#" /></a>
                            </div>
                            <div class="right_topbar">
                                <div class="icon_info">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge"></span></a></li>
                                 <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                 <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge"></span></a></li>
                                    </ul>
                                    <ul class="user_profile_dd">
                                        <li>
                                            <a class="dropdown-toggle" data-toggle="dropdown"><img
                                                    class="img-responsive rounded-circle"
                                                    src="{{ asset('images/layout_img/Moi.jpg') }}"
                                                    alt="#" /><span class="name_user">Ghassen
                                                    Belgacem</span></a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('Profile') }}">Mon
                                                    Profile</a>
                                                <a class="dropdown-item" href="{{ route('settings') }}">Message</a>
                                                <a class="dropdown-item" href="help.html">Help</a>
                                                <a class="dropdown-item" href="#"><span>Log Out</span> <i
                                                        class="fa fa-sign-out"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <!-- end topbar -->
                <!-- dashboard inner -->
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Map</h2>
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row column1">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Map <small>(Default)</small></h2>
                                        </div>
                                    </div>
                                    <div class="map_section padding_infor_info">
                                        <div class="map m_style1">
                                            <div id="map"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- footer -->
                    <div class="container-fluid">
                        <div class="footer">
                            <p>Copyright © 2018 Designed by html.design. All rights reserved.</p>
                        </div>
                    </div>
                </div>
                <!-- end dashboard inner -->
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- wow animation -->
    <script src="{{ asset('js/animate.js') }}"></script>
    <!-- select country -->
    <script src="{{ asset('js/bootstrap-select.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <!-- nice scrollbar -->
    <script src="{{ asset('js/perfect-scrollbar.min.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- google map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap">
    </script>
    <!-- end google map js -->
</body>

</html>
