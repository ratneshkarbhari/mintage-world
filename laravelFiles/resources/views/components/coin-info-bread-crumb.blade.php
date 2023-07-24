@php
 
 $breadCrumbsData  = json_decode($breadCrumbsData,TRUE);


// if(isset($breadCrumbsData["country"])){
//     $country = $breadCrumbsData["country"];
// }elseif (isset($breadCrumbsData["period"])) {
//     $period = $breadCrumbsData["period"];
// }elseif ($breadCrumbsData["dynasty"]) {
//     $dynasty = $breadCrumbsData["dynasty"];
// }elseif ($breadCrumbsData["ruler"]) {
//     $ruler = $breadCrumbsData["ruler"];
// }elseif ($breadCrumbsData["coin"]) {
//     $coin = $breadCrumbsData["coin"];
// }

 print_r($breadCrumbsData);  
@endphp


<section class="breadcrumb-wraper">
    <div class="container-fluid px-lg-2 px-lg-5">
        <nav aria-label="breadcrumb" class="breadcrumb-title-box">
            <ol class="breadcrumb">
                <li class="breadcrumb-item me-2">
                    <a href="{{url("/")}}"><i class="fa fa-home"></i> Home</a>
                </li>


                
                @if(isset($country))
                <li class="breadcrumb-item me-2"><a href="{{url("coins")}}"> Coins </a></li>
                @else
                <li class="breadcrumb-item me-2">Coins</li>
                @endif

                @if(isset($country)&&isset($period))
                <li class="breadcrumb-item me-2"><a href="{{url("/")}}"> Coins </a></li>
                @elseif(isset($country))
                <li class="breadcrumb-item me-2">{{$country["name"]}}</li>
                @endif
                
                @if(isset($dynasty)&&isset($period))
                <li class="breadcrumb-item me-2"><a href="{{url("coin/".$period["id"])}}"> {{$period["name"]}} </a></li>
                @elseif(isset($period))
                <li class="breadcrumb-item me-2">{{$period["name"]}}</li>
                @endif
                
                @if(isset($ruler)&&isset($dynasty))
                <li class="breadcrumb-item me-2"><a href="{{url("coin/dynasty/".$dynasty["id"])}}"> {{$dynasty["name"]}} </a></li>
                @elseif(isset($dynasty))
                <li class="breadcrumb-item me-2">{{$dynasty["name"]}}</li>
                @endif

                @if(isset($coin)&&isset($ruler))
                <li class="breadcrumb-item me-2"><a href="{{url("coin/ruler/".$ruler["id"])}}"> {{$ruler["name"]}} </a></li>
                @elseif(isset($ruler))
                <li class="breadcrumb-item me-2">{{$ruler["name"]}}</li>
                @endif

                @if(isset($coin)&&isset($ruler))
                <li class="breadcrumb-item me-2"><a href="{{url("coin/list/".$ruler["id"])}}"> {{$ruler["name"]}} </a></li>
                @elseif(isset($coin))
                <li class="breadcrumb-item me-2">{{$coin["name"]}}</li>
                @endif

            </ol>
        </nav>
    </div>
</section> 
