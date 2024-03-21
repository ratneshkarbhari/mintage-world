<main class="page-content">
   <section class="inside-banner"><img class="w-100 img-fluid" src="{{url('assets/images/inside-banner/default-banner.jpg')}}/" /></section>
   <section class="breadcrumb-wraper">
      <div class="container-fluid px-lg-2 px-lg-5">
         <nav aria-label="breadcrumb" class="breadcrumb-title-box">
            <ol class="breadcrumb">
               <li class="breadcrumb-item me-2">
                  <a href="{{url('/')}}/"><i class="fa fa-home"></i> Home</a>
               </li>
               <li class="breadcrumb-item me-2">Story of the week</li>
            </ol>
         </nav>
      </div>
   </section>


   <section class="common-padding coing-list-wraper">
      <div class="container-fluid  px-lg-2 px-lg-5">
         <div class="d-flex justify-content-between">
            <h2 class="mb-3 heading-1">Story of the week</h2>
         </div>
         <div class="row">

            @foreach($stories as $story)

            <div class="col-md-3 mb-3">
               <div class="blog-div">
                  <div class="BlogImgDiv blog-image ">
                     <a href="{{url('/story/detail/'.$story['id'].'-'.Str::slug($story['title']))}}/"><img src="{{url('assets/img/story/'.$story['image'])}}/" class="img-fluid" alt="" decoding="async"></a>
                  </div>
                  <div class="blog-title">
                     <span class="blog-date">
                        <i class="fas fa-calendar-alt"></i> 20 Jun 2016 Mon</span>
                     <h2><a href="{{url('/story/detail/'.$story['id'].'-'.Str::slug($story['title']))}}/" rel="bookmark">{{$story['title']}}</a></h2>
                  </div>
                  <div class="blog-disc">
                     <p>
                        Violence, wars, terrorist attacks and prosecutions have torn the world apart into pieces to such an extent that it is almost unimaginable to put them back together. Even as you are reading this, thousands of people across the
                     </p>

                  </div>
               </div>
            </div>
            

            @endforeach

         </div>
         <div class="pagination-container text-center">

            {!! $stories->links() !!}

         </div>
      </div>
   </section>

</main>