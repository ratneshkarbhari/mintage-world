<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/stamps-banner.jpg")}}" /></section>

    {{-- <x-stamp-info-bread-crumbs :breadCrumbsData="$breadCrumbsData"/> --}}

    <section class="common-padding stampg-list-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <!-- <div class="d-flex justify-content-between">
                <h2 class="mb-3 heading-1">Ruler : Malwa Sultan</h2>
            </div> -->
            <div class="row info-item-grid-row">

                <div class="col-lg-4 col-md-12 col-sm-12 product-detail-wrap order-lg-2">
                    <h1 class="mb-3 heading-2">{{$stamp["stamp_name"]}}</h1>
                    <p><b>Type :</b> <span>{{$stamp["type"]}}</span></p>
                    <p><b>Stamp Name :</b> <span>{{$stamp["stamp_name"]}}</span></p>
                    <p><b>Issue Date:</b> <span>{{$stamp["issued_date"]}}</span></p>
                    <p><b>Stamp color:</b> <span>{{$stamp["color"]}}</span></p>
                    <p><b>Face Value:</b> <span>{{$stamp["face_value"]}}</span></p>
                    <p><b>Printing Process:</b> <span>{{$stamp["printing_process"]}}</span></p>

                    @if(session()->has('type'))
                    <div id="members-info">
                        <p><b>Calendar System :</b> <span>{{$stamp  ["calendar_system"]["title"]}}</span></p>
                        <p><b>Issued Year :</b> <span>{{$stamp["issued_year"]}}</span></p>
                        <p><b>Remark :</b> <span>{{$stamp["remark"]}}</span></p>
                        <p><b>Rarity :</b> <span>{{$stamp["rarity"]["title"]}}</span></p>
                        <p><b>Obverse Description :</b> <span>{{$stamp["obverse_desc"]}}</span></p>
                        <p><b>Reverse Description :</b> <span>{{$stamp["reverse_desc"]}}</span></p>
                    </div>
                    @else 
                    <p id="ProductLogBtn">
                        <button type="button" class="btn btn-sm btn-explore" data-bs-toggle="modal" data-bs-target="#LoginModal"> 
                            <i class="fa fa-eye"></i> View more
                            <span class="first"></span>
                            <span class="second"></span>
                            <span class="third"></span>
                            <span class="fourth"></span>
                        </button>
                   </p>
                    @endif
                   
                </div>

                @if($stamp["obverse_image"]=="")


                <div class="col-lg-6 col-md-12 col-sm-12 order-lg-1">

                    <div id="sync1" class="owl-carousel owl-theme tz-gallery">
                      <div class="item zoomable"> 
                          <a class="lightbox" href="{{getenv("API_DEFAULT_IMG_PATH")}}"> 
                          <img src="{{getenv("API_DEFAULT_IMG_PATH")}}" class="img-fluid zoomable__img" /> </a> 
                      </div>
                      <div class="item zoomable">  
                          <a class="lightbox" href="{{getenv("API_DEFAULT_IMG_PATH")}}"> 
                              <img src="{{getenv("API_DEFAULT_IMG_PATH")}}" class="img-fluid zoomable__img" /> </a> 
                      </div>
                      </div>
                      <div id="sync2" class="owl-carousel owl-theme">
                          <div class="item"> <img src="{{getenv("API_DEFAULT_IMG_PATH")}}" class="img-fluid" /> </div>
                          <div class="item"> <img src="{{getenv("API_DEFAULT_IMG_PATH")}}" class="img-fluid" /> </div>
                      </div>
                  </div>
  

                @else

                <div class="col-lg-6 col-md-12 col-sm-12 order-lg-1">

                  <div id="sync1" class="owl-carousel owl-theme tz-gallery">
                    <div class="item zoomable"> 
                        <a class="lightbox" href="{{getenv("stamp_IMAGE_BASE_URL").$stamp["obverse_image"]}}"> 
                        <img src="{{getenv("stamp_IMAGE_BASE_URL").$stamp["obverse_image"]}}" class="img-fluid zoomable__img" /></a> 
                    </div>
                    <div class="item zoomable">  
                        <a class="lightbox" href="{{getenv("stamp_IMAGE_BASE_URL").$stamp["obverse_image"]}}"> 
                            <img src="{{getenv("stamp_IMAGE_BASE_URL").$stamp["obverse_image"]}}" class="img-fluid zoomable__img" /> </a> 
                    </div>
                    </div>
                    <div id="sync2" class="owl-carousel owl-theme">
                        <div class="item"> <img src="{{getenv("stamp_IMAGE_BASE_URL").$stamp["obverse_image"]}}" class="img-fluid" /> </div>
                        <div class="item"> <img src="{{getenv("stamp_IMAGE_BASE_URL").$stamp["obverse_image"]}}" class="img-fluid" /> </div>
                    </div>
                </div>

                @endif

                
            </div>
        </div>
    </section>
    <section class="common-padding bg-light-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <h5>Disclaimer :</h5>
            <p>All the information on this website is published in good faith and for general information purposes
                only. We do not make any warranties about the completeness, reliability and accuracy of this
                information. Images and Text material are gathered from different sources and we do not take credit
                for the same.<br> Every effort is made to attribute images. However, if you feel a name or credit is
                missing, please let us know, we would be happy to incorporate.</p>
        </div>
    </section>

    
</main>