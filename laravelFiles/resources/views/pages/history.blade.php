
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("/assets/images/history-banner.jpg")}}"></section>
<section class="breadcrumb-wraper">
    <div class="container-fluid px-lg-2 px-lg-5">
        <nav aria-label="breadcrumb" class="breadcrumb-title-box">
            <ol class="breadcrumb">
                <li class="breadcrumb-item me-2"><a href="{{url("/")}}"><i class="fa fa-home"></i> Home</a></li>  
                <li class="breadcrumb-item me-2" aria-current="page">History</li>
            </ol>
        </nav>
    </div>
</section>
<section class="common-padding coing-list-wraper">
    <div class="container-fluid  px-lg-2 px-lg-5">
        <div class="d-flex justify-content-between">
            <h2 class="mb-3 heading-1">History</h2>
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
                                        Select by Periods
                                    </button>
                                </h2>
                                <div id="flush-collapse1" class="accordion-collapse collapse show"
                                    aria-labelledby="flush-heading1" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <select name="periods" class="form-control" id="periods" required="required">
                                          
                                          @foreach($periods as $period)

                                          <option value="{{$period["id"]}}" 
                                          @if($period["id"]==17)
                                          selected
                                          @endif
                                          >{{$period["title"]}}</option>

                                          @endforeach
                                       </select>

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading2">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapse2"
                                        aria-expanded="false" aria-controls="flush-collapse2">
                                        Select by History

                                    </button>
                                </h2>
                                <div id="flush-collapse2" class="accordion-collapse collapse show"
                                    aria-labelledby="flush-heading2" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body filter-item-body">
                                        <select name="historyn" id="historyn" required="" class="form-control" onchange="detailHistory();"> 
                                            <option value="">Select History</option>
                                            @foreach($histories as $history)
                                            <option value="">{{$history["title"]}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 mt-md-5 mt-0 mt-lg-0">
               <div class="row">
                    
                  @foreach($histories as $history)

                  <div class="col-lg-2 col-md-4 col-6 info-item-grid-outer-box">
                     <a href="{{url("history/detail/".$history["id"])}}">
                        <div class="info-item-grid-box">
                           <img src="{{getenv("DYNASTY_IMAGE_BASE_URL").$history["image"]}}" class="img-fluid" alt="{{$history["title"]}}">
                           <div class="info-meta text-center">
                              <h2 class="info-item-grid-title">{{$history["title"]}}</h2>
                           </div>
                        </div>
                     </a>
                  </div>

                  @endforeach
                    
               </div>
               
            </div>            
        </div>
    </div>
</section>
</main>


<script>

   

</script>