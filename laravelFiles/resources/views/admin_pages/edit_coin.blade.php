<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
    <div class="container-fluid">
        <div class="mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item">Information</li>
                    <li class="breadcrumb-item"><a href="manage-coins">Manage Coins</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex justify-content-between">
            <h2 class="title heading-3">{{$title}}</h2>
            <a type="button" class="btn btn-primary btn-sm align-self-baseline" href="manage-coins"><i class="fa fa-plus"></i> Go Back</a>
        </div>
        <form id="editCoinForm" action="{{ url('update-coin-exe') }}" enctype="multipart/form-data" method="post">
            @csrf
            <input type="hidden" name="coinid" value="{{$coin['id']}}">
            <div class="row">
                

                <div class="col-md-6 mb-3">
                    <label class="control-label">Ruler</label>
                    <div class="">
                        <select name="ruler" class="form-control" required="required">
                            <option value="">Select Ruler</option>
                            @foreach($rulers as $ruler)
                            <option
                            @if($coin["ruler_id"]==$ruler['id'])
                            selected
                            @endif
                            value="{{$ruler['id']}}">{{$ruler['title']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Catalogue Ref. No.</label>
                    <div class=""> <input type="text" name="catalogue_ref_no" class="form-control" id="catalogue_ref_no" value="{{$coin['catalogue_ref_no']}}"></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Denomination</label>
                    <div class="">
                        <select name="denomination_title" class="form-control" required="required">
                            <option value="">Select Denomination</option>

                            @foreach($denominations as $denomination)
                            <option
                            @if($coin['denomination_id']==$denomination['id'])
                            selected
                            @endif
                            value="{{$denomination['id']}}">{{$denomination['title']}}</option>
                            
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Denomination Unit</label>
                    <div class=""><input type="text" name="denomination_unit" class="form-control" id="denomination_unit" placeholder="Enter Denomination Unit" value="{{$coin['denomination_unit']}}" /></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Shape</label>
                    <div class="">
                        <select name="metal" class="form-control" required="required">
                            <option value="">Select Shape</option>
                            @foreach($shapes as $shape)
                            <option
                            @if($coin['shape_id']==$shape['id'])
                            selected
                            @endif
                            value="{{$shape['id']}}">{{$shape['title']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="control-label">Shape</label>
                    <div class="">
                        <select name="shape" class="form-control" required="required">
                            <option value="">Select Shape</option>
                            @foreach($shapes as $shape)
                            <option
                            @if($coin['shape_id']==$shape['id'])
                            selected
                            @endif
                            value="{{$shape['id']}}">{{$shape['title']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Weight</label>
                    <div class=""> <input type="text" name="weight" class="form-control" value="{{$coin['weight']}}"></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Size</label>
                    <div class=""> <input type="text" name="size" class="form-control" value="{{$coin['size']}}"></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Rarity</label>
                    <div class="">
                        <select name="rarity" class="form-control" required="required">
                            <option value="">Select Rarity</option>

                            @foreach($rarities as $rarity)

                            <option
                            @if($rarity['id']==$coin['rarity_id'])
                            selected
                            @endif
                            value="{{$rarity['id']}}">{{$rarity['title']}}</option>

                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Type</label>
                    <div class=""> <input type="text" name="type" class="form-control" value="{{$coin['type']}}"></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Calendar System</label>
                    <div class=""> 

                    <select name="calender_system" class="form-control">
                        @foreach($calendar_systems as $calendarSystem)

                        <option value="{{$calendarSystem['id']}}">{{$calendarSystem['title']}}</option>

                        @endforeach
                    </select>
                    
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Issued Year</label>
                    <div class=""> <input type="text" name="issued_year" class="form-control" value="{{$coin['issued_year']}}"></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Theme</label>
                    <div class=""> <input type="text" name="theme" class="form-control" value="{{$coin['theme']}}"></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">RY</label>
                    <div class=""> <input type="text" name="ry" class="form-control" value="{{$coin['ry']}}"></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Minting Technique</label>
                    <div class="">
                        <select name="minting_technique" class="form-control" required="required">
                            <option value="">Select Minting Technique</option>

                            @foreach($minting_techniques as $mintingTechnique)
                            <option 
                            @if($mintingTechnique['id']==$coin['minting_technique_id'])
                            selected
                            @endif
                            value="{{$mintingTechnique['id']}}">{{$mintingTechnique['title']}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Mint</label>
                    <div class=""> <input type="text" name="mint" class="form-control" value="{{$coin['mint']}}"></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Mintage</label>
                    <div class=""> <input type="text" name="mintage" class="form-control" value="{{$coin['mintage']}}"></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">UIc No</label>
                    <div class=""><input type="text" name="ulc_no" class="form-control" id="ulc_no" placeholder="Enter Ulc No" value="{{$coin['ulc_no']}}"></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Note</label>
                    <div class=""> <input type="text" name="note" class="form-control" value="{{$coin['note']}}"></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Remarks</label>
                    <div class=""> <input type="text" name="remark" class="form-control" value="{{$coin['remark']}}"></div>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="control-label">Current Coin Obverse Image</label>
                    <div class="">
                        <img src="{{getenv('COIN_IMAGE_BASE_URL').$coin['obverse_image']}}" alt="" class="img-fluid" style="width:50px">
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="control-label">Upload New Coin Obverse Image</label>
                    <div class="">
                        <input type="file" class="form-control" placeholder="upload image">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Obverse Description</label>
                    <div class=""> <textarea name="obverse_desc" class="form-control">{{$coin['reverse_desc']}}</textarea></div>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="control-label">Current Coin Reverse Image</label>
                    <div class="">
                        <img src="{{getenv('COIN_IMAGE_BASE_URL').$coin['reverse_image']}}" alt="" class="img-fluid" style="width:50px">
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="control-label">Upload New Coin Reverse Image</label>
                    <div class="">
                        <input type="file" class="form-control" placeholder="upload image">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Reverse Description</label>
                    <div class=""> <textarea name="reverse_desc" class="form-control">{{$coin['reverse_desc']}}</textarea></div>
                </div>
                <div class="col-md-12 mb-5">
                    <input type="submit" name="submit" id="SubmitButton" class="btn btn-warning btn-sm" value="Update">
                </div>
            </div>

        </form>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="liveToast " class="toast hide bg-success text-white edit-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
            <small>Just Now</small>
        </div>
        <div class="toast-body">
            Coin updated Successfully
        </div>
        <div class='toast-timeline animate'></div>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="liveToast " class="toast hide bg-danger text-white edit-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Error</strong>
            <small>Just Now</small>
        </div>
        <div class="toast-body">
            Something went wrong. Please contact to Administration
        </div>
        <div class='toast-timeline animate'></div>
    </div>
</div>

<script>
    $("form#editCoinForm").submit(function (e) { 
        e.preventDefault();
        let action = $(this).attr("action");
        let method = $(this).attr("method");
        let formData = $(this).serialize();
        $.ajax({
            type: method,
            url: action,
            data: formData,
            success: function (response) {
                if(response.result=="success"){
                    $(".edit-success").toast("show");
                    $(this).get(0).reset();
                }else{
                    $(".edit-failure").toast("show");
                }
            }
        });
    });
</script>