<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/default-banner.jpg")}}" /></section>
    <section class="breadcrumb-wraper">
       <div class="container-fluid px-lg-2 px-lg-5">
          <nav aria-label="breadcrumb" class="breadcrumb-title-box">
             <ol class="breadcrumb">
                <li class="breadcrumb-item me-2">
                   <a href="{{url("/")}}/"><i class="fa fa-home"></i> Home</a>
                </li>
                <li class="breadcrumb-item me-2">Media Coverage</li>
             </ol>
          </nav>
       </div>
    </section>
    <section class="common-padding coing-list-wraper media-coverage-wraper">
      <div class="container-fluid  px-lg-2 px-lg-5">
         <div class="d-flex justify-content-between">
            <h2 class="mb-3 heading-1">Media Coverage</h2>
         </div>
         <div class="row">

            @foreach($media_coverage_items as $media_coverage_item)
            @php
            $date = date("M Y", strtotime($media_coverage_item["datetime"]));
            
            
            @endphp
            <div class="col-xl-4 col-lg-6 col-md-6 col-12 mb-3 d-flex align-items-stretch">
               <div class="festival-content ">
                  <h3>{{$media_coverage_item["title"]}} | Mintage World</h3>
                  <div class="fest-content">
                     <p class="duration">
                        <i class="fas fa-calendar-alt"></i>
                        <span> {{$date}}</span>
                     </p>
                     <div class="btn-group-wraper"> 
                        @if(isset($media_coverage_item["video_url"]))   
                        <a class="btn btn-explore me-md-2 mb-2 video-btn" href="{{$media_coverage_item["video_url"]}}" data-lity>	
                        <i class="fas fa-video"></i> Play Video
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        <span class="fourth"></span>
                        </a>
                        @endif
                        @if(count($media_coverage_item["pdf"])!=0)
                        <a class="btn btn-explore me-md-2 mb-2" data-bs-toggle="modal" data-bs-target="#pdfModal-{{$media_coverage_item["id"]}}">	
                        <i class="fas fa-file-pdf"></i> View PDF
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        <span class="fourth"></span>
                        </a>
                        <div class="modal fade" id="pdfModal-{{$media_coverage_item["id"]}}" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered modal-xl">
                              <div class="modal-content">
                                 <div class="modal-body text-center">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="row">
                                       <div class="col-md-3">


                                          <ul class="pdf-list">
                                          
                                          @foreach($media_coverage_item["pdf"] as $pdfFile)

                                          <li><a class="view-pdf" mciId="{{$media_coverage_item['id']}}" href="{{url($pdfFile["pdf_url"])}}">{{$pdfFile["publication_name"]}}</a></li>

                                          @endforeach

                                          </ul>
                                       </div>
                                       <div class="col-md-9">
                                          <div class="pdf-content">
                                             <embed src="{{url($media_coverage_item["pdf"][0]["pdf_url"])}}" id="pdf_viewer-{{$media_coverage_item['id']}}" width="100%" height="650px" type="application/pdf">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endif
                        @if(isset($media_coverage_item["media_url"]))
                        <a class="btn btn-explore me-md-2 mb-2" data-bs-toggle="modal" data-bs-target="#NewsModalLink-{{$media_coverage_item["id"]}}">	
                        <i class="fas fa-paperclip"></i> View News 
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        <span class="fourth"></span>
                        </a>
                        <div class="modal fade" id="NewsModalLink-{{$media_coverage_item["id"]}}" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered modal-lg">
                              <div class="modal-content">
                                 <div class="modal-body text-center">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <div class="row">
                                       <div class="col-md-12">
                                          @php 

                                          $data = $media_coverage_item["media_url"];

                                          $strings = explode(",",$data);

                                          foreach($strings as $string){

                                             $array = explode("|",$string);

                                             $linkData[] = [
                                                   "title" => $array[0],
                                                   "link" => $array[1]
                                             ];



                                          }


                                          @endphp
                                          <ul class="news-link-list d-flex align-content-start flex-wrap">
                                             
                                             @foreach($linkData as $link)
                                             <li><a class="news-link" target="_blank" href="{{$link["link"]}}" >{{$link["title"]}}</a></li>
                                             @endforeach

                                             {{-- <li><a class="news-link" target="_blank" href="https://www.mintageworld.com/mediacoverage/loksatta-2022-1664882092.pdf">Loksatta PDF</a></li>
                                             <li><a class="news-link" target="_blank" href="https://www.mintageworld.com/mediacoverage/the-hindu-2022-1664882092.pdf">The Hindu</a></li>
                                             <li><a class="news-link" target="_blank" href="https://www.mintageworld.com/mediacoverage/the-print-2022-1664882092.pdf">the Print</a></li> --}}
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
            
         </div>
      </div>
      <div class="container-fluid  px-lg-2 px-lg-5">
         <div class="row">
            <div class="col-md-12">
               <div class="pagination-container">
                  <p>{{$pagination_info_string}}</p>
                  {!! $media_coverage_items->links() !!}
               </div>
            </div>
         </div>
      </div>
     
     
    </section>
    

    <!-- Modal -->
    <div class="modal fade" id="myVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg p-0 modal-dialog-centered" role="document">
          <div class="modal-content">
             <div class="modal-body p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="top: -40px;"></span>
                </button>        
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                   <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
             </div>
          </div>
       </div>
    </div>
 </main>
 <script>
    $(function () {
      $(".view-pdf").on("click", function () {
        var pdf_link = $(this).attr("href");
        var mediaCovItemId = $(this).attr("mciID");
        var pdf_viewer = document.getElementById("pdf_viewer-"+mediaCovItemId);
        $(pdf_viewer).attr("src", pdf_link);
        return false;
      });
    });
    
    
    //   video popup js start
    
    $(document).ready(function () {
      // Gets the video src from the data-src on each button
    
      var $videoSrc;
      $(".video-btn").click(function () {
        $videoSrc = $(this).data("src");
      });
      console.log($videoSrc);
    
      // when the modal is opened autoplay it
      $("#myVideo").on("shown.bs.modal", function (e) {
        // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
        $("#video").attr(
          "src",
          $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0"
        );
      });
    
      // stop playing the youtube video when I close the modal
      $("#myVideo").on("hide.bs.modal", function (e) {
        // a poor man's stop video
        $("#video").attr("src", $videoSrc);
      });
    
      // document ready
    });
    //   video popup js end
    
 </script>
 <link href="{{url("assets/css/lity.min.css")}}" rel="stylesheet">
 <script src="{{url("assets/js/lity.min.js")}}"></script>