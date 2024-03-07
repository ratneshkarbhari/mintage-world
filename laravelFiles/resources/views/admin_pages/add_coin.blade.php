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
                    <label class="control-label">Select Note Status</label>
                    <div class="">
                        <select name="status" class="form-control">
                            <option value="">Set Note Status</option>
                            <option  value="0">Active</option>
                            <option  value="1">Disabled</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Catalogue Ref. No.</label>
                    <div class=""> <input type="text" name="catalogue_ref_no" class="form-control" id="catalogue_ref_no" ></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Dynasty</label>
                    <div class="">
                        <select name="dynasty_id" class="form-control" required="required">
                            <option value="">Select Dynasty</option>

                            @foreach($dynasties as $dynasty)
                            <option
                           
                            value="{{$dynasty['id']}}">{{$dynasty['title']}}</option>
                            
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Denomination</label>
                    <div class="">
                        <select name="denomination_id" class="form-control" required="required">
                            <option value="">Select Denomination</option>

                            @foreach($denominations as $denomination)
                            <option
                            
                            value="{{$denomination['id']}}">{{$denomination['title']}}</option>
                            
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Denomination Unit</label>
                    <div class=""><input type="text" name="denomination_unit" class="form-control" id="denomination_unit" placeholder="Enter Denomination Unit" /></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Shape</label>
                    <div class="">
                        <select name="shape_id" class="form-control" required="required">
                            <option value="">Select Shape</option>
                            @foreach($shapes as $shape)
                            <option
                            
                            value="{{$shape['id']}}">{{$shape['title']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Prefix</label>
                    <div class=""><input type="text" name="prefix" class="form-control" ></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Size</label>
                    <div class=""> <input type="text" name="size" class="form-control" ></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Color</label>
                    <div class="">
                        <input type="text" name="color" class="form-control" >
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Paper Type</label>
                    <div class="">
                        <input type="text" name="paper_type" class="form-control" >
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Rarity</label>
                    <div class="">
                        <select name="rarity_id" class="form-control" required="required">
                            <option value="">Select Rarity</option>

                            @foreach($rarities as $rarity)

                            <option
                            
                            value="{{$rarity['id']}}">{{$rarity['title']}}</option>

                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Currency Type</label>
                    <div class=""><input type="text" name="currency_type" class="form-control" ></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Inset</label>
                    <div class=""> <input type="text" name="inset" class="form-control" ></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Signatory</label>
                    <div class=""><input type="text" name="signatory" class="form-control" ></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Underprint</label>
                    <div class="">
                        <textarea name="underprint" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Vignette</label>
                    <div class="">
                        <textarea name="vignette" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Language Panel</label>
                    <div class="">
                        <textarea name="language_panel" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Theme</label>
                    <div class=""><input type="text" name="theme" class="form-control" ></div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="control-label">Issued Year</label>
                    <div class=""><input type="text" name="issued_year" class="form-control" ></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Watermark</label>
                    <div class="">
                        <textarea name="watermark" class="form-control"></textarea>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="control-label">Remarks</label>
                    <div class=""> <textarea name="remark" class="form-control"></textarea></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Note</label>
                    <div class="">
                        <textarea name="note" class="form-control"></textarea>
                    </div>
                </div>




                <div class="col-md-3 mb-3">
                    <label class="control-label">Current Note Obverse Image</label>
                    <div class="">
                        <img src="{{env('NOTE_BASE_URL').$note['obverse_image']}}" alt="" class="img-fluid" style="width:50px">
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="control-label">Upload New Note Obverse Image</label>
                    <div class="">
                        <input type="file" accept="image/*" class="form-control" name="obverse_image" placeholder="upload image">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Obverse Description</label>
                    <div class=""> <textarea name="obverse_desc" class="form-control"></textarea></div>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="control-label">Current Note Reverse Image</label>
                    <div class="">
                        <img src="{{env('NOTE_BASE_URL').$note['reverse_image']}}" alt="" class="img-fluid" style="width:50px">
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="control-label">Upload New Note Reverse Image</label>
                    <div class="">
                        <input type="file" name="reverse_image" accept="image/*" class="form-control" placeholder="upload image">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Reverse Description</label>
                    <div class="">
                        <textarea name="reverse_desc" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-md-12 mb-5">
                    <input type="submit" name="submit" id="SubmitButton" class="btn btn-warning btn-sm" value="Submit">
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

                if (response.result=="success") {
                    $(".coin-create-success").toast("show");
                } else {
                    $(".coin-create-failure").toast("show");
                }
            }
        });
    });
    
</script>