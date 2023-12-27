<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
  <div class="container-fluid">
     <div class="mb-3">
        <nav aria-label="breadcrumb">
           <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li> 
            <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
           </ol>
        </nav>
     </div>
     <div class="d-flex justify-content-between">
      <h2 class="title heading-3">{{$title}} </h2>
      <a class="btn btn-primary btn-sm align-self-baseline" title="Add Category" href="add-category"> <i class="fa fa-plus"></i> Add Category </a> 
   </div> 
     <div class="col-md-12 mt-3">
      <div class="table-responsive">
         <table id="example" class="table table-striped table-bordered DataTable " style="width:100%">
            <thead>
                <tr>
                   <th>Sr. No.</th>                       
                   <th>Category Name</th> 
                   <th>Status</th> 
                   <th>Action</th>
                </tr>
            </thead>
            <tbody>
               <tr>
                   <td>1</td>
                   <td>3D Puzzles </td>                     
                   <td>  
                       <label class="switch switch-success" for="chk1">
                           <input type="checkbox" checked id="chk1">
                           <span class="slider round"></span> 
                       </label> 
                   </td>
                   <td> 
                       <a href="edit-category" class="btn btn-warning btn-sm" title="Edit Category"><i class="fa fa-edit"></i></a>
                       <a href="#" id="DeleteCategory"  class="btn btn-danger  btn-sm" title="Delete Category"><i class="fa fa-trash"></i></a>                        
                   </td>
               </tr>
               <tr>
                   <td>2</td>
                   <td>Accessories</td>                     
                   <td>  
                       <label class="switch switch-success" for="chk2">
                           <input type="checkbox" id="chk2">
                           <span class="slider round"></span> 
                       </label> 
                   </td>
                   <td> 
                       <a href="edit-category" class="btn btn-warning btn-sm" title="Edit Category"><i class="fa fa-edit"></i></a>
                       <a href="#" id="DeleteCategory"  class="btn btn-danger  btn-sm" title="Delete Category"><i class="fa fa-trash"></i></a>                        
                   </td>
               </tr>
               <tr>
                   <td>3</td>
                   <td>Africa</td>                     
                   <td>  
                       <label class="switch switch-success" for="chk3">
                           <input type="checkbox" checked id="chk3">
                           <span class="slider round"></span> 
                       </label> 
                   </td>
                   <td> 
                       <a href="edit-category" class="btn btn-warning btn-sm" title="Edit Category"><i class="fa fa-edit"></i></a>
                       <a href="#" id="DeleteCategory"  class="btn btn-danger  btn-sm" title="Delete Category"><i class="fa fa-trash"></i></a>                        
                   </td>
               </tr>
               <tr>
                   <td>4</td>
                   <td>Ancient</td>                     
                   <td>  
                       <label class="switch switch-success" for="chk4">
                           <input type="checkbox" checked id="chk4">
                           <span class="slider round"></span> 
                       </label> 
                   </td>
                   <td> 
                       <a href="edit-category" class="btn btn-warning btn-sm" title="Edit Category"><i class="fa fa-edit"></i></a>
                       <a href="#" id="DeleteCategory"  class="btn btn-danger  btn-sm" title="Delete Category"><i class="fa fa-trash"></i></a>                        
                   </td>
               </tr>
               <tr>
                   <td>5</td>
                   <td>Antarctica</td>                     
                   <td>  
                       <label class="switch switch-success" for="chk5">
                           <input type="checkbox" checked id="chk5">
                           <span class="slider round"></span> 
                       </label> 
                   </td>
                   <td> 
                       <a href="edit-category" class="btn btn-warning btn-sm" title="Edit Category"><i class="fa fa-edit"></i></a>
                       <a href="#" id="DeleteCategory"  class="btn btn-danger  btn-sm" title="Delete Category"><i class="fa fa-trash"></i></a>                        
                   </td>
               </tr>
               <tr>
                   <td>6</td>
                   <td>Asia</td>                     
                   <td>  
                       <label class="switch switch-success" for="chk6">
                           <input type="checkbox" checked id="chk6">
                           <span class="slider round"></span> 
                       </label> 
                   </td>
                   <td> 
                       <a href="edit-category" class="btn btn-warning btn-sm" title="Edit Category"><i class="fa fa-edit"></i></a>
                       <a href="#" id="DeleteCategory"  class="btn btn-danger  btn-sm" title="Delete Category"><i class="fa fa-trash"></i></a>                        
                   </td>
               </tr>
               <tr>
                   <td>7</td>
                   <td>Assorted Foreign Coins</td>                     
                   <td>  
                       <label class="switch switch-success" for="chk7">
                           <input type="checkbox" checked id="chk7">
                           <span class="slider round"></span> 
                       </label> 
                   </td>
                   <td> 
                       <a href="edit-category" class="btn btn-warning btn-sm" title="Edit Category"><i class="fa fa-edit"></i></a>
                       <a href="#" id="DeleteCategory"  class="btn btn-danger  btn-sm" title="Delete Category"><i class="fa fa-trash"></i></a>                        
                   </td>
               </tr>
               <tr>
                   <td>8</td>
                   <td>Assorted Foreign Coins</td>                     
                   <td>  
                       <label class="switch switch-success" for="chk8">
                           <input type="checkbox" checked id="chk8">
                           <span class="slider round"></span> 
                       </label> 
                   </td>
                   <td> 
                       <a href="edit-category" class="btn btn-warning btn-sm" title="Edit Category"><i class="fa fa-edit"></i></a>
                       <a href="#" id="DeleteCategory"  class="btn btn-danger  btn-sm" title="Delete Category"><i class="fa fa-trash"></i></a>                        
                   </td>
               </tr>
               <tr>
                   <td>9</td>
                   <td>Australia</td>                     
                   <td>  
                       <label class="switch switch-success" for="chk9">
                           <input type="checkbox" checked id="chk9">
                           <span class="slider round"></span> 
                       </label> 
                   </td>
                   <td> 
                       <a href="edit-category" class="btn btn-warning btn-sm" title="Edit Category"><i class="fa fa-edit"></i></a>
                       <a href="#" id="DeleteCategory"  class="btn btn-danger  btn-sm" title="Delete Category"><i class="fa fa-trash"></i></a>                        
                   </td>
               </tr>
               <tr>
                   <td>10</td>
                   <td>Australia Stamps</td>                     
                   <td>  
                       <label class="switch switch-success" for="chk10">
                           <input type="checkbox" checked id="chk10">
                           <span class="slider round"></span> 
                       </label> 
                   </td>
                   <td> 
                       <a href="edit-category" class="btn btn-warning btn-sm" title="Edit Category"><i class="fa fa-edit"></i></a>
                       <a href="#" id="DeleteCategory"  class="btn btn-danger  btn-sm" title="Delete Category"><i class="fa fa-trash"></i></a>                        
                   </td>
               </tr>
               <tr>
                   <td>11</td>
                   <td>Banknote Accessories</td>                     
                   <td>  
                       <label class="switch switch-success" for="chk11">
                           <input type="checkbox" checked id="chk11">
                           <span class="slider round"></span> 
                       </label> 
                   </td>
                   <td> 
                       <a href="edit-category" class="btn btn-warning btn-sm" title="Edit Category"><i class="fa fa-edit"></i></a>
                       <a href="#" id="DeleteCategory"  class="btn btn-danger  btn-sm" title="Delete Category"><i class="fa fa-trash"></i></a>                        
                   </td>
               </tr>
               <tr>
                   <td>12</td>
                   <td>Banknote Albums</td>                     
                   <td>  
                       <label class="switch switch-success" for="chk12">
                           <input type="checkbox" checked id="chk12">
                           <span class="slider round"></span> 
                       </label> 
                   </td>
                   <td> 
                       <a href="edit-category" class="btn btn-warning btn-sm" title="Edit Category"><i class="fa fa-edit"></i></a>
                       <a href="#" id="DeleteCategory"  class="btn btn-danger  btn-sm" title="Delete Category"><i class="fa fa-trash"></i></a>                        
                   </td>
               </tr>
               <tr>
                   <td>13</td>
                   <td>Banknote Sleeves</td>                     
                   <td>  
                       <label class="switch switch-success" for="chk13">
                           <input type="checkbox" checked id="chk13">
                           <span class="slider round"></span> 
                       </label> 
                   </td>
                   <td> 
                       <a href="edit-category" class="btn btn-warning btn-sm" title="Edit Category"><i class="fa fa-edit"></i></a>
                       <a href="#" id="DeleteCategory"  class="btn btn-danger  btn-sm" title="Delete Category"><i class="fa fa-trash"></i></a>                        
                   </td>
               </tr>
            </tbody> 
        </table>
     </div>
     </div>    
  </div>
</div>
 
 <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="liveToast " class="toast hide bg-danger text-white edit-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Delete Category</strong>
            <small>Just Now</small>
            {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
        </div>
        <div class="toast-body">
            Delete Category Successfully
        </div>
        <div class='toast-timeline animate'></div>
    </div>
 </div>
 
 <script> 
  
     $("#DeleteCategory").click(function(e) {
        if (confirm("Do you really want to delete this Category?")) {
        $('.edit-failure').toast('show'); 
    }
     }); 
 
 </script>