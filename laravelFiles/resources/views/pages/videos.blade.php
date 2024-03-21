<main class="page-content">
   <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/default-banner.jpg")}}" /></section>
   <section class="breadcrumb-wraper">
      <div class="container-fluid px-lg-2 px-lg-5">
         <nav aria-label="breadcrumb" class="breadcrumb-title-box">
            <ol class="breadcrumb">
               <li class="breadcrumb-item me-2">
                  <a href="{{url("/")}}/"><i class="fa fa-home"></i> Home</a>
               </li>
               <li class="breadcrumb-item me-2">Event Videos</li>
            </ol>
         </nav>
      </div>
   </section>


   <section class="common-padding coing-list-wraper">
      <div class="container-fluid  px-lg-2 px-lg-5">
         <div class="d-flex justify-content-between">
            <h2 class="mb-3 heading-1">Event Videos</h2>
         </div>
         <div class="row">
            @foreach($videos as $video)
            <div class="col-md-3 mb-3">
               <div class="blog-div">
                  <div class="BlogImgDiv blog-image ">
                     <iframe class="iframevideo" height="220" width="100%" src="{{$video['image']}}" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                  </div>
                  <div class="blog-title">
                     <h2><a href="{{url('videos/detail/'.$video["id"].'-'.$video['custom_url'])}}/">{{$video['title']}}</a></h2>
                  </div>
               </div>
            </div>
            @endforeach
         </div>

      </div>
   </section>

</main>