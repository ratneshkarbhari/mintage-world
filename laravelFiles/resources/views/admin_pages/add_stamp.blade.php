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
           <a type="button" class="btn btn-primary btn-sm align-self-baseline" href="manage-stamps"><i class="fa fa-plus"></i> Go Back</a>
       </div>
       <div class="row">  
           <div class="col-md-6 mb-3">
            <label class="control-label">Stamp Name</label> 
            <div class=""><input type="text" name="stamp_name" class="form-control" id="stamp_name" value=""></div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Catalogue Ref. No.</label> 
                <div class=""> 
                 <input type="text" name="catalogue_ref_no" class="form-control" id="catalogue_ref_no" value="">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Stamp Issue Date</label> 
                <div class=""> 
                    <input type="text" name="issued_date" class="form-control" id="issued_date" value="">
                </div>
               
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Quantity Issued</label> 
                <div class=""> 
                    <input type="text" name="quantity_issued" class="form-control" id="quantity_issued" value="">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Face Value</label> 
                <div class=""> 
                    <input type="text" name="face_value" class="form-control" id="face_value" value="">
                </div>
                </div>
            <div class="col-md-6 mb-3">
           <label class="control-label">Perforation</label> 
           <div class=""> <input type="text" name="perforation" class="form-control" value=""></div>
           </div>                 
           <div class="col-md-6 mb-3">
            <label class="control-label">Type</label> 
            <div class=""> <input type="text" name="type" class="form-control" value=""></div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Theme</label> 
                <div class=""> 
                 <input type="text" name="theme" class="form-control" value="">
                </div>
            </div>
           <div class="col-md-6 mb-3">
           <label class="control-label">Shape</label>
           <div class=""><input type="text" name="shape_title" class="form-control" value=""></div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Stamp Color</label> 
                <div class="">
                 <input type="text" name="color" class="form-control" value="">
                </div>
            </div>
          
            <div class="col-md-6 mb-3">
                <label class="control-label">Stamp Printed At</label> 
                <div class=""> 
                    <input type="text" name="printed_at" class="form-control" id="printed_at" value="">
                </div>
            </div>
           <div class="col-md-6 mb-3">
           <label class="control-label">Printing Process</label> 
           <div class=""><input type="text" name="printing_process" class="form-control" id="printing_process" value=""></div>
           </div>   
           <div class="col-md-6 mb-3">
            <label class="control-label">Stamp FDC Design</label> 
            <div class=""><textarea name="stamp_fdc_design" class="form-control"></textarea></div>
            </div>
            <div class="col-md-6 mb-3">
                <label class="control-label">Cancellation Design</label> 
                <div class="">
                    <textarea name="cancellation_design" class="form-control"></textarea>
                </div>
                </div>            
           <div class="col-md-6 mb-3">
               <label class="control-label">Description</label> 
               <div class="">
                <textarea name="description" class="form-control"></textarea>
            </div>
           </div>    
           <div class="col-md-6 mb-3">
            <label class="control-label">Watermark</label> 
            <div class=""> 
               <input type="text" name="watermark" class="form-control" value="">
            </div>
            </div> 
            <div class="col-md-6 mb-3">
            <label class="control-label">Remark</label>
            <div class="">
                <textarea name="remark" class="form-control"></textarea>
            </div>
             </div>             
                   
                 
           <div class="col-md-6 mb-3">
           <label class="control-label">Upload Stamp Obverse Image</label> 
           <div class="">
               <input type="file" class="form-control" placeholder="upload image">                 
           </div>
           </div>
           <div class="col-md-6 mb-3">
               <label class="control-label">Obverse Description</label> 
                <div class=""> 
                    <textarea name="obverse_desc" class="form-control"></textarea>
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