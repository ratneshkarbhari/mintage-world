
    <!-- Footer Start -->
    <footer class="footer-wraper footer bg-dark text-light  common-padding pb-0 ">
        <div class="container-fluid  px-lg-2 px-lg-5" data-wow-delay="0.1s">
            <div class="row">
                <div class="col">
                    <h4 class="text-light mb-4">Get in Touch</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>2-C, Thackar Indl. Estate <br />N. M.
                        Joshi
                        Marg, Lower Parel (E), <br />Mumbai - 400 011.</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i><a href="tel:02240190400">022 - 40190400</a></p>
                    <p class="mb-2"><i class="fa fa-mobile-alt me-3"></i><a href="tel:8591908969">85919 08969</a></p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i><a href="mailto:info@mintageworld.com">info@mintageworld.com</a></p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/channel/UCMx9KlQd0kYSU0UE0T9H5YQ" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/mintageworld/" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/pages/Mintage-World/408430029349409" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://twitter.com/mintageworld" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.pinterest.com/mintageworld/" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/company/ultra-mintage-world-limited/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="{{url("/")}}">Home</a>
                    <a class="btn btn-link" href="{{url("content/about-us/")}}">About Us</a>
                    <a class="btn btn-link" href="{{url("media/")}}">News</a>
                    <a class="btn btn-link" href="https://www.mintageworld.com/blog/" target="_blank">Blogs</a>
                    <a class="btn btn-link" href="{{url("contact")}}">Contact Us</a>

                    
                </div>
                <div class="col">
                    <h4 class="text-light mb-4 d-md-block">&nbsp;</h4>
                    {{-- <a class="btn btn-link" href="{{url("history")}}">My Collection</a> --}}
                    <a class="btn btn-link" href="{{url("coins/")}}">Coins</a>
                    <a class="btn btn-link" href="{{url("notes/")}}">Notes</a>
                    <a class="btn btn-link" href="{{url("stamp/")}}">Stamps</a>
                    <a class="btn btn-link" href="{{url("history/")}}">History</a>
                    <a class="btn btn-link" href="{{url("event/")}}">Fairs and Exhibitions</a>
                    

                </div>              
                <div class="col">
                    <h4 class="text-light mb-4 d-none d-md-block">&nbsp;</h4>
                    <a class="btn btn-link" href="{{url("content/career/")}}">Career</a>
                    <a class="btn btn-link" href="{{url("story/")}}">Story of the Week</a>
                    <a class="btn btn-link" href="{{url("content/photopro/")}}">PhotoPro</a>
                    <a class="btn btn-link" href="{{url("videos/")}}">Event Videos</a> 
                    <a class="btn btn-link" href="{{url("content/courtesy/")}}">Courtesy</a> 
                    
                </div>
                <div class="col">
                    <h4 class="text-light mb-4 d-none d-md-block">&nbsp;</h4>
                    <a class="btn btn-link" href="{{url("knowledge-base/")}}">Knowledge Base</a> 
                    <a class="btn btn-link" href="{{url("content/disclaimer/")}}">Disclaimer</a>
                    <a class="btn btn-link" href="{{url("content/privacy/")}}">Privacy Policy</a>
                    <a class="btn btn-link" href="{{url("content/term/")}}">Terms of Use</a>
                    <a class="btn btn-link" href="{{url("content/return/")}}">Return Policy</a>
                    <a class="btn btn-link" href="{{url("content/sitemap/")}}">Sitemap</a>
                </div>
            </div>
            <div class="row">
                <div class="copyright col-md-12 mt-5">
                    <p class="mb-0 text-center">© 2021 Mintage World - All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
    <div class="search-box-wrap">
        <div id="searchbox">
            <svg id="searchbox-close" class="close" viewbox="0 0 24 24">
                <path
                    d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
            </svg>
            <form action="{{url('universal-search-exe')}}" method="GET">
            <input id="search-input" name="q" type="text" required placeholder="Search..." />
            </form>
        </div>
        <p id="searchCloseP" class="hide"></p>
    </div>

    
    <div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content"> 
            <div class="modal-body text-center">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="login-form-content ">
                <div class="col-md-4 text-center company__info">
                    <span class="company__logo">
                        <h2><i class="fas fa-sign-in-alt"></i></h2>
                    </span>
                </div>
                <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                    <h2 class="mt-3 mb-3 text-center">Sign In</h2>
                    <p class="text-danger text-center" id="loginError"></p>
                    @if(!isset($is_login))
                    <form action="{{url("coin-info-filter-exe")}}" id="memberLoginForm">                        
                        @csrf
                        <input type="text" name="username" id="login-username" class="form__input" placeholder="Username">
                        <input type="password" name="password" id="login-password" class="form__input mb-1" placeholder="Password">
                        <span class="small text-end d-block w-100">
                        <a href="{{url("member/forgotpassword/")}}"> Forgot password?</a> </span>
                        <button type="button" class="btn" id="loginButton">Login</button>
                    </form>
                    @endif
                    <script>
                        $("button#loginButton").click(function (e) { 
                            e.preventDefault();

                            
                            
                            $.ajax({
                                type: "POST",
                                url: '{{url("member-login-exe")}}',
                                data: {
                                    "_token": "{{ csrf_token() }}",

                                    "username" : $("input#login-username").val(),
                                    "password" : $("input#login-password").val()
                                },
                                success: function (response) {
                                    if (response=="login-success") {
                                        window.location.replace('{{url("member/dashboard")}}');
                                    }else if(response=="redirect-to-email-verif"){
                                        window.location.replace("{{url('verify-email-page')}}");
                                    }else{
                                        $("p#loginError").html("Email or password is incorrect");
                                    }
                                }
                            });
                        });
                    </script>
                    <p class="mb-4">Don't have an account? <a href="{{url("member/")}}">Register Here</a></p>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="sticky-footer">
        <ul class="sticky-footer-ul">
            <li><a href="{{url("cart/")}}" class="position-relative" title="Add to Cart"><i class="fa fa-cart-plus"></i><span id="cart-item-count-mobile">@php 

