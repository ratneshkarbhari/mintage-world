
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/default-banner.jpg")}}" /></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2">
                        <a href="{{url("/")}}"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item me-2">News</li>                    
                </ol>
            </nav>
        </div>
    </section>    


    <section class="common-padding coing-list-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <div class="d-flex justify-content-between">
                <h2 class="mb-3 heading-1">News</h2>
            </div>
            <div class="row">

            @foreach($media_entries as $media_entry)

                @php

                $days = [

                    "Sun","Mon","Tue","Wed","Thu","Fri","Sat"

                ];

                $day = date("w", strtotime($media_entry["media_date"]));  

                $day = $days[$day];

                @endphp

               <div class="col-md-3 mb-3">
                  <div class="blog-div">
                     <div class="BlogImgDiv blog-image ">
                        <a href="{{url('media/detail/'.$media_entry["id"]."-".$media_entry["custom_url"])}}"><img src="{{getenv('NEWS_IMAGE_BASE_URL').$media_entry["image"]}}" class="img-fluid" alt="" decoding="async" ></a>
                     </div>                    
                     <div class="blog-title">
                     <span class="blog-date">	
                           <i class="fas fa-calendar-alt"></i> 

                           {{$media_entry["media_date"]." ".$day}}    </span> 		
                        <h2><a href="{{url("media/detail/")}}" rel="bookmark"> {{$media_entry["title"]}}</a></h2>
                     </div>
                     <div class="blog-disc">
                        <p>
                           {!!substr($media_entry["description"],0,100)."..."!!}
                        </p> 
                     </div>
                  </div>
               </div> 

            @endforeach
                

            </div>

            <div class="pagination-container">

                <p>{{$pagination_info_string}}</p>
                {!! $media_entries->links() !!}

            </div>
      
        </div>
    </section>
    
</main>