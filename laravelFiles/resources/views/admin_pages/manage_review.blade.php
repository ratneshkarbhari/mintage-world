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
    </div>
      
    <div class="table-responsive">
       <table id="example" class="table table-striped table-bordered DataTable" style="width:100%">
          <thead>
             <tr>
                <th>Sr. No.</th>
                <th>Mmeber</th>  
                <th>Product Name</th> 
                <th>Reting</th> 
                <th>Comment</th>                 
                <th>Date</th> 
                <th>Status</th> 
                <th>Action</th>
             </tr>
          </thead>
          <tbody>
             <tr>
                <td>1</td>
                <td>Ketakee hrishikesh doke</td>                
                <td><a href="{{url('#')}}" target="_blank" class="d-block">Table Photo Frame with Personalized Birth Date Currency Note and Picture</a></td>
                <td>2.5</td>
                <td>wish you a happy birth day and happy year ahead.</td>                  
                <td>2024-01-26</td>  
                <td>  
                  <label class="switch switch-success" for="chk1">
                     <input type="checkbox" id="chk1">
                     <span class="slider round"></span> 
                  </label> 
               </td>
                <td style="width:80px !important">                    
                   <button type="button" class="btn btn-secondary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditReview" title="Edit"><i class="fa fa-edit"></i></button>
                   <button class="btn btn-danger btn-sm" title="Delete Review" data-bs-toggle="modal" data-bs-target="#DeleteReview" title="Delete"><i class="fa fa-trash"></i></button>
                      <div class="modal fade" id="DeleteReview" tabindex="-1" aria-labelledby="DeleteModal" aria-hidden="true">
                         <div class="modal-dialog modal-dialog-centered modal-lg">                            
                            <div class="modal-content"> 
                               <div class="modal-header">
                                  <h5 class="modal-title" id="AddMediaLabel">Delete Review?</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                               </div>
                               <div class="modal-body"> 
                               <input type="hidden" name="bookId" id="bookId" value=""/>
                               <div class="modal-body text-center mt-2">   
                                  <h2 class="text-danger"><i class="fa fa-trash"></i></h2>
                                  <p>Do you really want to delete these Review Records?</p>
                               </div>
                               </div>
                              <div class="modal-footer justify-content-center">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                  <form method="POST" action="{{url('delete-Review-exe')}}">
                                  @csrf
                                  <input type="hidden" name="ReviewId" value="">
                                  <button type="submit" id="add_delete_btn" class="btn btn-danger delete-add-btn">Delete</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div> 
                  </td>
               </tr>             
            </tbody>
         </table>
      </div>
    </div>
   </div> 
 
 
  <div class="modal fade" id="EditReview" tabindex="-1" aria-labelledby="EditReviewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="EditReviewLabel">Edit Review</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"> 
         <div class="row">
            <div class="col-md-6 mb-3"> 
               <label class="control-label">Member</label>
               <div class=""> <input type="text" name="Edit_Review_title" class="form-control" id="Edit_Review_title" value="Nandkumar Arekar" disabled></div>
            </div>
            <div class="col-md-6 mb-3"> 
               <label class="control-label">Date</label>
               <div class="">
                  <div id="datepicker2" class="input-group date datepicker" data-date-format="yyyy-mm-dd">
                     <input class="form-control" type="text" value="0000-00-00" id="courier_date" readonly="" disabled>
                     <span class="input-group-text input-group-addon"><i class="fa fa-calendar"></i></span>                     
                 </div>
               </div>
            </div>
            <div class="col-md-8 mb-3"> 
               <label class="control-label">Product Name</label>
               <div class=""><input type="text" name="Edit_Review_Product" class="form-control" id="Edit_Review_Product" value="Table Photo Frame with Personalized Birth Date Currency Note and Picture" disabled></div>
            </div>
            <div class="col-md-4 mb-3"> 
               <label class="control-label">Reting</label>
               <div class=""><input type="text" name="Edit_Review_Reting" class="form-control" id="Edit_Review_Reting" value="2.5"></div>
            </div>           
            <div class="col-md-12 mb-3">
               <label class="control-label">Comment</label>
               <div class=""> 
                  <textarea id="Edit_Review_Editor" name="Edit_Review_Editor" class="editor"><p>Wish you a happy birth day and happy year ahead.</p>
                  </textarea> 
            </div>
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
           <strong class="me-auto"><i class="fas fa-check-circle"></i> Delete Review</strong>
           <small>Just Now</small> 
       </div>
       <div class="toast-body">
         "Your Review" has been deleted from list. 
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
     $("#Delete_Review").click(function(e) {
    $('.delete-success').toast('show'); 
   });   
 </script>