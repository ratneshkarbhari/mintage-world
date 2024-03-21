
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url('assets/images/inside-banner/default-banner.jpg')}}/" /></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2">
                        <a href="{{url('/')}}/"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item me-2">
                        <a href="{{url('/story')}}/">Story of the week</a>
                    </li>
                    <li class="breadcrumb-item me-2"> {{$focus_story->title}}</li>                    
                </ol>
            </nav>
        </div>
    </section>    


    <section class="common-padding coing-list-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5"> 
            <div class="row">
               <div class="col-lg-9 col-md-12">                  
                  <div class="row">
                     <div class="col-md-5">
                        <div id="sync1" class="owl-carousel owl-theme tz-gallery">
                           <div class="item zoomable">
                               <a class="lightbox" href="{{url('assets/img/story/'.$focus_story['image1'])}}/">
                                   <img src="{{url('assets/img/story/'.$focus_story['image1'])}}/"
                                       class="img-fluid zoomable__img w-100" />
                               </a>
                           </div>                     
                       </div>
                     </div>
                     <div class="col-md-7">
                        <div class="heading-2">{{$focus_story->title}}</div> 
                        {!!$focus_story->description!!}

                     </div>
                  </div>
                 


               </div>
               <div class="col-lg-3 col-md-12 mt-md-5 mt-0 mt-lg-0">
                  <div class="heading-2">Latest Stories</div>
                  <ul class="latest-news-list"> 


                     @foreach($ten_stories as $story)
                     <li>
                        <a href="{{url('story/detail/'.$story['id'].'-'.Str::slug($story['title']))}}/">
                           <h3>{{$story->title}}</h3>  
                           <div class="d-flex justify-content-between">
                              <div class="image w-50 me-3"><img src="{{url('assets/img/story/'.$story['image1'])}}/" class="img-fluid border border-secondary"></div>
                              <p>{{substr($story->description,0,90)}}...</p>
                           </div>
                          
                        </a>
                     </li>
                     @endforeach
                     
                      
                  </ul>
                  <div class=""><a href="{{url('/story')}}/" class="btn btn-sm btn-primary mt-3">View All</a></div>
              </div>   
            </div>
      
        </div>
    </section>
    
</main>