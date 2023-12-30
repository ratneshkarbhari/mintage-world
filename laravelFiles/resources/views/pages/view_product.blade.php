<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url('/assets/images/inside-banner/default-banner.jpg')}}"></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2"><a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item me-2" aria-current="page"><a href="{{url('/shop')}}">Shopping</a> </li>
                    <li class="breadcrumb-item me-2" aria-current="page"><a href="{{url('shop/list/'.$product['product_category']['id'].'-'.$product['product_category']['custom_url'])}}">{{$product["product_category"]["cat_name"]}} </a> </li>
                    <li class="breadcrumb-item me-2" aria-current="page">{{$product["name1"]}} </li>
                </ol>
            </nav>
        </div>
    </section>
    @php
    $imgParts = explode("/",$product["img"]);
    $productImage = $imgParts[2];
    @endphp
    <section class="common-padding productg-list-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <!-- <div class="d-flex justify-content-between">
                <h2 class="mb-3 heading-1">Ruler : Malwa Sultan</h2>
            </div> -->
            <div class="row info-item-grid-row">
                <div class="col-lg-5 col-md-12 col-sm-12">

                    <div id="sync1" class="owl-carousel owl-theme tz-gallery">

                        <div class="item zoomable">
                            <a class="lightbox" href="{{ getenv('PRODUCT_IMAGE_BASE_URL').$productImage }}">
                                <img src="{{ getenv('PRODUCT_IMAGE_BASE_URL').$productImage }}" class="img-fluid zoomable__img" />
                            </a>
                        </div>

                        @foreach($product["product_images"] as $product_image)


                        <div class="item zoomable">
                            <a class="lightbox" href="{{ getenv('PRODUCT_EXTRA_IMAGE_BASE_URL').$product_image['image_name'] }}">
                                @if(getenv('PRODUCT_EXTRA_IMAGE_BASE_URL').$product_image['image_name'])
                                <img src="{{getenv('PRODUCT_EXTRA_IMAGE_BASE_URL').$product_image['image_name']}}" class="img-fluid zoomable__img" 
                                />
                                @else
                                <img src="{{getenv('API_DEFAULT_IMG_PATH')}}" class="img-fluid zoomable__img" 
                                />
                                @endif
                            </a>
                        </div>

                        @endforeach


                    </div>
                    <div id="sync2" class="owl-carousel owl-theme">
                        <div class="item">
                            <img src="{{ getenv('PRODUCT_IMAGE_BASE_URL').$productImage }}" class="img-fluid" />
                        </div>
                        @foreach($product["product_images"] as $product_image)
                        <div class="item">
                            @if(is_file(getenv('PRODUCT_EXTRA_IMAGE_BASE_URL').$product_image['image_name']))
                            <img src="{{ getenv('PRODUCT_EXTRA_IMAGE_BASE_URL').$product_image['image_name'] }}" class="img-fluid" />
                            @else
                            <img src="{{ getenv('API_DEFAULT_IMG_PATH')}}" class="img-fluid" />
                            @endif
                        </div>
                        @endforeach
                    </div>
                    <div class="product-video mt-3">
                    <iframe src="https://www.youtube.com/embed/xFwYL6xWDIQ?si=D2qviZyICrSA_3pC" class="" title="" frameborder="0" allowfullscreen></iframe>
                  </div>

                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 mt-lg-0 mt-5 ">
                    <h1 class="mb-3 heading-2">{{$product["name1"]}}</h1>
                    <div class="w-100 d-flex justify-content-between">
                        <div class="price"><span><i class="fa fa-rupee-sign"></i> 400</span>
                            <i class="fa fa-rupee-sign"></i> {{$product["price"]}}
                        </div>
                        <div class="tab-review"><a href="#tab-review" class="btn btn-info btn-sm text-white"> {{count($product["product_ratings"])}} Reviews</a></div>
                    </div>
                    <hr />
                    <p><b>FREE Delivery</b> on orders over Rs.499.</p>
                    <div class="product-detail-wraper w-100">
                        <hr />

                        <p><b>Description : </b>

                        <p>
                            {!!$product["desc1"]!!}
                        </p>
                        <?php if ($product['issue_year']) { ?>
                            <div class="short-describe">
                                <p><strong>Issue Year: </strong>
                                    <?php
                                    echo $product['issue_year']; ?>
                                </p>
                            </div>
                        <?php } ?>
                        <?php if ($product['condition']) { ?>
                            <div class="short-describe">
                                <p><strong>Condition: </strong>
                                    <?php
                                    echo $product['condition']; ?>
                                </p>
                            </div>
                        <?php } ?>
                        <?php if ($product['type_series']) { ?>
                            <div class="short-describe">
                                <p><strong>Type/Series: </strong>
                                    <?php
                                    echo $product['type_series']; ?>
                                </p>
                            </div>
                        <?php } ?>
                        <?php if ($product['denomination']) { ?>
                            <div class="short-describe">
                                <p><strong>Denomination: </strong>
                                    <?php
                                    echo $product['denomination']; ?>
                                </p>
                            </div>
                        <?php } ?>
                        <?php if ($product['dynasty_ruler']) { ?>
                            <div class="short-describe">
                                <p><strong>Dynasty/Ruler: </strong><?php echo $product['dynasty_ruler']; ?> </p>
                            </div>
                        <?php } ?>
                        <?php if ($product['shape']) { ?>
                            <div class="short-describe">
                                <p><strong>Shape: </strong><?php echo $product['shape']; ?> </p>
                            </div>
                        <?php } ?>
                        <?php if ($product['metal']) { ?>
                            <div class="short-describe">
                                <p><strong>Metal: </strong><?php echo $product['metal']; ?> </p>
                            </div>
                        <?php } ?>
                        <?php if ($product['weight']) { ?>
                            <div class="short-describe">
                                <p><strong>Weight: </strong><?php echo $product['weight']; ?> </p>
                            </div>
                        <?php } ?>
                        <?php if ($product['mint']) { ?>
                            <div class="short-describe">
                                <p><strong>Mint: </strong><?php echo $product['mint']; ?> </p>
                            </div>
                        <?php } ?>
                        <?php if ($product['color']) { ?>
                            <div class="short-describe">
                                <p><strong>Color: </strong>
                                    <?php
                                    echo $product['color']; ?>
                                </p>
                            </div>
                        <?php } ?>
                        <?php if ($product['sku']) { ?>
                            <div class="short-describe">
                                <div class="available1"><!--Available:-->
                                    <!--                              <span class="check"><i class="fa fa-check-circle"></i> Available</span>
            --> <span class="product-id"><!--&nbsp; &nbsp; | &nbsp; &nbsp;--> <b>Product Code:</b>
                                        <?php
                                        echo $product['sku']; ?>
                                    </span>
                                </div>
                            </div>
                        <?php } ?>

                        {{-- <p class="mt-3"><b>Product Code : </b> {{$product["sku"]}} </p> --}}


                        <div class="d-none">
                            <b>Customize your card: </b> Send your photo to <a href="info@mintageworld.com ">info@mintageworld.com</a> alongwith order id.</p>
                            <p class="mb-0"><b>Features : </b></p>
                            <ul>
                                <li>• Inside knowledge about prefixes</li>
                                <li>• Types of signatories</li>
                                <li>• Various types of paper money</li>
                                <li>• Telephonic denomination indexing</li>
                                <li>• Collectible themes for collection</li>
                                <li>• Estimated market price</li>
                            </ul>
                        </div>
                        @if($product["instock"]<1) 
                        <img src="{{url('/assets/images/out-of-stock.png')}}" class="img-fluid out-of-stock-icon" alt="" />
                        @endif
                    </div>
                    

                    @if($product["date_option"]=="Yes")

                    <div class="birth-date-wraper">
                        <hr>
                        <p class="d-flex justify-content-between ">
                            <img src="https://www.mintageworld.com/img/note.png" class="img-fluid" alt="">
                            <img src="{{url('/assets/images/available-icon.png')}}" class="img-fluid available-icon d-none" id="available-icon"  alt="">
                            <img src="{{url('/assets/images/not-available-icon.png')}}" class="img-fluid available-icon d-none" id="not-available-icon" alt="">
                            <img src="{{url('/assets/images/available-premium-price-icon.png')}}" class="img-fluid available-icon d-none" id="available-premium-icon" alt="">

                            

                        </p>
                        <p>Check availability of your auspicious date note </p>
                        <div class="row justify-content-start">
                            <div class="col-md-2 col-4">
                                <select name="dd" id="date-check-dd" required="" class="form-control">
                                    <option value="">DD</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-4">
                                <select name="mm" id="date-check-mm" required="" class="form-control">
                                    <option value="">MM</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-4">
                                <select name="yy" id="date-check-yy" required="" class="form-control">
                                    <option value="">YY</option>
                                    <option value="00">00</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                    <option value="45">45</option>
                                    <option value="46">46</option>
                                    <option value="47">47</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="50">50</option>
                                    <option value="51">51</option>
                                    <option value="52">52</option>
                                    <option value="53">53</option>
                                    <option value="54">54</option>
                                    <option value="55">55</option>
                                    <option value="56">56</option>
                                    <option value="57">57</option>
                                    <option value="58">58</option>
                                    <option value="59">59</option>
                                    <option value="60">60</option>
                                    <option value="61">61</option>
                                    <option value="62">62</option>
                                    <option value="63">63</option>
                                    <option value="64">64</option>
                                    <option value="65">65</option>
                                    <option value="66">66</option>
                                    <option value="67">67</option>
                                    <option value="68">68</option>
                                    <option value="69">69</option>
                                    <option value="70">70</option>
                                    <option value="71">71</option>
                                    <option value="72">72</option>
                                    <option value="73">73</option>
                                    <option value="74">74</option>
                                    <option value="75">75</option>
                                    <option value="76">76</option>
                                    <option value="77">77</option>
                                    <option value="78">78</option>
                                    <option value="79">79</option>
                                    <option value="80">80</option>
                                    <option value="81">81</option>
                                    <option value="82">82</option>
                                    <option value="83">83</option>
                                    <option value="84">84</option>
                                    <option value="85">85</option>
                                    <option value="86">86</option>
                                    <option value="87">87</option>
                                    <option value="88">88</option>
                                    <option value="89">89</option>
                                    <option value="90">90</option>
                                    <option value="91">91</option>
                                    <option value="92">92</option>
                                    <option value="93">93</option>
                                    <option value="94">94</option>
                                    <option value="95">95</option>
                                    <option value="96">96</option>
                                    <option value="97">97</option>
                                    <option value="98">98</option>
                                    <option value="99">99</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-md-0 mt-3">
                                <button id="checkAvlButton" class="btn btn-sm btn-explore"><i class="fa fa-check-double"></i> Check Availability
                                    <span class="first"></span>
                                    <span class="second"></span>
                                    <span class="third"></span>
                                    <span class="fourth"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <p> The value of Denomination is same as printed on the currency , additional cost is towards presentation and packaging.</p>
                    <h5>Note : <span>10 RS</span></h5>
                    @endif
                    <div class="product-btn-group">
                        @if($product["instock"]>0)
                        <form action="{{url('add-to-cart')}}" id="addToCartForm" method="POST">
                            @csrf
                            <div id="atcBox" class="d-flex 
                            @if($product["date_option"]=="Yes")
                              d-none
                              @endif ">
                                <div class="product-count me-3 m-0">
                                    <div action="#" class="d-flex">
                                        <div class="qtyminus">-</div>
                                        <input type="text" name="quantity" id="productQty" value="1" class="qty" min="1" max="5">
                                        <div class="qtyplus">+</div>
                                    </div>
                                </div>
                                <button id="addToCart" type="submit" class="btn btn-sm btn-explore"><i class="fa fa-shopping-cart"></i> ADD TO CART
                                    <span class="first"></span>
                                    <span class="second"></span>
                                    <span class="third"></span>
                                    <span class="fourth"></span>
                                </button>
                        </form>
                    </div>
                    @endif
                </div>
              
                    @if($product["instock"]<1)   <hr>                   
                
                <div class="notify-me-wraper">
                   <p class="text-success"> <b><i class="fa fa-bell"></i>  Notify Me</b></p>
                    <input name="nemail" value="" id="nemail" size="100" placeholder="Please enter your email address to get notified" class="form-control" type="text">
                    <button class="btn btn-sm btn-explore mt-3"><i class="fa fa-thumbs-up"></i> Submit
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        <span class="fourth"></span>
                    </button>

                </div>

                @endif
            </div>


        </div>
        </div>
    </section>
    <section class="common-padding bg-light-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5">
         <div class="row">
         <div class="col-md-12">
            <b>Disclaimer :</b>
            <p>This product is developed and offered to notaphilists, numismatists and philatelists for collection purpose.<br />
                <span class="text-danger">This image is for reference purpose only Condition may vary from Image.</span><br />
                The product over 100 years. Not to be sold overseas.<br />
                Serial number will vary from image.
            </p>
            </div> 
         </div>
        </div>
        <div id="tab-review" class="hidden"></div>
    </section>
 
    <section class="common-padding  px-lg-2 px-lg-5 ">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <h2 class="mb-3 heading-2">YOU MAY ALSO LIKE</h2>
                  <div class="owl-carousel Recommended-Slider position-relative">
                     <div class="item text-center">
                        <div class="product-grid">
                           <div class="product-image"> <a href="http://localhost/mintage-world/view-product/3288-global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book" class="image"> 
                              <img class="pic-1" src="https://s3-ap-southeast-1.amazonaws.com/mint-product-img/homepage/MINBOK0004.jpg"> </a> 
                           </div>
                           <div class="product-content">
                              <h2 class="title"><a href="http://localhost/mintage-world/view-product/global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book">Global Collectibles of Mahatma Gandhi Through Banknotes, Coins &amp; Stamps Hardcover Book</a> </h2>
                              <div class="price"><i class="fa fa-rupee-sign"></i> 1999</div>                              
                           </div>
                        </div>
                     </div>
                     <div class="item text-center">
                        <div class="product-grid">
                           <div class="product-image"> <a href="http://localhost/mintage-world/view-product/3288-global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book" class="image"> 
                              <img class="pic-1" src="https://s3-ap-southeast-1.amazonaws.com/mint-product-img/homepage/MINBOK0004.jpg"> </a> 
                           </div>
                           <div class="product-content">
                              <h2 class="title"><a href="http://localhost/mintage-world/view-product/global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book">Global Collectibles of Mahatma Gandhi Through Banknotes, Coins &amp; Stamps Hardcover Book</a> </h2>
                              <div class="price"><i class="fa fa-rupee-sign"></i> 1999</div>                              
                           </div>
                        </div>
                     </div>
                     <div class="item text-center">
                        <div class="product-grid">
                           <div class="product-image"> <a href="http://localhost/mintage-world/view-product/3288-global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book" class="image"> 
                              <img class="pic-1" src="https://s3-ap-southeast-1.amazonaws.com/mint-product-img/homepage/MINBOK0004.jpg"> </a> 
                           </div>
                           <div class="product-content">
                              <h2 class="title"><a href="http://localhost/mintage-world/view-product/global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book">Global Collectibles of Mahatma Gandhi Through Banknotes, Coins &amp; Stamps Hardcover Book</a> </h2>
                              <div class="price"><i class="fa fa-rupee-sign"></i> 1999</div>                              
                           </div>
                        </div>
                     </div>
                     <div class="item text-center">
                        <div class="product-grid">
                           <div class="product-image"> <a href="http://localhost/mintage-world/view-product/3288-global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book" class="image"> 
                              <img class="pic-1" src="https://s3-ap-southeast-1.amazonaws.com/mint-product-img/homepage/MINBOK0004.jpg"> </a> 
                           </div>
                           <div class="product-content">
                              <h2 class="title"><a href="http://localhost/mintage-world/view-product/global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book">Global Collectibles of Mahatma Gandhi Through Banknotes, Coins &amp; Stamps Hardcover Book</a> </h2>
                              <div class="price"><i class="fa fa-rupee-sign"></i> 1999</div>                              
                           </div>
                        </div>
                     </div>
                     <div class="item text-center">
                        <div class="product-grid">
                           <div class="product-image"> <a href="http://localhost/mintage-world/view-product/3288-global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book" class="image"> 
                              <img class="pic-1" src="https://s3-ap-southeast-1.amazonaws.com/mint-product-img/homepage/MINBOK0004.jpg"> </a> 
                           </div>
                           <div class="product-content">
                              <h2 class="title"><a href="http://localhost/mintage-world/view-product/global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book">Global Collectibles of Mahatma Gandhi Through Banknotes, Coins &amp; Stamps Hardcover Book</a> </h2>
                              <div class="price"><i class="fa fa-rupee-sign"></i> 1999</div>                              
                           </div>
                        </div>
                     </div>
                     <div class="item text-center">
                        <div class="product-grid">
                           <div class="product-image"> <a href="http://localhost/mintage-world/view-product/3288-global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book" class="image"> 
                              <img class="pic-1" src="https://s3-ap-southeast-1.amazonaws.com/mint-product-img/homepage/MINBOK0004.jpg"> </a> 
                           </div>
                           <div class="product-content">
                              <h2 class="title"><a href="http://localhost/mintage-world/view-product/global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book">Global Collectibles of Mahatma Gandhi Through Banknotes, Coins &amp; Stamps Hardcover Book</a> </h2>
                              <div class="price"><i class="fa fa-rupee-sign"></i> 1999</div>                              
                           </div>
                        </div>
                     </div>
                     <div class="item text-center">
                        <div class="product-grid">
                           <div class="product-image"> <a href="http://localhost/mintage-world/view-product/3288-global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book" class="image"> 
                              <img class="pic-1" src="https://s3-ap-southeast-1.amazonaws.com/mint-product-img/homepage/MINBOK0004.jpg"> </a> 
                           </div>
                           <div class="product-content">
                              <h2 class="title"><a href="http://localhost/mintage-world/view-product/global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book">Global Collectibles of Mahatma Gandhi Through Banknotes, Coins &amp; Stamps Hardcover Book</a> </h2>
                              <div class="price"><i class="fa fa-rupee-sign"></i> 1999</div>                              
                           </div>
                        </div>
                     </div>
                     <div class="item text-center">
                        <div class="product-grid">
                           <div class="product-image"> <a href="http://localhost/mintage-world/view-product/3288-global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book" class="image"> 
                              <img class="pic-1" src="https://s3-ap-southeast-1.amazonaws.com/mint-product-img/homepage/MINBOK0004.jpg"> </a> 
                           </div>
                           <div class="product-content">
                              <h2 class="title"><a href="http://localhost/mintage-world/view-product/global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book">Global Collectibles of Mahatma Gandhi Through Banknotes, Coins &amp; Stamps Hardcover Book</a> </h2>
                              <div class="price"><i class="fa fa-rupee-sign"></i> 1999</div>                              
                           </div>
                        </div>
                     </div>
                     <div class="item text-center">
                        <div class="product-grid">
                           <div class="product-image"> <a href="http://localhost/mintage-world/view-product/3288-global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book" class="image"> 
                              <img class="pic-1" src="https://s3-ap-southeast-1.amazonaws.com/mint-product-img/homepage/MINBOK0004.jpg"> </a> 
                           </div>
                           <div class="product-content">
                              <h2 class="title"><a href="http://localhost/mintage-world/view-product/global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book">Global Collectibles of Mahatma Gandhi Through Banknotes, Coins &amp; Stamps Hardcover Book</a> </h2>
                              <div class="price"><i class="fa fa-rupee-sign"></i> 1999</div>                              
                           </div>
                        </div>
                     </div>
                     <div class="item text-center">
                        <div class="product-grid">
                           <div class="product-image"> <a href="http://localhost/mintage-world/view-product/3288-global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book" class="image"> 
                              <img class="pic-1" src="https://s3-ap-southeast-1.amazonaws.com/mint-product-img/homepage/MINBOK0004.jpg"> </a> 
                           </div>
                           <div class="product-content">
                              <h2 class="title"><a href="http://localhost/mintage-world/view-product/global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book">Global Collectibles of Mahatma Gandhi Through Banknotes, Coins &amp; Stamps Hardcover Book</a> </h2>
                              <div class="price"><i class="fa fa-rupee-sign"></i> 1999</div>                              
                           </div>
                        </div>
                     </div>
                     <div class="item text-center">
                        <div class="product-grid">
                           <div class="product-image"> <a href="http://localhost/mintage-world/view-product/3288-global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book" class="image"> 
                              <img class="pic-1" src="https://s3-ap-southeast-1.amazonaws.com/mint-product-img/homepage/MINBOK0004.jpg"> </a> 
                           </div>
                           <div class="product-content">
                              <h2 class="title"><a href="http://localhost/mintage-world/view-product/global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book">Global Collectibles of Mahatma Gandhi Through Banknotes, Coins &amp; Stamps Hardcover Book</a> </h2>
                              <div class="price"><i class="fa fa-rupee-sign"></i> 1999</div>                              
                           </div>
                        </div>
                     </div>

                     
                       

                  </div>
              </div>
          </div>
      </div>
  </section>
    <section class="common-padding AddComment  ">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    @isset($_GET["review_post_success"])
                    <p class="text-success">Review Posted successfully</p>
                    @endif
                    <h6><b>Write a Review for <span>{{$product["name1"]}}</span></b></h6>
                    <p>Your Comments</p>
                    <form action="{{url('add-product-rating')}}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product['id']}}">
                    <input name="UserName" class="form-control" placeholder="User Name" required="" />
                    <textarea name="comment" class="form-control mt-3" placeholder="Enter your message" required="" rows="10"></textarea>
					   <div class="d-flex w-100 mb-3">
                    <fieldset id="demo2" class="rating">
                        <input class="stars" type="radio" id="star5" name="rating" value="5">
                        <label class="full" for="star5" title="Awesome - 5 stars"></label>
                        <input class="stars" type="radio" id="star4half" name="rating" value="4.5">
                        <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input class="stars" type="radio" id="star4" name="rating" value="4">
                        <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                        <input class="stars" type="radio" id="star3half" name="rating" value="3.5">
                        <label class="half" for="star3half" title="3.5 stars"></label>
                        <input class="stars" type="radio" id="star3" name="rating" value="3" data-gtm-form-interact-field-id="2">
                        <label class="full" for="star3" title="3 stars"></label>
                        <input class="stars" type="radio" id="star2half" name="rating" value="2.5">
                        <label class="half" for="star2half" title="2.5 stars"></label>
                        <input class="stars" type="radio" id="star2" name="rating" value="2">
                        <label class="full" for="star2" title="2 stars"></label>
                        <input class="stars" type="radio" id="star1half" name="rating" value="1.5">
                        <label class="half" for="star1half" title="1.5 stars"></label>
                        <input class="stars" type="radio" id="star1" name="rating" value="1">
                        <label class="full" for="star1" title="1 star"></label>
                        <input class="stars" type="radio" id="starhalf" name="rating" value="0.5">
                        <label class="half" for="starhalf" title="0.5 stars"></label>
                    </fieldset>
					</div>
                    <span class="small">Note: HTML is not translated!</span><br> 
                    <button class="btn btn-sm btn-explore mt-3  @if(session('type')!='member') d-none @endif">Submit
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        <span class="fourth"></span>
                    </button>
                    
                    <p id="ProductLogBtn">
                        <a type="button" class="btn btn-sm btn-explore mt-3  @if(session('type') =='member') d-none @endif" data-bs-toggle="modal" data-bs-target="#LoginModal"> 
                           <i class="fa fa-download"> Login for comment</i>
                           <span class="first"></span>
                           <span class="second"></span>
                           <span class="third"></span>
                           <span class="fourth"></span>
                        </a>
                     </p> 
                  
                    </form>
                </div>
                <div class="col-md-6 col-sm-12 mt-5 mt-md-0">
                    <div class="recent-comment-wrap">
                        <h6><b>Recent Review ({{count($product["product_ratings"])}})</b></h6>
                        <div class="comment-wrap">
                            @foreach($product["product_ratings"] as $product_rating)
                            <div class="UserDetail">
                                <p class="d-flex justify-content-between"><span class="UserName" id="UserName">{{$product_rating["user_name"]}}</span><span class="UserName" id="CommentDate">
                                @php
                                $originalDate = $product_rating["date_time"];
                                $newDate = date("d/m/Y", strtotime($originalDate));                                
                                @endphp
                                {{$newDate}}</span></p>
                                <p>{{$product_rating["comments"]}}</p> 
                                <i data-star="{{$product_rating["rating_score"]}}"></i> 
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 999">
        <div id="liveToast " class="toast hide bg-success text-white add-to-cart-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success text-white">
                <strong class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
                <small>Just Now</small>
                {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
            </div>
            <div class="toast-body">
                "Your Product" is added to cart.
            </div>
            <div class='toast-timeline animate'></div>
        </div>
    </div>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 999">
        <div id="liveToast " class="toast hide bg-danger text-white add-to-cart-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-white">
                <strong class="me-auto"><i class="fas fa-check-circle"></i> Failure</strong>
                <small>Just Now</small>
                {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
            </div>
            <div class="toast-body">
                "Add to cart failed"
            </div>
            <div class='toast-timeline animate'></div>
        </div>
    </div>
</main>
<script>
    $("button#addToCart").click(function(e) {
        e.preventDefault();


        @if($product["date_option"]=="Yes")
        
        let dateSelected = $("select#date-check-dd").val();
        let monthSelected = $("select#date-check-mm").val();
        let yearSelected = $("select#date-check-yy").val();

        @else


        let dateSelected = monthSelected = yearSelected = "NA";


        @endif

        $.ajax({
            type: "POST",
            url: "{{url('atc-exe')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                "pid": {{$product["id"]}},
                "quantity": $("input#productQty").val(),
                "date" : dateSelected+"-"+monthSelected+"-"+yearSelected
            },
            success: function(response) {
                if (response == "added-to-cart") {

                     $.ajax({
                        type: "GET",
                        url: "{{url('fetch-current-cart-count')}}",
                        
                        success: function (response) {

                           console.log(response);
                           $("span#cart-item-count").html(response);

                           
                        }
                     });
                  
                    $('.add-to-cart-success').toast('show');
                } else {
                    $('.add-to-cart-failure').toast('show');
                }
            }
        });

    });
    
    // Check availability  api call

    $("button#checkAvlButton").click(function (e) { 
        e.preventDefault();

        @if($product["date_option"]=="Yes")

        let dateSelected = $("select#date-check-dd").val();
        let monthSelected = $("select#date-check-mm").val();
        let yearSelected = $("select#date-check-yy").val();


        $.ajax({
            type: "POST",
            url: "{{url('check-note-availability')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                "date" : dateSelected,
                "month" : monthSelected,
                "year" : yearSelected,
                "product_id" : {{$product["id"]}}
            },
            success: function (response) {
                response = JSON.parse(response)
                let message = response.message
                // console.log(message)
                $(".available-icon").addClass("d-none")
                if(message!="Not Available"){
                    $("div#atcBox").removeClass("d-none")
                    if (message=="Product Available") {
                        $("img#available-icon").removeClass("d-none");

                    } else {
                        $("img#available-premium-icon").removeClass("d-none");
                    }
                }else{
                    $("img#not-available-icon").removeClass("d-none");
                    $("div#atcBox").addClass("d-none")

                }
            }
        });


        @endif

    });

