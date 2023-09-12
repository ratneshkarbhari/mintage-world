
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/default-banner.jpg")}}" /></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2">
                        <a href="{{url("/")}}"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item me-2">
                        <a href="{{url("/media")}}">News</a>
                    </li>
                    <li class="breadcrumb-item me-2"> {{$media_entry["title"]}}</li>                    
                </ol>
            </nav>
        </div>
    </section>    

    @php

    $days = [

        "Sun","Mon","Tue","Wed","Thu","Fri","Sat"

    ];

    $day = date("w", strtotime($media_entry["media_date"]));  

    $day = $days[$day];

    @endphp
    <section class="common-padding coing-list-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5"> 
            <div class="row">
               <div class="col-lg-9 col-md-12">                  
                  <div class="row">
                     <div class="col-md-5">
                        <div id="sync1" class="owl-carousel owl-theme tz-gallery">
                           <div class="item zoomable">
                               <a class="lightbox" href="{{getenv("NEWS_IMAGE_BASE_URL").$media_entry["image"]}}">
                                   <img src="{{getenv("NEWS_IMAGE_BASE_URL").$media_entry["image"]}}"
                                       class="img-fluid zoomable__img w-100" />
                               </a>
                           </div>                     
                       </div>
                     </div>
                     <div class="col-md-7">
                        <div class="heading-2">{{$media_entry["title"]}} </div>
                           <p class="mt-3"><i class="fas fa-clock"></i> {{$media_entry["media_date"]}}  {{$day}}</p>
                           {!! $media_entry["description"] !!}
                     </div>
                  </div>
                 


               </div>
               <div class="col-lg-3 col-md-12 mt-md-5 mt-0 mt-lg-0">
                  <div class="heading-2">Latest News</div>
                  <ul class="latest-news-list"> 

                     @foreach($other_media_entries as $media_entry)


                     @php

                        $days = [

                        "Sun","Mon","Tue","Wed","Thu","Fri","Sat"

                        ];

                        $day = date("w", strtotime($media_entry["media_date"]));  

                        $day = $days[$day];

                     @endphp

                     <li>
                        <a href="{{url("media/detail/".$media_entry["id"]."-".$media_entry["custom_url"])}}">
                           <h3>{{$media_entry["title"]}}</h3>                     
                           <div class="date"><i class="fas fa-clock"></i> {{$media_entry["media_date"]." ".$day}}</div>
                           <p>{{substr($media_entry["description"],0,100)}}...</p>
                        </a>
                     </li>

                     @endforeach
                      
                  </ul>
                  <div class=""><a href="{{url("/media")}}" class="btn btn-sm btn-primary mt-3">View All</a></div>
              </div>   
            </div>
      
        </div>
    </section>
    
</main>