<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> {{$title}} | Mintage World</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{url("assets/lib/animate/animate.min.css")}}" rel="stylesheet">
    <link href="{{url("assets/lib/owlcarousel/assets/owl.carousel.min.css")}}" rel="stylesheet">



    <!-- Customized Bootstrap Stylesheet -->
    {{-- <link href="{{url("assets/css/bootstrap.min.css")}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css"  /> 

    
    <!-- image gallery on detail page Stylesheet -->
    <link href="{{url("assets/css/baguetteBox.min.css")}}" rel="stylesheet">


    <link rel="stylesheet" type="text/css" media="all" href="{{url("assets/css/stellarnav.css")}}">

    <!-- Template Stylesheet -->
    <link href="{{url("assets/css/style.css")}}" rel="stylesheet">
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center d-none">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    <section class="header-wrap">

        <div class="container-fluid bg-light top-line px-0 px-lg-5 py-2">
            <div class="row">
                <div class="col-xl-5 col-lg-5 text-start d-lg-flex d-none">
                    <div class="h-100 d-inline-flex align-items-center me-2">
                        <small class="fa fa-envelope text-primary me-2"></small>
                        <small><a href="mailto:info@mintageworld.com">info@mintageworld.com</a></small>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center">
                        <small class="fa fa-mobile-alt text-primary me-2"></small>
                        <small> <a href="tel:+918591908969">859 190 8969</a></small>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7  text-end ">
                    <div class="h-100 d-inline-flex align-items-center  me-2">
                        <a href="{{url("list-of-cart/")}}">
                            <small class="fa fa-shopping-cart text-primary me-2"></small>
                            <small>Shopping Cart</small>
                        </a>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center  me-md-2 me-3">
                        <a href="{{url("application/login")}}">
                            <small class="fa fa-sign-in-alt text-primary me-2"></small>
                            <small>Sign in</small>
                        </a>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center  me-2 social-media-icon">
                        <a class="btn btn-sm-square bg-white text-primary me-1  " href="https://www.youtube.com/channel/UCMx9KlQd0kYSU0UE0T9H5YQ" target="_blank">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a class="btn btn-sm-square bg-white text-primary me-1" href="https://www.instagram.com/mintageworld/" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="btn btn-sm-square bg-white text-primary me-1" href="https://www.facebook.com/pages/Mintage-World/408430029349409" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="btn btn-sm-square bg-white text-primary me-1" href="https://twitter.com/mintageworld" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-sm-square bg-white text-primary me-1" href="https://www.pinterest.com/mintageworld/" target="_blank">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                        <a class="btn btn-sm-square bg-white text-primary me-0" href="https://www.linkedin.com/company/ultra-mintage-world-limited/" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>


        <!-- Navbar Start -->
        <nav
            class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top py-0 px-lg-2 px-lg-5">
            <a href="{{url("/")}}" class="navbar-brand d-flex align-items-center main-logo">
                <img src="{{url("assets/img/logo.png")}}" alt="" class="img-fluid">
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="/" class="nav-item nav-link active">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Shopping </a>
                        <div class="dropdown-menu fade-up m-0 mega-menu">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h2>Notes</h2>
                                        <div class="sub-menu-list">
                                            <a href="#" class="black sub-menu">Bank Notes</a>
                                            <a href="#" class="black sub-menu">Notes Greeting Cards</a>
                                            <a href="#" class="black sub-menu">Notes Table Photo Frame</a>
                                            <a href="#" class="black sub-menu">Notes Wall Frame</a>
                                            <a href="#" class="black sub-menu">Premium Notes</a>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <h2>Coins</h2>
                                        <div class="sub-menu-list">
                                            <a href="#">Indian Coins</a>
                                            <a href="#">US Coins</a>
                                            <a href="#">German Coins</a>
                                            <a href="#">Premium Coins</a>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <h2>Accessories</h2>
                                        <div class="sub-menu-list">
                                            <a href="#">Coin Accessories</a>
                                            <a href="#">Banknote Accessories</a>
                                            <a href="#">Stamp Accessories</a>
                                            <a href="#">Postcard Accessories</a>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <h2>Stamps</h2>
                                        <div class="sub-menu-list">
                                            <a href="#">Indian Stamps</a>
                                            <a href="#">Australia Stamp</a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <h2>Other Products</h2>
                                        <div class="sub-menu-list">
                                            <a href="#" class="black sub-menu">3D Puzzles</a>
                                            <a href="#" class="black sub-menu">Envelope First Day Cover</a>
                                            <a href="#" class="black sub-menu">Numismatics Books</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Information</a>
                        <div class="dropdown-menu fade-up m-0">
                            <a href="{{url("coins")}}" class="dropdown-item">Coins</a>
                            <a href="{{url("notes")}}" class="dropdown-item">Notes</a>
                            <a href="{{url("stamp")}}" class="dropdown-item">Stamps</a>
                        </div>
                    </div>
                    <a href="{{url("history")}}" class="nav-item nav-link">History</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Events</a>
                        <div class="dropdown-menu fade-up m-0">
                            <a href="{{url("event/")}}" class="dropdown-item">Fairs and Exhibitions</a>
                        </div>
                    </div>
                    <a href="{{url("media/")}}" class="nav-item nav-link">News</a> 
                    <a href="{{url("media-coverage/")}}" class="nav-item nav-link">Media</a> 
                    <a href="https://www.mintageworld.com/blog/" target="_blank" class="nav-item nav-link">Blog</a>
                </div>
                <div class="m-0   d-none d-lg-block search-box">
                    <a id="search" class="" href="#"> <i class="fa fa-fw fa-search text-white"></i> </a>
                </div>

            </div>
        </nav>

        <div class="stellarnav">
            <span class="close-bg"><a href="javascript:void(0)" class="close-menu third">&nbsp;</a></span>
            <ul style="display: block !important;">
                <li><a href="{{url("/")}}">Home</a></li>
                <li><a href="{{url("shop/")}}">Shopping</a>
                    <ul>
                        <li><a href="#">Premium Products</a>
                            <ul>
                                <li><a href="#">Premium Coins</a></li>
                                <li><a href="#">Premium Notes</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Bank Notes</a>
                            <ul>
                                <li><a href="#">Republic India Banknotes</a></li>
                                <li><a href="#">World Banknotes</a>
                                    <ul>
                                        <li><a href="#">Asian Banknotes</a></li>
                                        <li><a href="#">African Banknotes</a></li>
                                        <li><a href="#">European Banknotes</a></li>
                                        <li><a href="#">North American Banknotes</a></li>
                                        <li><a href="#">South American Banknotes</a></li>

                                    </ul>
                                </li>
                                <li><a href="#">All Bank Notes</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Coins</a>
                            <ul>
                                <li><a href="#">Indian Coins</a>
                                    <ul>
                                        <li><a href="#">Ancient Coins</a></li>
                                        <li><a href="#">Medieval Coins</a></li>
                                        <li><a href="#">Indian Princely State Coins</a></li>
                                        <li><a href="#">Colonial Coins</a></li>
                                        <li><a href="#">Republic India Coins</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">US Coins</a></li>
                                <li><a href="#">German Coins</a></li>
                                <li><a href="#">Roman Era Coins</a></li>
                                <li><a href="#">Assorted Foreign Coins</a></li>
                                <li><a href="#">Mint Coin Rolls</a></li>
                                <li><a href="#">All Coins</a></li>
                            </ul>
                        </li>

                        <li><a href="#">Stamps</a>
                            <ul>
                                <li><a href="#">Indian Stamps</a>
                                    <ul>
                                        <li><a href="#">Miniature Sheet Stamps</a></li>
                                        <li><a href="#">Postal Stamps</a></li>
                                        <li><a href="#">Block of Stamps</a></li>
                                        <li><a href="#">Full Sheet Stamps</a></li>
                                        <li><a href="#">Collectors Pack</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Australia Stamps</a></li>
                                <li><a href="#">England Stamps</a></li>
                                <li><a href="#">All Stamps</a></li>
                            </ul>
                        </li>

                        <li><a href="#">Accessories</a>
                            <ul>
                                <li><a href="#">Coin Accessories</a>
                                    <ul>
                                        <li><a href="#">Coin Albums</a></li>
                                        <li><a href="#">Coin Pages</a></li>
                                        <li><a href="#">Coin Capsules</a></li>
                                        <li><a href="#">Coin Cleaners</a></li>
                                        <li><a href="#">Coin Holders</a></li>
                                        <li><a href="#">Coin Storage Box</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Banknote Accessories</a>
                                    <ul>
                                        <li><a href="#">Banknote Albums</a> </li>
                                        <li><a href="#">Banknote Sleeves</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Stamp Accessories</a>
                                    <ul>
                                        <li><a href="#">Stamp Album Stockbooks</a> </li>
                                        <li><a href="#">Stamp Stock Pages</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Postcard Accessories</a></li>
                                <li><a href="#">General</a></li>
                                <li><a href="#">All Accessories</a></li>
                            </ul>
                        </li>

                        <li><a href="#">Notes Greeting Cards</a></li>
                        <li><a href="#">Notes Table Photo Frame </a></li>
                        <li><a href="#">Notes Wall Photo Frame</a></li>
                        <li><a href="#">3D Puzzles</a></li>
                        <li><a href="#">Envelopes First Day Cover</a></li>
                        <li><a href="#">Numismatic Books</a></li>
                    </ul>
                </li>
                <li class="drop-left"><a href="#">Information</a>
                    <ul>
                        <li><a href="{{url("coins")}}">Coins</a></li>
                        <li><a href="{{url("notes")}}">Notes</a></li>
                        <li><a href="{{url("history")}}">Stamps</a></li>
                    </ul>
                </li>
                <li><a href="{{url("history")}}">History</a></li>
                <li class="drop-left"><a href="#">Events</a>
                    <ul>
                        <li><a href="{{url("event/")}}">Fairs and Exhibitions</a></li>
                        {{-- <li><a href="#">Key Events (Coming Soon)</a></li> --}}
                    </ul>
                </li>
                <li><a href="{{url("media/")}}">News</a></li>
                <li><a href="{{url("media-coverage/")}}">Media</a></li>
                <li><a href="{{url("knowledge-base/")}}">Knowledge Base</a></li>
                <li><a href="{{url("content/about-us/")}}">About Us</a></li>
                <li><a href="{{url("contact/")}}">Contact Us</a></li>
                <li class="text-left mt-2">
                    <div class="h-100 d-inline-flex align-items-center ms-3">
                        <a class="btn btn-sm-square bg-white text-primary me-1 p-1" href="https://www.youtube.com/channel/UCMx9KlQd0kYSU0UE0T9H5YQ" target="_blank">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a class="btn btn-sm-square bg-white text-primary me-1 p-1" href="https://www.instagram.com/mintageworld/" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="btn btn-sm-square bg-white text-primary me-1 p-1" href="https://www.facebook.com/pages/Mintage-World/408430029349409" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="btn btn-sm-square bg-white text-primary me-1 p-1" href="https://twitter.com/mintageworld" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-sm-square bg-white text-primary me-1 p-1" href="https://www.pinterest.com/mintageworld/" target="_blank">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                        <a class="btn btn-sm-square bg-white text-primary me-0 p-1" href="https://www.linkedin.com/company/ultra-mintage-world-limited/" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>

                    </div>
                </li>
            </ul>

        </div><!-- .stellarnav -->

        <!-- Navbar End -->

    </section>