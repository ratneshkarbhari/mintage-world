
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/default-banner.jpg")}}" /></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2">
                        <a href="{{url("/")}}"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item me-2">Fairs and Exhibitions</li>                    
                </ol>
            </nav>
        </div>
    </section>    


    <section class="common-padding coing-list-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <div class="d-flex justify-content-between">
                <h2 class="mb-3 heading-1">Fairs and Exhibitions</h2>
            </div>
           <div class="row">

            @foreach($events as $event)

                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-3 d-flex align-items-stretch">                
                    <div class="festival-content">
                        <h3>{{$event["title"]}}</h3>
                        <div class="fest-content">
                            <p class="duration">
                                <i class="fas fa-calendar-alt"></i>
                                <span>{{$event["start"]}} - {{$event["end"]}}</span>
                            </p>
                            <p class="maps-festival">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{$event["address"]}}</span>
                            </p>
                            <p class="maps-festival">
                                <i class="fas fa-bullseye"></i>
                                <span>{{$event["description"]}}</span>
                            </p>
                        </div> 
                    </div>
                </div>   

            @endforeach
                
            </div> 
            <div class="pagination-container">

                <p>{{$pagination_info_string}}</p>
                {!! $events->links() !!}

            </div>

        </div>
    </section>
    
</main>