</script>


{{-- Modal start -- Countries and Denominations  --}}
<!-- id 930 & 937 --> 
<div class="modal fade country-modal" id="table1" tabindex="-1" aria-labelledby="Table1ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content"> 
            <div class="modal-body text-center">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="table-responsive">
                <div class="row">
                    <div class="col-md-4">
                        <table class = "table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th>Country</th>
                                 <th>Denomination</th>
                              </tr>
                           </thead>
                           
                           <tbody>
                              <tr>
                                 <td>Afghanistan</td>
                                 <td>1 Afghanis</td>
                              </tr>
                              
                              <tr>
                                 <td>Afghanistan</td>
                                 <td>2 Afghanis</td>
                              </tr>
                              
                              <tr>
                                 <td>Afghanistan</td>
                                 <td>100 Afghanis</td>
                              </tr>
                              
                              <tr>
                                 <td>Afghanistan</td>
                                 <td>500 Afghanis</td>
                              </tr>
                              
                              <tr>
                                 <td>Afghanistan</td>
                                 <td>1000 Afghanis</td>
                              </tr>
                              
                              <tr>
                                 <td>Argentina</td>
                                 <td>1 Austral</td>
                              </tr>
                              
                              <tr>
                                 <td>Belarus</td>
                                 <td>1 Ruble</td>
                              </tr>
                               <tr>
                                 <td>Belarus</td>
                                 <td>5 Ruble</td>
                              </tr>
                              
                              <tr>
                                 <td>Belarus</td>
                                 <td>10 Ruble</td>
                              </tr>
                              <tr>
                                 <td>Belarus</td>
                                 <td>10 Ruble</td>
                              </tr>
                               <tr>
                                 <td>Belarus</td>
                                 <td>25 Ruble</td>
                              </tr>
                              
                              <tr>
                                 <td>Belarus</td>
                                 <td>50 Ruble</td>
                              </tr>
                               <tr>
                                 <td>Belarus</td>
                                 <td>1000 Ruble</td>
                              </tr>
                              
                              <tr>
                                 <td>Belarus</td>
                                 <td>100 Ruble</td>
                              </tr>
                              
                               <tr>
                                 <td>Bosnia</td>
                                 <td>10 Dinara</td>
                              </tr>
                               <tr>
                                 <td>Bosnia</td>
                                 <td>25 Dinara</td>
                              </tr>
                               <tr>
                                 <td>Bosnia</td>
                                 <td>50 Dinara</td>
                              </tr>
                              <tr>
                                 <td>Bangladesh</td>
                                 <td>1 Taka</td>
                              </tr>
                              <tr>
                                 <td>Bangladesh</td>
                                 <td>2 Taka</td>
                              </tr>
                               <tr>
                                 <td>Bangladesh</td>
                                 <td>5 Taka</td>
                              </tr>
                              <tr>
                                 <td>Burma</td>
                                 <td>1 Kyat</td>
                              </tr>
                              <tr>
                                 <td>Bhutan</td>
                                 <td>1 Rupee</td>
                              </tr>
                              <tr>
                                 <td>Cambodia</td>
                                 <td>0.2 Riel (2 Kak)</td>
                              </tr>
                              <tr>
                                 <td>Cambodia</td>
                                 <td>Half Riel (5 Kak)</td>
                              </tr>
                              <tr>
                                 <td>Cambodia</td>
                                 <td>1 Riel </td>
                              </tr>
                              <tr>
                                 <td>Cambodia</td>
                                 <td>50 Riel</td>
                              </tr>
                              <tr>
                                 <td>Cambodia</td>
                                 <td>100 Riel - 1998 series</td>
                              </tr>
                              <tr>
                                 <td>Cambodia</td>
                                 <td>100 Riel - 2001 series</td>
                              </tr>
                              <tr>
                                 <td>Cambodia</td>
                                 <td>1000 Riel</td>
                              </tr>
                              <tr>
                                 <td>China</td>
                                 <td>2 Fen</td>
                              </tr>
                              <tr>
                                 <td>China</td>
                                 <td>1 Fen</td>
                              </tr>
                              <tr>
                                 <td>China</td>
                                 <td>1 Yi Jiao</td>
                              </tr>
                              <tr>
                                 <td>China</td>
                                 <td>2 Er Jiao</td>
                              </tr>
                              
                           </tbody>
                           
                        </table>
                    </div>                    
                    <div class="col-md-4">
                        <table class = "table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th>Country</th>
                                 <th>Denomination</th>
                              </tr>
                           </thead>
                           
                           <tbody>
                              <tr>
                                 <td>Croatia</td>
                                 <td>1 Dinara</td>
                              </tr>
                              
                              <tr>
                                 <td>Croatia</td>
                                 <td>5 Dinara</td>
                              </tr>
                              
                              <tr>
                                 <td>Croatia</td>
                                 <td>10 Dinara</td>
                              </tr>
                              
                              <tr>
                                 <td>Croatia</td>
                                 <td>50000 dinara</td>
                              </tr>
                              
                              <tr>
                                 <td>Croatia</td>
                                 <td>1,00,000 dinara</td>
                              </tr>
                              
                              <tr>
                                 <td>Egypt</td>
                                 <td>5 Piastres</td>
                              </tr>
                              
                              <tr>
                                 <td>Egypt</td>
                                 <td>10 Piastres</td>
                              </tr>
                              
                              <tr>
                                 <td>Indonesia</td>
                                 <td>5 Sen</td>
                              </tr>
                              
                              <tr>
                                 <td>Indonesia</td>
                                 <td>10 Sen</td>
                              </tr>
                              <tr>
                                 <td>Indonesia</td>
                                 <td>25 Sen</td>
                              </tr>
                              <tr>
                                 <td>Indonesia</td>
                                 <td>100 Rupiah</td>
                              </tr>
                              
                              <tr>
                                 <td>Iran</td>
                                 <td>100 Rials</td>
                              </tr>
                              
                              <tr>
                                 <td>Iraq</td>
                                 <td>Quarter Dinar</td>
                              </tr>
                               <tr>
                                 <td>Iraq</td>
                                 <td>Half Dinar</td>
                              </tr>
                              <tr>
                                 <td>Iraq</td>
                                 <td>1 Dinar</td>
                              </tr>
                              <tr>
                                 <td>Iraq</td>
                                 <td>25 Dinar - sadam</td>
                              </tr>
                              
                              <tr>
                                 <td>Kyrgyzstan</td>
                                 <td>1 Som</td>
                              </tr>
                              <tr>
                                 <td>Kyrgyzstan</td>
                                 <td>10 Som</td>
                              </tr>
                              <tr>
                                 <td>Kyrgyzstan</td>
                                 <td>50 Som</td>
                              </tr>
                              
                              <tr>
                                 <td>Laos</td>
                                 <td>5 Kip</td>
                              </tr>
                              <tr>
                                 <td>Laos</td>
                                 <td>10 Kip</td>
                              </tr>
                              <tr>
                                 <td>Laos</td>
                                 <td>20 Kip</td>
                              </tr>
                              <tr>
                                 <td>Laos</td>
                                 <td>50 Kip</td>
                              </tr>
                              <tr>
                                 <td>Laos</td>
                                 <td>100 Kip </td>
                              </tr>
                              <tr>
                                 <td>Laos</td>
                                 <td>500 Kip</td>
                              </tr>
                              
                               <tr>
                                 <td>Mongolia</td>
                                 <td>1 Togrog</td>
                              </tr>
                              <tr>
                                 <td>Mongolia</td>
                                 <td>5 Togrog</td>
                              </tr>
                              <tr>
                                 <td>Mongolia</td>
                                 <td>10 Mongo</td>
                              </tr>
                              <tr>
                                 <td>Mongolia</td>
                                 <td>10 Togrog - 2007 series</td>
                              </tr>
                              <tr>
                                 <td>Mongolia</td>
                                 <td>20 Mongo</td>
                              </tr>
                              <tr>
                                 <td>Mongolia</td>
                                 <td>20 Togrog  - 2009 series</td>
                              </tr>
                              <tr>
                                 <td>Mongolia</td>
                                 <td>50 Mongo</td>
                              </tr>
                              
                           </tbody>
                           
                        </table>
                    </div>                    
                    <div class="col-md-4">
                        <table class = "table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th>Country</th>
                                 <th>Denomination</th>
                              </tr>
                           </thead>
                           
                           <tbody>
                              <tr>
                                 <td>Myanmar</td>
                                 <td>50Pyas</td>
                              </tr>
                              
                              <tr>
                                 <td>Myanmar</td>
                                 <td>1 Kyat</td>
                              </tr>
                              <tr>
                                 <td>Myanmar</td>
                                 <td>1 Kyat - 1972 series</td>
                              </tr>
                              <tr>
                                 <td>Myanmar</td>
                                 <td>5 Kyat </td>
                              </tr>
                              <tr>
                                 <td>Myanmar</td>
                                 <td>10 Kyat </td>
                              </tr>
                               <tr>
                                 <td>Nepal</td>
                                 <td>1 Rupee</td>
                              </tr>
                              <tr>
                                 <td>Nepal</td>
                                 <td>1 Rupee - 1974 series</td>
                              </tr>
                               <tr>
                                 <td>Nepal</td>
                                 <td>2 Rupee</td>
                              </tr>
                              <tr>
                                 <td>Nepal</td>
                                 <td>5 Rupee</td>
                              </tr>
                              <tr>
                                 <td>Nicaragua</td>
                                 <td>1 centavo</td>
                              </tr>
                              <tr>
                                 <td>Nicaragua</td>
                                 <td>5 centavos</td>
                              </tr>
                              <tr>
                                 <td>Nicaragua</td>
                                 <td>10 centavos</td>
                              </tr>
                              <tr>
                                 <td>Nicaragua</td>
                                 <td>25 centavos</td>
                              </tr>
                              
                              <tr>
                                 <td>Eritrea</td>
                                 <td>1 nafka</td>
                              </tr>
                              <tr>
                                 <td>Poland</td>
                                 <td>20 Zloty</td>
                              </tr>
                              <tr>
                                 <td>Poland</td>
                                 <td>50 Zloty</td>
                              </tr>
                              <tr>
                                 <td>Srilanka</td>
                                 <td>10 Rupees</td>
                              </tr>
                              <tr>
                                 <td>Sudan</td>
                                 <td>5 Sudanese Pounds</td>
                              </tr>
                              <tr>
                                 <td>Sudan</td>
                                 <td>10 Sudanese Pounds</td>
                              </tr>
                              <tr>
                                 <td>Sudan</td>
                                 <td>25 Piastres</td>
                              </tr>
                               <tr>
                                 <td>Slovenia</td>
                                 <td>1 Tolar</td>
                              </tr>
                              <tr>
                                 <td>Tajikistan</td>
                                 <td>1 Ruble</td>
                              </tr>
                               <tr>
                                 <td>Tajikistan</td>
                                 <td>5 Ruble</td>
                              </tr>
                                  <tr>
                                 <td>Transnitria</td>
                                 <td>1 kupon ruble</td>
                              </tr>
        
                               <tr>
                                 <td>Transnitria</td>
                                 <td>5 kupon ruble</td>
                              </tr>
                               <tr>
                                 <td>Transnitria</td>
                                 <td>10 kupon ruble</td>
                              </tr>
                               <tr>
                                 <td>Ukraine</td>
                                 <td>1 Hryvnia</td>
                              </tr>
                               <tr>
                                 <td>Vietnam</td>
                                 <td>100 Dong</td>
                              </tr>
                               <tr>
                                 <td>Vietnam</td>
                                 <td>200 Dong</td>
                              </tr>
                              <tr>
                                 <td>Vietnam</td>
                                 <td>500 Dong</td>
                              </tr>
                               <tr>
                                 <td>Zambia</td>
                                 <td>2 Kwacha</td>
                              </tr>
                              <tr>
                                 <td>Zambia</td>
                                 <td>10 Kwacha</td>
                              </tr>
                              <tr>
                                 <td>Zambia</td>
                                 <td>100 Kwacha</td>
                              </tr>
                              <tr>
                                 <td>British Armed Forces</td>
                                 <td>5 New Pence</td>
                              </tr>
                              <tr>
                                 <td>British Armed Forces</td>
                                 <td>10 New Pence</td>
                              </tr>
                              
                              
        
                              
                           </tbody>
                           
                        </table>
                    </div>
                </div>

            </div>
            
            </div>
        </div>
    </div>
