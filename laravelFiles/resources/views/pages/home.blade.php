<!-- Carousel Start -->
<section class="home-page-carousel">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{url("assets/img/carousel-1.jpg")}}" alt="">           
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="{{url("assets/img/carousel-2.jpg")}}" alt="">
        </div>
    </div>
</section>
<!-- Carousel End -->


<!-- About Start -->
{{-- <section class="about-wraper overflow-hidden common-padding">
    <div class="container-fluid about px-lg-2 px-lg-5">
        <div class="row mx-lg-0">
            <div class="col-lg-6 ps-lg-0 wow fadeInLeft about-img" data-wow-delay="0.1s">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100" src="{{url("assets/img/about.jpg")}}"
                        style="object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-6 about-text wow fadeInUp" data-wow-delay="0.3s">
                <!-- <h6 class="text-secondary text-uppercase mb-3">Mintage World</h6> -->
                <h1 class="mb-3 heading-1">About Us</h1>
                <p>Mintage World is a newly established online Museum based in Mumbai. Catering to
                    Numismatists, Notaphilists and Philatelists, we are committed to a higher quality of services.
                </p>
                <p>Mintage World was founded by Sri Sushilkumar Agrawal in 2015 who is also the Chairman & Managing
                    Director of Ultra Media & Entertainment Pvt. Ltd. The purpose of this site is to impart
                    knowledge
                    and interest in the areas of Numismatics, Notaphily and Philately to the general public,
                    collectors,
                    students and scholars alike. Mintage World is the first website of its kind in the world where
                    it
                    provides all three domains under one roof.</p>



                <a href="#" class="btn btn-explore">Explore More
                    <span class="first"></span>
                    <span class="second"></span>
                    <span class="third"></span>
                    <span class="fourth"></span>
                </a>
            </div>
        </div>
    </div>
</section> --}}
<!-- About End -->

<section class="common-padding product-wraper bg-light-wraper">
    <div class="container-fluid overflow-hidden px-lg-2 px-lg-5">
        <!-- <h6 class="text-secondary text-uppercase mb-3">Mintage World</h6> -->
        <div class="d-flex justify-content-between">
            <h2 class="mb-3 heading-1">Buy Numistatic Books</h2>
            <a href="#" class="view-all">More <i class="fa fa-angle-right"></i></a>
        </div>
        <div class="owl-carousel product-carousel-home  position-relative">
                  
            @foreach($random_books as $random_book)

            @php

            $imgParts = explode("/",$random_book["img"]);

            @endphp

            <div class="product-grid">
               <div class="product-image"> <a href="{{url("view-product/".$random_book["id"]."-".$random_book["custom_url"])}}" class="image"> <img class="pic-1" src="{{getenv("PRODUCT_HOME_PAGE_IMAGE_BASE_URL").$imgParts[2]}}"> </a> </div>
               <div class="product-content">
                  <h2 class="title"><a href="{{url("view-product/".$random_book["custom_url"])}}">{{$random_book["name1"]}}</a> </h2>
                  <div class="price"><i class="fa fa-rupee-sign"></i> {{$random_book["price"]}}</div>
                  <a href="{{url("view-product/".$random_book["custom_url"])}}" class="add-to-cart d-none">Add to Cart</a> 
               </div>
            </div>

            @endforeach
            
        </div>
    </div>
</section>
<section class="common-padding product-wraper bg-light-wraper">
    <div class="container-fluid overflow-hidden px-lg-2 px-lg-5">
        <!-- <h6 class="text-secondary text-uppercase mb-3">Mintage World</h6> -->
        <div class="d-flex justify-content-between">
            <h2 class="mb-3 heading-1">Buy Coins</h2>
            <a href="#" class="view-all">More <i class="fa fa-angle-right"></i></a>
        </div>
        <div class="owl-carousel product-carousel-home  position-relative">
                  
            @foreach($random_coins as $random_coin)

            @php

            $imgParts = explode("/",$random_coin["img"]);

            @endphp

            <div class="product-grid">
               <div class="product-image"> <a href="{{url("view-product/".$random_coin["id"]."-".$random_coin["custom_url"])}}" class="image"> <img class="pic-1" src="{{getenv("PRODUCT_HOME_PAGE_IMAGE_BASE_URL").$imgParts[2]}}"> </a> </div>
               <div class="product-content">
                  <h2 class="title"><a href="{{url("view-product/".$random_coin["custom_url"])}}">{{$random_coin["name1"]}}</a> </h2>
                  <div class="price"><i class="fa fa-rupee-sign"></i> {{$random_coin["price"]}}</div>
                  <a href="{{url("view-product/".$random_coin["custom_url"])}}" class="add-to-cart d-none">Add to Cart</a> 
               </div>
            </div>

            @endforeach
            
        </div>
    </div>
