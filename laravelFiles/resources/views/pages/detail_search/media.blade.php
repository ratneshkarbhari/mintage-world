<main class="page-content">    
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/default-banner.jpg")}}" /></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2">
                        <a href="{{url("/")}}"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item me-2">Search</li>                    
                </ol>
            </nav>
        </div>
    </section>

    <section class="common-padding coing-list-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <div class="d-flex justify-content-between"><h2 class="mb-3 heading-1">Advance Search</h2></div>
            <form id="detailed-search-form" action="{{url("detailed-search/")}}" method="POST" >
                @csrf
           <div class="row">
            <div class="col-md-3">
                <label for=""  class="d-block mb-2">Search Keywords</label>
                <input type="text" id="TxtSearch" name="term" class="form-control" required>
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

                        @foreach($results as $media_entry)

                        @php

                        $days = [

                            "Sun","Mon","Tue","Wed","Thu","Fri","Sat"

                        ];

                        $day = date("w", strtotime($media_entry["media_date"]));  

                        $day = $days[$day];

                        @endphp

                        <div class="col-md-3 mb-3 d-flex align-items-stretch">
                            <div class="blog-div">
                                <div class="BlogImgDiv blog-image ">
                                    <a href="{{url('media/detail/'.$media_entry["id"]."-".$media_entry["custom_url"])}}"><img src="{{getenv('NEWS_IMAGE_BASE_URL').$media_entry["image"]}}" class="img-fluid" alt="" decoding="async" ></a>
                                </div>                    
                                <div class="blog-title">
                                <span class="blog-date">	
                                    <i class="fas fa-calendar-alt"></i> 

                                    {{$media_entry["media_date"]." ".$day}}    </span> 		
                                    <h2><a href="{{url("media/detail/".$media_entry["id"]."-".$media_entry["custom_url"])}}" rel="bookmark"> {{$media_entry["title"]}}</a></h2>
                                </div>
                                <div class="blog-disc mb-0">
                                    <p>
                                    {!!substr($media_entry["description"],0,100)."..."!!}
                                    </p> 
                                </div>
                            </div>
                        </div> 

                        @endforeach

                    </div>

                    <div class="pagination-container">

                        <p>{{$pagination_string}}</p>
                        {!! $results->links() !!}
      
                    </div>

                    <div class="row search-result-wrap news-search mb-4 d-none">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-12 mt-4">
                            <div class="search-item">
                                <div class="product-grid d-md-flex d-block  text-start">
                                    <div class="product-image"> <a href="http://localhost/mintage-world/view-product/3130-spain-1-euro-cent-2010-coin" class="image"> <img class="pic-1 img-fluid" src="https://s3-ap-southeast-1.amazonaws.com/mint-product-img/homepage/MICSCFC00042.jpg"> </a> </div>
                                    <div class="product-content">                                     
                                       <h2 class="title"><a href="http://localhost/mintage-world/view-product/spain-1-euro-cent-2010-coin">Spain 1 Euro Cent 2010 Coin</a> </h2>
                                       <p class="product-date mb-0"><small><i class="fas fa-calendar-alt"></i> 21 Aug 2023 Mon</small></p>
                                       <p class="product-disc mb-2">Pandit Vishnu Digambar Paluskar was an renowned Indian musician best known for his bhajan Raghupati Raghava Raja Ram and also for arranging India's national song, Vande M?taram, as it is heard today. He founded Gandharva Maha...</p>
                                       <a class="mb-0 btn btn-sm btn-primary">Read More</a>
                                    </div>
                                 </div>
                            </div>
                        </div>  
                        <div class="col-xl-6 col-lg-6 col-md-12 col-12 mt-4">
                            <div class="search-item">
                                <div class="product-grid d-md-flex d-block  text-start">
                                    <div class="product-image"> <a href="http://localhost/mintage-world/view-product/3130-spain-1-euro-cent-2010-coin" class="image"> <img class="pic-1 img-fluid" src="https://s3-ap-southeast-1.amazonaws.com/mint-product-img/homepage/MICSCFC00042.jpg"> </a> </div>
                                    <div class="product-content">                                     
                                       <h2 class="title"><a href="http://localhost/mintage-world/view-product/spain-1-euro-cent-2010-coin">Spain 1 Euro Cent 2010 Coin</a> </h2>
                                       <p class="product-date mb-0"><small><i class="fas fa-calendar-alt"></i> 21 Aug 2023 Mon</small></p>
                                       <p class="product-disc mb-2">Pandit Vishnu Digambar Paluskar was an renowned Indian musician best known for his bhajan Raghupati Raghava Raja Ram and also for arranging India's national song, Vande M?taram, as it is heard today. He founded Gandharva Maha...</p>
                                       <a class="mb-0 btn btn-sm btn-primary">Read More</a>
                                    </div>
                                 </div>
                            </div>
                        </div> 
                        <div class="col-xl-6 col-lg-6 col-md-12 col-12 mt-4">
                            <div class="search-item">
                                <div class="product-grid d-md-flex d-block  text-start">
                                    <div class="product-image"> <a href="http://localhost/mintage-world/view-product/3130-spain-1-euro-cent-2010-coin" class="image"> <img class="pic-1 img-fluid" src="https://s3-ap-southeast-1.amazonaws.com/mint-product-img/homepage/MICSCFC00042.jpg"> </a> </div>
                                    <div class="product-content">                                     
                                       <h2 class="title"><a href="http://localhost/mintage-world/view-product/spain-1-euro-cent-2010-coin">Spain 1 Euro Cent 2010 Coin</a> </h2>
                                       <p class="product-date mb-0"><small><i class="fas fa-calendar-alt"></i> 21 Aug 2023 Mon</small></p>
                                       <p class="product-disc mb-2">Pandit Vishnu Digambar Paluskar was an renowned Indian musician best known for his bhajan Raghupati Raghava Raja Ram and also for arranging India's national song, Vande M?taram, as it is heard today. He founded Gandharva Maha...</p>
                                       <a class="mb-0 btn btn-sm btn-primary">Read More</a>
                                    </div>
                                 </div>
                            </div>
                        </div> 
                        <div class="col-xl-6 col-lg-6 col-md-12 col-12 mt-4">
                            <div class="search-item">
                                <div class="product-grid d-md-flex d-block  text-start">
                                    <div class="product-image"> <a href="http://localhost/mintage-world/view-product/3130-spain-1-euro-cent-2010-coin" class="image"> <img class="pic-1 img-fluid" src="https://s3-ap-southeast-1.amazonaws.com/mint-product-img/homepage/MICSCFC00042.jpg"> </a> </div>
                                    <div class="product-content">                                     
                                       <h2 class="title"><a href="http://localhost/mintage-world/view-product/spain-1-euro-cent-2010-coin">Spain 1 Euro Cent 2010 Coin</a> </h2>
                                       <p class="product-date mb-0"><small><i class="fas fa-calendar-alt"></i> 21 Aug 2023 Mon</small></p>
                                       <p class="product-disc mb-2">Pandit Vishnu Digambar Paluskar was an renowned Indian musician best known for his bhajan Raghupati Raghava Raja Ram and also for arranging India's national song, Vande M?taram, as it is heard today. He founded Gandharva Maha...</p>
                                       <a class="mb-0 btn btn-sm btn-primary">Read More</a>
                                    </div>
                                 </div>
                            </div>
                        </div> 
                        <div class="col-xl-6 col-lg-6 col-md-12 col-12 mt-4">
                            <div class="search-item">
                                <div class="product-grid d-md-flex d-block  text-start">
                                    <div class="product-image"> <a href="http://localhost/mintage-world/view-product/3130-spain-1-euro-cent-2010-coin" class="image"> <img class="pic-1 img-fluid" src="https://s3-ap-southeast-1.amazonaws.com/mint-product-img/homepage/MICSCFC00042.jpg"> </a> </div>
                                    <div class="product-content">                                     
                                       <h2 class="title"><a href="http://localhost/mintage-world/view-product/spain-1-euro-cent-2010-coin">Spain 1 Euro Cent 2010 Coin</a> </h2>
                                       <p class="product-date mb-0"><small><i class="fas fa-calendar-alt"></i> 21 Aug 2023 Mon</small></p>
                                       <p class="product-disc mb-2">Pandit Vishnu Digambar Paluskar was an renowned Indian musician best known for his bhajan Raghupati Raghava Raja Ram and also for arranging India's national song, Vande M?taram, as it is heard today. He founded Gandharva Maha...</p>
                                       <a class="mb-0 btn btn-sm btn-primary">Read More</a>
                                    </div>
                                 </div>
                            </div>
                        </div> 
                        <div class="col-xl-6 col-lg-6 col-md-12 col-12 mt-4">
                            <div class="search-item">
                                <div class="product-grid d-md-flex d-block  text-start">
                                    <div class="product-image"> <a href="http://localhost/mintage-world/view-product/3130-spain-1-euro-cent-2010-coin" class="image"> <img class="pic-1 img-fluid" src="https://s3-ap-southeast-1.amazonaws.com/mint-product-img/homepage/MICSCFC00042.jpg"> </a> </div>
                                    <div class="product-content">                                     
                                       <h2 class="title"><a href="http://localhost/mintage-world/view-product/spain-1-euro-cent-2010-coin">Spain 1 Euro Cent 2010 Coin</a> </h2>
                                       <p class="product-date mb-0"><small><i class="fas fa-calendar-alt"></i> 21 Aug 2023 Mon</small></p>
                                       <p class="product-disc mb-2">Pandit Vishnu Digambar Paluskar was an renowned Indian musician best known for his bhajan Raghupati Raghava Raja Ram and also for arranging India's national song, Vande M?taram, as it is heard today. He founded Gandharva Maha...</p>
                                       <a class="mb-0 btn btn-sm btn-primary">Read More</a>
                                    </div>
                                 </div>
                            </div>
                        </div> 
                        <div class="col-xl-6 col-lg-6 col-md-12 col-12 mt-4">
                            <div class="search-item">
                                <div class="product-grid d-md-flex d-block  text-start">
                                    <div class="product-image"> <a href="http://localhost/mintage-world/view-product/3130-spain-1-euro-cent-2010-coin" class="image"> <img class="pic-1 img-fluid" src="https://s3-ap-southeast-1.amazonaws.com/mint-product-img/homepage/MICSCFC00042.jpg"> </a> </div>
                                    <div class="product-content">                                     
                                       <h2 class="title"><a href="http://localhost/mintage-world/view-product/spain-1-euro-cent-2010-coin">Spain 1 Euro Cent 2010 Coin</a> </h2>
                                       <p class="product-date mb-0"><small><i class="fas fa-calendar-alt"></i> 21 Aug 2023 Mon</small></p>
                                       <p class="product-disc mb-2">Pandit Vishnu Digambar Paluskar was an renowned Indian musician best known for his bhajan Raghupati Raghava Raja Ram and also for arranging India's national song, Vande M?taram, as it is heard today. He founded Gandharva Maha...</p>
                                       <a class="mb-0 btn btn-sm btn-primary">Read More</a>
                                    </div>
                                 </div>
                            </div>
                        </div> 
                    </div>

                    

                </div>
            </div>


           </div>
        </div>
    </div>       
  
</main>