</div>
 <!-- id 800 --> 
<div class="modal fade country-modal" id="table800" tabindex="-1" aria-labelledby="Table800ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content"> 
            <div class="modal-body text-center">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="table-responsive">
                <div class="row">
                    <div class="col-md-4">
                        <table class="table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th>Country</th>
                                 <th>Denomination</th>
                              </tr>
                           </thead>
                           
                           <tbody>
                              <tr>
                                 <td>Afghanistan</td>
                                 <td>2 Afghanis</td>
                              </tr>
                              <tr>
                                 <td>Afghanistan</td>
                                 <td>100 Afghanis</td>
                              </tr>
                              <tr>
                                 <td>Argentina</td>
                                 <td>1 Austral</td>
                              </tr>
                              
                              <tr>
                                 <td>Bangladesh</td>
                                 <td>2 Taka</td>
                              </tr>
                              
                               <tr>
                                 <td>Belarus</td>
                                 <td>50 Ruble</td>
                              </tr>
                              <tr>
                                 <td>Belarus</td>
                                 <td>100 Ruble</td>
                              </tr>
                              <tr>
                                 <td>Bhutan</td>
                                 <td>1 Rupee</td>
                              </tr>
                              <tr>
                                 <td>Bosnia</td>
                                 <td>10 Dinara</td>
                              </tr>
                              <tr>
                                 <td>Bosnia</td>
                                 <td>25 Dinara</td>
                              </tr>
                              <tr>
                                 <td>Bosnia</td>
                                 <td>50 Dinara</td>
                              </tr>
                              <tr>
                                 <td>British Armed Forces</td>
                                 <td>5 New Pence</td>
                              </tr>
                              <tr>
                                 <td>Burma</td>
                                 <td>1 Kyat</td>
                              </tr>
                               <tr>
                                 <td>Cambodia</td>
                                 <td>50 Riel</td>
                              </tr>
                               <tr>
                                 <td>Cambodia</td>
                                 <td>100 Riel - 2001 series</td>
                              </tr>
                               <tr>
                                 <td>China</td>
                                 <td>1 Yi Jiao</td>
                              </tr>
                              <tr>
                                 <td>China</td>
                                 <td>2 Er Jiao</td>
                              </tr>
                              
                              
                              
                           </tbody>
                           
                        </table>
                    </div>                    
                    <div class="col-md-4">
                        <table class="table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th>Country</th>
                                 <th>Denomination</th>
                              </tr>
                           </thead>
                           
                           <tbody>
                              <tr>
                                 <td>Croatia</td>
                                 <td>1 Dinara</td>
                              </tr>
                              
                              <tr>
                                 <td>Croatia</td>
                                 <td>5 Dinara</td>
                              </tr>
                              
                              <tr>
                                 <td>Croatia</td>
                                 <td>10 Dinara</td>
                              </tr>
                              
                              <tr>
                                 <td>Egypt</td>
                                 <td>5 Piastres</td>
                              </tr>
                             
                              <tr>
                                 <td>Indonesia</td>
                                 <td>5 Sen</td>
                              </tr>
                              
                              <tr>
                                 <td>Indonesia</td>
                                 <td>10 Sen</td>
                              </tr>
                              <tr>
                                 <td>Indonesia</td>
                                 <td>25 Sen</td>
                              </tr>
                              
                              
                              <tr>
                                 <td>Kyrgyzstan</td>
                                 <td>1 Som</td>
                              </tr>
                              <tr>
                                 <td>Kyrgyzstan</td>
                                 <td>10 Som</td>
                              </tr>
                              <tr>
                                 <td>Kyrgyzstan</td>
                                 <td>50 Som</td>
                              </tr>
                             
                              
                               <tr>
                                 <td>Mongolia</td>
                                 <td>10 Mongo</td>
                              </tr>
                              <tr>
                                 <td>Mongolia</td>
                                 <td>20 Mongo</td>
                              </tr>
                              <tr>
                                 <td>Mongolia</td>
                                 <td>50 Mongo</td>
                              </tr>
                              <tr>
                                 <td>Mongolia</td>
                                 <td>20 Togrog - 2009 series</td>
                              </tr>
                              <tr>
                                 <td>Myanmar</td>
                                 <td>50Pyas</td>
                              </tr>
                              <tr>
                                 <td>Myanmar</td>
                                 <td>1 Kyat - 1972 series</td>
                              </tr>
                              <tr>
                                 <td>Myanmar</td>
                                 <td>10 Kyat</td>
                              </tr>
                              
                           </tbody>
                           
                        </table>
                    </div>                    
                    <div class="col-md-4">
                        <table class="table table-striped table-bordered">
                           <thead>
                              <tr>
                                 <th>Country</th>
                                 <th>Denomination</th>
                              </tr>
                           </thead>
                           
                           <tbody>					 
                               <tr>
                                 <td>Nepal</td>
                                 <td>1 Rupee</td>
                              </tr>
                               <tr>
                                 <td>Nepal</td>
                                 <td>2 Rupee</td>
                              </tr>
                              <tr>
                                 <td>Nepal</td>
                                 <td>1 Rupee - 1974 series</td>
                              </tr>
                             
                              <tr>
                                 <td>Nicaragua</td>
                                 <td>1 centavo</td>
                              </tr>
                              <tr>
                                 <td>Nicaragua</td>
                                 <td>5 centavos</td>
                              </tr>
                              <tr>
                                 <td>Nicaragua</td>
                                 <td>10 centavos</td>
                              </tr>
                             
                              <tr>
                                 <td>Eritrea</td>
                                 <td>1 nafka</td>
                              </tr>
                              
                               <tr>
                                 <td>Slovenia</td>
                                 <td>1 Tolar</td>
                              </tr>
                              
                               <tr>
                                 <td>Srilanka</td>
                                 <td>10 Rupees</td>
                              </tr>
                              
                               <tr>
                                 <td>Sudan</td>
                                 <td>10 Sudanese Pounds</td>
                              </tr>
                              <tr>
                                 <td>Sudan</td>
                                 <td>25 Piastres</td>
                              </tr>
                              
                              <tr>
                                 <td>Tajikistan</td>
                                 <td>1 Ruble</td>
                              </tr>					   
                               <tr>
                                 <td>Ukraine</td>
                                 <td>1 Hryvnia</td>
                              </tr>
                               <tr>
                                 <td>Vietnam</td>
                                 <td>200 Dong</td>
                              </tr>
                              
                              <tr>
                                 <td>Vietnam</td>
                                 <td>500 Dong</td>
                              </tr>
                               <tr>
                                 <td>Zambia</td>
                                 <td>2 Kwacha</td>
                              </tr>
                              <tr>
                                 <td>Zambia</td>
                                 <td>10 Kwacha</td>
                              </tr>
                             
                              
                              
        
                              
                           </tbody>
                           
                        </table>
                    </div>
                </div>

            </div>
            
            </div>
        </div>
    </div>
