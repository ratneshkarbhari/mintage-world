
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/coin-banner.jpg")}}" /></section>

    
    <x-coin-info-bread-crumbs :breadCrumbsData="$breadCrumbsData"/>


    <section class="common-padding coing-list-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <div class="d-flex justify-content-between">
                <h2 class="mb-3 heading-1">Coins : Hisam Al Din Hushang Shah</h2>
            </div>
            <div class="row info-item-grid-row min-h-0">
                <div class="col-lg-3 col-md-12 left-filter-wrap ">
                    <div id="InfoFilter" class="filter-wrap">
                        <div class="filter-link"><i class="fa fa-filter" aria-hidden="true"></i> <b>Filters</b>
                        </div>
                    </div>
                    <div id="CategoryMenu" class="category-menu">
                        <nav class="nav" role="navigation">
                            <div class="cat-heading"><b><i class="fa fa-filter" aria-hidden="true"></i>Filters</b>
                                <div id="CatClose" class="categories-close">X</div>
                            </div>

                            <div class="accordion accordion-flush w-100" id="accordionFlushExample">

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading1">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapse1"
                                            aria-expanded="false" aria-controls="flush-collapse1">
                                            Denomination
                                        </button>
                                    </h2>
                                    <div id="flush-collapse1" class="accordion-collapse collapse"
                                        aria-labelledby="flush-heading1" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <ul class="filter-item-list">
                                                <li><input type="checkbox" id="dnm" value="235">1 Shatamana</li>
                                                <li><input type="checkbox" id="dnm" value="245">1/16 Shatamana
                                                    (1/2 Shana)</li>
                                                <li><input type="checkbox" id="dnm" value="232">1/2 Shatamana (4
                                                    Shanas)</li>
                                                <li><input type="checkbox" id="dnm" value="246">1/32 Shatamana
                                                    (1/4 Shana)</li>
                                                <li><input type="checkbox" id="dnm" value="242">1/4 Shatamana (2
                                                    Shanas)</li>
                                                <li><input type="checkbox" id="dnm" value="243">1/8 Shatamana (1
                                                    Shana)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading2">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapse2"
                                            aria-expanded="false" aria-controls="flush-collapse2">
                                            Metal

                                        </button>
                                    </h2>
                                    <div id="flush-collapse2" class="accordion-collapse collapse"
                                        aria-labelledby="flush-heading2" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body filter-item-body">
                                            <ul class="filter-item-list">
                                                <li><input type="checkbox" id="metal" value="8">Billon</li>
                                                <li><input type="checkbox" id="metal" value="192">Billon
                                                    (debased silver)</li>
                                                <li><input type="checkbox" id="metal" value="5">Copper</li>
                                                <li><input type="checkbox" id="metal" value="4">Silver</li>
                                                <li><input type="checkbox" id="metal" value="29">Silver and
                                                    Debased Silver</li>
                                                <li><input type="checkbox" id="metal" value="30">Silver Plated
                                                    Copper and Copper</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading3">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapse3"
                                            aria-expanded="false" aria-controls="flush-collapse3">
                                            Rarity

                                        </button>
                                    </h2>
                                    <div id="flush-collapse3" class="accordion-collapse collapse"
                                        aria-labelledby="flush-heading3" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body filter-item-body">
                                            <ul class="filter-item-list">
                                                <li><input type="checkbox" id="rarity" value="11">R (Rare)
                                                </li>
                                                <li><input type="checkbox" id="rarity" value="12">S (Scarce)
                                                </li>
                                                <li><input type="checkbox" id="rarity" value="15">VR (Very
                                                    Rare)
                                                </li>
                                                <li><input type="checkbox" id="rarity" value="13">XR
                                                    (Extremely
                                                    Rare)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading4">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapse4"
                                            aria-expanded="false" aria-controls="flush-collapse4">
                                            Shape
                                        </button>
                                    </h2>
                                    <div id="flush-collapse4" class="accordion-collapse collapse"
                                        aria-labelledby="flush-heading4" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body filter-item-body">
                                            <ul class="filter-item-list">
                                                <li><input type="checkbox" id="shape" value="2">Round</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading5">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapse5"
                                            aria-expanded="false" aria-controls="flush-collapse5">
                                            Mint
                                        </button>
                                    </h2>
                                    <div id="flush-collapse5" class="accordion-collapse collapse"
                                        aria-labelledby="flush-heading5" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body filter-item-body">
                                            <ul class="filter-item-list">
                                                <li><input type="checkbox" id="mint"
                                                        value="Taxila%2FGandhara">Taxila/Gandhara</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mt-md-5 mt-0 mt-lg-0">
                    <div class="row">
                        
                        @foreach($coins as $coin)
                        @if($coin["obverse_image"]!="")
                        <div class="col-lg-3 col-md-4 col-6 info-item-grid-outer-box"><a href="{{url("coin/detail/".$coin["id"])}}">
                                <div class="info-item-grid-box"><img
                                        src="{{getenv("COIN_IMAGE_BASE_URL").$coin["obverse_image"]}}"
                                        class="img-fluid" alt="Tanka | G&amp;G M1 | O">
                                    <div class="info-meta text-center">
                                        <h2 class="info-item-grid-title">{{$coin["denomination"]["title"]}}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @else
                        <div class="col-lg-3 col-md-4 col-6 info-item-grid-outer-box"><a href="{{url("coin/detail/".$coin["id"])}}">
                            <div class="info-item-grid-box"><img
                                        src="{{getenv("API_DEFAULT_IMG_PATH")}}"
                                        class="img-fluid" alt="{{$coin["denomination"]["title"]}}">
                                    <div class="info-meta text-center">
                                        <h2 class="info-item-grid-title">{{$coin["denomination"]["title"]}}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endif
                        @endforeach
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 mt-md-5 mt-0 mt-lg-0">
                    <div class="heading-2">More Rulers</div>
                    <ul class="more-rulers">
                        <li><a href="/coin/list/2095/">Trade Token issued by Lewis Abrahams</a></li>
                        <li><a href="/coin/list/2097/">Trade Token issued by Adamson, Watts, McKechnie &amp; Co.</a>
                        </li>
                        <li><a href="/coin/list/2099/">Trade Token issued by John Allen</a></li>
                        <li><a href="/coin/list/2101/">Trade Token issued by William Allen</a></li>
                        <li><a href="/coin/list/2103/">Trade Token issued by John Andrew &amp; Co.</a></li>
                        <li><a href="/coin/list/2105/">Trade Token issued by Jno Andrew &amp; Co.</a></li>
                        <li><a href="/coin/list/2107/">Trade Token issued by Annand, Smith &amp; Co.</a></li>
                        <li><a href="/coin/list/2109/">Trade Token issued by Barraclough</a></li>
                        <li><a href="/coin/list/2111/">Trade Token issued by William Bateman Junr. &amp; Co.</a>
                        </li>
                        <li><a href="/coin/list/2113/">Trade Token issued by Bell &amp; Gardner</a></li>
                    </ul>
                    <div class=""><a href="#" class="btn btn-sm btn-primary mt-3">View All</a></div>
                </div>
            </div>
        </div>
    </section>
    <section class="common-padding page-footer-disc bg-light-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <h1>Biggest Online Encyclopaedia on Coins of the World</h1>
            <p>This is a real eye-candy for all those lovers of world coins out there! What more could you ask for?
                A well-categorised database of coins from around the world with detailed descriptions and history is
                all that you need! For someone who is researching about rare world coins, this online portal gives
                you easy and simple access to all the information you need with just a few clicks. The coins of the
                world hosted on our website are broadly classed based on country name. They are then further
                sub-categorised based on different time periods and eras. Be it ancient world coins or modern coins
                from around the world, you will find it all!</p>
            <p>The best part is that our team of researchers are constantly updating this database with more and
                more information. The common problem that most collectors or numismatists encounter today is
                compiling data from hundred different websites. Mintage World is a one-of-a-kind website where you
                will get to access information about different coins from around the world, all under one single
                roof. When you are searching for data or descriptions about your favourite world coins on our
                website, you also have the option to select a filter of your choice. Filters are based on various
                parameters like the metal content, year of issue, denomination etc. This simplifies your search
                process to a great extent. Apart from detailed obverse and reverse descriptions, the website also
                shows you high resolution images and catalogue references to make your life easier.</p>
            <p>We believe that knowledge is of utmost importance when it comes to collecting coins of the world.
                That is exactly what we are offering here on Mintage World. It is the perfect online collectorspedia
                that allows you to completely indulge in your favourite hobby. So, the moment you add to your
                collection of world coins, remember to upgrade your knowledge from Mintage World!</p>
        </div>
    </section>
</main>