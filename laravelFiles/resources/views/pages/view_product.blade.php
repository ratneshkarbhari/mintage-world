<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("/assets/images/inside-banner/default-banner.jpg")}}"></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2"><a href="{{url("/")}}"><i class="fa fa-home"></i> Home</a></li>  
                    <li class="breadcrumb-item me-2" aria-current="page"><a href="{{url("/shop")}}">Shopping</a> </li>
                    <li class="breadcrumb-item me-2" aria-current="page"><a href="{{url("shop/list/".$product["product_category"]["id"]."-".$product["product_category"]["custom_url"])}}">{{$product["product_category"]["cat_name"]}} </a> </li>
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
                            <a class="lightbox"
                                href="{{ getenv("PRODUCT_IMAGE_BASE_URL").$productImage }}">
                                <img src="{{ getenv("PRODUCT_IMAGE_BASE_URL").$productImage }}"
                                    class="img-fluid zoomable__img" />
                            </a>
                        </div>
                        
                        @foreach($product["product_images"] as $product_image)


                        <div class="item zoomable">
                            <a class="lightbox"
                                href="{{ getenv("PRODUCT_EXTRA_IMAGE_BASE_URL").$product_image["image_name"] }}">
                                <img src="{{ getenv("PRODUCT_EXTRA_IMAGE_BASE_URL").$product_image["image_name"] }}"
                                    class="img-fluid zoomable__img" />
                            </a>
                        </div>

                        @endforeach


                    </div>
                    <div id="sync2" class="owl-carousel owl-theme">

                        
                        <div class="item">
                            <img src="{{ getenv("PRODUCT_IMAGE_BASE_URL").$productImage }}"
                                class="img-fluid" />
                        </div>

                        @foreach($product["product_images"] as $product_image)

                        <div class="item">
                            <img src="{{ getenv("PRODUCT_EXTRA_IMAGE_BASE_URL").$product_image["image_name"] }}"
                                class="img-fluid" />
                        </div>
                       

                        @endforeach
                    </div>


                </div>

                <div class="col-lg-7 col-md-12 col-sm-12 mt-lg-0 mt-5 ">
                    <h1 class="mb-3 heading-2">{{$product["name1"]}}</h1>
                    <div class="w-100 d-flex justify-content-between">
                    <div class="price"><span><i class="fa fa-rupee-sign"></i> 400</span>
                        <i class="fa fa-rupee-sign"></i> {{$product["price"]}}
                    </div>
                    <div class="tab-review"><a href="#tab-review" class="btn btn-info btn-sm text-white"> 4 Reviews</a></div>
                    </div>
                    <hr />
                    <p><b>FREE Delivery</b> on orders over Rs.499.</p>
                    <div class="product-detail-wraper w-100">                    
                    <hr />

                    <p><b>Description : </b>
                        
                    <p>
                    {!!$product["desc1"]!!}
                    </p>
                    <p><b>Issue Year :</b> <span>{{$product["issue_year"]}}</span></p>

                    <p><b>Denomination :</b> <span>{{$product["denomination"]}}</span></p>

                    <p><b>Shape :</b> <span>{{$product["shape"]}}</span></p>
                    <p><b>Metal :</b> <span>{{$product["metal"]}}</span></p>
                    <p><b>Weight :</b> <span>{{$product["weight"]}}</span></p>
                    <p><b>Mint :</b> <span>{{$product["mint"]}}</span></p>

                    <p class="mt-3"><b>Product Code : </b> {{$product["sku"]}} </p> 


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
                    <img src="{{url("/assets/images/out-of-stock.png")}}" class="img-fluid out-of-stock-icon" alt=""/>      
                    </div>
                    @endif
                    
                    @if($product["date_option"]=="Yes")

                    <div class="birth-date-wraper">   
                        <hr>
                        <p class="d-flex justify-content-between ">
                            <img src="https://www.mintageworld.com/img/note.png" class="img-fluid" alt="">
                            <img src="{{url("/assets/images/available-icon.png")}}" class="img-fluid available-icon" alt="">
                        
                        </p> 
                        <p>Check availability of your auspicious date note </p>
                        <div class="row justify-content-start">
                            <div class="col-md-2 col-4">
                               <select name="dd" id="dd" required="" class="form-control">
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
                               <select name="mm" id="mm" required="" class="form-control">
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
                               <select name="yy" id="yy" required="" class="form-control">
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
                                <button class="btn btn-sm btn-explore"><i class="fa fa-check-double"></i> Check Availability
                                    <span class="first"></span>
                                    <span class="second"></span>
                                    <span class="third"></span>
                                    <span class="fourth"></span>
                                </button>
                            </div>
                        </div>                        
                    </div>
                    <p> The value of Denomination is same as printed on the currency , additional cost is towards presentation and packaging.</p>
                    <h5>Note  : <span>10 RS</span></h5>
                    @endif
                    <div class="product-btn-group"> 
                    @if($product["instock"]>0)
                    <form action="{{url('add-to-cart')}}" id="addToCartForm" method="POST">
                    @csrf
                    <div class="d-flex">
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
                    @if($product["instock"]<1)
                    <button class="btn btn-lg  btn-success text-white rounded-pill"><i class="fa fa-bell"></i>  Notify me 
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        <span class="fourth"></span>
                    </button>
                    </div>
                    <div class="notify-me-wraper"> 
                        <hr>            
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
            <b>Disclaimer :</b>
            <p>This product is developed and offered to notaphilists, numismatists and philatelists for collection purpose.<br/>
            <span class="text-danger">This image is for reference purpose only Condition may vary from Image.</span><br/>
             The product over 100 years. Not to be sold overseas.<br/>
             Serial number will vary from image.</p>
        </div>
        <div id="tab-review" class="hidden"></div>
    </section>
   
    <section class="common-padding AddComment" >
        <div class="container-fluid  px-lg-2 px-lg-5">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h6><b>Write a Review for <span>Standard Guide to Paper Money of Republic India Book on Indian Currency Notes</span></b></h6>
                    <p>Your Comments</p>
                    <input name="UserName" class="form-control" placeholder="User Name" required="" />
                    <textarea name="comment" class="form-control mt-3" placeholder="Enter your message" required="" rows="10"></textarea>
                        <span class="small">Note: HTML is not translated!</span><br>
                        <button class="btn btn-sm btn-explore mt-3">Submit
                            <span class="first"></span>
                            <span class="second"></span>
                            <span class="third"></span>
                            <span class="fourth"></span>
                        </button>
                </div>
                <div class="col-md-6 col-sm-12 mt-5 mt-md-0">
                    <div class="recent-comment-wrap">
                        <h6><b>Recent Review ({{count($product["product_ratings"])}})</b></h6>
                        <div class="comment-wrap">
                            
                            @foreach($product["product_ratings"] as $product_rating)
                            <div class="UserDetail">
                                <p class="d-flex justify-content-between"><span class="UserName" id="UserName">{{$product_rating["user_name"]}}</span><span class="UserName" id="CommentDate">05/07/2023</span></p>
                                <p>{{$product_rating["comments"]}}</p>
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

    $("button#addToCart").click(function (e) {
        e.preventDefault();    
        $.ajax({
            type: "POST",
            url: "{{url('atc-exe')}}",
            data: {
                "_token" : "{{ csrf_token() }}",
                "pid" : {{$product["id"]}},
                "quantity" : $("input#productQty").val()
            },
            success: function (response) {
                if (response=="added-to-cart") {
                    $('.add-to-cart-success').toast('show');               
                } else {
                    $('.add-to-cart-failure').toast('show');               
                }
            }
        });
        
    }); 

 

</script>