<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
    <div class="container-fluid">
       <div class="mb-3">
          <nav aria-label="breadcrumb">
             <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard">Home</a></li> 
              <li class="breadcrumb-item"><a href="manage-categories">Manage Categories</a></li> 
              <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
             </ol>
          </nav>
       </div>
       <div class="d-flex justify-content-between">
        <h2 class="title heading-3">{{$title}} </h2>      
     </div> 
     <div class="col-md-12 event-table mt-3">
      <div class="row">
          <div class="col-md-12 mb-3">
              <label >Product Category Name</label> 
              <input name="cat_name" id="cat_name" type="text" class="form-control" placeholder="Please Enter Product Category" required="required" value=""> 
          </div>
          <div class="col-md-12 mb-3">
              <label >Footer Description</label> 
              <div id="editor"></div>
          </div>
          <div class="col-md-6 mb-3">
              <label >Meta Title</label> 
              <input name="meta_title" id="meta_title" type="text" class="form-control" placeholder="Please Enter Product Meta Title" value="">
          </div>
          <div class="col-md-6 mb-3">
              <label >Meta Keywords</label> 
              <textarea name="meta_keywords" id="meta_keywords" tabindex="2" class="form-control" placeholder="Enter Meta Keywords"></textarea>
          </div>
          <div class="col-md-12 mb-3">
              <label >Meta Description</label> 
              <textarea name="meta_content" id="meta_content" tabindex="2" class="form-control" placeholder="Enter Meta Description"></textarea>
          </div>
          <div class="col-md-6 mb-3">
              <label >Custom URL</label> 
              <input name="custom_url" id="custom_url" type="text" class="form-control" placeholder="Please Enter Custom URL" value="">
          </div>
          <div class="col-md-3 mb-3">
              <label class="w-100 mb-2">Status</label> 
              <label class="switch switch-success" for="chk1">
                  <input type="checkbox" checked id="chk1">
                  <span class="slider round"></span> 
              </label> 
               
          </div>
          <div class="col-md-12 mb-3">
              <label class="d-md-block d-none">&nbsp;</label> 
              <button class="btn-primary btn btn-sm" id="SubmitButton">Submit</button>
          </div>
  
  
      </div>
        
        
          
  </div>   
    </div>
  </div>

  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="liveToast " class="toast hide bg-success text-white update-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
            <small>Just Now</small>
            {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
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
            {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
        </div>
        <div class="toast-body">
          Something went wrong. Please contact to Administration
        </div>
        <div class='toast-timeline animate'></div>
    </div>
 </div>
 
 <script>
     $("#SubmitButton").click(function(e) {
      $('.update-success').toast('show'); 
     }); 
     $("#EditButton").click(function(e) {
      $('.update-success').toast('show');
      $('#EditDynasty').modal('hide');
      $('#AddDynasty').modal('hide');
     }); 
 
 </script>