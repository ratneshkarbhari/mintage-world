<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="canonical" href="{{url()->current()}}/" />

    <meta name="msvalidate.01" content="3785FBE7F241DADD98A4C8036D42766B" />

    <meta name="yandex-verification" content="214376cbde7c8e77" />

    <meta name="google-site-verification" content="kxBYpzxZnIrFuKgPrCi77zJ53z8Xxb767lN7bQT2a7s" />

    <meta name="p:domain_verify" content="c366a989fff29c6ee60d58207556d9db"/>

    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="utf-8">

    <!-- Bringing in title,description,keywords -->

    <title>{{$title}} | Mintage World</title>
    <meta name="description" content="{{$description}}">
    <meta name="keywords" content="{{$keywords}}">
    
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@mintageworld">

    <meta name="twitter:description" content="{{$description}}">
    <meta name="twitter:title" content="{{$title}} | Mintage World">

    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">

    <meta property="og:title" content="{{$title}} | Mintage World">
    <meta property="og:description" content="{{$description}}">
    <meta property="og:url" content="{{url()->current()}}/">

    <meta property="og:site_name" content="Mintage World">
    <meta property="fb:page_id" content="408430029349409">


    <!-- Favicon -->
    <link href="{{url("assets/img/favicon.ico")}}/" rel="icon">

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

    @isset($renderSchema)
    <script type="application/ld+json">
        {
        "@context": "http://schema.org/",
        "@type": "{{$schema_data['type']}}",
        "name": "{{$schema_data['name']}}",
        "image": "",
            "brand": {
            "@type": "Thing",
            "name": "Mintage World"
        },
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "{{$schema_data['avg_rating']}}",
            "reviewCount": "{{$schema_data['rating_count']}}"
        },
        "offers": {
            "@type": "Offer",
            "priceCurrency": "INR",
            "price": "{{$schema_data['price']}}",
            "itemCondition": "New",
            "availability": "{{$schema_data['availability']}}",
            "seller": {
            "@type": "Organization",
            "name": "Mintage World"
            }
        }
        }
    </script>
    @endisset
            

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
                        <a href="{{url("cart")}}/" title="Cart">
                            <small class="fa fa-shopping-cart text-primary me-2 position-relative"><span id="cart-item-count" class="cart-item">@php 

                                $cartCount = session("cart_count");
                                @endphp
                                @if(isset($cartCount))
                                    {{session("cart_count")}}
                                @else
                                    0
                                @endif</span></small>
                            <small class="icon-text">Cart</small>
                        </a>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center  me-md-2 me-3">                       
                        @if(session("member_id"))
                        <a href="{{url("member/dashboard")}}/"  class="me-2" title="My Account">
                            <small class="fas fa-user-cog text-primary me-2"></small>
                            <small class="icon-text">My Account</small>
                        </a>
                        <a href="{{url("/logout")}}/"  class="me-2" title="Logout">
                            <small class="fas fa-sign-out-alt text-primary me-2"></small>
                            <small class="icon-text">Logout</small>
                        </a>
                        @else 
                        <a href="{{url("application/login")}}/" class="me-2" title="Sign in">
                            <small class="fa fa-sign-in-alt text-primary me-2"></small>
                            <small class="icon-text">Sign in</small>
                        </a>
                        <a href="{{url("member")}}/" title="Sign up"> 
                            <small class="fas fa-user-plus text-primary me-2"></small>
                            <small class="icon-text">Sign up</small>
                        </a>
                        @endif
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
                    <a href="{{url("/")}}/" class="nav-item nav-link">Home</a>
                    <div class="nav-item dropdown">
                        <a href="{{url('shop')}}/" class="nav-link dropdown-toggle">Shopping </a>
                        <div class="dropdown-menu fade-up m-0 mega-menu">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h2>Notes</h2>
                                        <div class="sub-menu-list">
                                            <a href="{{url("shop/list/19-buy-banknotes/")}}/">Bank Notes</a>
                                            <a href="{{url("shop/list/6-greeting-cards/")}}/">Notes Greeting Cards</a>
                                            <a href="{{url("shop/list/7-table-photo-frame/")}}/">Notes Table Photo Frame</a>
                                            <a href="{{url("shop/list/9-wall-photo-frame/")}}/">Notes Wall Frame</a>
                                            <a href="{{url("shop/list/57-premium-notes/")}}/">Premium Notes</a>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <h2>Coins</h2>
                                        <div class="sub-menu-list">
                                            <a href="{{url("shop/list/24-indian-coins/")}}/">Indian Coins</a> 
                                            <a href="{{url("shop/list/25-us-coins/")}}/">US Coins</a> 
                                            <a href="{{url("shop/list/26-german-coins/")}}/">German Coins</a> 
                                            <a href="{{url("shop/list/56-premium-coins/")}}/">Premium Coins</a>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <h2>Accessories</h2>
                                        <div class="sub-menu-list">
                                            <a href="{{url("shop/list/11-coin-accessories/")}}/">Coin Accessories</a> 
                                            <a href="{{url("shop/list/12-banknote-accessories/")}}/">Banknote Accessories</a> 
                                            <a href="{{url("shop/list/14-stamp-accessories/")}}/">Stamp Accessories</a> 
                                            <a href="{{url("shop/list/13-postcard-accessories/")}}/">Postcard Accessories</a> 
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <h2>Stamps</h2>
                                        <div class="sub-menu-list">
                                            <a href="{{url("shop/list/20-indian-stamps/")}}/">Indian Stamps</a> 
					                        <a href="{{url("shop/list/17-australia-stamps/")}}/">Australia Stamp</a>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <h2>Other Products</h2>
                                        <div class="sub-menu-list">
                                            <a href="{{url("shop/list/1-3d-puzzles/")}}/">3D Puzzles</a> 
                                            <a href="{{url("shop/list/10-first-day-cover/")}}/">Envelope First Day Cover</a> 
                                            <a href="{{url("shop/list/23-books/")}}/">Numismatics Books</a> 
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Information</a>
                        <div class="dropdown-menu fade-up m-0">
                            <a href="{{url("coins")}}/" class="dropdown-item">Coins</a>
                            <a href="{{url("notes")}}/" class="dropdown-item">Notes</a>
                            <a href="{{url("stamp")}}/" class="dropdown-item">Stamps</a>
                        </div>
                    </div>
                    <a href="{{url("history")}}/" class="nav-item nav-link">History</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Events</a>
                        <div class="dropdown-menu fade-up m-0">
                            <a href="{{url("event")}}/" class="dropdown-item">Fairs and Exhibitions</a>
                        </div>
                    </div>
                    <a href="{{url("media")}}/" class="nav-item nav-link">News</a> 
                    <a href="{{url("media-coverage")}}/" class="nav-item nav-link">Media</a> 
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
                <li><a href="{{url("")}}/">Home</a></li>
                <li><a href="{{url("shop")}}/">Shopping</a>
                    <ul>
                        <li><a href="{{url("#")}}/">Premium Products</a>
                            <ul>
                                <li><a href="{{url("shop/list/56-premium-coins/")}}/">Premium Coins</a></li>
                                <li><a href="{{url("shop/list/57-premium-notes/")}}/">Premium Notes</a></li>
                            </ul>
                        </li>
                        <li><a href="{{url("#")}}/">Bank Notes</a>
                            <ul>
                                <li><a href="{{url("shop/list/35-indian-banknotes/")}}/">Republic India Banknotes</a></li>
                                <li><a href="{{url("shop/list/36-world-banknotes/")}}/">World Banknotes</a>
                                    <ul>
                                        <li><a href="{{url("shop/list/37-asia/")}}/">Asian Banknotes</a></li>
                                        <li><a href="{{url("shop/list/38-africa/")}}/">African Banknotes</a></li>
                                        <li><a href="{{url("shop/list/39-europe/")}}/">European Banknotes</a></li>
                                        <li><a href="{{url("shop/list/40-north-america/")}}/">North American Banknotes</a></li>
                                        <li><a href="{{url("shop/list/41-south-america/")}}/">South American Banknotes</a></li>

                                    </ul>
                                </li>
                                <li><a href="{{url("shop/list/19-buy-banknotes/")}}/">All Bank Notes</a></li>
                            </ul>
                        </li>
                        <li><a href="{{url("#")}}/">Coins</a>
                            <ul>
                                <li><a href="{{url("shop/list/24-indian-coins/")}}/">Indian Coins</a>
                                    <ul>
                                        <li><a href="{{url("shop/list/29-ancient/")}}/">Ancient Coins</a></li>
                                        <li><a href="{{url("shop/list/30-medieval/")}}/">Medieval Coins</a></li>
                                        <li><a href="{{url("shop/list/31-indian-princely-state/")}}/">Indian Princely State Coins</a></li>
                                        <li><a href="{{url("shop/list/32-colonial/")}}/">Colonial Coins</a></li>
                                        <li><a href="{{url("shop/list/33-republic/")}}/">Republic India Coins</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{url("shop/list/25-us-coins/")}}/">US Coins</a></li>
                                <li><a href="{{url("shop/list/26-german-coins/")}}/">German Coins</a></li>
                                <li><a href="{{url("shop/list/34-roman-era-coins/")}}/">Roman Era Coins</a></li>
                                <li><a href="{{url("shop/list/27-assorted-foreign-coins/")}}/">Assorted Foreign Coins</a></li>
                                <li><a href="{{url("shop/list/28-mint-rolls/")}}/">Mint Coin Rolls</a></li>
                                <li><a href="{{url("shop/list/18-buy-coins/")}}/">All Coins</a></li>
                            </ul>
                        </li>

                        <li><a href="{{url("#")}}/">Stamps</a>
                            <ul>
                                <li><a href="{{url("shop/list/20-indian-stamps/")}}/">Indian Stamps</a>
                                    <ul>
                                        <li><a href="{{url("shop/list/21-miniature-sheet-stamps/")}}/">Miniature Sheet Stamps</a></li>
                                        <li><a href="{{url("shop/list/22-stamps/")}}/">Postal Stamps</a></li>
                                        <li><a href="{{url("shop/list/58-block-of-stamps/")}}/">Block of Stamps</a></li>
                                        <li><a href="{{url("shop/list/59-full-stamp-sheet/")}}/">Full Sheet Stamps</a></li>
                                        <li><a href="{{url("shop/list/60-collectors-pack/")}}/">Collectors Pack</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{url("shop/list/17-australia-stamps/")}}/">Australia Stamps</a></li>
                                <li><a href="{{url("shop/list/45-england-stamps/")}}/">England Stamps</a></li>
                                <li><a href="{{url("shop/list/16-buy-stamps/")}}/">All Stamps</a></li>
                            </ul>
                        </li>

                        <li><a href="{{url("#")}}/">Accessories</a>
                            <ul>
                                <li><a href="{{url("shop/list/11-coin-accessories/")}}/">Coin Accessories</a>
                                    <ul>
                                        <li><a href="{{url("shop/list/46-coin-albums/")}}/">Coin Albums</a></li>
                                        <li><a href="{{url("shop/list/47-coin-pages/")}}/">Coin Pages</a></li>
                                        <li><a href="{{url("shop/list/48-coin-capsules/")}}/">Coin Capsules</a></li>
                                        <li><a href="{{url("shop/list/49-coin-cleaners/")}}/">Coin Cleaners</a></li>
                                        <li><a href="{{url("shop/list/50-coin-holders/")}}/">Coin Holders</a></li>
                                        <li><a href="{{url("shop/list/51-coin-storage-box/")}}/">Coin Storage Box</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{url("shop/list/12-banknote-accessories/")}}/">Banknote Accessories</a>
                                    <ul>
                                        <li><a href="{{url("shop/list/54-banknote-albums/")}}/">Banknote Albums</a> </li>
                                        <li><a href="{{url("shop/list/55-banknote-sleeves/")}}/">Banknote Sleeves</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{url("shop/list/14-stamp-accessories/")}}/">Stamp Accessories</a>
                                    <ul>
                                        <li><a href="{{url("shop/list/52-stamp-album-stockbooks/")}}/">Stamp Album Stockbooks</a> </li>
                                        <li><a href="{{url("shop/list/53-stamp-stock-pages/")}}/">Stamp Stock Pages</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{url("shop/list/13-postcard-accessories/")}}/">Postcard Accessories</a></li>
                                <li><a href="{{url("shop/list/15-general/")}}/">General</a></li>
                                <li><a href="{{url("shop/list/2-collectibles-accessories/")}}/">All Accessories</a></li>
                            </ul>
                        </li>

                        <li><a href="{{url("shop/list/6-greeting-cards/")}}/">Notes Greeting Cards</a></li>
                        <li><a href="{{url("shop/list/7-table-photo-frame/")}}/">Notes Table Photo Frame </a></li>
                        <li><a href="{{url("shop/list/9-wall-photo-frame/")}}/">Notes Wall Photo Frame</a></li>
                        <li><a href="{{url("shop/list/1-3d-puzzles/")}}/">3D Puzzles</a></li>
                        <li><a href="{{url("shop/list/10-first-day-cover/")}}/">Envelopes First Day Cover</a></li>
                        <li><a href="{{url("shop/list/23-books/")}}/">Numismatic Books</a></li>
                    </ul>
                </li>
                <li class="drop-left"><a href="#">Information</a>
                    <ul>
                        <li><a href="{{url("coins")}}/">Coins</a></li>
                        <li><a href="{{url("notes")}}/">Notes</a></li>
                        <li><a href="{{url("history")}}/">Stamps</a></li>
                    </ul>
                </li>
                <li><a href="{{url("history")}}/">History</a></li>
                <li class="drop-left"><a href="#">Events</a>
                    <ul>
                        <li><a href="{{url("event")}}/">Fairs and Exhibitions</a></li>
                        {{-- <li><a href="{{url("")}}/">Key Events (Coming Soon)</a></li> --}}
                    </ul>
                </li>
                <li><a href="{{url("media")}}/">News</a></li>
                <li><a href="{{url("media-coverage")}}/">Media</a></li>
                <li><a href="{{url("knowledge-base")}}/">Knowledge Base</a></li>
                <li><a href="{{url("content/about-us")}}/">About Us</a></li>
                <li><a href="{{url("contact")}}/">Contact Us</a></li>
                @if(session("member_id"))
                <li><a href="{{url("member/dashboard")}}/">My Account</a></li>
                <li><a href="{{url("/logout")}}/">Log Out</a></li>
                @endif

                <li class="text-left mt-2 social-media-menu">
                    <div class="h-100 d-inline-flex align-items-center ms-3">
                        <a class="btn btn-sm-square bg-white me-1 p-1" href="https://www.youtube.com/channel/UCMx9KlQd0kYSU0UE0T9H5YQ" target="_blank">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a class="btn btn-sm-square bg-white me-1 p-1" href="https://www.instagram.com/mintageworld/" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="btn btn-sm-square bg-white me-1 p-1" href="https://www.facebook.com/pages/Mintage-World/408430029349409" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="btn btn-sm-square bg-white me-1 p-1" href="https://twitter.com/mintageworld" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-sm-square bg-white me-1 p-1" href="https://www.pinterest.com/mintageworld/" target="_blank">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                        <a class="btn btn-sm-square bg-white me-0 p-1" href="https://www.linkedin.com/company/ultra-mintage-world-limited/" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>

                    </div>
                </li>
            </ul>

        </div><!-- .stellarnav -->
 

    </section>