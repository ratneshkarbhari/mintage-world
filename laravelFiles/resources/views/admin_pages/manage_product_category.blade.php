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
      <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#AddCategory"><i class="fa fa-plus"></i> Add {{$title}}</button>
   </div>
     
   <div class="table-responsive">
      <table id="example" class="table table-striped table-bordered DataTable" style="width:100%">
         <thead>
            <tr>
               <th>Sr. No.</th>
               <th>{{$title}} Title	</th>
               <th>Status</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td>1</td>
               <td>Shatamana</td>
               <td>  
                  <label class="switch switch-success" for="chk1">
                  <input type="checkbox" checked="" id="chk1">
                  <span class="slider round"></span> 
                  </label> 
               </td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditCategory" title="Edit"><i class="fa fa-edit"></i></button>
               </td>
            </tr>
            <tr>
               <td>2</td>
               <td>Shatamana</td>
               <td>  
                  <label class="switch switch-success" for="chk2">
                  <input type="checkbox" checked="" id="chk2">
                  <span class="slider round"></span> 
                  </label> 
               </td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditCategory" title="Edit"><i class="fa fa-edit"></i></button>
               </td>
            </tr>
            <tr>
               <td>3</td>
               <td>Shatamana</td>
               <td>  
                  <label class="switch switch-success" for="chk3">
                  <input type="checkbox" checked="" id="chk3">
                  <span class="slider round"></span> 
                  </label> 
               </td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditCategory" title="Edit"><i class="fa fa-edit"></i></button>
               </td>
            </tr>
            <tr>
               <td>4</td>
               <td>Shatamana</td>
               <td>  
                  <label class="switch switch-success" for="chk4">
                  <input type="checkbox" checked="" id="chk4">
                  <span class="slider round"></span> 
                  </label> 
               </td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditCategory" title="Edit"><i class="fa fa-edit"></i></button>
               </td>
            </tr>
            <tr>
               <td>5</td>
               <td>Shatamana</td>
               <td>  
                  <label class="switch switch-success" for="chk5">
                  <input type="checkbox" checked="" id="chk5">
                  <span class="slider round"></span> 
                  </label> 
               </td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditCategory" title="Edit"><i class="fa fa-edit"></i></button>
               </td>
            </tr>
            <tr>
               <td>6</td>
               <td>Shatamana</td>
               <td>  
                  <label class="switch switch-success" for="chk6">
                  <input type="checkbox" checked="" id="chk6">
                  <span class="slider round"></span> 
                  </label> 
               </td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditCategory" title="Edit"><i class="fa fa-edit"></i></button>
               </td>
            </tr>
            <tr>
               <td>7</td>
               <td>Shatamana</td>
               <td>  
                  <label class="switch switch-success" for="chk7">
                  <input type="checkbox" checked="" id="chk7">
                  <span class="slider round"></span> 
                  </label> 
               </td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditCategory" title="Edit"><i class="fa fa-edit"></i></button>
               </td>
            </tr>
            <tr>
               <td>8</td>
               <td>Shatamana</td>
               <td>  
                  <label class="switch switch-success" for="chk9">
                  <input type="checkbox" checked="" id="chk9">
                  <span class="slider round"></span> 
                  </label> 
               </td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditCategory" title="Edit"><i class="fa fa-edit"></i></button>
               </td>
            </tr>
            <tr>
               <td>9</td>
               <td>Shatamana</td>
               <td>  
                  <label class="switch switch-success" for="chk10">
                  <input type="checkbox" checked="" id="chk10">
                  <span class="slider round"></span> 
                  </label> 
               </td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditCategory" title="Edit"><i class="fa fa-edit"></i></button>
               </td>
            </tr>
            <tr>
               <td>10</td>
               <td>Shatamana</td>
               <td>  
                  <label class="switch switch-success" for="chk11">
                  <input type="checkbox" checked="" id="chk11">
                  <span class="slider round"></span> 
                  </label> 
               </td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditCategory" title="Edit"><i class="fa fa-edit"></i></button>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
   </div>
   </div>
  
<div class="modal fade" id="AddCategory" tabindex="-1" aria-labelledby="AddCategoryLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="AddCategoryLabel">Add {{$title}}</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body"> 
            <div class="form-group row mb-3">
               <label class="col-md-3 control-label">Enter Title</label> 
               <div class="col-md-9"> <textarea name="title" class="form-control textarea" required="required" id="title" placeholder="Enter Title"></textarea> </div>
            </div>       
            <div class="form-group row mb-3">
               <label class="col-md-3 control-label">Status</label> 
               <div class="col-md-9">  
                  <label class="switch switch-success" for="chkAddCategory">
                  <input type="checkbox" checked="" id="chkAddCategory">
                  <span class="slider round"></span> 
                  </label> 
               </div>
            </div>       

       </div>
       <div class="modal-footer">
         <input type="submit" name="submit" id="SubmitButton" class="btn btn-warning btn-sm" value="Submit">
         <input type="reset" value="Reset" class="btn btn-warning btn-sm">
       </div>
     </div>
   </div>
 </div>

 <div class="modal fade" id="EditCategory" tabindex="-1" aria-labelledby="EditCategoryLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="EditCategoryLabel">Edit {{$title}}</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body"> 
            <div class="form-group row mb-3">
               <label class="col-md-3 control-label">Title</label> 
               <div class="col-md-9"> <input name="title" class="form-control textarea" required="required" id="title" placeholder="Enter Title"  value="Shatamana" /></div>
            </div>  
            <div class="form-group row mb-3">
               <label class="col-md-3 control-label">Status</label> 
               <div class="col-md-9">  
                  <label class="switch switch-success" for="chkEditCategory">
                  <input type="checkbox" checked="" id="chkEditCategory">
                  <span class="slider round"></span> 
                  </label> 
               </div>
            </div>             
       </div>
       <div class="modal-footer">
         <input type="submit" name="submit" id="EditButton" class="btn btn-warning btn-sm" value="Submit">
         <input type="reset" value="Reset" class="btn btn-warning btn-sm">
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
     $('#EditCategory').modal('hide');
     $('#AddCategory').modal('hide');
    }); 
    $("#EditButton").click(function(e) {
     $('.update-success').toast('show');
     $('#EditCategory').modal('hide');
     $('#AddCategory').modal('hide');
    }); 

</script>