</section>
<section class="common-padding product-wraper">
    <div class="container-fluid overflow-hidden px-lg-2 px-lg-5">
        <!-- <h6 class="text-secondary text-uppercase mb-3">Mintage World</h6> -->
        <div class="d-flex justify-content-between">
            <h2 class="mb-3 heading-1">Buy Notes</h2>
            <a href="#" class="view-all">More <i class="fa fa-angle-right"></i></a>
        </div>
        <div class="owl-carousel product-carousel-home  position-relative">
            @foreach($random_notes as $random_note)

            @php

            $imgParts = explode("/",$random_note["img"]);

            @endphp

            <div class="product-grid">
               <div class="product-image"> <a href="{{url("view-product/".$random_note["id"]."-".$random_note["custom_url"])}}" class="image"> <img class="pic-1" src="{{getenv("PRODUCT_HOME_PAGE_IMAGE_BASE_URL").$imgParts[2]}}"> </a> </div>
               <div class="product-content">
                  <h2 class="title"><a href="{{url("view-product/".$random_note["custom_url"])}}">{{$random_note["name1"]}}</a> </h2>
                  <div class="price"><i class="fa fa-rupee-sign"></i> {{$random_note["price"]}}</div>
                  <a href="{{url("view-product/".$random_note["custom_url"])}}" class="add-to-cart d-none">Add to Cart</a> 
               </div>
            </div>

            @endforeach
         </div>

    </div>
</section>
<section class="common-padding product-wraper bg-light-wraper">
    <div class="container-fluid overflow-hidden px-lg-2 px-lg-5">
        <!-- <h6 class="text-secondary text-uppercase mb-3">Mintage World</h6> -->
        <div class="d-flex justify-content-between">
            <h2 class="mb-3 heading-1">Buy Accessories</h2>
            <a href="#" class="view-all">More <i class="fa fa-angle-right"></i></a>
        </div>
        <div class="owl-carousel product-carousel-home  position-relative">
                  

            @foreach($random_accessories as $random_accessory)

            @php

            $imgParts = explode("/",$random_accessory["img"]);

            @endphp

            <div class="product-grid">
               <div class="product-image"> <a href="{{url("view-product/".$random_accessory["id"]."-".$random_accessory["custom_url"])}}" class="image"> <img class="pic-1" src="{{getenv("PRODUCT_HOME_PAGE_IMAGE_BASE_URL").$imgParts[2]}}"> </a> </div>
               <div class="product-content">
                  <h2 class="title"><a href="{{url("view-product/".$random_accessory["custom_url"])}}">{{$random_accessory["name1"]}}</a> </h2>
                  <div class="price"><i class="fa fa-rupee-sign"></i> {{$random_accessory["price"]}}</div>
                  <a href="{{url("view-product/".$random_accessory["custom_url"])}}" class="add-to-cart d-none">Add to Cart</a> 
               </div>
            </div>

            @endforeach

        </div>

    </div>
</section>
<section class="common-padding product-wraper">
    <div class="container-fluid overflow-hidden px-lg-2 px-lg-5">
        <!-- <h6 class="text-secondary text-uppercase mb-3">Mintage World</h6> -->
        <div class="d-flex justify-content-between">
            <h2 class="mb-3 heading-1">Buy Stamp</h2>
            <a href="#" class="view-all">More <i class="fa fa-angle-right"></i></a>
        </div>
        
        <div class="owl-carousel product-carousel-home  position-relative">
                  

            @foreach($random_stamps as $random_stamp)

            @php

            $imgParts = explode("/",$random_stamp["img"]);

            @endphp

            <div class="product-grid">
               <div class="product-image"> <a href="{{url("view-product/".$random_stamp["id"]."-".$random_stamp["custom_url"])}}" class="image"> <img class="pic-1" src="{{getenv("PRODUCT_HOME_PAGE_IMAGE_BASE_URL").$imgParts[2]}}"> </a> </div>
               <div class="product-content">
                  <h2 class="title"><a href="{{url("view-product/".$random_stamp["custom_url"])}}">{{$random_stamp["name1"]}}</a> </h2>
                  <div class="price"><i class="fa fa-rupee-sign"></i> {{$random_stamp["price"]}}</div>
                  <a href="{{url("view-product/".$random_stamp["custom_url"])}}" class="add-to-cart d-none">Add to Cart</a> 
               </div>
            </div>

            @endforeach

        </div>
        
    </div>
</section>