</div>
 <!-- id 929 --> 
<div class="modal fade country-modal" id="table929" tabindex="-1" aria-labelledby="Table929ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content"> 
            <div class="modal-body text-center">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="table-responsive">
                <div class="row">
                    <div class="col-md-4">
                        <table class = "table table-striped">
                           <thead>
                              <tr>
                                 <th>Country</th>
                                 <th>Denomination</th>
                              </tr>
                           </thead>
                           
                           <tbody>
                              <tr>
                                 <td>Afghanistan</td>
                                 <td>1 Afghanis</td>
                              </tr>
                              
                              <tr>
                                 <td>Afghanistan</td>
                                 <td>500 Afghanis</td>
                              </tr>
                              
                              <tr>
                                 <td>Afghanistan</td>
                                 <td>1000 Afghanis</td>
                              </tr>					  
                              
                              <tr>
                                 <td>Bangladesh</td>
                                 <td>1 Taka</td>
                              </tr>
                              <tr>
                                 <td>Bangladesh</td>
                                 <td>5 Taka</td>
                              </tr>					 
                              
                              <tr>
                                 <td>Belarus</td>
                                 <td>1 Ruble</td>
                              </tr>
                               <tr>
                                 <td>Belarus</td>
                                 <td>5 Ruble</td>
                              </tr>
                              
                              <tr>
                                 <td>Belarus</td>
                                 <td>10 Ruble - 1992</td>
                              </tr>
                              <tr>
                                 <td>Belarus</td>
                                 <td>10 Ruble - 2000</td>
                              </tr>
                               <tr>
                                 <td>Belarus</td>
                                 <td>25 Ruble</td>
                              </tr>
                              
                              <tr>
                                 <td>Belarus</td>
                                 <td>1000 Ruble</td>
                              </tr>
                             
                              
                              <tr>
                                 <td>British Armed Forces</td>
                                 <td>10 New Pence</td>
                              </tr>
                             
                              <tr>
                                 <td>Cambodia</td>
                                 <td>0.2 Riel</td>
                              </tr>
                              <tr>
                                 <td>Cambodia</td>
                                 <td>Half Riel</td>
                              </tr>
                              <tr>
                                 <td>Cambodia</td>
                                 <td>1 Riel </td>
                              </tr>
                              <tr>
                                 <td>Cambodia</td>
                                 <td>100 Riel - 1998 series</td>
                              </tr>					  
                           </tbody>
                           
                        </table>
                    </div>
                    
                    <div class="col-md-4">
                        <table class = "table table-striped">
                           <thead>
                              <tr>
                                 <th>Country</th>
                                 <th>Denomination</th>
                              </tr>
                           </thead>
                           
                           <tbody>
                              <tr>
                                 <td>China</td>
                                 <td>2 Fen</td>
                              </tr>
                              <tr>
                                 <td>China</td>
                                 <td>1 Fen</td>
                              </tr>
                              
                              <tr>
                                 <td>Croatia</td>
                                 <td>50000 dinara</td>
                              </tr>
                              
                              <tr>
                                 <td>Croatia</td>
                                 <td>1,00,000 dinara</td>
                              </tr>					 
                              <tr>
                                 <td>Egypt</td>
                                 <td>10 Piastres</td>
                              </tr>					  
                              <tr>
                                 <td>Indonesia</td>
                                 <td>100 Rupiah</td>
                              </tr>
                              
                              <tr>
                                 <td>Iran</td>
                                 <td>100 Rials</td>
                              </tr>
                              
                              <tr>
                                 <td>Iraq</td>
                                 <td>Quarter Dinar</td>
                              </tr>
                               <tr>
                                 <td>Iraq</td>
                                 <td>Half Dinar</td>
                              </tr>
                              <tr>
                                 <td>Iraq</td>
                                 <td>1 Dinar</td>
                              </tr>
                              <tr>
                                 <td>Iraq</td>
                                 <td>25 Dinar - sadam</td>
                              </tr>
                              
                              
                              <tr>
                                 <td>Laos</td>
                                 <td>5 Kip</td>
                              </tr>
                              <tr>
                                 <td>Laos</td>
                                 <td>10 Kip</td>
                              </tr>
                              <tr>
                                 <td>Laos</td>
                                 <td>20 Kip</td>
                              </tr>
                              <tr>
                                 <td>Laos</td>
                                 <td>50 Kip</td>
                              </tr>
                              <tr>
                                 <td>Laos</td>
                                 <td>100 Kip </td>
                              </tr>
                              <tr>
                                 <td>Laos</td>
                                 <td>500 Kip</td>
                              </tr>
                              
                               
                              
                           </tbody>
                           
                        </table>
                    </div>
                    
                    <div class="col-md-4">
                        <table class = "table table-striped">
                           <thead>
                              <tr>
                                 <th>Country</th>
                                 <th>Denomination</th>
                              </tr>
                           </thead>
                           
                           <tbody>
                              <tr>
                                 <td>Mongolia</td>
                                 <td>1 Togrog</td>
                              </tr>
                              <tr>
                                 <td>Mongolia</td>
                                 <td>5 Togrog</td>
                              </tr>
                              <tr>
                                 <td>Mongolia</td>
                                 <td>10 Togrog - 2007</td>
                              </tr>	
                              <tr>
                                 <td>Myanmar</td>
                                 <td>1 Kyat</td>
                              </tr>
                             
                              <tr>
                                 <td>Myanmar</td>
                                 <td>5 Kyat </td>
                              </tr>
                             
                              <tr>
                                 <td>Nepal</td>
                                 <td>5 Rupee</td>
                              </tr>					 
                              <tr>
                                 <td>Nicaragua</td>
                                 <td>25 centavos</td>
                              </tr>
                             
                              <tr>
                                 <td>Cambodia</td>
                                 <td>1000 Rial</td>
                              </tr>
                              <tr>
                                 <td>Transistria</td>
                                 <td>1 ruble</td>
                              </tr>
                              <tr>
                                 <td>Poland</td>
                                 <td>20 Zloty</td>
                              </tr>
                              <tr>
                                 <td>Poland</td>
                                 <td>50 Zloty</td>
                              </tr>
                              <tr>
                                 <td>Sudan</td>
                                 <td>5 Sudanese Pounds</td>
                              </tr>
                              
                              <tr>
                                 <td>Tajikistan</td>
                                 <td>5 Ruble</td>
                              </tr>
                              
                               <tr>
                                 <td>Ukraine</td>
                                 <td>5 kynoh</td>
                              </tr>
                               <tr>
                                 <td>Ukraine</td>
                                 <td>10 kynoh</td>
                              </tr>
                              
                               <tr>
                                 <td>Vietnam</td>
                                 <td>100 Dong</td>
                              </tr>
                               
                              
                              <tr>
                                 <td>Zambia</td>
                                 <td>100 Kwacha</td>
                              </tr>
                           </tbody>
                           
                        </table>
                    </div>
                </div>

            </div>
            
            </div>
        </div>
    </div>
