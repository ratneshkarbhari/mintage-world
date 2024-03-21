<main class="page-content">
   <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/default-banner.jpg")}}" /></section>
   <section class="breadcrumb-wraper">
      <div class="container-fluid px-lg-2 px-lg-5">
         <nav aria-label="breadcrumb" class="breadcrumb-title-box">
            <ol class="breadcrumb">
               <li class="breadcrumb-item me-2"><a href="{{url("/")}}/"><i class="fa fa-home"></i> Home</a></li>
               <li class="breadcrumb-item me-2" aria-current="page"><a href="{{url("/shop")}}/">Shop</a></li>
               @isset($grand_parent_category)
               <li class="breadcrumb-item me-2" aria-current="page"><a href="{{url("/shop/list/".$grand_parent_category["id"]."-".Str::slug($grand_parent_category["cat_name"]))}}/">{{$grand_parent_category["cat_name"]}}</a></li>
               @endisset
               @isset($parent_category)
               <li class="breadcrumb-item me-2" aria-current="page"><a href="{{url("/shop/list/".$parent_category["id"]."-".Str::slug($parent_category["cat_name"]))}}/">{{$parent_category["cat_name"]}}</a></li>
               @endisset
               <li class="breadcrumb-item me-2" aria-current="page">{{$category["cat_name"]}}</li>
            </ol>
         </nav>
      </div>
   </section>
   <section class="common-padding coing-list-wraper">
      <div class="container-fluid  px-lg-2 px-lg-5">
         <div class="row info-item-grid-row" id="info-item-grid-row">
            <div class="col-lg-3 col-md-12 left-filter-wrap ">
               <div id="InfoFilter" class="filter-wrap">
                  <div class="filter-link"><i class="fa fa-filter" aria-hidden="true"></i> <b>SHOP BY CATEGORIES</b> </div>
               </div>
               <div id="CategoryMenu" class="category-menu">
                  <nav class="nav" role="navigation">
                     <div class="cat-heading">
                        <b><i class="fa fa-filter" aria-hidden="true"></i>SHOP BY CATEGORIES</b>
                        <div id="CatClose" class="categories-close">X</div>
                     </div>
                     <ul class="nav__list">
                        <li>
                           <input id="group-1" type="checkbox" hidden=""> <label for="group-1"><span class="fa fa-angle-right"></span> <a href="{{url("/")}}/shop/list/64-premium-products/">Premium Products </a> </label>
                           <ul class="group-list">
                              <li><a href="{{url("/")}}/shop/list/56-premium-coins/">Premium Coins</a> </li>
                              <li><a href="{{url("/")}}/shop/list/57-premium-notes/">Premium Notes</a> </li>
                           </ul>
                        </li>
                        <li>
                           <input id="group-2" type="checkbox" hidden=""> <label for="group-2"><span class="fa fa-angle-right"></span> <a href="{{url("/")}}/shop/list/18-buy-coins/">Coins</a></label>
                           <ul class="group-list">
                              <li>
                                 <input id="group-2-1" type="checkbox" hidden=""> <label for="group-2-1"><span class="fa fa-angle-right"></span> <a href="{{url("/")}}/shop/list/24-indian-coins/">Indian Coins</a></label>
                                 <ul class="sub-group-list">
                                    <li><a href="{{url("/")}}/shop/list/29-ancient/">Ancient</a> </li>
                                    <li><a href="{{url("/")}}/shop/list/30-medieval/">Medieval</a> </li>
                                    <li><a href="{{url("/")}}/shop/list/31-indian-princely-state/">Indian Princely State</a> </li>
                                    <li><a href="{{url("/")}}/shop/list/32-colonial/">Colonial</a> </li>
                                    <li>
                                       <input id="group-2-1-1" type="checkbox" hidden=""> <label for="group-2-1-1"><span class="fa fa-angle-right"></span> <a href="{{url("/")}}/shop/list/33-republic/">Republic</a></label>
                                       <ul class="sub-group-list">
                                          <li><a href="{{url("/")}}/shop/list/63-commemorative-coins/">Commemorative Coins</a> </li>
                                          <li><a href="{{url("/")}}/shop/list/62-definitive-coins/">Definitive Coins</a> </li>
                                          <li><a href="{{url("/")}}/shop/list/61-sovereign-set/">Sovereign Set</a> </li>
                                       </ul>
                                    </li>
                                 </ul>
                              </li>
                              <li><a href="{{url("/")}}/shop/list/25-us-coins/">US Coins</a> </li>
                              <li><a href="{{url("/")}}/shop/list/26-german-coins/">German Coins</a> </li>
                              <li><a href="{{url("/")}}/shop/list/27-assorted-foreign-coins/">Assorted Foreign Coins</a> </li>
                              <!--<li><a href="{{url("/")}}/shop/list/34-roman-era-coins/" >Roman Era Coins</a></li>-->
                              <li><a href="{{url("/")}}/shop/list/28-mint-rolls/">Mint Coin Rolls</a> </li>
                              <!-- <li><a href="#">1st level item</a></li> -->
                           </ul>
                        </li>
                        <li>
                           <input id="group-3" type="checkbox" hidden=""> <label for="group-3"><span class="fa fa-angle-right"></span> <a href="{{url("/")}}/shop/list/19-buy-banknotes/">Banknotes / Paper Money</a></label>
                           <ul class="group-list">
                              <li><a href="{{url("/")}}/shop/list/35-indian-banknotes/">Indian Banknotes </a> </li>
                              <li>
                                 <input id="group-3-1" type="checkbox" hidden=""> <label for="group-3-1"><span class="fa fa-angle-right"></span> <a href="{{url("/")}}/shop/list/36-world-banknotes/">World Banknotes</a></label>
                                 <ul class="sub-group-list">
                                    <li><a href="{{url("/")}}/shop/list/37-asia/">Asia</a> </li>
                                    <li><a href="{{url("/")}}/shop/list/38-africa/">Africa</a> </li>
                                    <li><a href="{{url("/")}}/shop/list/39-europe/">Europe</a> </li>
                                    <li><a href="{{url("/")}}/shop/list/40-north-america/">North America</a> </li>
                                    <li><a href="{{url("/")}}/shop/list/41-south-america/">South America</a> </li>
                                    <li><a href="{{url("/")}}/shop/list/42-australia/">Australia</a> </li>
                                    <li><a href="{{url("/")}}/shop/list/43-antarctica/">Antarctica</a> </li>
                                 </ul>
                                 <!-- <li><a href="#">1st level item</a></li> -->
                              </li>
                           </ul>
                        </li>
                        <li>
                           <input id="group-4" type="checkbox" hidden=""> <label for="group-4"><span class="fa fa-angle-right"></span> <a href="{{url("/")}}/shop/list/16-buy-stamps/">Stamps</a></label>
                           <ul class="group-list">
                              <li>
                                 <input id="group-4-1" type="checkbox" hidden=""> <label for="group-4-1"><span class="fa fa-angle-right"></span> <a href="{{url("/")}}/shop/list/20-indian-stamps/">Indian Stamps</a></label>
                                 <ul class="sub-group-list">
                                    <li><a href="{{url("/")}}/shop/list/21-miniature-sheet-stamps/">Miniature Sheet Stamps</a> </li>
                                    <li><a href="{{url("/")}}/shop/list/22-stamps/">Stamps</a> </li>
                                    <li><a href="{{url("/")}}/shop/list/58-block-of-stamps/">Block of Stamps</a> </li>
                                    <li><a href="{{url("/")}}/shop/list/59-full-stamp-sheet/">Full Stamp Sheet</a> </li>
                                 </ul>
                              </li>
                              <li><a href="{{url("/")}}/shop/list/17-australia-stamps/">Australia Stamps</a> </li>
                              <li><a href="{{url("/")}}/shop/list/45-england-stamps/">England Stamps</a> </li>
                              <li><a href="{{url("/")}}/shop/list/60-collectors-pack/">Collectors Pack</a> </li>
                              <!-- <li><a href="#">1st level item</a></li> -->
                           </ul>
                        </li>
                        <li>
                           <input id="group-5" type="checkbox" hidden=""> <label for="group-5"><span class="fa fa-angle-right"></span> <a href="{{url("/")}}/shop/list/2-collectibles-accessories/">Accessories</a></label>
                           <ul class="group-list">
                              <li>
                                 <input id="group-5-1" type="checkbox" hidden=""> <label for="group-5-1"><span class="fa fa-angle-right"></span> <a href="{{url("/")}}/shop/list/11-coin-accessories/"> Coin Accessories</a> </label>
                                 <ul class="sub-group-list">
                                    <li><a href="{{url("/")}}/shop/list/46-coin-albums/">Coin Albums</a> </li>
                                    <li><a href="{{url("/")}}/shop/list/47-coin-pages/">Coin Pages</a> </li>
                                    <li><a href="{{url("/")}}/shop/list/48-coin-capsules/">Coin Capsules</a> </li>
                                    <li><a href="{{url("/")}}/shop/list/49-coin-cleaners/">Coin Cleaners</a> </li>
                                    <li><a href="{{url("/")}}/shop/list/50-coin-holders/">Coin Holders</a> </li>
                                    <li><a href="{{url("/")}}/shop/list/51-coin-storage-box/">Coin Storage Box</a> </li>
                                 </ul>
                              </li>
                              <li>
                                 <input id="group-5-2" type="checkbox" hidden=""> <label for="group-5-2"><span class="fa fa-angle-right"></span> <a href="{{url("/")}}/shop/list/12-banknote-accessories/"> Banknote Accessories</a> </label>
                                 <ul class="sub-group-list">
                                    <li><a href="{{url("/")}}/shop/list/54-banknote-albums/">Banknote Albums</a> </li>
                                    <li><a href="{{url("/")}}/shop/list/55-banknote-sleeves/">Banknote Sleeves</a> </li>
                                 </ul>
                              </li>
                              <li>
                                 <input id="group-5-3" type="checkbox" hidden=""> <label for="group-5-3"><span class="fa fa-angle-right"></span> <a href="{{url("/")}}/shop/list/14-stamp-accessories/"> Stamp Accessories</a> </label>
                                 <ul class="sub-group-list">
                                    <li><a href="{{url("/")}}/shop/list/52-stamp-album-stockbooks/">Stamp Album Stockbooks</a> </li>
                                    <li><a href="{{url("/")}}/shop/list/53-stamp-stock-pages/">Stamp Stock Pages</a> </li>
                                 </ul>
                              </li>
                              <li><a href="{{url("/")}}/shop/list/13-postcard-accessories/">Postcard Accessories</a> </li>
                              <li><a href="{{url("/")}}/shop/list/15-general/">General</a> </li>
                              <!-- <li><a href="#">1st level item</a></li> -->
                           </ul>
                        </li>
                        <li> <input type="checkbox" hidden=""> <label><a href="{{url("/")}}/shop/list/6-greeting-cards/">Greeting Cards</a></label> </li>
                        <li> <input type="checkbox" hidden=""> <label><a href="{{url("/")}}/shop/list/7-table-photo-frame/">Table Photo Frame</a></label> </li>
                        <li> <input type="checkbox" hidden=""> <label><a href="{{url("/")}}/shop/list/9-wall-photo-frame/">Wall Photo Frame</a></label> </li>
                        <li> <input type="checkbox" hidden=""> <label><a href="{{url("/")}}/shop/list/1-3d-puzzles/">3D Puzzles</a></label> </li>
                        <li> <input type="checkbox" hidden=""> <label><a href="{{url("/")}}/shop/list/10-first-day-cover/">Envelopes First Day Cover</a></label> </li>
                        <li> <input type="checkbox" hidden=""> <label><a href="{{url("/")}}/shop/list/23-books/">Numismatic Books</a></label> </li>
                     </ul>
                  </nav>
               </div>
            </div>
            <div class="col-lg-9 col-md-12 mt-md-5 mt-0 mt-lg-0">
               <div class="d-flex justify-content-between col-md-12">
                  <h2 class="mb-3 heading-1">{{$category["cat_name"]}} ({{$totalRecords}}) </h2>
                  <form id="filterForm" action="{{url("shop/list/".$category["id"]."-".$category["custom_url"])}}/" method="GET">
                     <div class="row product-short-wrap  justify-content-end">
                        <div class="col-md-4">
                           @if($category["id"]==35)
                           <select name="governor" class="form-control product-filter-select-input" filter-attr="governor" required="required">
                              <option value="" selected="">Filter:Signatory </option>
                              <option value="H. M. Patel" @isset($_GET["governor"]) @if($_GET["governor"]=="H. M. Patel" ) selected @endif @endisset>H. M. Patel</option>
                              <option value="A.K. Roy" @isset($_GET["governor"]) @if($_GET["governor"]=="A.K. Roy" ) selected @endif @endisset>A.K. Roy</option>
                              <option value="L. K. Jha" @isset($_GET["governor"]) @if($_GET["governor"]=="L. K. Jha" ) selected @endif @endisset>L. K. Jha</option>
                              <option value="S. Jagannathan" @isset($_GET["governor"]) @if($_GET["governor"]=="S. Jagannathan" ) selected @endif @endisset>S. Jagannathan</option>
                              <option value="I. G. Patel" @isset($_GET["governor"]) @if($_GET["governor"]=="I. G. Patel" ) selected @endif @endisset>I. G. Patel</option>
                              <option value="M.G. Kaul" @isset($_GET["governor"]) @if($_GET["governor"]=="M.G. Kaul" ) selected @endif @endisset>M.G. Kaul</option>
                              <option value="Manmohan Singh" @isset($_GET["governor"]) @if($_GET["governor"]=="Manmohan Singh" ) selected @endif @endisset>Manmohan Singh</option>
                              <option value="R. N. Malhotra" @isset($_GET["governor"]) @if($_GET["governor"]=="R. N. Malhotra" ) selected @endif @endisset>R. N. Malhotra</option>
                              <option value="M. Narasimham" @isset($_GET["governor"]) @if($_GET["governor"]=="M. Narasimham" ) selected @endif @endisset>M. Narasimham</option>
                              <option value="Pratap Kisan Kaul" @isset($_GET["governor"]) @if($_GET["governor"]=="Pratap Kisan Kaul" ) selected @endif @endisset>Pratap Kisan Kaul</option>
                              <option value="S.Venkitaramanan" @isset($_GET["governor"]) @if($_GET["governor"]=="S.Venkitaramanan" ) selected @endif @endisset>S.Venkitaramanan</option>
                              <option value="Gopi K. Arora" @isset($_GET["governor"]) @if($_GET["governor"]=="Gopi K. Arora" ) selected @endif @endisset>Gopi K. Arora</option>
                              <option value="Bimal Jalan" @isset($_GET["governor"]) @if($_GET["governor"]=="Bimal Jalan" ) selected @endif @endisset>Bimal Jalan</option>
                              <option value="S. P. Shukla" @isset($_GET["governor"]) @if($_GET["governor"]=="S. P. Shukla" ) selected @endif @endisset>S. P. Shukla</option>
                              <option value="Montek Singh Ahluwalia" @isset($_GET["governor"]) @if($_GET["governor"]=="Montek Singh Ahluwalia" ) selected @endif @endisset>Montek Singh Ahluwalia</option>
                              <option value="B. Rama Rau" @isset($_GET["governor"]) @if($_GET["governor"]=="B. Rama Rau" ) selected @endif @endisset>B. Rama Rau</option>
                              <option value="H. V. R. Iyengar" @isset($_GET["governor"]) @if($_GET["governor"]=="H. V. R. Iyengar" ) selected @endif @endisset>H. V. R. Iyengar</option>
                              <option value="P. C. Bhattacharya" @isset($_GET["governor"]) @if($_GET["governor"]=="P. C. Bhattacharya" ) selected @endif @endisset>P. C. Bhattacharya</option>
                              <option value="B. N. Adarkar" @isset($_GET["governor"]) @if($_GET["governor"]=="B. N. Adarkar" ) selected @endif @endisset>B. N. Adarkar</option>
                              <option value="K. R. Puri" @isset($_GET["governor"]) @if($_GET["governor"]=="K. R. Puri" ) selected @endif @endisset>K. R. Puri</option>
                              <option value="Amitabh Ghosh" @isset($_GET["governor"]) @if($_GET["governor"]=="Amitabh Ghosh" ) selected @endif @endisset>Amitabh Ghosh</option>
                              <option value="C. Rangarajan" @isset($_GET["governor"]) @if($_GET["governor"]=="C. Rangarajan" ) selected @endif @endisset>C. Rangarajan</option>
                              <option value="Y. V.  Reddy" @isset($_GET["governor"]) @if($_GET["governor"]=="Y. V.  Reddy" ) selected @endif @endisset>Y. V. Reddy</option>
                              <option value="D. Subbarao" @isset($_GET["governor"]) @if($_GET["governor"]=="D. Subbarao" ) selected @endif @endisset>D. Subbarao</option>
                              <option value="Raghuram Rajan" @isset($_GET["governor"]) @if($_GET["governor"]=="Raghuram Rajan" ) selected @endif @endisset>Raghuram Rajan</option>
                              <option value="Urijit Patel" @isset($_GET["governor"]) @if($_GET["governor"]=="Urijit Patel" ) selected @endif @endisset>Urijit Patel</option>
                              <option value="Shaktikanta Das" @isset($_GET["governor"]) @if($_GET["governor"]=="Shaktikanta Das" ) selected @endif @endisset>Shaktikanta Das</option>
                           </select>
                           @endif
                        </div>
                        <div class="col-md-4">
                           @if($category["id"]==35)
                           <select name="denomination" class="form-control product-filter-select-input" filter-attr="denomination" required="required">
                              <option value="">Filter:Denominations</option>
                              <option value="1 Rupee" @isset($_GET["denomination"]) @if($_GET["denomination"]=="1 Rupee" ) selected @endif @endisset>1 Rupee</option>
                              <option value="2 Rupees" @isset($_GET["denomination"]) @if($_GET["denomination"]=="2 Rupees" ) selected @endif @endisset>2 Rupees</option>
                              <option value="5 Rupees" @isset($_GET["denomination"]) @if($_GET["denomination"]=="5 Rupees" ) selected @endif @endisset>5 Rupees</option>
                              <option value="10 Rupees" @isset($_GET["denomination"]) @if($_GET["denomination"]=="10 Rupees" ) selected @endif @endisset>10 Rupees</option>
                              <option value="50 Rupees" @isset($_GET["denomination"]) @if($_GET["denomination"]=="50 Rupees" ) selected @endif @endisset>50 Rupees</option>
                              <option value="20 Rupees" @isset($_GET["denomination"]) @if($_GET["denomination"]=="20 Rupees" ) selected @endif @endisset>20 Rupees</option>
                           </select>
                           @endif
                        </div>
                        <div class="col-md-4">
                           <select name="price_sort" id="price-filter" class="form-control product-filter-select-input w-100" filter-attr="price" required="required">
                              <option value="">Sort By </option>
                              <option value="ASC" @isset($_GET["price_sort"]) @if($_GET["price_sort"]=="ASC" ) selected @endif @endisset>Price:Low to High </option>
                              <option value="DESC" @isset($_GET["price_sort"]) @if($_GET["price_sort"]=="DESC" ) selected @endif @endisset>Price:High to Low </option>
                           </select>
                        </div>
                     </div>
                  </form>

               </div>
               <div class="row info-item-grid-row">

                  @foreach($category_products as $product)


                  @php

                  if($product["img"]!=""){

                  $imgParts = explode("/",$product["img"]);

                  }else{

                  $imgParts[2] = "noimage.jpg";

                  }

                  @endphp

                  <div class="col-lg-3 col-md-6 col-6 mb-3">
                     <div class="product-grid">
                        <div class="product-image"> <a href="{{url("view-product/".$product["id"]."-".$product["custom_url"])}}/" class="image"> <img class="pic-1" src="{{getenv("PRODUCT_HOME_PAGE_IMAGE_BASE_URL").$imgParts[2]}}"> </a> </div>
                        <div class="product-content">
                           <h2 class="title"><a href="{{url("view-product/".$product["id"]."-".$product["custom_url"])}}/">{{substr($product["name1"],0,45)}}...</a> </h2>
                           @if($product["discount"])
                           <div class="price"><span class="d-inline-block me-3"><i class="fa fa-rupee-sign"></i> {{$product["price"]}}</span>
                              @php
                              $discountAmt = ($product["discount"]/100)*$product["price"];
                              $discountedPrice = $product["price"]-$discountAmt;
                              @endphp
                              <b><i class="fa fa-rupee-sign"></i> {{round($discountedPrice)}}</b>
                           </div>
                           @else
                           <div class="price">
                           <b><i class="fa fa-rupee-sign"></i> {{$product["price"]}}</b>
                           </div>
                           @endif
                        </div>

                        <a href="{{url("view-product/".$product["custom_url"])}}/" class="add-to-cart">Add to Cart</a>

                     </div>
                  </div>

                  @endforeach
               

            </div>
            <div class="pagination-container">

               <p>{{$pagination_string}}</p>
               {!! $category_products->withQueryString()->links() !!}

            </div>
         </div>
      </div>
      </div>
   </section>
   <section class="common-padding page-footer-disc bg-light-wraper">
      <div class="container-fluid px-lg-2 px-lg-5">
         {!!$footer_content!!}
      </div>
   </section>

</main>

<script>
   $(".product-filter-select-input").change(function(e) {
      e.preventDefault();

      $("form#filterForm").submit();

   });
</script>

<script>
   $(function(){
    var current = location.pathname;
    $('.nav__list li a').each(function(){
        var $this = $(this);
        // if the current path is like this link, make it active
        if($this.attr('href').indexOf(current) !== -1){
            $this.addClass('current-tab');
            $(this).closest('li').addClass('active');  
            $(this).closest('li').parents('li').addClass('active');
        }
       
    })
})
</script>