<!-- Fact Start -->
<section class="some-fact-wraper common-padding bg-light-wraper">
    <div class="container-fluid  px-lg-2 px-lg-5">
        <div class="row">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <!-- <h6 class="text-secondary text-uppercase mb-3">Some Facts</h6> -->
                <h2 class="mb-5 heading-1">#1 Place To Online Museum of Coins, Stamps and Notes</h2>
                <p class="mb-5">Mintage World - Online Museum and Collectorspedia. It is the world`s first online
                    museum in India and a one-stop shop for information on coins, notes and stamps for budding and
                    seasoned collectors and students.
                </p>
                <div class="d-flex align-items-center">
                    <i class="fa fa-headphones fa-2x flex-shrink-0 bg-primary p-3 text-white"></i>
                    <div class="ps-4">
                        <h6>Call for Enquiry!</h6>
                        <h3 class="text-primary m-0"><a href="tel:02240190400">022 - 40190400</a></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" id="counter">
                <div class="row g-4 align-items-center">
                    <div class="col-md-4 col-sm-6 col-4">
                        <div class="counter">
                            <div class="counter-icon"><i class="fa fa-calendar-alt"></i></div>
                            <span class="counter-value count" data-count="15">0</span>
                            <h3>Years of Experience</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-4">
                        <div class="counter red">
                            <div class="counter-icon"><i class="fa fa-users"></i></div>
                            <span class="counter-value count" data-count="25897">0</span>
                            <h3>Happy Clients</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-4">
                        <div class="counter blue">
                            <div class="counter-icon"><i class="fa fa-coins"></i></div>
                            <span class="counter-value count" data-count="17980">0</span>
                            <h3>Our Collection </h3>
                        </div>
                    </div>
                    <!-- <div class="col-md-3 col-sm-6">
                        <div class="counter green">
                            <div class="counter-icon"><i class="fa fa-briefcase"></i></div>
                            <span class="counter-value">1823</span>
                            <h3>Responsive Design</h3>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fact End -->



<!-- Service Start -->
<section class="common-padding service-wraper">
    <div class="container-fluid service  px-lg-2 px-lg-5">       
        <div class="row">           
            <div class="col-lg-4 col-md-6 mb-md-0 mb-3">
                <div class="wow fadeInUp" data-wow-delay="0.1s"> 
                    <h2 class="mb-4 heading-1">Information </h2>
                </div>
                <div class="nav w-100 nav-pills">
                    <a class="nav-link w-100 d-flex align-items-center text-start" href="{{url("coin/")}}"> 
                        <h4 class="m-0">Coins</h4>
                    </a>
                    <a class="nav-link w-100 d-flex align-items-center text-start" href="{{url("notes/")}}"> 
                        <h4 class="m-0">Notes</h4>
                    </a>
                    <a class="nav-link w-100 d-flex align-items-center text-start" href="{{url("notes/")}}"> 
                        <h4 class="m-0">Stamps</h4>
                    </a>
                    <a class="nav-link w-100 d-flex align-items-center text-start mb-0 p-0 img-info overflow-hidden" href="{{url("history/")}}"><img src="{{url("assets/img/info-img.jpg")}}" class="img-fluid" alt=""> </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-md-0 mb-3">
                <div class="d-flex justify-content-between">
                    <h2 class="mb-3 heading-1">Latest News</h2>                   
                </div>               
                <div class=" news-container latest-news position-relative">
                    <ul class="slick">
                        <li>
                            <a href="{{url("media/detail/16221/")}}">
                                <div class="news-title">Jerdon's Courser Commemorative Stamp</div>
                                <div class="news-date"><i class="fas fa-calendar-alt"></i> 22&nbsp;Sep&nbsp;2023</div>
                                <div class="news-info">Jerdon's courser is a nocturnal bird belonging to the pratincole and courser family Glareolidae. It ...</div>
                             </a> 
                        </li>
                        <li>
                            <a href="{{url("media/detail/16222/")}}">
                                <div class="news-title">The New Age of Philately - NFT Stamps</div>
                                <div class="news-date"><i class="fas fa-calendar-alt"></i> 22&nbsp;Sep&nbsp;2023</div>
                                <div class="news-info">The latest trend among Post Offices worldwide is the release of Non-Fungible tokens (NFT) stamps for...</div>
                             </a> 
                        </li>
                        <li>
                            <a href="{{url("media/detail/16221/")}}">
                                <div class="news-title"> Silver Rupee of Independent Kingdom Sikh Empire</div>
                                <div class="news-date"><i class="fas fa-calendar-alt"></i> 22&nbsp;Sep&nbsp;2023</div>
                                <div class="news-info">The latest trend among Post Offices worldwide is the release of Non-Fungible tokens (NFT) stamps for...</div>
                             </a> 
                        </li>
                        <li>
                            <a href="/media/detail/16222/">
                                <div class="news-title">International Peace Day 2023</div>
                                <div class="news-date"><i class="fas fa-calendar-alt"></i> 22&nbsp;Sep&nbsp;2023</div>
                                <div class="news-info">The latest trend among Post Offices worldwide is the release of Non-Fungible tokens (NFT) stamps for...</div>
                             </a> 
                        </li>
                    </ul>                   
                </div>
                <div class="text-end d-block" ><a href="{{url("media/")}}" class="view-all">View All <i class="fa fa-angle-right"></i></a></div>
                

            </div>  
            <div class="col-lg-4 col-md-12">
                <div class="wow fadeInUp" data-wow-delay="0.1s"> 
                    <h2 class="mb-4 heading-1">Event Videos</h2>
                </div>
                <div class="news-container position-relative">
                    <ul>
                        <li> 
                                <div class="news-title">Legendary Numismatist Dr. Prashant Kulkarni - Episode 3 | Unheard Stories of Coins</div> 
                                <div class="news-date"><i class="fas fa-calendar-alt"></i> 22&nbsp;Sep&nbsp;2023</div>
                                <div class="news-info">
                                    <iframe src="https://www.youtube.com/embed/zTmlyXawlAg?rel=0" allowfullscreen class="you-tube-video"></iframe>
                                </div> 
                        </li>
                    </ul>
                </div>
                <div class="text-end d-block" ><a href="{{url("videos/")}}" class="view-all">View All <i class="fa fa-angle-right"></i></a></div>
            </div>            
        </div>
    </div>
</section>
<!-- Service End -->
<section class="common-padding  px-lg-2 px-lg-5 home-page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>ONLINE MUSEUM FOR COINS, NOTES AND STAMPS OF WORLD</h1>
                <p>
                    Coins and notes are a part of our daily lives. We have used stamps while availing of postal
                    service provided by the government.
                    But seldom do we think about their origin, history, and evolution. Mintage World offers you a
                    platform to discover the coins,stamps and <a href="#">notes of
                        India</a>.
                    Mintage World is an online museum with an extensively researched collection of coins, notes, and
                    stamps. It is a haven for Numismatists, Notaphilists, and Philatelists.
                    It is also a place for history buffs to learn about the coins, notes, and stamps issued in India
                    over the ages. This online museum provides information on <a href="#">ancient coins</a>, <a
                        href="#">medieval coins</a> and <a href="#">modern Indian coins</a>, Pre-Colonial,
                    <a href="#">Colonial</a>, and Republic paper
                    currency, and Pre-Independence and Post-Independence stamps issued in India.
                </p>
                <p>Mintage World is more than just an online museum. You can also check upcoming events such as coin
                    fairs or auctions or you can read interesting titbits from the world of coins, notes, and
                    stamps. This website is also a hub of historic information. There is more to Indian history than
                    the freedom struggle, <a href="#">Mauryas (Magadha
                        Mauryan Janapada)</a>, <a href="#">Guptas</a>, <a href="#">Mughals</a> and <a
                        href="#">Marathas</a>. Read up on the
                    numerous dynasties that ruled different parts of India at different times. Learn about Janpadas,
                    <a href="#">Satavahana</a>, <a href="#">Kushan</a>, Western Kshatrapas, <a href="#">Alupas</a>,
                    Delhi sultanate, <a href="#">Malwa Sultanate</a> and
                    more. Learn about their coins along with the names of their rulers through our 'History' section
                </p>
                <p>
                    Mintage World is a one-of-its-kind online museum for coins, notes, and <a href="#">stamps in
                        India</a>.
                    It is unique in its concept and the collection includes information on many coins issued by
                    Indian rulers.
                    The online museum of coins contains the largest collection on <a href="#">Indian coins</a>.
                    The online museum of notes houses information on all the paper money issued in India right from
                    the 18th century;
                    while the online museum of stamps displays all the stamps issued in India, right from the Scinde
                    Dawk.
                </p>
            </div>
        </div>
    </div>
</section>
<script> 
var counted = 0;
$(window).scroll(function() {

  var oTop = $('#counter').offset().top - window.innerHeight;
  if (counted == 0 && $(window).scrollTop() > oTop) {
    $('.count').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
           
          }

        });
    });
    counted = 1;
  }

});
</script>

<script src="{{url("assets/js/slick.min.js")}}"></script>

<script>
    let slickOptions = {
  centerMode: true,
  centerPadding: '0px',
  vertical: true,
  infinite: true,
  slidesToShow: 2,
  autoplay: true,
  arrows: false,
  pauseOnHover: true 
}

$('.slick').slick(slickOptions)
</script>