<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
    <div class="container-fluid">
        <div class="mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item">Information</li>
                    <li class="breadcrumb-item"><a href="manage-notes">Manage Notes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex justify-content-between">
            <h2 class="title heading-3">{{$title}}</h2>
            <a type="button" class="btn btn-primary btn-sm align-self-baseline" href="manage-notes"><i class="fa fa-arrow-left"></i> Go Back</a>
        </div>
        <form action="{{ url('update-note') }}" method="post"></form>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="control-label">ID</label>
                <div class="">
                    <input type="text" name="id" class="form-control" disabled="disabled" value="1571">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Catalogue Ref. No.</label>
                <div class=""> <input type="text" name="catalogue_ref_no" class="form-control" id="catalogue_ref_no" value="1-1"></div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Denomination</label>
                <div class="">
                    <input type="text" name="denomination_title" class="form-control" id="denomination_title" value=" Rupee">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Denomination Unit</label>
                <div class=""><input type="text" name="denomination_unit" class="form-control" value="1"></div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Shape</label>
                <div class="">
                    <input type="text" name="shape_title" class="form-control" value="Rectangular">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Prefix</label>
                <div class=""><input type="text" name="prefix" class="form-control" value="A - B - C-46"></div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Size</label>
                <div class=""> <input type="text" name="size" class="form-control" value="10.1 X 6.3"></div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Color</label>
                <div class="">
                    <input type="text" name="color" class="form-control" value="Grey Green">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Paper Type</label>
                <div class="">
                    <input type="text" name="paper_type" class="form-control" value="NA">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Rarity</label>
                <div class="">
                    <input type="text" name="rarity_title" class="form-control" value="NA">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Currency Type</label>
                <div class=""><input type="text" name="currency_type" class="form-control" value=""></div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Inset</label>
                <div class=""> <input type="text" name="inset" class="form-control" value="w/o"></div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Signatory</label>
                <div class=""><input type="text" name="signatory" class="form-control" value="K R K Menon "></div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Underprint</label>
                <div class="">
                    <textarea name="underprint" class="form-control">Relief underprint of 1 One Rupee 1 beneath serial number.</textarea>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Vignette</label>
                <div class="">
                    <textarea name="vignette" class="form-control">Ashokan Pillar Capital</textarea>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Language Panel</label>
                <div class="">
                    <textarea name="language_panel" class="form-control">8 Languages Urdu, Hindi, Bangla, Telugu, Tamil, Kannada, Gujarati, Oriya</textarea>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Theme</label>
                <div class=""><input type="text" name="theme" class="form-control" value="NA"></div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Calendar System</label>
                <div class=""> <input type="text" name="calender_system_title" class="form-control" value="Anno Hijri (AH)"></div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Issued Year</label>
                <div class=""><input type="text" name="issued_year" class="form-control" value="1949(not appear)"></div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Watermark</label>
                <div class="">
                    <textarea name="watermark" class="form-control">Ashokan Pillar (The National Emblem) on the left</textarea>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label class="control-label">Remarks</label>
                <div class=""> <textarea name="remark" class="form-control">NA</textarea></div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Note</label>
                <div class="">
                    <textarea name="note" class="form-control">NA</textarea>
                </div>
            </div>




            <div class="col-md-3 mb-3">
                <label class="control-label">Current Note Obverse Image</label>
                <div class="">
                    <img src="https://mintage2.s3.amazonaws.com/note/list/A-1-f.jpg" alt="" class="img-fluid" style="width:50px">
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label class="control-label">Upload New Note Obverse Image</label>
                <div class="">
                    <input type="file" class="form-control" placeholder="upload image">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Obverse Description</label>
                <div class=""> <textarea name="obverse_desc" class="form-control">Government/Of India' in the centre; Signed by 'Secretary, Ministry of Finance'; 'One/Rupee/1' in the central denomination panel; '1' in the top corners; Ashoka Pillar on the top left; Serial number; No promise text.</textarea></div>
            </div>
            <div class="col-md-3 mb-3">
                <label class="control-label">Current Note Reverse Image</label>
                <div class="">
                    <img src="https://mintage2.s3.amazonaws.com/note/list/A-1-b.jpg" alt="" class="img-fluid" style="width:50px">
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label class="control-label">Upload New Note Reverse Image</label>
                <div class="">
                    <input type="file" class="form-control" placeholder="upload image">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Reverse Description</label>
                <div class="">
                    <textarea name="reverse_desc" class="form-control">Government/Of India' in the centre; '1/One/Rupee' on the lower left; Language panel in the centre; '1' in the top corners.</textarea>
                </div>
            </div>
            <div class="col-md-12 mb-5">
                <input type="submit" name="submit" id="SubmitButton" class="btn btn-warning btn-sm" value="Submit">
            </div>
        </div>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="liveToast " class="toast hide bg-success text-white update-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
            <small>Just Now</small>
        </div>
        <div class="toast-body">
            Saved Successfully
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
    $("#SubmitButton,#EditButton").click(function(e) {
        $('.update-success').toast('show');
    });
</script>