<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/note-banner.jpg")}}" /></section>

    <x-bread-crumb :breadCrumbData="$breadCrumbData"/>

    <section class="common-padding noteg-list-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <div class="d-flex justify-content-between"><h2 class="mb-3 heading-1">{{$info_title}}</h2></div>
            <div class="row info-item-grid-row">
                @foreach($countries as $country)
                <div class="col-lg-2 col-md-6 col-sm-12 info-item-grid-outer-box"><a href="{{"note/".$country["id"]."-".Str::slug(strtolower($country["name"]))}}">
                    <div class="info-item-grid-box min-h-0"><img class="img-fluid" src="{{getenv("COUNTRY_FLAG_IMAGE_BASE_URL")."/".$country["flag"]}}" alt="Medieval">
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
