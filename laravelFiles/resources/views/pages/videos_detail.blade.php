
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/default-banner.jpg")}}" /></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2">
                        <a href="{{url('/')}}/"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item me-2">
                        <a href="{{url('videos/')}}/">Event Videos</a>
                    </li>
                    <li class="breadcrumb-item me-2">{{$main_video['title']}}</li>                    
                </ol>
            </nav>
        </div>
    </section>    


    <section class="common-padding coing-list-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <div class="d-flex justify-content-between">
                <h2 class="mb-3 heading-1">{{$main_video['title']}}</h2>
            </div>
            <div class="row">
                <div class="col-md-8 mb-3">
                   <div class="blog-div">
                      <div class="BlogImgDiv blog-image ">                        
                        <iframe class="iframevideo" height="500px"  width="100%" src="{{$main_video['image']}}" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                      </div>                    
                      <div class="blog-disc"> 		
                        <p>{{$main_video['description']}}</p>
                      </div>
                      
                   </div>
                </div>
                <div class="col-lg-3 col-md-12 mt-md-5 mt-0 mt-lg-0">
                  <div class="heading-2">Latest Videos</div> 
                     <ul class="videos-detail-list">
                        @foreach($latest_five_videos as $video)
                        <li>
                            <a href="{{url('videos/detail/'.$video["id"].'-'.$video["custom_url"])}}/">
                            <h3>{{$video['title']}}</h3>
                            
                            <p>{{substr($video['description'],0,35)}}...</p>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                  
                  <div class=""><a href="{{url('videos')}}/" class="btn btn-sm btn-primary mt-3">View All</a></div>
              </div>
            </div>
       
        </div>
    </section>
    
</main>