@php

    //echo $breadCrumbsData;
    $breadCrumbsData = json_decode($breadCrumbsData,TRUE);
    
@endphp


<section class="breadcrumb-wraper">
    <div class="container-fluid px-lg-2 px-lg-5">
        <nav aria-label="breadcrumb" class="breadcrumb-title-box">
            <ol class="breadcrumb">
                <li class="breadcrumb-item me-2">
                    <a href="{{url("/")}}"><i class="fa fa-home"></i> Home</a>
                </li>


                
                @if($breadCrumbsData["coins"])
                <li class="breadcrumb-item me-2"><a href="{{url("coins")}}"> Coins </a></li>
                @else
                <li class="breadcrumb-item me-2">Coins</li>
                @endif

                @if(isset($breadCrumbsData["country"])&&isset($breadCrumbsData["period"]))
                <li class="breadcrumb-item me-2"><a href="{{url('coin/'.$breadCrumbsData["country"]["id"]."-".strtolower($breadCrumbsData["country"]["name"]))}}"> {{$breadCrumbsData["country"]["name"]}} </a></li>
                @elseif(isset($breadCrumbsData["country"]))
                <li class="breadcrumb-item me-2">{{$breadCrumbsData["country"]["name"]}}</li>
                @endif
                
                @if(isset($breadCrumbsData["period"])&&isset($breadCrumbsData["dynasty"]))
                <li class="breadcrumb-item me-2"><a href="{{url("coin/dynasty/".$breadCrumbsData["period"]["id"])}}"> {{$breadCrumbsData["period"]["name"]}} </a></li>
                @elseif(isset($breadCrumbsData["period"]))
                <li class="breadcrumb-item me-2">{{$breadCrumbsData["period"]["name"]}}</li>
                @endif
                
                @if(isset($breadCrumbsData["ruler"])&&isset($breadCrumbsData["dynasty"]))
                <li class="breadcrumb-item me-2"><a href="{{url("coin/ruler/".$breadCrumbsData["dynasty"]["id"])}}"> {{$breadCrumbsData["dynasty"]["name"]}} </a></li>
                @elseif(isset($breadCrumbsData["dynasty"]))
                <li class="breadcrumb-item me-2">{{$breadCrumbsData["dynasty"]["name"]}}</li>
                @endif

                @if(isset($breadCrumbsData["ruler"])&&isset($breadCrumbsData["coin"]))
                <li class="breadcrumb-item me-2"><a href="{{url("coin/list/".$breadCrumbsData["ruler"]["id"])}}"> {{$breadCrumbsData["ruler"]["name"]}} </a></li>
                @elseif(isset($breadCrumbsData["ruler"]))
                <li class="breadcrumb-item me-2"> {{$breadCrumbsData["ruler"]["name"]}} </li>
                @endif

                @if(isset($breadCrumbsData["coin"]))
                <li class="breadcrumb-item me-2"> {{$breadCrumbsData["coin"]["name"]}} </li>
                @endif

            </ol>
        </nav>
    </div>
</section> 
