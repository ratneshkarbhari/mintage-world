
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/note-banner.jpg")}}" /></section>

    
    <x-bread-crumb :breadCrumbData="$breadCrumbData"/>


    <section class="common-padding noteg-list-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <div class="d-flex justify-content-between">
                <h2 class="mb-3 heading-1">{{$info_title}}</h2>
            </div>
            <div class="row info-item-grid-row min-h-0">
                <div class="col-lg-3 col-md-12 left-filter-wrap">
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
                                <form action="{{url("note-info-filter-exe")}}" id="noteFilterForm">
                                <input type="hidden" name="dynasty_id" value="{{$dynasty["id"]}}">
                                <input type="hidden" name="denomination_unit" value="{{$notes[0]["denomination_unit"]}}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-heading1">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapse1"
                                            aria-expanded="false" aria-controls="flush-collapse1">
                                            Governors
                                        </button>
                                    </h2>
                                    <div id="flush-collapse1" class="accordion-collapse collapse"
                                        aria-labelledby="flush-heading1" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <ul class="filter-item-list">
                                                
                                                @foreach($governors as $governor)
                                                @if($governor!="")
                                                <li><input class="filter-option" name="governors[]" type="checkbox" id="{{$governor}}"  value="{{$governor}}"><label for="{{$governor}}"> {{$governor}}</label></li>
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
                                            Issued Years

                                        </button>
                                    </h2>
                                    <div id="flush-collapse2" class="accordion-collapse collapse"
                                        aria-labelledby="flush-heading2" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body filter-item-body">
                                            <ul class="filter-item-list">
                                                @foreach($issued_years as $issued_year)
                                                @if($issued_year!="")
                                                <li><input type="checkbox" id="{{$issued_year}}" class="filter-option" name="issuedYears[]" value="{{$issued_year}}"><label for="{{$issued_year}}">{{$issued_year}}</label></li>
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
                    <div class="row" id="noteBox">
                        
                        @foreach($notes as $note)
                        @if($note["obverse_image"]!="")
                        <div class="col-lg-3 col-md-4 col-6 info-item-grid-outer-box"><a href="{{url("note/detail/".$note["id"])}}">
                                <div class="info-item-grid-box"><img
                                        src="{{getenv("NOTE_BASE_URL").$note["obverse_image"]}}"
                                        class="img-fluid" >
                                    <div class="info-meta text-center">
                                        <h2 class="info-item-grid-title">{{$note["denomination_unit"]." ".$note["denomination_title"]}}</h2>
                                        <span>{{$note["issued_year"]}}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @else
                        <div class="col-lg-3 col-md-4 col-6 info-item-grid-outer-box"><a href="{{url("note/detail/".$note["id"])}}">
                            <div class="info-item-grid-box"><img
                                        src="{{getenv("API_DEFAULT_IMG_PATH")}}"
                                        class="img-fluid" >
                                    <div class="info-meta text-center">
                                        <h2 class="info-item-grid-title">{{$note["denomination_unit"]." ".$note["denomination_title"]}}</h2>
                                        <span>{{$note["issued_year"]}}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endif
                        @endforeach
                      
                        <div class="pagination-container">

                            {{-- <p>{{$pagination_info_string}}</p> --}}
                            {{-- {!! $notesObj->links() !!} --}}
    
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 mt-md-5 mt-0 mt-lg-0">
                    <div class="heading-2">Know your Notes</div>
                    <ul class="more-rulers">


                        <li><a href="{{url('knowledge-base/governors-of-reserve-bank-of-india/')}}">Governor</a></li>
                        <li><a href="{{url('knowledge-base/signatory-of-finance-secretary/')}}">Finance Secretary</a></li>

                        <li><a href="{{url('knowledge-base/note-numbering-system/')}}">Note Numbering</a></li>

                        <li><a href="{{url('knowledge-base/security-features-on-current-banknotes/')}}">Security Features</a></li>

                        <li><a href="{{url('knowledge-base/security-features-on-demonetized-banknotes/')}}">Security Features on Demonetized Banknotes</a></li>


                    </ul>
                </div>
            </div>
        </div>
    </section>
    
</main>

<script>

    $(".filter-option").on("change",function (e) { 
        e.preventDefault();

        $("div#noteBox").html("Loading")
        $.ajax({
            type: "GET",
            url: "{{url("note-info-filter-exe")}}",
            data: $("form#noteFilterForm").serialize(),
            success: function (response) {
                $("div#noteBox").html(response);
                $("div.pagination-container").hide();
            }
        });
    });

</script>