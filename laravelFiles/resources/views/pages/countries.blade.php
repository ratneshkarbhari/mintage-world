<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/coin-banner.jpg")}}" /></section>

    <x-bread-crumb :breadCrumbData="$breadCrumbData"/>

    <section class="common-padding coing-list-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <div class="d-flex justify-content-between"><h2 class="mb-3 heading-1">{{$info_title}}</h2></div>
            <div class="row info-item-grid-row">
                @foreach($countries as $country)
                <div class="col-lg-2 col-md-6 col-6 info-item-grid-outer-box"><a href="{{url("coin/".$country["id"]."-".Str::slug(strtolower($country["name"])))}}">
                    <div class="info-item-grid-box min-h-0">
                        @if($country["flag"]!="")
                        <img class="img-fluid" src="{{getenv("COUNTRY_FLAG_IMAGE_BASE_URL")."/".$country["flag"]}}" alt="{{$country["name"]}}">
                        @else
                        <img class="img-fluid" src="{{getenv("API_DEFAULT_IMG_PATH")}}" alt="{{$country["name"]}}">
                        @endif
                        <div class="info-meta text-center">
                            <h2 class="info-item-grid-title">{{$country["name"]}}</h2>
                        </div>
                    </div>
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
