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
      <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#AddStory"><i class="fa fa-plus"></i> Add Story</button>
    </div>
      
    <div class="table-responsive">
       <table id="example" class="table table-striped table-bordered DataTable" style="width:100%">
          <thead>
             <tr>
                <th>Sr. No.</th>
                <th>Title</th>
                <th>Images</th> 
                <th>Status</th> 
                <th>Action</th>
             </tr>
          </thead>
          <tbody>
             <tr>
                <td>1</td>
                <td>Remembering Rabindranath Tagore</td>
                <td>  
                   <img src="https://www.mintageworld.com/img/story/2-International-women's-week.jpg" alt="" class="img-fluid" style="width:75px">
                </td>
                <td>  
                  <label class="switch switch-success" for="chk1">
                     <input type="checkbox" checked="" id="chk1">
                     <span class="slider round"></span> 
                  </label> 
               </td>
                <td>
                   <button type="button" class="btn btn-secondary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditStory" title="Edit"><i class="fa fa-edit"></i></button>
                   <button class="btn btn-danger btn-sm" title="Delete Story" id="Delete_Story"><i class="fa fa-trash"></i></button>
                </td>
             </tr>
             
          </tbody>
       </table>
    </div>
    </div>
    </div>
   
 <div class="modal fade" id="AddStory" tabindex="-1" aria-labelledby="AddStoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="AddStoryLabel">Add Story</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"> 
         <div class="row">
            <div class="col-md-12 mb-3"> 
               <label class="control-label">Title</label>
               <div class=""> <input type="text" name="Story_title" class="form-control" id="Story_title" value=""> </div>
            </div>
            <div class="col-md-12 mb-3">
               <label class="control-label">Discription</label>
               <div class=""> <textarea name="Story_Discription" id="Story_Discription" class="form-control"  rows="15"></textarea></div>
            </div>
            <div class="col-md-12 mb-3">
               <label class="control-label">Upload Image</label>
               <div class=""><input type="file" class="form-control" placeholder="upload image"></div>
            </div> 
            <div class="col-md-12 mb-3"><input type="submit" name="submit" id="SubmitButton" class="btn btn-warning btn-sm" value="Submit"></div> 
         </div>             
        </div> 
      </div>
    </div>
  </div>  
 
  <div class="modal fade" id="EditStory" tabindex="-1" aria-labelledby="EditStoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="EditStoryLabel">Edit Story</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"> 
         <div class="row">
            <div class="col-md-12 mb-3"> 
               <label class="control-label">Title</label>
               <div class=""> <input type="text" name="Edit_Story_title" class="form-control" id="Edit_Story_title" value=""> </div>
            </div>
            <div class="col-md-6 mb-3">
               <label class="control-label">Current Image</label> 
               <div class=""> <img src="https://www.mintageworld.com/img/story/2-International-women's-week.jpg" alt="" class="img-fluid" style="width:100px"></div>
            </div>
            <div class="col-md-6 mb-3">
               <label class="control-label">Upload New Image</label> 
               <div class=""><input type="file" class="form-control" placeholder="upload image"></div>
            </div>
            <div class="col-md-12 mb-3">
               <label class="control-label">Discription</label>
               <div class=""> <textarea name="Edit_Story_Discription" id="Edit_Story_Discription" class="form-control"  rows="15"></textarea></div>
            </div> 
            <div class="col-md-12 mb-3"><input type="submit" name="submit" id="EditButton" class="btn btn-warning btn-sm" value="Submit"></div> 
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
           <strong class="me-auto"><i class="fas fa-check-circle"></i> Delete Story</strong>
           <small>Just Now</small> 
       </div>
       <div class="toast-body">
         "Your Story" has been deleted from list. 
       </div>
       <div class='toast-timeline animate'></div>
   </div>
</div>
 
 <script>
     $("#SubmitButton").click(function(e) {
      $('.update-success').toast('show');
      $('#EditSEO').modal('hide');
      $('#AddCategory').modal('hide');
     }); 
     $("#EditButton").click(function(e) {
      $('.update-success').toast('show');
      $('#EditSEO').modal('hide');
      $('#AddCategory').modal('hide');
     }); 
     $("#Delete_Story").click(function(e) {
    $('.delete-success').toast('show'); 
   });  
 
 </script>