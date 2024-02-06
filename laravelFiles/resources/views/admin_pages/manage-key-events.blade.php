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
      <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#AddAuction"><i class="fa fa-plus"></i> Add Auction</button>
    </div>
      
    <div class="table-responsive">
       <table id="example" class="table table-striped table-bordered DataTable" style="width:100%">
          <thead>
             <tr>
                <th>Sr. No.</th>
                <th>Auction Name</th>
                <th>Image</th> 
                <th>PDF</th> 
                <th>Date</th> 
                <th>Status</th> 
                <th>Action</th>
             </tr>
          </thead>
          <tbody>
             <tr>
                <td>1</td>
                <td>Todywalla Auction No. 140	</td>
                <td><img src="https://www.mintageworld.com/public/img/auctions/auctions_img/thumb/todywala.jpg" class="img-fluid" style="width:80px" alt=""></td>
                <td><a href="http://www.mintageworld.com/public/img/auctions/Alch73Roberts.pdf" class="link-info" target="_blank"><h5><i class="fa fa-file-pdf"></i></h5></a></td> 
                <td>2022-04-23 <i class="fa fa-calendar-alt"></i>  2022-04-23</td> 
                <td>  
                  <label class="switch switch-success" for="chk1">
                     <input type="checkbox" checked="" id="chk1">
                     <span class="slider round"></span> 
                  </label> 
               </td>
                <td>                    
                   <button type="button" class="btn btn-secondary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditAuction" title="Edit"><i class="fa fa-edit"></i></button>
                   <button class="btn btn-danger btn-sm" title="Delete Auction" data-bs-toggle="modal" data-bs-target="#DeleteAuction" title="Delete"><i class="fa fa-trash"></i></button>

                      <div class="modal fade" id="DeleteAuction" tabindex="-1" aria-labelledby="DeleteModal" aria-hidden="true">
                         <div class="modal-dialog modal-dialog-centered modal-lg">
                            
                            <div class="modal-content"> 
                               <div class="modal-header">
                                  <h5 class="modal-title" id="AddMediaLabel">Delete Auction?</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                               </div>
                               <div class="modal-body"> 
                               <input type="hidden" name="bookId" id="bookId" value=""/>
                               <div class="modal-body text-center mt-2">   
                                  <h2 class="text-danger"><i class="fa fa-trash"></i></h2>
                                  <p>Do you really want to delete these Auction Records?</p>
                               </div>
                               </div>
                              <div class="modal-footer justify-content-center">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                  <form method="POST" action="{{url('delete-Auction-exe')}}">
                                  @csrf
                                  <input type="hidden" name="AuctionId" value="{{}}">
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

 <div class="modal fade" id="AddAuction" tabindex="-1" aria-labelledby="AddAuctionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="AddAuctionLabel">Add Auction</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"> 
         <div class="row">
            <div class="col-md-12 mb-3"> 
               <label class="control-label">Enter Auction Name</label>
               <div class="">  <input type="text" name="auction_name" class="form-control" id="auction_name" value=""></div>
            </div>
            <div class="col-md-12 mb-3">
               <label class="control-label">Description</label>
               <div class="">
                  <div class="editor"></div>
               </div>
            </div>
            <div class="col-md-6 mb-3"> 
               <label class="control-label">Image</label>
               <div class=""> <input type="file" class="form-control" id="uploadFile" placeholder="upload File"></div>
            </div>
            <div class="col-md-6 mb-3"> 
               <label class="control-label">PDF File</label>
               <div class=""> <input type="file" class="form-control " id="uploadFile2" placeholder="upload File"></div>
            </div>
            <div class="col-md-6 mb-3">
               <label class="control-label">Auction Start Date</label>
               <div class="">
                  <div id="datepicker2" class="input-group date datepicker" data-date-format="yyyy-mm-dd">
                     <input class="form-control" type="text" value="0000-00-00" id="courier_date" readonly="">
                     <span class="input-group-text input-group-addon"><i class="fa fa-calendar"></i></span>                     
                 </div>
               </div>
            </div>  
            <div class="col-md-6 mb-3">
               <label class="control-label">Auction End Date</label>
               <div class="">
                  <div id="datepicker3" class="input-group date datepicker" data-date-format="yyyy-mm-dd">
                     <input class="form-control" type="text" value="0000-00-00" id="courier_date" readonly="">
                     <span class="input-group-text input-group-addon"><i class="fa fa-calendar"></i></span>                     
                 </div>
               </div>
            </div> 
            <div class="col-md-12 mb-3"><input type="submit" name="submit" id="SubmitButton" class="btn btn-warning btn-sm" value="Submit"></div> 
         </div>             
        </div> 
      </div>
    </div>
  </div>  
 
  <div class="modal fade" id="EditAuction" tabindex="-1" aria-labelledby="EditAuctionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="EditAuctionLabel">Edit Auction</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"> 
         <div class="row">
            <div class="col-md-12 mb-3"> 
               <label class="control-label">Enter Auction Name</label>
               <div class="">  <input type="text" name="auction_name" class="form-control" id="auction_name" value="Todywalla Auction No. 140"></div>
            </div>
            <div class="col-md-12 mb-3">
               <label class="control-label">Description</label>
               <div class="">
                  <div class="editor"></div>
               </div>
            </div>
            <div class="col-md-6 mb-3"> 
               <label class="control-label">Image</label>
               <div class=""> <input type="file" class="form-control" id="uploadFile" placeholder="upload File"></div>
            </div>
            <div class="col-md-6 mb-3"> 
               <label class="control-label">PDF File</label>
               <div class=""> <input type="file" class="form-control " id="uploadFile2" placeholder="upload File"></div>
            </div>
            <div class="col-md-6 mb-3">
               <label class="control-label">Auction Start Date</label>
               <div class="">
                  <div id="datepicker2" class="input-group date datepicker" data-date-format="yyyy-mm-dd">
                     <input class="form-control" type="text" value="0000-00-00" id="courier_date" readonly="">
                     <span class="input-group-text input-group-addon"><i class="fa fa-calendar"></i></span>                     
                 </div>
               </div>
            </div>  
            <div class="col-md-6 mb-3">
               <label class="control-label">Auction End Date</label>
               <div class="">
                  <div id="datepicker3" class="input-group date datepicker" data-date-format="yyyy-mm-dd">
                     <input class="form-control" type="text" value="0000-00-00" id="courier_date" readonly="">
                     <span class="input-group-text input-group-addon"><i class="fa fa-calendar"></i></span>                     
                 </div>
               </div>
            </div> 
            <div class="col-md-12 mb-3"><input type="submit" name="submit" id="SubmitButton" class="btn btn-warning btn-sm" value="Submit"></div> 
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
           <strong class="me-auto"><i class="fas fa-check-circle"></i> Delete Auction</strong>
           <small>Just Now</small> 
       </div>
       <div class="toast-body">
         "Your Auction" has been deleted from list. 
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
     $("#Delete_Auction").click(function(e) {
    $('.delete-success').toast('show'); 
   });   
 </script>