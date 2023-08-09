
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/stamps-banner.jpg")}}" /></section>

    
    <x-bread-crumb :breadCrumbData="$breadCrumbData"/>
    

    <section class="common-padding stampg-list-wraper">
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
                                <form action="{{url("stamp-info-filter-exe")}}" id="stampFilterForm">
                                <input type="hidden" name="dynasty_id" value="{{$dynastyId}}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading1">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapse1"
                                            aria-expanded="false" aria-controls="flush-collapse1">
                                            Theme
                                        </button>
                                    </h2>
                                    <div id="flush-collapse1" class="accordion-collapse collapse"
                                        aria-labelledby="flush-heading1" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <ul class="filter-item-list">
                                                
                                                @foreach($theme_categories as $theme_category)
                                                @if($theme_category!="")
                                                <li><input class="filter-option" name="themeCategories[]" type="checkbox" id="{{$theme_category["id"]}}"  value="{{$theme_category["id"]}}"><label for="tc-{{$theme_category["id"]}}"> {{$theme_category["title"]}}</label></li>
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
                    <div class="row" id="stampBox">
                        
                        @foreach($stamps as $stamp)
                        @if($stamp["obverse_image"]!=""||$stamp["obverse_image"]!="NA")
                        <div class="col-lg-3 col-md-4 col-6 info-item-grid-outer-box"><a href="{{url("stamp/detail/".$stamp["id"])}}">
                                <div class="info-item-grid-box">
                                    @if(($stamp["obverse_image"]!=""))
                                    <img
                                        src="{{getenv("STAMP_IMAGE_BASE_URL").$stamp["obverse_image"]}}"
                                        class="img-fluid">
                                    @else
                                    <img
                                    src="{{getenv("API_DEFAULT_IMG_PATH")}}"
                                    class="img-fluid">
                                    @endif
                                    <div class="info-meta text-center">
                                        <h2 class="info-item-grid-title">{{$stamp["stamp_name"]}}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @else
                        <div class="col-lg-3 col-md-4 col-6 info-item-grid-outer-box"><a href="{{url("stamp/detail/".$stamp["id"])}}">
                            <div class="info-item-grid-box"><img
                                        src="{{getenv("API_DEFAULT_IMG_PATH")}}"
                                        class="img-fluid" alt="{{$stamp["stamp_name"]}}">
                                    <div class="info-meta text-center">
                                        <h2 class="info-item-grid-title">{{$stamp["stamp_name"]}}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endif
                        @endforeach
                        <div class="pagination-container">

                            {{-- <p>{{$pagination_info_string}}</p> --}}
                            {!! $stamps->links() !!}
    
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 mt-md-5 mt-0 mt-lg-0">
                    <div class="heading-2">More</div>
                    <ul class="more-rulers">

                        @foreach($dynasties_in_period as $dip)

                        <li><a href="{{url('/stamp/dynasty/'.$dip["id"])}}">{{$dip["title"]}}</a></li>

                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </section>
    
</main>

<script>

    $(".filter-option").on("change",function (e) { 
        e.preventDefault();
        $("div#stampBox").html("Loading")
        $.ajax({
            type: "GET",
            url: "{{url("stamp-info-filter-exe")}}",
            data: $("form#stampFilterForm").serialize(),
            success: function (response) {
                $("div#stampBox").html(response);
                $("div.pagination-container").hide();
            }
        });
    });

</script>