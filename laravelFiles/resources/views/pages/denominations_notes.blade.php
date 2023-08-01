<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/note-banner.jpg")}}" /></section>

    
    <x-note-info-bread-crumbs :breadCrumbsData="$breadCrumbsData"/>

    <section class="common-padding noteg-list-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <div class="d-flex justify-content-between"><h2 class="mb-3 heading-1">{{$info_title}}</h2></div>
            <div class="row info-item-grid-row">
                @foreach($denominations as $denomination)
                <div class="col-lg-2 col-md-6 col-sm-12 info-item-grid-outer-box"><a href="{{url("note/list/".$denomination["unit"]."/".json_decode($breadCrumbsData,TRUE)["dynasty"]["id"])}}">
                    @if(isset($denomination["obverse_image"]))
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
    </section>
    <!--Footer Content -->
    <section class="common-padding page-footer-disc bg-light-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <?php echo $footer_content; ?>
        </div>
    </section>
</main>