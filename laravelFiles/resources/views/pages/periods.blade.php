<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/coin-banner.jpg")}}" /></section>
    

    <x-coin-info-bread-crumbs :breadCrumbsData="$breadCrumbsData"/>

    <section class="common-padding coing-list-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <div class="d-flex justify-content-between"><h2 class="mb-3 heading-1">{{$info_title}}</h2></div>
            <div class="row info-item-grid-row">
                @foreach($periods as $period)
                <div class="col-lg-2 col-md-6 col-sm-12 info-item-grid-outer-box"><a href="{{url("coin/dynasty/".$period["id"])}}">
                    <div class="info-item-grid-box min-h-0">
                        <img class="img-fluid" src="{{getenv("PERIOD_IMAGE_BASE_URL")."/".$period["image"]}}" alt="{{$period["title"]}}">
                        <div class="info-meta text-center">
                            <h2 class="info-item-grid-title">{{$period["title"]}}</h2>
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
