<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/coin-banner.jpg")}}" /></section>

    
    <x-bread-crumb :breadCrumbData="$breadCrumbData"/>

    <section class="common-padding coing-list-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <div class="row">
                <div class="col-lg-3 col-md-12 left-filter-wrap ">
                    <h2>Data Absent</h2>
                    <div id="InfoFilter" class="filter-wrap d-none">
                        <div class="filter-link"><i class="fa fa-filter" aria-hidden="true"></i> <b>Dynasty: Dynasty Name</b>
                        </div>
                    </div>
                    <div id="CategoryMenu" class="category-menu d-none">
                        <nav class="nav" role="navigation">
                            <div class="cat-heading"><b><i class="fa fa-filter" aria-hidden="true"></i>Dynasty: Dynasty Name</b>
                                <div id="CatClose" class="categories-close">X</div>
                            </div>

                            <div class="custom_radio">
                                <ul>
                                    <li><input type="radio" id="featured-1" name="featured" checked><label for="featured-1">Janapada</label></li>
                                    <li><input type="radio" id="featured-2" name="featured"><label for="featured-2">Indian Empires / Kingdoms / Dynasties</label></li>
                                    <li><input type="radio" id="featured-3" name="featured"><label for="featured-3">Ancient and Early Medieval Kingdoms</label></li>
                                    <li><input type="radio" id="featured-4" name="featured"><label for="featured-4">Ancient coins of South India</label></li>
                                    <li><input type="radio" id="featured-5" name="featured"><label for="featured-5">Coins of Ancient Invaders</label></li>
                                    <li><input type="radio" id="featured-6" name="featured"><label for="featured-6">Ancient City States of India</label></li>                                     
                                </ul>                              
                              </div>
 
                        </nav>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="d-flex justify-content-between"><h2 class="mb-3 heading-1">{{$info_title}}</h2></div>
                    <div class="row info-item-grid-row">
                        @foreach($dynasties as $dynasty)
                        <div class="col-lg-2 col-md-6 col-sm-12 info-item-grid-outer-box d-flex align-items-stretch"><a href="{{url("coin/ruler/".$dynasty["id"])}}">
                            @if(isset($dynasty["image"]))
                            <div class="info-item-grid-box min-h-0"><img class="img-fluid" src="{{getenv("dynasty_IMAGE_BASE_URL")."/".$dynasty["image"]}}" alt="{{$dynasty["name"]}}" alt="{{$dynasty["title"]}}">
                                <div class="info-meta text-center">
                                    <h2 class="info-item-grid-title">{{$dynasty["title"]}}</h2>
                                    @if($dynasty["description"])
                                    <b>{!!$dynasty["description"]!!}</b>
                                    @endif
                                </div>
                            </div>
                            @else
                            <div class="info-item-grid-box min-h-0"><img class="img-fluid" src="{{getenv("API_DEFAULT_IMG_PATH")}}" alt="{{$dynasty["title"]}}">
                                <div class="info-meta text-center">
                                    <h2 class="info-item-grid-title">{{$dynasty["title"]}}</h2>
                                    @if($dynasty["description"])
                                    <b>{!!$dynasty["description"]!!}</b>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </a></div>
                        @endforeach
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!--Footer Content -->
    @if($footer_content!="")
    <section class="common-padding page-footer-disc bg-light-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <?php echo $footer_content; ?>
        </div>
    </section>
    @endif
</main>