</div>
 <!-- id 1731 --> 
<div class="modal fade country-modal" id="table1731" tabindex="-1" aria-labelledby="Table1731ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
       <div class="modal-content">
          <div class="modal-body text-center">
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
             <div class="table-responsive">
                <div class="row">
                   <div class="col-md-4">
                      <table class="table table-striped table-bordered">
                         <thead>
                            <tr>
                               <th>Country</th>
                               <th>Denomination</th>
                            </tr>
                         </thead>
                         <tbody>
                            <tr>
                               <td>Bahrain</td>
                               <td>50 Fils</td>
                            </tr>
                            <tr>
                               <td>Bahrain</td>
                               <td>25 Fils</td>
                            </tr>
                            <tr>
                               <td>Afghanistan</td>
                               <td>1 Afghani</td>
                            </tr>
                            <tr>
                               <td>Bhutan </td>
                               <td>25 Chhertum</td>
                            </tr>
                            <tr>
                               <td>Cayman Islands</td>
                               <td>1 Cent</td>
                            </tr>
                            <tr>
                               <td>Portugal</td>
                               <td>1 Euro Cent</td>
                            </tr>
                            <tr>
                               <td>Falkland Islands</td>
                               <td>1 Penny</td>
                            </tr>
                            <tr>
                               <td>Greece</td>
                               <td>1 Euro Cent</td>
                            </tr>
                            <tr>
                               <td>Belgium</td>
                               <td>1 Euro Cent</td>
                            </tr>
                            <tr>
                               <td>Austria</td>
                               <td>1 Euro Cent</td>
                            </tr>
                            <tr>
                               <td>Romania</td>
                               <td>1000 Lei</td>
                            </tr>
                            <tr>
                               <td>Ukraine</td>
                               <td>1 Kopiyka</td>
                            </tr>
                            <tr>
                               <td>The Netherlands</td>
                               <td>1 Euro Cent</td>
                            </tr>
                            <tr>
                               <td>Moldova</td>
                               <td>5 Bani</td>
                            </tr>
                            <tr>
                               <td>East Caribbean States</td>
                               <td>1 Cent</td>
                            </tr>
                            <tr>
                               <td>Malaysia</td>
                               <td>5 Sen</td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
                   <div class="col-md-4">
                      <table class="table table-striped table-bordered">
                         <thead>
                            <tr>
                               <th>Country</th>
                               <th>Denomination</th>
                            </tr>
                         </thead>
                         <tbody>
                            <tr>
                               <td>Denmark</td>
                               <td>25 Ore</td>
                            </tr>
                            <tr>
                               <td>U.S.A</td>
                               <td>1 Cent</td>
                            </tr>
                            <tr>
                               <td>Burundi</td>
                               <td>1 Franc</td>
                            </tr>
                            <tr>
                               <td>Zambia</td>
                               <td>1 Ngwee</td>
                            </tr>
                            <tr>
                               <td>Poland</td>
                               <td>1 Grosz</td>
                            </tr>
                            <tr>
                               <td>Guatemala</td>
                               <td>5 Centavos</td>
                            </tr>
                            <tr>
                               <td>Iraq</td>
                               <td>25 Dinars</td>
                            </tr>
                            <tr>
                               <td>Jamaica</td>
                               <td>10 Cents</td>
                            </tr>
                            <tr>
                               <td>Cape Verde</td>
                               <td>1 Escudo</td>
                            </tr>
                            <tr>
                               <td>Egypt</td>
                               <td>5 Qirsh</td>
                            </tr>
                            <tr>
                               <td>Nepal</td>
                               <td>25 Paisa</td>
                            </tr>
                            <tr>
                               <td>Malta</td>
                               <td>1 Cent</td>
                            </tr>
                            <tr>
                               <td>Ireland</td>
                               <td>1 Euro Cent</td>
                            </tr>
                            <tr>
                               <td>Rwanda</td>
                               <td>5 Francs</td>
                            </tr>
                            <tr>
                               <td>Sri Lanka</td>
                               <td>25 Cents</td>
                            </tr>
                            <tr>
                               <td>Iceland</td>
                               <td>25 Aurar</td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
                   <div class="col-md-4">
                      <table class="table table-striped table-bordered">
                         <thead>
                            <tr>
                               <th>Country</th>
                               <th>Denomination</th>
                            </tr>
                         </thead>
                         <tbody>
                            <tr>
                               <td>Turkey</td>
                               <td>1 Kurus</td>
                            </tr>
                            <tr>
                               <td>Spain</td>
                               <td>1 Euro Cent</td>
                            </tr>
                            <tr>
                               <td>Mozambique</td>
                               <td>1 Cent</td>
                            </tr>
                            <tr>
                               <td>Mozambique</td>
                               <td>5 Centavos</td>
                            </tr>
                            <tr>
                               <td>Slovakia</td>
                               <td>1 Cent</td>
                            </tr>
                            <tr>
                               <td>Tajikistan</td>
                               <td>1 Diram</td>
                            </tr>
                            <tr>
                               <td>Lithuania</td>
                               <td>5 Centai</td>
                            </tr>
                            <tr>
                               <td>Latvia</td>
                               <td>1 Santims</td>
                            </tr>
                            <tr>
                               <td>United Kingdom</td>
                               <td>Half Penny</td>
                            </tr>
                            <tr>
                               <td>Jersey</td>
                               <td>1 Penny</td>
                            </tr>
                            <tr>
                               <td>Slovenia</td>
                               <td>1 Tolar</td>
                            </tr>
                            <tr>
                               <td>Germany</td>
                               <td>1 Euro Cent</td>
                            </tr>
                            <tr>
                               <td>Serbia</td>
                               <td>1 Dinar</td>
                            </tr>
                            <tr>
                               <td>Italy</td>
                               <td>1 Euro Cent</td>
                            </tr>
                            <tr>
                               <td>Finland</td>
                               <td>1 Euro Cent</td>
                            </tr>
                            <tr>
                               <td>Singapore</td>
                               <td>5 Cents</td>
                            </tr>
                            <tr>
                               <td>Cyprus </td>
                               <td>1 Cent</td>
                            </tr>
                            <tr>
                               <td>Russia</td>
                               <td>10 Kopecks</td>
                            </tr>
                            <tr>
                               <td>Costa Rica</td>
                               <td>5 Colones</td>
                            </tr>
                            <tr>
                               <td>Estonia</td>
                               <td>10 Senti</td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