$cartCount = session("cart_count");
@endphp
@if(isset($cartCount))
    {{session("cart_count")}}
@else
    0
@endif</span> </a></li>
            @if(session("member_id"))
            <li><a href="{{url("member/dashboard")}}" title="Sign in"><i class="fas fa-user-cog"></i></a></li>
            <li><a href="{{url("/logout")}}" title="Login"><i class="fas fa-sign-out-alt"></i></a></li>
            @else 
            {{-- <li><a href="{{url("member/")}}" title="Sign in"><i class="fa fa-user"></i></a></li> --}}
            <li><a href="{{url("application/login/")}}" title="Login"><i class="fa fa-lock"></i></a></li>
            @endif
           
            <li><a href="#" title="search" id="footerSearch"><i class="fa fa-search"></i></a></li>
        </ul>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>
    <div class="menu-container">
        <div class="collapse-icon">
           <span>Share On</span> <i class="fas fa-share-alt"></i>
        </div>
        <div class="menu-item">
            <a href="" id="shareFB" target="_blank"><span class="fab fa-facebook-f"></span>
            <div class="menu-item-text">Facebook</div>
            </a>
          </div>  
        <div class="menu-item">
            <a href="" id="shareTW" target="_blank">
          <span class="fab fa-twitter" target="_blank"></span>
          <div class="menu-item-text">Twitter</div>
            </a>
        </div>
        <div class="menu-item">
            <a href="" id="shareWH" target="_blank">
          <span class="fab fa-whatsapp" target="_blank"></span>
          <div class="menu-item-text">Whatsapp</div>
            </a>
        </div>

      </div>
      

    <!-- JavaScript Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{url("assets/lib/wow/wow.min.js")}}"></script>
    <script src="{{url("assets/lib/easing/easing.min.js")}}"></script>
    <script src="{{url("assets/lib/waypoints/waypoints.min.js")}}"></script>
    <script src="{{url("assets/lib/counterup/counterup.min.js")}}"></script>
    <script src="{{url("assets/lib/owlcarousel/owl.carousel.min.js")}}"></script>

    <!-- Template Javascript -->
    <script type="text/javascript" src="{{url("assets/js/stellarnav.min.js")}}"></script>    
    <script src="{{url("assets/js/main.js")}}"></script>   
    <script src="{{url("assets/js/baguetteBox.min.js")}}"></script>
    <script>
        baguetteBox.run('.tz-gallery');
    </script>
     <script src="{{url("assets/js/thumb-carousel.js")}}"></script>
     <script src="{{url("assets/js/image-zoom.js")}}"></script>

    <script>
function sethref()  
 {
  document.getElementById("shareFB").setAttribute("href","https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(document.URL));  
  document.getElementById("shareTW").setAttribute("href","https://twitter.com/share?url=" + encodeURIComponent(document.URL)); 
  document.getElementById("shareWH").setAttribute("href","https://wa.me/?text=" + encodeURIComponent(document.URL)); 
  
 }
    window.onload = sethref;
    </script>

</body>

</html>