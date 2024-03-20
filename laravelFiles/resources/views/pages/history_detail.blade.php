<main class="page-content">
   <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("/assets/images/inside-banner/history-banner.jpg")}}"></section>
<section class="breadcrumb-wraper">
   <div class="container-fluid px-lg-2 px-lg-5">
       <nav aria-label="breadcrumb" class="breadcrumb-title-box">
           <ol class="breadcrumb">
               <li class="breadcrumb-item me-2"><a href="{{url("/")}}"><i class="fa fa-home"></i> Home</a></li> 
               <li class="breadcrumb-item me-2" aria-current="page"><a href="{{url("/history")}}">History</a></li>
               <li class="breadcrumb-item me-2" aria-current="page">{{$dynasty["title"]}}</li>
           </ol>
       </nav>
   </div>
</section>
<section class="common-padding coing-list-wraper">
    <div class="container-fluid  px-lg-2 px-lg-5">       
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
                                        <select name="historyn" id="historyn" required="" class="form-control" > 
                                            <option value="">Select History</option>
                                            @foreach($histories_options as $histories_option)
                                            <option value="{{$histories_option["id"]."-".Str::slug(strtolower($histories_option["title"]))}}">{{$histories_option["title"]}}</option>
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
               <div class="historycontent">
                  <div class="d-flex justify-content-between">
                     <h2 class="mb-3 heading-1">{{$dynasty["title"]}}</h2>
                 </div> 
                    {!!$history["history"]!!}
                        {{-- <p>Read more about Janapada history at Mintage World.</p> --}}
                 <div class="mb-3 d-block"></div>
                  @if(session()->has('type'))
                  @if(session("level")=="Regular")
                    <a class="btn btn-sm btn-explore" href="{{url("upgrade-membership?history=".$history["id"])}}"> 
                        <i class="fa fa-download"> Click here to download the complete  </i>
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        <span class="fourth"></span>
                    </a>
                  @else
                    <a class="btn btn-sm btn-explore" download href="{{url("history-download/".$history["id"])}}"> 
                        <i class="fa fa-download"> Click here to download the complete history</i>
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        <span class="fourth"></span>
                    </a>
                  @endif
                  @else 
                  <p id="ProductLogBtn">
                     <a type="button" class="btn btn-sm btn-explore" data-bs-toggle="modal" data-bs-target="#LoginModal"> 
                        <i class="fa fa-download"> Click here to download the complete history</i>
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        <span class="fourth"></span>
                     </a>
                  </p>
                  @endif
               </div>   
            </div>            
        </div>
    </div>
</section>
</main>
<script>

    $("select#periods").on("change",()=>{

        let periodId = $("select#periods").val();

        $.ajax({
            type: "GET",
            url: "<?php echo url("get-histories-dropdown-for-period"); ?>",
            data: {
                "period_id" : periodId
            },
            success: function(response){
                $("select#historyn").html('');
                $("select#historyn").html(response);
            }
        });

        
        

    });

    $("select#historyn").on("change",()=>{

        let historyId = $("select#historyn").val();

        window.location.replace("{{url('history/detail/')}}/"+historyId);

    });

</script>