
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/coin-banner.jpg")}}" /></section>

    
    <x-bread-crumb :breadCrumbData="$breadCrumbData"/>


    <section class="common-padding coing-list-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <div class="d-flex justify-content-between">
                <h2 class="mb-3 heading-1">{{$info_title}}</h2>
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
                                <form action="{{url("coin-info-filter-exe")}}" id="coinFilterForm">
                                    @csrf
                                    <input type="hidden" name="ruler_id" value="{{$ruler["id"]}}">
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
                                                    
                                                    @foreach($denominations as $denomination)
                                                    @if($denomination["title"]!="")
                                                    
                                                    <li class="form-check">
                                                        <input class="form-check-input filter-option" type="checkbox" name="denominations[]" value="{{$denomination["id"]}}" id="denomination-{{$denomination["id"]}}" >
                                                        <label class="form-check-label" for="denomination-{{$denomination["id"]}}">
                                                        {{$denomination["title"]}}
                                                        </label>
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                    
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
                                                    @foreach($metals as $metal)
                                                    @if($metal["title"]!="")
                                                    
                                                    <li class="form-check">
                                                        <input class="form-check-input filter-option" type="checkbox" name="metals[]" value="{{$metal["id"]}}" id="metal-{{$metal["id"]}}" >
                                                        <label class="form-check-label" for="metal-{{$metal["id"]}}">
                                                        {{$metal["title"]}}
                                                        </label>
                                                    </li>
                                                    @endif
                                                    @endforeach
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
                                                    @foreach($rarities as $rarity)
                                                    @if($rarity["title"]!="")
                                                    <li><input class="filter-option" type="checkbox" id="{{$rarity["id"]}}" name="rarities[]" value="{{$rarity["id"]}}"><label for="{{$rarity["id"]}}">{{$rarity["title"]}}</label></li>
                                                    @endif
                                                    @endforeach
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
                                                    @foreach($shapes as $shape)
                                                    @if($shape["title"]!="")
                                                    <li><input type="checkbox" id="{{$shape["id"]}}" name="shapes[]" class="filter-option" value="{{$shape["id"]}}"><label for="{{$shape["id"]}}">{{$shape["title"]}}</label></li>
                                                    @endif
                                                    @endforeach
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
                                                    @foreach($mints as $mint)
                                                    @if($mint!="")
                                                    <li><input type="checkbox" id="{{$mint}}" class="filter-option" name="mints[]" value="{{$mint}}"><label for="{{$mint}}">{{$mint}}</label></li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mt-md-5 mt-0 mt-lg-0">
                    <div class="row" id="coinBox">
                        
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
                    <div class="pagination-container">

                        <p>{{$pagination_info_string}}</p>
                        {!! $coins->links() !!}

                    </div>


                </div>
                <div class="col-lg-3 col-md-12 mt-md-5 mt-0 mt-lg-0">
                    <div class="heading-2">More Rulers</div>
                    <ul class="more-rulers">

                        @foreach($dynastyRulers as $dynastyRuler)

                        <li><a href="{{url('/coin/list/'.$dynastyRuler["id"])}}">{{$dynastyRuler["title"]}}</a></li>

                        @endforeach

                    </ul>
                    <div class=""><a href="{{url("coin/ruler/".$dynasty["id"])}}" class="btn btn-sm btn-primary mt-3">View All</a></div>
                </div>
            </div>
        </div>
    </section>
    
</main>

<script>

    $(".filter-option").on("change",function (e) { 
        e.preventDefault();
        $("div#coinBox").html("Loading")
        $.ajax({
            type: "GET",
            url: "{{url("coin-info-filter-exe")}}",
            data: $("form#coinFilterForm").serialize(),
            success: function (response) {
                $("div#coinBox").html(response);
                $("div.pagination-container").hide();
            }
        });
    });

</script>