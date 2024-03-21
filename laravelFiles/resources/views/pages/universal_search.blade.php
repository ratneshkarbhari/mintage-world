<main class="page-content">    
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/default-banner.jpg")}}" /></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2">
                        <a href="{{url("/")}}/"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item me-2">Search</li>                    
                </ol>
            </nav>
        </div>
    </section>

    <section class="common-padding coing-list-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <div class="d-flex justify-content-between"><h2 class="mb-3 heading-1">Advance Search</h2></div>
            <form id="detailed-search-form" action="{{url("detailed-search/")}}/" method="GET" >
                @csrf
           <div class="row">
            <div class="col-md-3">
                <label for=""  class="d-block mb-2">Search Keywords</label>
                <input type="text" id="TxtSearch" name="term" value="{{$query}}" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="" class="d-block mb-2">Select Category</label>
                <select name="product_type" id="searchUrl" class="form-control" required="required">
                    <option value="5" selected="selected">Shopping</option>
                    <option value="1">Coin info</option>
                    <option value="2">Note info</option>
                    <option value="3">Stamp info</option>
                    <option value="4">News</option></select>
            </div>
            <div class="col-md-4">
                <label for="" class="d-md-block d-none mb-2">&nbsp;</label>
                <button id="BtnSubmit" type="submit" class="btn btn-sm btn-explore">
                    <i class="fa fa-fw fa-search"></i> Submit
                    <span class="first"></span>
                    <span class="second"></span>
                    <span class="third"></span>
                    <span class="fourth"></span>
                </button>
            </div>

            </form>
            <div class="col-md-12 mt-5">
                <div class="search-wrap">
                    <div class="pagination-container">
                        <p > TOTAL {{$total}} PRODUCTS FOUND</p>
                        {{-- <div class="result-per-page d-flex align-items-center">
                            <p class="me-2 mb-0">Results per page</p>
                            <select id="ddlPageSize" class="TextBox form-control" style="width: 100px">
                                <option selected="selected">15</option>
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
                                <option>200</option>
                            </select>
                        </div> --}}

                    </div>

                    <div class="row search-result-wrap mb-4">

                        @foreach($results as $result)

                        @php

                        $product = $result;

                        $imgParts = explode("/",$result["img"]);
      
                        @endphp

                        <div class="col-lg-2 col-md-3 col-6 mt-4">
                            <div class="search-item">
                                <div class="product-grid">
                                    <div class="product-image"> <a href="{{url("view-product/".$result["id"].$result["custom_url"])}}/" class="image"> <img class="pic-1" src="{{env("PRODUCT_IMAGE_BASE_URL").$imgParts[2]}}"> </a> </div>
                                    <div class="product-content">
                                       <h2 class="title"><a href="http://localhost/mintage-world/view-product/spain-1-euro-cent-2010-coin">{{$result["name1"]}}</a> </h2>

                                       @if($product["discount"])
                                        <div class="price">
                                        <span class="me-3">  <i class="fa fa-rupee-sign"></i> {{$product["price"]}}</span>
                                        @php  

                                        $discountAmt = ($product["discount"]/100)*$product["price"];
                                        $discountedPrice = $product["price"]-$discountAmt;
                                        
                                        @endphp
                                        <i class="fa fa-rupee-sign"></i> {{round($discountedPrice)}}
                                            </div>
                                        @else
                                        <div class="price">
                                        <i class="fa fa-rupee-sign"></i> {{$product["price"]}}
                                            </div>
                                        @endif
                                       
                                    </div>
                                 </div>
                            </div>
                        </div> 
                        
                        @endforeach

                    </div>

                    <div class="pagination-container">

                        <p>{{$pagination_string}}</p>
                        {!! $results->links() !!}
      
                    </div>

                   
                    

                </div>
            </div>


           </div>
        </div>
    </div>       
  
</main>