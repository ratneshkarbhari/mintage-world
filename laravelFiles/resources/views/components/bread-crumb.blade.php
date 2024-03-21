<section class="breadcrumb-wraper">
    <div class="container-fluid px-lg-2 px-lg-5">
        <nav aria-label="breadcrumb" class="breadcrumb-title-box">
            <ol class="breadcrumb">

                

                <li class="breadcrumb-item me-2">
                    <a href="{{url('/')}}/"><i class="fa fa-home"></i> Home</a>
                </li>
                
                @foreach ($breadCrumbData as $breadCrumbItem)
                
                    <li class="breadcrumb-item me-2">
                        @if(isset($breadCrumbItem["slug"]))
                        <a href="{{ url($breadCrumbItem['slug']) }}">
                            {{$breadCrumbItem["label"]}} 
                        </a>
                        @else
                        {{$breadCrumbItem["label"]}}
                        @endif
                    </li>

                @endforeach

                
            </ol>
        </nav>
    </div>
</section>