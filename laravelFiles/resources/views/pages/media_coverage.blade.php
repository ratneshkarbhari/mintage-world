

<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/default-banner.jpg")}}" /></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2">
                        <a href="{{url("/")}}"><i class="fa fa-home"></i> Home</a>
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

                        <a class="btn btn-explore me-md-2 mb-2" href="https://www.youtube.com/watch?v=V9l2IZCIz4Q" target="_blank">	
                            <i class="fas fa-video"></i> Play Video
                            <span class="first"></span>
                            <span class="second"></span>
                            <span class="third"></span>
                            <span class="fourth"></span>
                        </a>
                        <a class="btn btn-explore me-md-2 mb-2" data-bs-toggle="modal" data-bs-target="#PdfModal">	
                            <i class="fas fa-file-pdf"></i> View PDF
                            <span class="first"></span>
                            <span class="second"></span>
                            <span class="third"></span>
                            <span class="fourth"></span>
                        </a>
                        <a class="btn btn-explore me-md-2 mb-2" data-bs-toggle="modal" data-bs-target="#NewsModalLink">	
                            <i class="fas fa-paperclip"></i> View News 
                            <span class="first"></span>
                            <span class="second"></span>
                            <span class="third"></span>
                            <span class="fourth"></span>
                        </a>
                    </div>
                    </div> 
                </div>
            </div>

            @endforeach

            {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-12 mb-3 d-flex align-items-stretch">                
                <div class="festival-content">
                    <h3>Launched - Global Collectibles of Mahatma Gandhi through Bank Notes, Coins & Stamps </h3>
                    <div class="fest-content">
                        <p class="duration">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Oct 2022</span>
                        </p> 
                        <p class="maps-festival">
                            <i class="fas fa-bullseye"></i>
                            <span>This is the only collectable book in the world that will showcase the various Stamps, Coins & Notes issued by more than 135 countries around the world on Gandhiji from 15th August 1948 till date
                            </span>
                        </p>
                        <div class="btn-group-wraper">
                            <a class="btn btn-explore me-md-2 mb-2" href="https://www.youtube.com/watch?v=V9l2IZCIz4Q" target="_blank">	
                                <i class="fas fa-video"></i> Play Video
                                <span class="first"></span>
                                <span class="second"></span>
                                <span class="third"></span>
                                <span class="fourth"></span>
                            </a>
                            <a class="btn btn-explore me-md-2 mb-2" data-bs-toggle="modal" data-bs-target="#PdfModal">	
                                <i class="fas fa-file-pdf"></i> View PDF
                                <span class="first"></span>
                                <span class="second"></span>
                                <span class="third"></span>
                                <span class="fourth"></span>
                            </a>
                            <a class="btn btn-explore me-md-2 mb-2" data-bs-toggle="modal" data-bs-target="#NewsModalLink">	
                                <i class="fas fa-paperclip"></i> View News 
                                <span class="first"></span>
                                <span class="second"></span>
                                <span class="third"></span>
                                <span class="fourth"></span>
                            </a>
                        </div>
                        
                    </div> 
                </div>
            </div>  
            <div class="col-xl-4 col-lg-6 col-md-6 col-12 mb-3 d-flex align-items-stretch">                
                <div class="festival-content">
                    <h3>Mintage World Presents Global Collectibles of Mahatma Gandhi through Banknotes, Coins and Stamps
                    </h3>
                    <div class="fest-content">
                        <p class="duration">
                            <i class="fas fa-calendar-alt"></i>
                            <span> Oct 2022
                            </span>
                        </p> 
                        <p class="maps-festival">
                            <i class="fas fa-bullseye"></i>
                            <span>The book is celebrating Gandhiji’s Life through Stamps, Coins & Banknotes. It is the only book in the world that showcase stamps, coins and notes of Mahatma Gandhi issued by more than 140 countries.
                            </span>
                        </p>
                        <div class="btn-group-wraper">
                            <a class="btn btn-explore me-md-2 mb-2" href="https://www.youtube.com/watch?v=V9l2IZCIz4Q" target="_blank">	
                                <i class="fas fa-video"></i> Play Video
                                <span class="first"></span>
                                <span class="second"></span>
                                <span class="third"></span>
                                <span class="fourth"></span>
                            </a>
                            <a class="btn btn-explore me-md-2 mb-2" data-bs-toggle="modal" data-bs-target="#PdfModal">	
                                <i class="fas fa-file-pdf"></i> View PDF
                                <span class="first"></span>
                                <span class="second"></span>
                                <span class="third"></span>
                                <span class="fourth"></span>
                            </a>
                            <a class="btn btn-explore me-md-2 mb-2" data-bs-toggle="modal" data-bs-target="#NewsModalLink">	
                                <i class="fas fa-paperclip"></i> View News 
                                <span class="first"></span>
                                <span class="second"></span>
                                <span class="third"></span>
                                <span class="fourth"></span>
                            </a>
                        </div>
                    </div> 
                </div>
            </div>  
            <div class="col-xl-4 col-lg-6 col-md-6 col-12 mb-3 d-flex align-items-stretch">                
                <div class="festival-content">
                    <h3>2 Anna Silver Coins Worth More Than Its Face Value
                    </h3>
                    <div class="fest-content">
                        <p class="duration">
                            <i class="fas fa-calendar-alt"></i>
                            <span>Dec 2018</span>
                        </p> 
                        <p class="maps-festival">
                            <i class="fas fa-bullseye"></i>
                            <span>The changing face of coins reflects the economic changes of a country. It's the same with the two anna silver coin. 

                            </span>
                        </p>
                    </div> 
                </div>
            </div>   --}}
        </div>      
        </div>
    </section>