</div>
 <!-- id 1627 --> 
<div class="modal fade country-modal" id="table1627" tabindex="-1" aria-labelledby="table1627ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
       <div class="modal-content">
          <div class="modal-body text-center">
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
             <div class="table-responsive">
                <div class="row">
                   <div class="col-md-4">
                      <table class="table table-striped table-bordered">
                         <thead>
                            <tr>
                               <th>Country</th>
                               <th>Denomination</th>
                            </tr>
                         </thead>
                         <tbody>
                            <tr>
                               <td>Afghanistan</td>
                               <td>1 Afghani</td>
                            </tr>
                            <tr>
                               <td>Argentina</td>
                               <td>1 Austral</td>
                            </tr>
                            <tr>
                               <td>Belarus</td>
                               <td>1 Ruble</td>
                            </tr>
                            <tr>
                               <td>Bosnia and Herzegovina </td>
                               <td>10 Dinara</td>
                            </tr>
                            <tr>
                               <td>Bangladesh</td>
                               <td>2 Taka</td>
                            </tr>
                            <tr>
                               <td>Burma</td>
                               <td>1 Kyat</td>
                            </tr>
                            <tr>
                               <td>Myanmar</td>
                               <td>50 Pyas</td>
                            </tr>
                            <tr>
                               <td>Bhutan</td>
                               <td>1 Ngultrum</td>
                            </tr>
                            <tr>
                               <td>Cambodia</td>
                               <td>1 Riel</td>
                            </tr>
                            <tr>
                               <td>China</td>
                               <td>1 Fen</td>
                            </tr>
                            <tr>
                               <td>Croatia</td>
                               <td>1 Dinara</td>
                            </tr>
                            <tr>
                               <td>Egypt</td>
                               <td>5 Piastres</td>
                            </tr>
                            <tr>
                               <td>Indonesia</td>
                               <td>5 Sen</td>
                            </tr>
                            <tr>
                               <td>Iran</td>
                               <td>100 Rial</td>
                            </tr>
                            <tr>
                               <td>Iraq</td>
                               <td>1 Dinar</td>
                            </tr>
                            <tr>
                               <td>Kyrgyzstan</td>
                               <td>1 Tyiyn</td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
                   <div class="col-md-4">
                      <table class="table table-striped table-bordered">
                         <thead>
                            <tr>
                               <th>Country</th>
                               <th>Denomination</th>
                            </tr>
                         </thead>
                         <tbody>
                            <tr>
                               <td>Laos</td>
                               <td>5 Kip</td>
                            </tr>
                            <tr>
                               <td>Mongolia</td>
                               <td>10 Mongo</td>
                            </tr>
                            <tr>
                               <td>Nepal</td>
                               <td>2 Rupees</td>
                            </tr>
                            <tr>
                               <td>Nicaragua</td>
                               <td>1 Centavo</td>
                            </tr>
                            <tr>
                               <td>Eritrea</td>
                               <td>1 nafka</td>
                            </tr>
                            <tr>
                               <td>Poland</td>
                               <td>20 Polish Zloty</td>
                            </tr>
                            <tr>
                               <td>Sri Lanka</td>
                               <td>10 Rupee</td>
                            </tr>
                            <tr>
                               <td>Sudan</td>
                               <td>50 Pound</td>
                            </tr>
                            <tr>
                               <td>Slovenia</td>
                               <td>1 Tolar</td>
                            </tr>
                            <tr>
                               <td>Tajikistan</td>
                               <td>1 Ruble</td>
                            </tr>
                            <tr>
                               <td>Ukraine</td>
                               <td>1 Hryvnia</td>
                            </tr>
                            <tr>
                               <td>Vietnam</td>
                               <td>100 Dong</td>
                            </tr>
                            <tr>
                               <td>Zambia</td>
                               <td>2 Kwacha</td>
                            </tr>
                            <tr>
                               <td>British Armed Forces</td>
                               <td>5 New Pence</td>
                            </tr>
                            <tr>
                               <td>Gambia</td>
                               <td>5 Dalasi</td>
                            </tr>
                            <tr>
                               <td>Honduras</td>
                               <td>1 Lempira</td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
                   <div class="col-md-4">
                      <table class="table table-striped table-bordered">
                         <thead>
                            <tr>
                               <th>Country</th>
                               <th>Denomination</th>
                            </tr>
                         </thead>
                         <tbody>
                            <tr>
                               <td>Haiti</td>
                               <td>10 Gourde</td>
                            </tr>
                            <tr>
                               <td>Uzbekistan</td>
                               <td>200 Som</td>
                            </tr>
                            <tr>
                               <td>Lebanon</td>
                               <td>10 Livres</td>
                            </tr>
                            <tr>
                               <td>Madagascar</td>
                               <td>100 Malagasy Ariary</td>
                            </tr>
                            <tr>
                               <td>Malawi</td>
                               <td>20 Kwacha</td>
                            </tr>
                            <tr>
                               <td>Malaysia</td>
                               <td>1 Ringgit</td>
                            </tr>
                            <tr>
                               <td>Oman</td>
                               <td>100 Baisa</td>
                            </tr>
                            <tr>
                               <td>Peru</td>
                               <td>100 intis</td>
                            </tr>
                            <tr>
                               <td>Russia</td>
                               <td>10 Ruble</td>
                            </tr>
                            <tr>
                               <td>Singapore</td>
                               <td>1 Dollar</td>
                            </tr>
                            <tr>
                               <td>Somalia</td>
                               <td>50 Shilling</td>
                            </tr>
                            <tr>
                               <td>Sao Tome and Principe</td>
                               <td>5000 Dobra</td>
                            </tr>
                            <tr>
                               <td>Yemen</td>
                               <td>20 Rial</td>
                            </tr>
                            <tr>
                               <td>Mozambique</td>
                               <td>50000 Metical</td>
                            </tr>
                            <tr>
                               <td>Philippines</td>
                               <td>20 Peso</td>
                            </tr>
                            <tr>
                               <td>Syria</td>
                               <td>50 Pound</td>
                            </tr>
                            <tr>
                               <td>Democratic Republic of the Congo </td>
                               <td>50 Franc</td>
                            </tr>
                            <tr>
                               <td>Venezuela</td>
                               <td>5 Bolivar</td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
