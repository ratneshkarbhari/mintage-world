<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/coin-banner.jpg")}}" /></section>

    
    <x-bread-crumb :breadCrumbData="$breadCrumbData"/>

    <section class="common-padding coing-list-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            @if($country["id"]==1)
            <div class="row">
                <div class="col-lg-3 col-md-12 left-filter-wrap ">
                    <div id="InfoFilter" class="filter-wrap">
                        <div class="filter-link"><i class="fa fa-filter" aria-hidden="true"></i> <b>Dynasty: Dynasty Name</b>
                        </div>
                    </div>
                    <div id="CategoryMenu" class="category-menu">
                        <nav class="nav" role="navigation">
                            <div class="cat-heading"><b><i class="fa fa-filter" aria-hidden="true"></i>Dynasty: Dynasty Name</b>
                                <div id="CatClose" class="categories-close">X</div>
                            </div>

                            <div class="custom_radio">
                                <ul>

                                    @php
                                    $dynastyGroupCount = 1;
                                    @endphp
                                    
                                    @foreach($dynastyGroups as $dynastyGroup)
                                    <li><input type="radio" id="{{$dynastyGroup["id"]}}" class="dynastyGroupRadio"  
                                    @if($dynastyGroupCount==1)
                                    checked
                                    @endif
                                    name="dynastyGroup"
                                    ><label for="{{$dynastyGroup["id"]}}">{{$dynastyGroup["name"]}}</label></li>
                                    @php
                                    $dynastyGroupCount++;
                                    @endphp
                                    @endforeach
                                                                      
                                </ul>                              
                              </div>
 
                        </nav>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="d-flex justify-content-between"><h2 class="mb-3 heading-1">{{$info_title}}</h2></div>
                    <div class="row info-item-grid-row" id="dg-group-dynasties">
                        @foreach($dynasties as $dynasty)
                        <div class="col-lg-2 col-md-6 col-sm-12 info-item-grid-outer-box d-flex align-items-stretch"><a href="{{url("coin/ruler/".$dynasty["id"]."-".Str::slug($dynasty["title"]))}}">
                            @if(isset($dynasty["image"]))
                            <div class="info-item-grid-box min-h-0"><img class="img-fluid" src="{{getenv("DYNASTY_IMAGE_BASE_URL")."/".$dynasty["image"]}}" alt="{{$dynasty["name"]}}" alt="{{$dynasty["title"]}}">
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
            @else
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="d-flex justify-content-between"><h2 class="mb-3 heading-1">{{$info_title}}</h2></div>
                    <div class="row info-item-grid-row">
                        @foreach($dynasties as $dynasty)
                        <div class="col-lg-2 col-md-6 col-sm-12 info-item-grid-outer-box d-flex align-items-stretch"><a href="{{url("coin/ruler/".$dynasty["id"]."-".Str::slug($dynasty["title"]))}}">
                            @if(isset($dynasty["image"]))
                            <div class="info-item-grid-box min-h-0"><img class="img-fluid" src="{{getenv("DYNASTY_IMAGE_BASE_URL")."/".$dynasty["image"]}}" alt="{{$dynasty["name"]}}" alt="{{$dynasty["title"]}}">
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
            @endif
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
<script>

    $(".dynastyGroupRadio").on('change', function () {
        let dynastyGroupId = $(this).attr("id");

        $.ajax({
            type: "POST",
            url: "{{url('fetch-dg-dynasties')}}",
            data: {
                "_token": "{{ csrf_token() }}",

                "dynasty_group_id" : dynastyGroupId
            },
            success: function (response) {
                $("div#dg-group-dynasties").html(response);
            }
        });

    });

</script>