<div class="modal fade" id="PdfModal" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content"> 
            <div class="modal-body text-center">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

             <div class="row">
                <div class="col-md-3">
                    <ul class="pdf-list">
                        <li><a class="view-pdf" href="https://www.mintageworld.com/mediacoverage/press-trust-of-india-2022-1664882092.pdf">Press Trust Pdf</a></li>
                        <li><a class="view-pdf" href="https://www.mintageworld.com/mediacoverage/loksatta-2022-1664882092.pdf">Loksatta PDF</a></li>
                        <li><a class="view-pdf" href="https://www.mintageworld.com/mediacoverage/the-hindu-2022-1664882092.pdf">The Hindu</a></li>
                        <li><a class="view-pdf" href="https://www.mintageworld.com/mediacoverage/the-print-2022-1664882092.pdf">the Print</a></li>                           
                    </ul>
                </div>    
                <div class="col-md-9">
                    <div class="pdf-content">
                        <embed src="https://www.mintageworld.com/mediacoverage/press-trust-of-india-2022-1664882092.pdf" id="pdf_viewer" width="100%" height="650px" type="application/pdf">
                    </div>    
                </div>    
            </div>   
                
            </div>

            
        </div>
    </div>
    </div>

    <div class="modal fade" id="NewsModalLink" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content"> 
                <div class="modal-body text-center">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    
                 <div class="row">
                    <div class="col-md-12">
                        <ul class="news-link-list d-flex align-content-start flex-wrap">
                            <li><a class="news-link" target="_blank" href="https://www.mintageworld.com/mediacoverage/press-trust-of-india-2022-1664882092.pdf" >Press Trust Pdf</a></li>
                            <li><a class="news-link" target="_blank" href="https://www.mintageworld.com/mediacoverage/loksatta-2022-1664882092.pdf">Loksatta PDF</a></li>
                            <li><a class="news-link" target="_blank" href="https://www.mintageworld.com/mediacoverage/the-hindu-2022-1664882092.pdf">The Hindu</a></li>
                            <li><a class="news-link" target="_blank" href="https://www.mintageworld.com/mediacoverage/the-print-2022-1664882092.pdf">the Print</a></li>                           
                        </ul>
                    </div>        
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
      var pdf_viewer = document.getElementById("pdf_viewer");
      $(pdf_viewer).attr("src", pdf_link);
      return false;
    });
  });
</script>