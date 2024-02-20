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
        <form id="createNewCoinForm" action="{{ url('create-new-coin') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="control-label">Ruler</label>
                    <div class="">
                        <select name="ruler" class="form-control" required="required">
                            <option value="">Select Ruler</option>

                            @foreach($rulers as $ruler)
                            <option value="{{$ruler['id']}}">{{$ruler['title']}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Catalogue Ref. No.</label>
                    <div class=""><input type="text" name="catalogue_ref_no" class="form-control" id="catalogue_ref_no" placeholder="Enter Catalogue Ref No" value="" /></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Denomination</label>
                    <div class="">
                        <select name="denomination_title" class="form-control" required="required">
                            <option value="">Select Denomination</option>

                            @foreach($denominations as $denomination)
                            <option value="{{$denomination['id']}}">{{$denomination['title']}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Denomination Unit</label>
                    <div class=""><input type="text" name="denomination_unit" class="form-control" id="denomination_unit" placeholder="Enter Denomination Unit" value="" /></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Metal</label>
                    <div class="">
                        <select name="metal" class="form-control" required="required">
                            <option value="">Select Metal</option>
                            @foreach($metals as $metal)
                            <option value="{{$metal['id']}}">{{$metal['title']}}</option>
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
                            <option value="{{$shape['id']}}">{{$shape['title']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Weight</label>
                    <div class=""><input type="text" name="weight" class="form-control" id="weight" placeholder="Enter Weight" value="" /></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Size</label>
                    <div class=""><input type="text" name="size" class="form-control" id="size" placeholder="Enter Size" value="" /></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Rarity</label>
                    <div class="">
                        <select name="rarity" class="form-control" required="required">
                            <option value="">Select Rarity</option>

                            @foreach($rarities as $rarity)
                            <option value="{{$rarity['id']}}">{{$rarity['title']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="control-label">Type</label>
                    <div class=""><input type="text" name="type" class="form-control" id="type" placeholder="Enter Type" value="" /></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Calendar System</label>
                    <div class="">
                        <select name="calender_system" class="form-control" required="required">
                            <option value="">Select Calendar System</option>
                            @foreach($calendar_systems as $calendar_system)
                            <option value="{{$calendar_system['id']}}">{{$calendar_system['title']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Issued Year</label>
                    <div class=""><input type="text" name="issued_year" class="form-control" id="issued_year" placeholder="Enter Issued Year" value="" /></div>
                </div>



                <div class="col-md-6 mb-3">
                    <label class="control-label">Theme</label>
                    <div class=""><input type="text" name="theme" class="form-control" id="theme" placeholder="Enter Theme" value="" /></div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="control-label">RY</label>
                    <div class=""><input type="text" name="ry" class="form-control" id="ry" placeholder="Enter RY" value="" /></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Minting Technique</label>
                    <div class="">
                        <select name="minting_technique" class="form-control" required="required">
                            <option value="">Select Minting Technique</option>

                            @foreach($minting_techniques as $minting_technique)
                            <option value="{{$minting_technique['id']}}">{{$minting_technique['title']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Mint</label>
                    <div class=""><input type="text" name="mint" class="form-control" id="mint" placeholder="Enter Mint" value="" /></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Mintage</label>
                    <div class=""><input type="text" name="mintage" class="form-control" id="mintage" placeholder="Enter Mintage" value="" /></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">UIc No</label>
                    <div class=""><input type="text" name="ulc_no" class="form-control" id="ulc_no" placeholder="Enter Ulc No" value="" /></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Note</label>
                    <div class=""><input type="text" name="note" class="form-control" id="note" placeholder="Enter Note" value="" /></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Remarks</label>
                    <div class=""><input type="text" name="remark" class="form-control" id="remark" placeholder="Enter Remark" value="" /></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Coin Obverse Image</label>
                    <div class="">
                        <input name="obverse_image" accept="image/*" type="file" class="form-control" placeholder="upload image" />
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Obverse Description</label>
                    <div class=""><textarea name="obverse_desc" class="form-control" id="obverse_desc" required="required" placeholder="Enter Obverse Desc"></textarea></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Coin Reverse Image</label>
                    <div class="">
                        <input name="reverse_image" accept="image/*" type="file" class="form-control" placeholder="upload image" />
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Reverse Description</label>
                    <div class=""><textarea name="reverse_desc" class="form-control" id="reverse_desc" required="required" placeholder="Enter Reverse Desc"></textarea></div>
                </div>
                <div class="col-md-12 mb-5">
                    <button type="submit" name="submit" id="SubmitButton" class="btn btn-warning btn-sm" value="Submit">create new</button>
                </div>

            </div>

        </form>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="liveToast " class="toast hide bg-success text-white coin-create-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
            <small>Just Now</small>
        </div>
        <div class="toast-body">
            Coin Added Successfully
        </div>
        <div class='toast-timeline animate'></div>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="liveToast " class="toast hide bg-danger text-white coin-create-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Error</strong>
            <small>Just Now</small>
        </div>
        <div class="toast-body">
            Coin create failed
        </div>
        <div class='toast-timeline animate'></div>
    </div>
</div>

<script>
    
    $("form#createNewCoinForm").submit(function (e) { 
        e.preventDefault();
        let action = $(this).attr("action");
        let method = $(this).attr("method");
        let formData = new FormData(this);
        
        $.ajax({
            type: method,
            url: action,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {

                console.log(response);

                if (response.status=="success") {
                    $(this).get(0).reset();
                    $(".coin-create-success").toast("show");
                } else {
                    $(".coin-create-failure").toast("show");
                }
            }
        });
    });
    
</script>