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


                
                @if($breadCrumbsData["notes"])
                <li class="breadcrumb-item me-2"><a href="{{url("notes")}}"> Notes </a></li>
                @else
                <li class="breadcrumb-item me-2">Notes</li>
                @endif

                @if(isset($breadCrumbsData["country"])&&isset($breadCrumbsData["period"]))
                <li class="breadcrumb-item me-2"><a href="{{url('note/'.$breadCrumbsData["country"]["id"]."-".strtolower($breadCrumbsData["country"]["name"]))}}"> {{$breadCrumbsData["country"]["name"]}} </a></li>
                @elseif(isset($breadCrumbsData["country"]))
                <li class="breadcrumb-item me-2">{{$breadCrumbsData["country"]["name"]}}</li>
                @endif
                
                @if(isset($breadCrumbsData["period"])&&isset($breadCrumbsData["dynasty"]))
                <li class="breadcrumb-item me-2"><a href="{{url("note/dynasty/".$breadCrumbsData["period"]["id"])}}"> {{$breadCrumbsData["period"]["name"]}} </a></li>
                @elseif(isset($breadCrumbsData["period"]))
                <li class="breadcrumb-item me-2">{{$breadCrumbsData["period"]["name"]}}</li>
                @endif
                
                @if(isset($breadCrumbsData["denomination"])&&isset($breadCrumbsData["dynasty"]))
                <li class="breadcrumb-item me-2"><a href="{{url("note/note/"    .$breadCrumbsData["dynasty"]["id"])}}"> {{$breadCrumbsData["dynasty"]["name"]}} </a></li>
                @elseif(isset($breadCrumbsData["dynasty"]))
                <li class="breadcrumb-item me-2">{{$breadCrumbsData["dynasty"]["name"]}}</li>
                @endif

                @if(isset($breadCrumbsData["denomination"])&&isset($breadCrumbsData["note"]))
                <li class="breadcrumb-item me-2"><a href="{{url("note/list/".$breadCrumbsData["denomination"]["id"])}}"> {{$breadCrumbsData["denomination"]["unit"]. " " .$breadCrumbsData["denomination"]["name"]}} </a></li>
                @elseif(isset($breadCrumbsData["denomination"]))
                <li class="breadcrumb-item me-2"> {{$breadCrumbsData["denomination"]["unit"]. " " .$breadCrumbsData["denomination"]["name"]}} </li>
                @endif

                @if(isset($breadCrumbsData["note"]))
                <li class="breadcrumb-item me-2"> {{$breadCrumbsData["note"]["name"]}} </li>
                @endif

            </ol>
        </nav>
    </div>
</section> 
