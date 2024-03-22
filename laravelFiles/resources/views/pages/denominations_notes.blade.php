<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/note-banner.jpg")}}" /></section>

    
    <x-bread-crumb :breadCrumbData="$breadCrumbData"/>

    <section class="common-padding noteg-list-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <div class="row">
                <div class="col-lg-10 col-md-12 col-sm-12">

                    <div class="d-flex justify-content-between"><h2 class="mb-3 heading-1">{{$info_title}}</h2></div>
                    <div class="row info-item-grid-row">
                        @foreach($denominations as $denomination)


                        <div class="col-lg-2 col-md-6 col-6 info-item-grid-outer-box"><a href="{{url("note/list/".$dynasty["id"]."/".$denomination["unit"]."-".Str::slug(str_replace("/"," ",$denomination["title"])))}}/">
                            @if(isset($denomination["obverse_image"])&&$denomination["obverse_image"]!="")
                            <div class="info-item-grid-box min-h-0"><img class="img-fluid" src="{{getenv("NOTE_BASE_URL").$denomination["obverse_image"]}}" alt="{{$denomination["title"]}}">
                                <div class="info-meta text-center">
                                    <h2 class="info-item-grid-title">{{$denomination["unit"]." ".$denomination["title"]}}</h2>
                                </div>
                            </div>
                            @else
                            <div class="info-item-grid-box min-h-0"><img class="img-fluid" src="{{getenv("API_DEFAULT_IMG_PATH")}}" alt="{{$denomination["title"]}}">
                                <div class="info-meta text-center">
                                    <h2 class="info-item-grid-title">{{$denomination["unit"]." ".$denomination["title"]}}</h2>
                                </div>
                            </div>
                            @endif
                        </a></div>
                        @endforeach
                    </div>

                </div>
                <div class="col-lg-2 col-md-12 col-sm-12">
                    
                    <div class="heading-2">More...</div>
                    <ul class="more-rulers">

                        @if(isset($sibling_dyanasties))
                        @foreach($sibling_dyanasties as $sibling_dynasty)

                        <li><a href="{{url("note/note/".$sibling_dynasty["id"]."-".Str::slug($sibling_dynasty["title"]))}}/">{{$sibling_dynasty["title"]}}</a></li>

                        @endforeach
                        @endif

                    </ul>

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
