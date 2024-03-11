<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/coin-banner.jpg")}}" /></section>

    
    <x-bread-crumb :breadCrumbData="$breadCrumbData"/>

    <section class="common-padding coing-list-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <div class="d-flex justify-content-between"><h2 class="mb-3 heading-1">{{$info_title}}</h2></div>
            <div class="row info-item-grid-row">
                @foreach($rulers as $ruler)
                <div class="col-lg-2 col-md-6 col-6 info-item-grid-outer-box  d-flex align-items-stretch">
                    <a href="{{url("coin/list/".$ruler["id"]."-".Str::slug($ruler["title"]))}}">
                    @if(isset($ruler["image"]))
                    <div class="info-item-grid-box min-h-0"><img class="img-fluid" src="{{getenv("RULER_IMAGE_BASE_URL")."/".$ruler["image"]}}" alt="{{$ruler["name"]}}">
                        <div class="info-meta text-center">
                            <h2 class="info-item-grid-title">{{$ruler["title"]}}</h2>
                            <b>{{$ruler["from"]." ".$ruler["abbreviation_from"]." to ".$ruler["to"]." ".$ruler["abbreviation_to"]}}</b>
                        </div>
                    </div>
                    @else
                    <div class="info-item-grid-box min-h-0"><img class="img-fluid" src="{{getenv("API_DEFAULT_IMG_PATH")}}" alt="{{$ruler["name"]}}">
                        <div class="info-meta text-center">
                            <h2 class="info-item-grid-title">{{$ruler["title"]}}</h2>
                        </div>
                    </div>
                    @endif
                </a></div>
                @endforeach
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