</div>
 <!-- id 1628 --> 
 <div class="modal fade country-modal" id="table1628" tabindex="-1" aria-labelledby="table1628ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
       <div class="modal-content">
          <div class="modal-body text-center">
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
             <div class="table-responsive">
                <div class="row">
                   <div class="col-md-4">
                      <table class="table table-striped table-bordered">
                         <thead>
                            <tr>
                               <th>Country</th>
                               <th>Denomination</th>
                            </tr>
                         </thead>
                         <tbody>
                            <tr>
                               <td>Bangladesh</td>
                               <td>2 Taka</td>
                            </tr>
                            <tr>
                               <td>Bhutan </td>
                               <td>1 Ngultrum</td>
                            </tr>
                            <tr>
                               <td>China</td>
                               <td>1 Fen</td>
                            </tr>
                            <tr>
                               <td>Indonesia</td>
                               <td>5 Sen</td>
                            </tr>
                            <tr>
                               <td>Iraq</td>
                               <td>1 Dinar</td>
                            </tr>
                            <tr>
                               <td>Cambodia</td>
                               <td>1 Riel</td>
                            </tr>
                            <tr>
                               <td>Lebanon</td>
                               <td>10 Livre</td>
                            </tr>
                            <tr>
                               <td>Myanmar</td>
                               <td>50 Pya</td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
                   <div class="col-md-4">
                      <table class="table table-striped table-bordered">
                         <thead>
                            <tr>
                               <th>Country</th>
                               <th>Denomination</th>
                            </tr>
                         </thead>
                         <tbody>
                            <tr>
                               <td>Mongolia</td>
                               <td>10 Mongo</td>
                            </tr>
                            <tr>
                               <td>Malaysia</td>
                               <td>1 Ringgit</td>
                            </tr>
                            <tr>
                               <td>Nepal</td>
                               <td>2 Rupee</td>
                            </tr>
                            <tr>
                               <td>Oman</td>
                               <td>1 Baisa</td>
                            </tr>
                            <tr>
                               <td>Philippines</td>
                               <td>20 Piso</td>
                            </tr>
                            <tr>
                               <td>Russia</td>
                               <td>10 Ruble</td>
                            </tr>
                            <tr>
                               <td>Syria</td>
                               <td>50 Pound</td>
                            </tr>
                            <tr>
                               <td>Vietnam</td>
                               <td>100 Dong</td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
                   <div class="col-md-4">
                      <table class="table table-striped table-bordered">
                         <thead>
                            <tr>
                               <th>Country</th>
                               <th>Denomination</th>
                            </tr>
                         </thead>
                         <tbody>
                            <tr>
                               <td>Yemen</td>
                               <td>20 Rial</td>
                            </tr>
                            <tr>
                               <td>Afghanistan</td>
                               <td>1 Afghani</td>
                            </tr>
                            <tr>
                               <td>Iran</td>
                               <td>100 Riel</td>
                            </tr>
                            <tr>
                               <td>Kyrgyzstan</td>
                               <td>1 Tyiyn</td>
                            </tr>
                            <tr>
                               <td>Laos</td>
                               <td>5 Kip</td>
                            </tr>
                            <tr>
                               <td>Sri Lanka</td>
                               <td>10 Rupee</td>
                            </tr>
                            <tr>
                               <td>Tajikistan</td>
                               <td>1 Ruble</td>
                            </tr>
                            <tr>
                               <td>India</td>
                               <td>1 Rupee</td>
                            </tr>
                            <tr>
                               <td>Uzbekistan</td>
                               <td>200 Som</td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
