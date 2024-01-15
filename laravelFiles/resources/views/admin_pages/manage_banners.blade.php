<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
  <div class="container-fluid">
     <div class="mb-3">
        <nav aria-label="breadcrumb">
           <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Content Management</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
           </ol>
        </nav>
     </div>
     <div class="d-flex justify-content-between">
        <h2 class="title heading-3">{{$title}} </h2> 
        <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#AddBanner"><i class="fa fa-plus"></i> Add Banner</button>
     </div>
     <div class="col-md-12 admin-card mt-3">
      <div class="table-responsive">
         <table id="example" class="table table-striped table-bordered DataTable " style="width:100%">
             <thead>
                 <tr>
                     <th>Sr. No.</th>                       
                     <th>Title</th>
                     <th>Image</th> 
                     <th>Order</th> 
                     <th>Status</th> 
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
               <tr>
                  <td>1</td>
                  <td>Genuine lighthouse germany numismatics coins, philately & banknotes accessories</td>
                  <td><img src="https://www.mintageworld.com/img/light-house-banner.jpg" alt="" class="img-fluid" style="width:100px"></td>
                  <td>1</td>
                  <td>  
                     <label class="switch switch-success" for="chk1">
                        <input type="checkbox" checked="" id="chk1">
                        <span class="slider round"></span> 
                     </label> 
                  </td>
                  <td>
                     <button class="btn btn-secondary btn-sm" title="Edit Banner" data-bs-toggle="modal" data-bs-target="#EditBanner" title="Edit"><i class="fa fa-edit"></i></button>
                     <button class="btn btn-danger btn-sm" title="Delete Banner" id="Delete_Banner"><i class="fa fa-trash"></i></button>
                  </td>
               </tr>
             </tbody> 
         </table>
     </div>

     </div>
    
  </div>
</div>


<div class="modal fade" id="AddBanner" tabindex="-1" aria-labelledby="AddBannerLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="AddBannerLabel">Add Banner</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body"> 
         <div class="row">
               <div class="col-md-12 mb-3">
                  <label class="control-label">Title</label> 
                  <div class=""> <input type="text" name="title" class="form-control" id="title"  value=""> </div>
               </div>
               <div class="col-md-12 mb-3">
                  <label class="control-label">Alt</label> 
                  <div class=""> <input type="text" name="title" class="form-control" id="title"  value=""> </div>
               </div>
               <div class="col-md-2 mb-3">
                  <label class="control-label">Order</label> 
                  <div class=""> <input type="text" name="title" class="form-control" id="title"  value=""> </div>
               </div>
               <div class="col-md-10 mb-3">
                  <label class="control-label">Link</label> 
                  <div class=""> <input type="text" name="title" class="form-control" id="title"  value=""> </div>
               </div> 
               <div class="col-md-6 mb-3">
                  <label class="control-label">Upload Image</label> 
                  <div class=""><input type="file" class="form-control" placeholder="upload image"></div>
               </div>
               
               <div class="col-md-12">                  
                  <input type="submit" name="submit" id="AddButton" class="btn btn-warning btn-sm" value="Submit">
               </div>
         </div>
       </div>      
     </div>
   </div>
 </div>


<div class="modal fade" id="EditBanner" tabindex="-1" aria-labelledby="EditBannerLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="EditBannerLabel">Edit Banner</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body"> 
         <div class="row">
               <div class="col-md-12 mb-3">
                  <label class="control-label">Title</label> 
                  <div class=""> <input type="text" name="title" class="form-control" id="title"  value="Genuine lighthouse germany numismatics coins, philately & banknotes accessories"> </div>
               </div>
               <div class="col-md-12 mb-3">
                  <label class="control-label">Alt</label> 
                  <div class=""> <input type="text" name="title" class="form-control" id="title"  value="Genuine lighthouse germany numismatics coins, philately & banknotes accessories"> </div>
               </div>
               <div class="col-md-2 mb-3">
                  <label class="control-label">Order</label> 
                  <div class=""> <input type="text" name="title" class="form-control" id="title"  value="1"> </div>
               </div>
               <div class="col-md-10 mb-3">
                  <label class="control-label">Link</label> 
                  <div class=""> <input type="text" name="title" class="form-control" id="title"  value="https://www.mintageworld.com/view-product/3288-global-collectibles-of-mahatma-gandhi-through-banknotes-coins-stamps-hardcover-book/"> </div>
               </div>
               <div class="col-md-6 mb-3">
                  <label class="control-label">Current Image</label> 
                  <div class=""> <img src="https://www.mintageworld.com/img/light-house-banner.jpg" alt="" class="img-fluid" style="width:300px"></div>
               </div>
               <div class="col-md-6 mb-3">
                  <label class="control-label">Upload New Image</label> 
                  <div class=""><input type="file" class="form-control" placeholder="upload image"></div>
               </div>
               
               <div class="col-md-12">                  
                  <input type="submit" name="submit" id="EditButton" class="btn btn-warning btn-sm" value="Submit">
               </div>
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
   <div id="liveToast " class="toast hide bg-danger text-white delete-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
       <div class="toast-header bg-danger text-white">
           <strong class="me-auto"><i class="fas fa-check-circle"></i> Delete Banner</strong>
           <small>Just Now</small>
           {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
       </div>
       <div class="toast-body">
         "Your Banner" has been deleted from list. 
       </div>
       <div class='toast-timeline animate'></div>
   </div>
</div>

<script>
   $("#AddButton").click(function(e) {
    $('.update-success').toast('show');
    $('#AddBanner').modal('hide'); 
   }); 
   $("#EditButton").click(function(e) {
    $('.update-success').toast('show');
    $('#EditBanner').modal('hide'); 
   });  
   $("#Delete_Banner").click(function(e) {
    $('.delete-success').toast('show'); 
   });  

</script>