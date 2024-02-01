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
      <div class="col-md-12 mb-3">
         <h5>Please note below parameters to be followed while uploading Images through bulk upload:</h5>          
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
             <label class="d-block control-label">Upload File</label>
             <input name="" id="bulkupload" type="file" class="form-control">
          </div>
          <div class="col-md-12 mb-3">
             <button class="btn btn-sm btn-primary" type="submit">Upload Now</button>
          </div>
       
       </div>
     
   </div>
 </div>