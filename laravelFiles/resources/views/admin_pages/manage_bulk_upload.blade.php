<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
  <div class="container-fluid">
     <div class="mb-3">
        <nav aria-label="breadcrumb">
           <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Category Management</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
           </ol>
        </nav>
     </div>
     <div class="d-flex justify-content-between">
        <h2 class="title heading-3">{{$title}} </h2> 
        <a type="button" class="btn btn-primary btn-sm align-self-baseline" href="#"><i class="fa fa-cloud-download-alt"></i> Download Dummy File</a>
     </div>
     <div class="row">
     <div class="col-md-12 mb-5">
        <h5>Please note below parameters to be followed while uploading datathrough bulk upload:</h5> 
         <ol class="mb-0">
         <li>Fields cannot be blank/empty. If field is kept as empty, then you will not be able to view data in Admin Edit/ Client side for uploaded record.</li>
         <li>For Period, Dynasty, Ruler: If value is not known, then specify or enter 'Unknown'. <br> <strong>Please note:</strong> if you enter 'NA', then new period/Dynasty/Ruler will be created with value 'NA'. If you enter or keep the same as blank, then you will not be able to view data for the same fields.</li>
         <li>For other Fields [Other than Period, Dynasty, Ruler]: if value is not known, then do not leep blank. replace the same with value as 'NA'. <br><strong>Please Note:</strong> If you enter or keep the same as blank, then you will not be able to view data for the same fields. <br>
         If you enter 'Unknown', then new entry will be made with value 'Unknown'.
         values in the 2 columns isLatestAddittion &amp; PostOnSite can either be 'True' or 'False'.</li>
         </ol> 
     </div>
       
         <div class="col-md-6 mb-3">
            <label class="d-block control-label">Select Product Type</label>
            <select name="product_type" class="form-control" required="required">
               <option value="">Select Product Type</option>
               <option value="1">Coin</option>
               <option value="2">Note</option>
               <option value="3">Stamp</option>
            </select>
         </div>
         <div class="col-md-6 mb-3">
            <label class="d-block control-label">Select Country</label>
            <select name="country" id="countrynew" required="" class="form-control">
               <option value="">Select Country</option>
            </select>
         </div>
         <div class="col-md-6 mb-3">
            <label class="d-block control-label">Upload File</label>
            <input name="" id="bulkupload" type="file" class="form-control">
         </div>
         <div class="col-md-12 mb-3">
            <button class="btn btn-sm btn-primary" type="submit">Upload Now</button>
         </div>
      
      </div>
    
  </div>
</div>