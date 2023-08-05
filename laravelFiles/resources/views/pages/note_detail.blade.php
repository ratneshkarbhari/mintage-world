<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/note-banner.jpg")}}" /></section>

    <x-bread-crumb :breadCrumbData="$breadCrumbData"/>

    <section class="common-padding noteg-list-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <!-- <div class="d-flex justify-content-between">
                <h2 class="mb-3 heading-1">Ruler : Malwa Sultan</h2>
            </div> -->
            <div class="row info-item-grid-row">

                <div class="col-lg-7 col-md-12 col-sm-12 product-detail-wrap order-lg-2">
                    <h1 class="mb-3 heading-2">{{$note["denomination_unit"]." ".$denomination["title"]}}</h1>
                    <p><b>Catalogue Ref no. :</b> <span>{{$note["catalogue_ref_no"]}}</span></p>
                    <p><b>Denomination :</b> <span>{{$note["denomination_unit"]." ".$denomination["title"]}}</span></p>
                    <p><b>Issued Circle :</b> <span>{{$note["issued_circle"]}}</span></p>
                    <p><b>Prefix :</b> <span>{{$note["prefix"]}}</span></p>

                    @if(session()->has('type'))
                    <div id="members-info">
                        <p><b>Calendar System :</b> <span>{{$note["calendar_system"]["title"]}}</span></p>
                        <p><b>Issued Year :</b> <span>{{$note["issued_year"]}}</span></p>
                        <p><b>Remark :</b> <span>{{$note["remark"]}}</span></p>
                        <p><b>Rarity :</b> <span>{{$note["rarity"]["title"]}}</span></p>
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

                @if($note["obverse_image"]=="")


                <div class="col-lg-5 col-md-12 col-sm-12 order-lg-1">

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

                <div class="col-lg-5 col-md-12 col-sm-12 order-lg-1">

                  <div id="sync1" class="owl-carousel owl-theme tz-gallery">
                    <div class="item zoomable"> 
                        <a class="lightbox" href="{{getenv("NOTE_BASE_URL").$note["obverse_image"]}}"> 
                        <img src="{{getenv("NOTE_BASE_URL").$note["obverse_image"]}}" class="img-fluid zoomable__img" /></a> 
                    </div>
                    <div class="item zoomable">  
                        <a class="lightbox" href="{{getenv("NOTE_BASE_URL").$note["reverse_image"]}}"> 
                            <img src="{{getenv("NOTE_BASE_URL").$note["reverse_image"]}}" class="img-fluid zoomable__img" /> </a> 
                    </div>
                    </div>
                    <div id="sync2" class="owl-carousel owl-theme">
                        <div class="item"> <img src="{{getenv("NOTE_BASE_URL").$note["obverse_image"]}}" class="img-fluid" /> </div>
                        <div class="item"> <img src="{{getenv("NOTE_BASE_URL").$note["reverse_image"]}}" class="img-fluid" /> </div>
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

    {{-- <section class="common-padding AddComment">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                <h6><b>Add your Comments</b></h6>
                <p>Your Comments</p>
                <textarea name="comment" class="form-control" placeholder="Enter your message" required="" rows="10"></textarea>  
                    @if(session()->has('type'))
                    <button class="btn btn-sm btn-explore mt-3">Submit
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        <span class="fourth"></span>
                    </button>
                    @else 
                    <button class="btn btn-sm btn-explore mt-3" data-bs-toggle="modal" data-bs-target="#LoginModal">Submit
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        <span class="fourth"></span>
                    </button>
                    @endif
              
              
                </div>
                <div class="col-md-6 col-sm-12 mt-5 mt-md-0">
                    <div class="recent-comment-wrap">
                        <h6><b>Recent Comments</b></h6>
                        @if($note["feedback"]=="[]")
                        <p>No Comments found </p>
                        @else
                        <div class="comment-wrap">
                            @foreach($note["feedback"] as $feedback)
                            <div class="UserDetail">
                                <p class="d-flex justify-content-between"><span class="UserName" id="UserName">{{$feedback["member"]["name"]}}</span><span class="UserName" id="CommentDate">{{date("d/m/Y",strtotime($feedback["created"]))}}</span></p>
                                <p>{{$feedback["comment"]}}</p>
                            </div>
                            @endforeach                            
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    
</main>