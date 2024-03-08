<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
    <div class="container-fluid">
        <div class="mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item">Information</li>
                    <li class="breadcrumb-item"><a href="manage-stamps">Manage Stamps</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex justify-content-between">
            <h2 class="title heading-3">{{$title}}</h2>
            <a type="button" class="btn btn-primary btn-sm align-self-baseline" href="manage-Stamps"><i class="fa fa-plus"></i> Go Back</a>
        </div>
        <form action="{{url('update-stamp-exe')}}" id="editStampForm" enctype="multipart/form-data" method="post">
            @csrf
            <input type="hidden" name="id" class="form-control"  value="{{$stamp['id']}}">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="control-label">Stamp Name</label>
                    <div class=""><input type="text" name="stamp_name" class="form-control" id="stamp_name" value="{{$stamp['stamp_name']}}"></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Catalogue Ref. No.</label>
                    <div class="">
                        <input type="text" name="catalogue_ref_no" class="form-control" id="catalogue_ref_no" value="{{$stamp['catalogue_ref_no']}}">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Dynasty</label>
                    <div class="">

                        <select name="dynasty" class="form-control">
                            <option value="">Select Dynasty</option>
                            @foreach($dynasties as  $dynasty)
                            <option
                            @if($stamp['dynasty_id']==$dynasty['id'])
                            selected
                            @endif
                            value="{{$dynasty['id']}}">{{$dynasty['title']}}</option>
                            @endforeach
                        </select>

                    
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Shape</label>
                    <div class="">

                        <select name="shape" class="form-control">
                            <option value="">Select Shape</option>
                            @foreach($shapes as  $shape)
                            <option
                            @if($stamp['shape_id']==$shape['id'])
                            selected
                            @endif
                            value="{{$shape['id']}}">{{$shape['title']}}</option>
                            @endforeach
                        </select>

                    
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Rarity</label>
                    <div class="">

                        <select name="rarity" class="form-control">
                            <option value="">Select Rarity</option>
                            @foreach($rarities as  $rarity)
                            <option
                            @if($stamp['rarity_id']==$rarity['id'])
                            selected
                            @endif
                            value="{{$rarity['id']}}">{{$rarity['title']}}</option>
                            @endforeach
                        </select>

                    
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Stamp Issue Date</label>
                    <div class="">
                        <input type="text" name="issued_date" class="form-control" id="issued_date" value="{{$stamp['issued_date']}}">
                    </div>

                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Quantity Issued</label>
                    <div class="">
                        <input type="text" name="quantity_issued" class="form-control" id="quantity_issued" value="{{$stamp['quantity_issued']}}">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Face Value</label>
                    <div class="">
                        <input type="text" name="face_value" class="form-control" id="face_value" value="{{$stamp['face_value']}}">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Perforation</label>
                    <div class=""> <input type="text" name="perforation" class="form-control" value="{{$stamp['perforation']}}"></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Type</label>
                    <div class=""> <input type="text" name="type" class="form-control" value="{{$stamp['type']}}"></div>
                </div>
                
                
                <div class="col-md-6 mb-3">
                    <label class="control-label">Stamp Color</label>
                    <div class="">
                        <input type="text" name="color" class="form-control" value="{{$stamp['color']}}">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Theme Category</label>
                    <div class="">

                        <select name="theme" class="form-control">
                            <option value="">Select Theme Category</option>
                            @foreach($themeCategories as  $themeCategory)
                            <option
                            @if($stamp['theme_category_id']==$themeCategory['id'])
                            selected
                            @endif
                            value="{{$themeCategory['id']}}">{{$themeCategory['title']}}</option>
                            @endforeach
                        </select>

                    
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Stamp Printed At</label>
                    <div class="">
                        <input type="text" name="printed_at" class="form-control" id="printed_at" value="{{$stamp['printed_at']}}">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Printing Process</label>
                    <div class=""><input type="text" name="printing_process" class="form-control" id="printing_process" value="{{$stamp['printing_process']}}"></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Stamp FDC Design</label>
                    <div class=""><textarea name="stamp_fdc_design" class="form-control">{{$stamp['stamp_fdc_design']}}</textarea></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Cancellation Design</label>
                    <div class="">
                        <textarea name="cancellation_design" class="form-control">{{$stamp['cancellation_design']}}</textarea>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Description</label>
                    <div class="">
                        <textarea name="description" class="form-control">{{$stamp['description']}}</textarea>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Watermark</label>
                    <div class="">
                        <input type="text" name="watermark" class="form-control" value="{{$stamp['watermark']}}">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Remark</label>
                    <div class="">
                        <textarea name="remark" class="form-control">{{$stamp['remark']}}</textarea>
                    </div>
                </div>

                <img src="{{getenv('STAMP_IMAGE_BASE_URL').$stamp['obverse_image']}}" style="width: 50px; height: 50px;">

                <div class="col-md-6 mb-3">
                    <label class="control-label">Upload Stamp Obverse Image</label>
                    <div class="">
                        <input type="file" name="obverse_image" class="form-control" placeholder="upload image">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="control-label">Obverse Description</label>
                    <div class="">
                        <textarea name="obverse_desc" class="form-control">{{$stamp['obverse_desc']}}</textarea>
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
    <div id="liveToast " class="toast hide bg-success text-white update-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
            <small>Just Now</small>
        </div>
        <div class="toast-body">
            Updated Successfully
        </div>
        <div class='toast-timeline animate'></div>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="liveToast " class="toast hide bg-danger text-white update-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
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
    $("form#editStampForm").submit(function (e) { 
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
                if(response.result=="success"){
                    $(".update-success").toast("show");
                }else{
                    $(".update-failure").toast("show");
                }
            }
        });
    });
</script>