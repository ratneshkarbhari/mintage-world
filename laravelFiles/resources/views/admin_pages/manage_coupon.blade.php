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
      <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#AddCoupon"><i class="fa fa-plus"></i> Add Coupon</button>
    </div>
      
    <div class="table-responsive">
       <table id="example" class="table table-striped table-bordered DataTable" style="width:100%">
          <thead>
             <tr>
                <th>Sr. No.</th>
                <th>Coupon Name</th> 
                <th>Discount</th> 
                <th>Exp. Date</th> 
                <th>Status</th> 
                <th>Action</th>
             </tr>
          </thead>
          <tbody>
             <tr>
                <td>1</td>
                <td>VALENTINE35</td> 
                <td>35%</td> 
                <td>2024-02-14</td> 
                <td>  
                  <label class="switch switch-success" for="chk1">
                     <input type="checkbox" checked="" id="chk1">
                     <span class="slider round"></span> 
                  </label> 
               </td>
                <td>                    
                   <button type="button" class="btn btn-secondary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditCoupon" title="Edit"><i class="fa fa-edit"></i></button>
                   <button class="btn btn-danger btn-sm" title="Delete Coupon" data-bs-toggle="modal" data-bs-target="#DeleteCoupon" title="Delete"><i class="fa fa-trash"></i></button>
                      <div class="modal fade" id="DeleteCoupon" tabindex="-1" aria-labelledby="DeleteModal" aria-hidden="true">
                         <div class="modal-dialog modal-dialog-centered modal-lg">
                            
                            <div class="modal-content"> 
                               <div class="modal-header">
                                  <h5 class="modal-title" id="AddMediaLabel">Delete Coupon?</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                               </div>
                               <div class="modal-body"> 
                               <input type="hidden" name="bookId" id="bookId" value=""/>
                               <div class="modal-body text-center mt-2">   
                                  <h2 class="text-danger"><i class="fa fa-trash"></i></h2>
                                  <p>Do you really want to delete these Coupon Records?</p>
                               </div>
                               </div>
                              <div class="modal-footer justify-content-center">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                  <form method="POST" action="{{url('delete-Coupon-exe')}}">
                                  @csrf
                                  <input type="hidden" name="CouponId" value="{{}}">
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

 <div class="modal fade" id="AddCoupon" tabindex="-1" aria-labelledby="AddCouponLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="AddCouponLabel">Add Coupon</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"> 
         <div class="row">
            <div class="col-md-12 mb-3"> 
               <label class="control-label">Enter Coupon Name</label>
               <div class="">  <input type="text" name="Coupon_name" class="form-control" id="Coupon_name" value=""></div>
            </div>   
            <div class="col-md-6 mb-3"> 
               <label class="control-label">Coupon Option</label>
               <div class=""> 
                  <span><input id="AutomaticCoupon" type="radio" name="coupon_option" value="Automatic" checked="">&nbsp;Automatic&nbsp;&nbsp;
                     <span><input id="ManualCoupon" type="radio" name="coupon_option" value="Manual">&nbsp;Manual&nbsp;&nbsp;
                 </span></span>
               </div>
            </div>    
            <div class="col-md-6 mb-3"> 
               <label class="control-label">Coupon Type</label>
               <div class="">  
                     <input type="radio" name="coupon_type" value="Multiple" checked="">&nbsp;Multiple Times&nbsp;&nbsp;  
                     <input type="radio" name="coupon_type" value="Single">&nbsp;Single Times&nbsp;&nbsp;
               </div>
            </div>  
            <div class="col-md-6 mb-3"> 
               <label class="control-label">Amount Type</label>
               <div class="">
                  <input type="radio" name="amount_type" value="Percentage" checked="">&nbsp;Percentage&nbsp;(in %)&nbsp;
                  <input type="radio" name="amount_type" value="Fixed">&nbsp;Fixed&nbsp;(in INR or USD)&nbsp;
                </div>
            </div>        

            <div class="col-md-6 mb-3"> 
               <label class="control-label">Discount</label>
               <div class=""><input type="text" name="Coupon_Discount" class="form-control" id="Coupon_Discount" value=""></div>
            </div>  
            <div class="col-md-6 mb-3"> 
               <label class="control-label">Category</label>
               <div class="">
                  <select name="categories[]" class="form-control select2" multiple="" required="">
                     <option value="">Select</option>
                     <option value="1">Note</option>
                     <option value="2">Stamp</option>
                     <option value="3">Coin</option>
                  </select>

               </div>
            </div>  
            <div class="col-md-6 mb-3">
               <label class="control-label">Coupon End Date</label>
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
 
  <div class="modal fade" id="EditCoupon" tabindex="-1" aria-labelledby="EditCouponLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="EditCouponLabel">Edit Coupon</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"> 
         <div class="row">
            <div class="col-md-12 mb-3"> 
               <label class="control-label">Enter Coupon Name</label>
               <div class="">  <input type="text" name="Coupon_name" class="form-control" id="Coupon_name" value="Todywalla Coupon No. 140"></div>
            </div>
            <div class="col-md-12 mb-3">
               <label class="control-label">Discount</label>
               <div class=""><input type="text" name="Coupon_Discount" class="form-control" id="Coupon_Discount" value="35"></div>
            </div>
            <div class="col-md-6 mb-3"> 
               <label class="control-label">Image</label>
               <div class=""> <input type="file" class="form-control" id="uploadFile" placeholder="upload File"></div>
            </div> 
            <div class="col-md-6 mb-3">
               <label class="control-label">Coupon End Date</label>
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
           <strong class="me-auto"><i class="fas fa-check-circle"></i> Delete Coupon</strong>
           <small>Just Now</small> 
       </div>
       <div class="toast-body">
         "Your Coupon" has been deleted from list. 
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
     $("#Delete_Coupon").click(function(e) {
    $('.delete-success').toast('show'); 
   });   
 </script>