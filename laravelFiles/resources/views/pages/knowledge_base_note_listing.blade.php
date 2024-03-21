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
                  <a href="{{url('note/20-india/')}}/">Note</a>
               </li>
               <li class="breadcrumb-item me-2">{{$governor}}</li>
            </ol>
         </nav>
      </div>
   </section>
   <section class="common-padding coing-list-wraper">
      <div class="container-fluid  px-lg-2 px-lg-5">
         <div class="row">
            <div class="col-lg-3 col-md-12 mt-md-5 mt-0 mt-lg-0">
               <div class="heading-2">Know Your Notes</div>
               <ul class="more-rulers">
                  <ul>
                     <li><a href="{{url("knowledge-base/governors-of-reserve-bank-of-india/")}}/">Governor</a></li>
                     <li><a href="{{url("knowledge-base/signatory-of-finance-secretary/")}}/">Finance Secretary</a></li>
                     <li><a href="{{url("knowledge-base/note-numbering-system/")}}/">Note Numbering</a></li>
                     <li><a href="{{url("knowledge-base/security-features-on-current-banknotes/")}}/">Security Features</a></li>
                     <li><a href="{{url("knowledge-base/security-features-on-demonetized-banknotes/")}}/">Security Features on Demonetized Banknotes</a></li>
                  </ul>
               </ul>
            </div>
            <div class="col-lg-9 col-md-12 mt-md-5 mt-0 mt-lg-0">
               <div class="knowledge-base-contetnt">

                  <h4 class="heading-2 pb-3 mb-4"><b>{{$governor}} : Notes</b></h4>
                  <div class="row">
                     @foreach($notes as $note)
                     <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="box1 governor">
                           <a href="{{url('note/detail/'.$note['id'])}}/">
                              <img src="{{getenv('NOTE_BASE_URL').$note['obverse_image']}}" class="img-fluid" alt="">
                              <div class="box-governor">{{$note['denomination_unit']}} {{$note['denomination']['title']}}</div>
                              <div class="year">1948</div>
                           </a>
                        </div>
                     </div>
                     @endforeach
                  </div>

               </div>
            </div>
         </div>
      </div>
   </section>
</main>