
    <!-- Footer Start -->
    <footer class="footer-wraper footer bg-dark text-light  common-padding pb-0 ">
        <div class="container-fluid  px-lg-2 px-lg-5" data-wow-delay="0.1s">
            <div class="row">
                <div class="col">
                    <h4 class="text-light mb-4">Get in Touch</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>2-C, Thackar Indl. Estate <br />N. M.
                        Joshi
                        Marg, Lower Parel (E), <br />Mumbai - 400 011.</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>022 - 40190400</p>
                    <p class="mb-2"><i class="fa fa-mobile-alt me-3"></i>8591908969</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@mintageworld.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-pinterest-p"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="#">Home</a>
                    <a class="btn btn-link" href="#">Coins</a>
                    <a class="btn btn-link" href="#">Notes</a>
                    <a class="btn btn-link" href="#">Stamps</a>
                    <a class="btn btn-link" href="#">History</a>
                    <a class="btn btn-link" href="#">Fairs and Exhibitions</a>
                </div>
                <div class="col">
                    <h4 class="text-light mb-4 d-md-block">&nbsp;</h4>
                    <a class="btn btn-link" href="#">News</a>
                    <a class="btn btn-link" href="#">Blogs</a>
                    <a class="btn btn-link" href="#">My Collection</a>
                    <a class="btn btn-link" href="#">About Us</a>
                    <a class="btn btn-link" href="#">Contact Us</a>

                </div>
                <div class="col">
                    <h4 class="text-light mb-4 d-none d-md-block">&nbsp;</h4>
                    <a class="btn btn-link" href="#">Disclaimer</a>
                    <a class="btn btn-link" href="#">Privacy Policy</a>
                    <a class="btn btn-link" href="#">Terms of Use</a>
                    <a class="btn btn-link" href="#">Return Policy</a>
                    <a class="btn btn-link" href="#">Sitemap</a>
                </div>
                <div class="col">
                    <h4 class="text-light mb-4 d-none d-md-block">&nbsp;</h4>
                    <a class="btn btn-link" href="#">Career</a>
                    <a class="btn btn-link" href="#">Story of the Week</a>
                    <a class="btn btn-link" href="#">PhotoPro</a>
                    <a class="btn btn-link" href="#">Event Videos</a>
                    <a class="btn btn-link" href="#">Contact Us</a>
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
            <input id="search-input" type="text" placeholder="Search..." />
        </div>
        <p id="searchCloseP" class="hide"></p>
    </div>


    <div class="sticky-footer">
        <ul class="sticky-footer-ul">
            <li><a href="#" title="User"><i class="fa fa-user"></i></a></li>
            <li><a href="#" title="Add to Cart"><i class="fa fa-cart-plus"></i></a></li>
            <li><a href="#" title="Login"><i class="fa fa-lock"></i></a></li>
            <li><a href="#" title="search" id="footerSearch"><i class="fa fa-search"></i></a></li>
        </ul>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{url("assets/lib/wow/wow.min.js")}}"></script>
    <script src="{{url("assets/lib/easing/easing.min.js")}}"></script>
    <script src="{{url("assets/lib/waypoints/waypoints.min.js")}}"></script>
    <script src="{{url("assets/lib/counterup/counterup.min.js")}}"></script>
    <script src="{{url("assets/lib/owlcarousel/owl.carousel.min.js")}}"></script>

    <!-- Template Javascript -->
    <script type="text/javascript" src="{{url("assets/js/stellarnav.min.js")}}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            jQuery('.stellarnav').stellarNav({
                theme: 'dark',
                breakpoint: 991,
                position: 'right',
                phoneBtn: '8591908969',
                locationBtn: 'https://goo.gl/maps/MVGRHf5VqZWBAvJD9'
            });
        });
    </script>
    <script src="{{url("assets/js/main.js")}}"></script>   
    <script src="{{url("assets/js/baguetteBox.min.js")}}"></script>
    <script>
        baguetteBox.run('.tz-gallery');
    </script>
     <script src="{{url("assets/js/thumb-carousel.js")}}"></script>
     <script src="{{url("assets/js/image-zoom.js")}}"></script>

</body>

</html>