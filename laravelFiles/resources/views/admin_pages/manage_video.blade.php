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
         <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#AddVideo"><i class="fa fa-plus"></i> Add Video</button>
      </div>
      <div class="col-md-12 admin-card mt-3">
       <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered DataTable" style="width:100%">
              <thead>
                  <tr>
                      <th>Sr. No.</th>                       
                      <th>Title</th>
                      <th>Link</th>  
                      <th>Status</th> 
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                <tr>
                   <td>1</td>
                   <td>Legendary Numismatist Dr. Prashant Kulkarni - Epis..</td> 
                   <td>https://www.youtube.com/embed/zTmlyXawlAg?rel=0</td>
                   <td>  
                      <label class="switch switch-success" for="chk1">
                         <input type="checkbox" checked="" id="chk1">
                         <span class="slider round"></span> 
                      </label> 
                   </td>
                   <td>
                      <button class="btn btn-secondary btn-sm" title="Edit Banner" data-bs-toggle="modal" data-bs-target="#EditVideo" title="Edit"><i class="fa fa-edit"></i></button>
                      <button class="btn btn-danger btn-sm" title="Delete Video" id="Delete_Video"><i class="fa fa-trash"></i></button>
                   </td>
                </tr>
              </tbody> 
         </table>
      </div> 
   </div>     
   </div>
 </div>
 
 
  <div class="modal fade" id="AddVideo" tabindex="-1" aria-labelledby="AddVideoLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="AddVideoLabel">Add Video</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body"> 
         <div class="row">
            <div class="col-md-12 mb-3">
               <label class="control-label">Title</label> 
               <div class=""> <input type="text" name="title" class="form-control" id="title"  value="" placeholder="Enter Title"> </div>
            </div>
             
            <div class="col-md-12 mb-3">
               <label class="control-label">Link</label> 
               <div class=""> <input type="text" name="Video_Link" class="form-control" id="Video_Link"  value="" placeholder="Enter Link"> </div>
            </div>
            
            <div class="col-md-12">                  
               <input type="submit" name="submit" id="SubmitButton" class="btn btn-warning btn-sm" value="Submit">
            </div>
      </div>
       </div> 
     </div>
   </div>
 </div>  
 <div class="modal fade" id="EditVideo" tabindex="-1" aria-labelledby="EditVideoLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="EditVideoLabel">Edit Video</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body"> 
         <div class="row">
               <div class="col-md-12 mb-3">
                  <label class="control-label">Title</label> 
                  <div class=""> <input type="text" name="Edit_title" class="form-control" id="Edit_title"  value="Legendary Numismatist Dr. Prashant Kulkarni - Epis.."> </div>
               </div>
                
               <div class="col-md-12 mb-3">
                  <label class="control-label">Link</label> 
                  <div class=""> <input type="text" name="Edit_Video_Link" class="form-control" id="Edit_Video_Link"  value="https://www.youtube.com/embed/zTmlyXawlAg?rel=0"> </div>
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
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Delete Video</strong>
            <small>Just Now</small>
            {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
        </div>
        <div class="toast-body">
          "Your Video" has been deleted from list. 
        </div>
        <div class='toast-timeline animate'></div>
    </div>
 </div>
 
 <script>
    $("#SubmitButton").click(function(e) {
     $('.update-success').toast('show'); 
     $('#AddVideo').modal('hide'); 
    });  
    $("#EditButton").click(function(e) {
     $('.update-success').toast('show'); 
     $('#EditVideo').modal('hide'); 
    });  
    $("#Delete_Video").click(function(e) {
     $('.delete-success').toast('show'); 
    });  
 
 </script>