</div>
 <!-- id 1973 --> 
 <div class="modal fade country-modal" id="table1973" tabindex="-1" aria-labelledby="table1973ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
       <div class="modal-content">
          <div class="modal-body text-center">
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
             <div class="table-responsive">
                <div class="row">
                   <div class="col-md-6">
                      <table class="table table-striped table-bordered">
                         <thead>
                            <tr>
                               <th>Country</th>
                               <th>Denomination</th>
                               <th>Metal</th>
                            </tr>
                         </thead>
                         <tbody>
                            <tr>
                               <td>Afghanistan</td>
                               <td>1 Afghani</td>
                               <td>Copper Plated Steel</td>
                            </tr>
                            <tr>
                               <td>Austria</td>
                               <td>1 Euro Cent</td>
                               <td>Copper Plated Steel</td>
                            </tr>
                            <tr>
                               <td>Bahrain</td>
                               <td>50 Fils</td>
                               <td>Copper-Nickel</td>
                            </tr>
                            <tr>
                               <td>Bahrain </td>
                               <td>25  Fils</td>
                               <td>Copper-Nickel</td>
                            </tr>
                            <tr>
                               <td>Belgium</td>
                               <td>1 Euro Cent</td>
                               <td>Copper Plated Steel</td>
                            </tr>
                            <tr>
                               <td>Bhutan</td>
                               <td>25 Chhertum</td>
                               <td>Aluminium-Bronze</td>
                            </tr>
                            <tr>
                               <td>Burundi</td>
                               <td>1 Franc</td>
                               <td>Aluminium</td>
                            </tr>
                            <tr>
                               <td>Cape Verde</td>
                               <td>1 Escudo</td>
                               <td>Brass Clad Steel</td>
                            </tr>
                            <tr>
                               <td>Cayman Islands</td>
                               <td>1 Cent</td>
                               <td>Copper Plated Steel</td>
                            </tr>
                            <tr>
                               <td>Costa Rica</td>
                               <td>5 Colones</td>
                               <td>Aluminium</td>
                            </tr>
                            <tr>
                               <td>Cyprus</td>
                               <td>1 Cent</td>
                               <td>Nickel-Brass</td>
                            </tr>
                            <tr>
                               <td>Denmark</td>
                               <td>25 Ore</td>
                               <td>Bronze</td>
                            </tr>
                            <tr>
                               <td>East Caribbean States</td>
                               <td>1 Cent</td>
                               <td>Aluminium</td>
                            </tr>
                            <tr>
                               <td>Egypt</td>
                               <td>5 Qirsh</td>
                               <td>Aluminium-Bronze</td>
                            </tr>
                            <tr>
                               <td>Estonia</td>
                               <td>1 Senti</td>
                               <td>Brass</td>
                            </tr>
                            <tr>
                               <td>Falkland Islands	</td>
                               <td>1 penny</td>
                               <td>Bronze</td>
                            </tr>
                            <tr>
                                <td>Finland</td>
                                <td>1 Euro Cent</td>
                                <td>Copper Plated Steel</td>
                             </tr>
                             <tr>
                                <td>Germany</td>
                                <td>1 Euro Cent</td>
                                <td>Copper Plated Steel</td>
                             </tr>
                             <tr>
                                <td>Greece</td>
                                <td>1 Euro Cent</td>
                                <td>Copper Plated Steel</td>
                             </tr>
                             <tr>
                                <td>Guatemala </td>
                                <td>5 Centavos</td>
                                <td>Nickel Plated Steel/ Copper- Nickel</td>
                             </tr>
                             <tr>
                                <td>Iceland</td>
                                <td>25 Aurar</td>
                                <td>Copper-Nickel</td>
                             </tr>
                             <tr>
                                <td>Iraq</td>
                                <td>25 Dinars</td>
                                <td>Copper Plated Steel</td>
                             </tr>
                             <tr>
                                <td>Ireland</td>
                                <td>1 Euro Cent</td>
                                <td>Copper Plated Steel</td>
                             </tr>
                             <tr>
                                <td>Italy</td>
                                <td>1 Euro Cent</td>
                                <td>Copper Plated Steel</td>
                             </tr>
                             <tr>
                                <td>Jamaica</td>
                                <td>10 Cents</td>
                                <td>Copper Plated Steel</td>
                             </tr>
                             <tr>
                                <td>Jersey</td>
                                <td>1 Penny</td>
                                <td>Bronze</td>
                             </tr>
                         </tbody>
                      </table>
                   </div>
                   <div class="col-md-6">
                      <table class="table table-striped table-bordered">
                         <thead>
                            <tr>
                               <th>Country</th>
                               <th>Denomination</th>
                               <th>Metal</th>
                            </tr>
                         </thead>
                         <tbody>
                            
                            <tr>
                               <td>Latvia</td>
                               <td>1 Santims</td>
                               <td>Copper clad steel</td>
                            </tr>
                            <tr>
                               <td>Lithuania	</td>
                               <td>5 Centai</td>
                               <td>Aluminium</td>
                            </tr>
                            <tr>
                               <td>Malaysia</td>
                               <td>5 Sen</td>
                               <td>Copper-Nickel</td>
                            </tr>
                            <tr>
                               <td>Malta</td>
                               <td>1 Cent</td>
                               <td>Nickel-Brass</td>
                            </tr>
                            <tr>
                               <td>Moldova</td>
                               <td>5 Bani</td>
                               <td>Alunimium</td>
                            </tr>
                            <tr>
                               <td>Mozambique	</td>
                               <td>1 Cent</td>
                               <td>Copper Plated Steel</td>
                            </tr>
                            <tr>
                                <td>Mozambique</td>
                                <td>5 Centavos</td>
                                <td>Copper Plated Steel</td>
                             </tr>
                             <tr>
                                <td>Nepal</td>
                                <td>25 Paisa</td>
                                <td>Alunimium</td>
                             </tr>
                             <tr>
                                <td>Poland</td>
                                <td>1 Grosz</td>
                                <td>Brass Plated Steel</td>
                             </tr>
                             <tr>
                                <td>Portugal </td>
                                <td>1 Euro Cent</td>
                                <td>Copper Coated Steel</td>
                             </tr>
                             <tr>
                                <td>Romania</td>
                                <td>1000 Lei</td>
                                <td>Aluminium-Magnesium</td>
                             </tr>
                             <tr>
                                <td>Russia</td>
                                <td>10 Kopecks</td>
                                <td>Brass Clad Steel</td>
                             </tr>
                             <tr>
                                <td>Rwanda</td>
                                <td>5 Francs</td>
                                <td>Brass Plated Steel</td>
                             </tr>
                             <tr>
                                <td>Serbia</td>
                                <td>1 Dinar</td>
                                <td>Nickel-Brass</td>
                             </tr>
                             <tr>
                                <td>Singapore</td>
                                <td>5 Cents</td>
                                <td>Brass Plated Steel</td>
                             </tr>
                             <tr>
                                <td>Slovakia</td>
                                <td>1 Cent</td>
                                <td>Copper Plated Steel</td>
                             </tr>
                             <tr>
                                <td>Slovenia</td>
                                <td>1 Tolar</td>
                                <td>Brass</td>
                             </tr>
                             <tr>
                                <td>Spain	</td>
                                <td>1 Euro Cent</td>
                                <td>Copper Plated Steel</td>
                             </tr>
                             <tr>
                                <td>Sri Lanka</td>
                                <td>25 Cents</td>
                                <td>Copper Plated Steel</td>
                             </tr>
                             <tr>
                                <td>Tajikistan</td>
                                <td>1 Diram</td>
                                <td>Brass Plated Steel</td>
                             </tr>
                             <tr>
                                <td>The Netherlands</td>
                                <td>1 Euro Cent</td>
                                <td>Copper Plated Steel</td>
                             </tr>
                             <tr>
                                <td>Turkey	</td>
                                <td>1 Kurus</td>
                                <td>Brass</td>
                             </tr>
                             <tr>
                                <td>U.S.A</td>
                                <td>1 Cent</td>
                                <td>Bronze</td>
                             </tr>
                             <tr>
                                <td>Ukraine</td>
                                <td>1 Kopiyka</td>
                                <td>Stainless Steel</td>
                             </tr>
                             <tr>
                                <td>United Kingdom</td>
                                <td>Half Penny</td>
                                <td>Bronze</td>
                             </tr>
                             <tr>
                                <td>Zambia	 </td>
                                <td>1 Ngwee</td>
                                <td>Copper Clad Steel</td>
                             </tr>
                             <tr>
                                <td>India</td>
                                <td>1 Rupee</td>
                                <td>Stainless Steel</td>
                             </tr>
                         </tbody>
                      </table>
                   </div>                    
                </div>
             </div>
          </div>
       </div>
    </div>
</div>

<!-- id 2845 --> 
<div class="modal fade country-modal" id="table2845" tabindex="-1" aria-labelledby="table2845ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
       <div class="modal-content">
          <div class="modal-body text-center">
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> 
             <div class="table-responsive">
                <div class="row">
                   <div class="col-md-12">
                      <table class="table table-striped table-bordered">
                         <thead>
                            <tr>
                                <th>Name of Country</th>
                                <th>Location</th>
                                <th>Denomination</th>
                            </tr>
                         </thead>
                         <tbody>
                            <tr>
                                <td>Afghanistan</td>
                                <td>South and Central Asian country</td>
                                <td>1 Afghani</td>
                             </tr>
                             <tr>
                                <td>Bangladesh</td>
                                <td>South Asian Country</td>
                                <td>2 Taka</td>
                             </tr>
                             <tr>
                                <td>Bhutan</td>
                                <td>South Asian Country</td>
                                <td>1 Ngultrum</td>
                             </tr>
                             <tr>
                                <td>Cambodia</td>
                                <td>Southeast Asian country</td>
                                <td>1 Riel</td>
                             </tr>
                             <tr>
                                <td>China</td>
                                <td>East Asian country</td>
                                <td>1 Fen</td>
                             </tr>
                             <tr>
                                <td>India</td>
                                <td>South Asian country</td>
                                <td>1 Rupee</td>
                             </tr>
                             <tr>
                                <td>Indonesia</td>
                                <td>Southeast Asian country</td>
                                <td>5 Sen</td>
                             </tr>
                             <tr>
                                <td>Iran</td>
                                <td>West Asian country</td>
                                <td>100 Riel</td>
                             </tr>
                             <tr>
                                <td>Iraq</td>
                                <td>West Asian country</td>
                                <td>1 Dinar</td>
                             </tr>
                             <tr>
                                <td>Kyrgyzstan</td>
                                <td>Central Asian country</td>
                                <td>1 Tyiyn</td>
                             </tr>
                             <tr>
                                <td>Lebanon</td>
                                <td>West Asian country</td>
                                <td>10 Livre</td>
                             </tr>
                             <tr>
                                <td>Malaysia</td>
                                <td>Southeast Asian country</td>
                                <td>1 Ringgit</td>
                             </tr>
                             <tr>
                                <td>Mongolia</td>
                                <td>East Asian country</td>
                                <td>10 Mongo</td>
                             </tr>
                             <tr>
                                <td>Myanmar</td>
                                <td>South Asian Country</td>
                                <td>50 Pya</td>
                             </tr>
                             <tr>
                                <td>Nepal</td>
                                <td>South Asian Country</td>
                                <td>2 Rupee</td>
                             </tr>
                             <tr>
                                <td>Oman</td>
                                <td>West Asian country</td>
                                <td>100 Baisa</td>
                             </tr>
                             <tr>
                                <td>Laos</td>
                                <td>South Asian country</td>
                                <td>1 Kip</td>
                             </tr>
                             <tr>
                                <td>Philippines</td>
                                <td>South Asian Country</td>
                                <td>20 Piso</td>
                             </tr>
                             <tr>
                                <td>Russia</td>
                                <td>North Asian country</td>
                                <td>1 Ruble</td>
                             </tr>
                             <tr>
                                <td>Sri Lanka</td>
                                <td>South Asian country</td>
                                <td>10 Rupee</td>
                             </tr>
                             <tr>
                                <td>Syria</td>
                                <td>West Asian country</td>
                                <td>50 Pound</td>
                             </tr>
                             <tr>
                                <td>Tajikistan</td>
                                <td>Central Asian country</td>
                                <td>1 Ruble</td>
                             </tr>
                             <tr>
                                <td>Uzbekistan</td>
                                <td>Central Asian country</td>
                                <td>200 Som</td>
                             </tr>
                             <tr>
                                <td>Vietnam</td>
                                <td>Southeast Asian country</td>
                                <td>100 Dong</td>
                             </tr>
                             <tr>
                                <td>Yemen</td>
                                <td>West Asian country</td>
                                <td>20 Rial</td>
                             </tr>   
                         </tbody>
                      </table>
                   </div>
                   
                </div>
             </div>
          </div>
       </div>
    </div>
</div>

 {{-- Modal End -- Countries and Denominations  --}}
 