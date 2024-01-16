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
        <a  class="btn btn-primary btn-sm align-self-baseline" href="{{url('admin/manage-media-coverage')}}" ><i class="fa fa-long-arrow-alt-left"></i> Go Back</a>
     </div>
     <div class="col-md-12 admin-card mt-3">
      
      <div class="row">
         <div class="col-md-6 mb-3">
            <label class="control-label">Enter Title</label> 
            <div class=""><input name="title" id="title" type="text" class="form-control" placeholder="Enter Ttitle" required="required" value="Our new Gandhi book featuring in Good News Maharashtra | Doordarshan Sahyadri | Mintage World"></div>
         </div>
         <div class="col-md-6 mb-3">
            <label class="control-label">Date</label> 
            <div class=""><input type="text" name="datetime" id="datetime" class="form-control form_datetime" placeholder="Select Release Date" required="required" value="02/03/2023"></div>
         </div>
         <div class="col-md-12 mb-3">
            <label class="control-label">Enter Media(URL) - Comma Separated</label> 
            <div class=""><textarea name="media_url" id="coverage_url" class="form-control" placeholder="Enter Coverage Url e.g Zee News = http://www.xyz.com"></textarea></div>
         </div>
         <div class="col-md-12 mb-3">
            <label class="control-label">Enter Video(url)</label> 
            <div class=""><textarea name="video_url" id="video_url" class="form-control" placeholder="Enter Video Link Comma Separated" value="https://www.youtube.com/watch?v=V9l2IZCIz4Q"></textarea></div>
         </div> 
         <div class="col-md-12 mb-3">
            <label class="control-label">Short Description</label> 
            <div class=""> <div id="editor">
            <p>This is the only collectable book in the world that will showcase the various Stamps, Coins & Notes issued by more than 135 countries around the world on Gandhiji from 15th August 1948 till date</p>   
            </div></div>
         </div> 
         <hr>
         <div class="col-md-12 mb-3"> 
            <div class="row">
               <div class="col-md-12 dynamic-field mb-3" id="dynamic-pdf-1">
                  <div class="row" >
                     <div class="col-md-5">
                        <div class="form-group">
                        <label for="field" class="control-label d-block mb-2">PDF File </label> 
                        <a href="http://www.mintageworld.com/public/mediacoverage/Free Press Journal-1674294980.pdf" target="_blank" class="d-block link-primary"><img src="{{url('assets/images/PDF-Icon.png')}}" width="60"> Free Press Journal</a>
                        </div>
                     </div>
                     
                     <div class="col-md-5">
                        <div class="staresd">
                           <div class="imgup">
                              <label for="" class="control-label">Upload Only PDF</label>
                              <input type="file" class="form-control">
                           </div>
                        </div>
                     </div>   
                     <div class="col-md-2">
                        <label for="field" class="control-label d-block mb-2">Action</label> 
                        <button class="btn btn-danger btn-sm DeleteAddModal" id="" data-id="dynamic-pdf-1"><i class="fa fa-trash"></i></button>
                     </div>       
                  </div>
               </div>
               <div class="col-md-12 dynamic-field mb-3" id="dynamic-pdf-2">
                  <div class="row" >
                     <div class="col-md-5">
                        <div class="form-group">
                        <label for="field" class="control-label d-block mb-2">PDF File </label> 
                        <a href="http://www.mintageworld.com/public/mediacoverage/Free Press Journal-1674294980.pdf" target="_blank" class="d-block link-primary"><img src="{{url('assets/images/PDF-Icon.png')}}" width="60"> Free Press Journal</a>
                        </div>
                     </div>
                     
                     <div class="col-md-5">
                        <div class="staresd">
                           <div class="imgup">
                              <label for="" class="control-label">Upload Only PDF</label>
                              <input type="file" class="form-control">
                           </div>
                        </div>
                     </div>   
                     <div class="col-md-2">
                        <label for="field" class="control-label d-block mb-2">Action</label> 
                        <button class="btn btn-danger btn-sm DeleteAddModal" id="" data-id="dynamic-pdf-2"><i class="fa fa-trash"></i></button>
                     </div>         
                  </div>
               </div> 
               <div class="col-md-12 dynamic-field mb-3" id="dynamic-pdf-3">
                  <div class="row" >
                     <div class="col-md-5">
                        <div class="form-group">
                        <label for="field" class="control-label d-block mb-2">PDF File </label> 
                        <a href="http://www.mintageworld.com/public/mediacoverage/Free Press Journal-1674294980.pdf" target="_blank" class="d-block link-primary"><img src="{{url('assets/images/PDF-Icon.png')}}" width="60"> Free Press Journal</a>
                        </div>
                     </div>
                     
                     <div class="col-md-5">
                        <div class="staresd">
                           <div class="imgup">
                              <label for="" class="control-label">Upload Only PDF</label>
                              <input type="file" class="form-control">
                           </div>
                        </div>
                     </div>   
                     <div class="col-md-2">
                        <label for="field" class="control-label d-block mb-2">Action</label> 
                        <button class="btn btn-danger btn-sm DeleteAddModal" id="" data-id="dynamic-pdf-3"><i class="fa fa-trash"></i></button>
                     </div>         
                  </div>
               </div> 
            </div>
            <form action="" method="post">
               <div class="row" style="align-items: center;">
                
                  <div class="col-md-10 dynamic-field mb-3" id="dynamic-field-1">
                     <div class="row" >
                        <div class="col-md-6">
                           <div class="form-group">
                           <label for="field" class="control-label">PDF File Title </label>
                           <input type="text" id="field" class="form-control" name="field[]" />
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="staresd">
                              <div class="imgup">
                                 <label for="" class="control-label">Upload Only PDF</label>
                                 <input type="file" class="form-control">
                              </div>
                           </div>
                        </div>         
                     </div>
                  </div>                 
                  <div class="col-md-2 mt-30 append-buttons">
                  <div class="clearfix">
                  <button type="button" id="add-button" class="btn btn-secondary float-left text-uppercase shadow-sm"><i class="fa fa-plus fa-fw"></i>
                  </button>
                  <button type="button" id="remove-button" class="btn btn-secondary float-left text-uppercase ml-1" disabled="disabled"><i class="fa fa-minus fa-fw"></i>
                  </button>
                  </div>
                  </div>
               </div>
            </form>


         </div>
         <hr>
         <div class="col-md-12">                  
            <input type="submit" name="submit" id="AddButton" class="btn btn-warning btn-sm" value="Submit">
         </div>
      </div>

     </div>
    
  </div>
</div>
  
<div class="modal fade" id="DeleteAddModal" tabindex="-1" aria-labelledby="DeleteAddModal" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      
      <div class="modal-content"> 
         <div class="modal-header">
            <h5 class="modal-title" id="AddMediaLabel">Delete PDF Records?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body"> 
         <input type="hidden" name="pdfId" id="pdfId" value=""/>
         <div class="modal-body text-center mt-2">   
            <h2 class="text-danger"><i class="fa fa-trash"></i></h2>
            <p>Do you really want to delete these PDF records?</p>
         </div>
          </div>
         <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            <button type="button" id="add_delete_btn" class="btn btn-danger delete-add-btn">Delete</button>
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
           <strong class="me-auto"><i class="fas fa-check-circle"></i> Delete PDF</strong>
           <small>Just Now</small>
           {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
       </div>
       <div class="toast-body">
         "Your PDF" has been deleted from list. 
       </div>
       <div class='toast-timeline animate'></div>
   </div>
</div>

<script>
  
   $(function(){
     $(".DeleteAddModal").click(function(){
        $('#pdfId').val($(this).data('id')); 
       $("#DeleteAddModal").modal("show");    
     });
   });
   
   
      $("#add_delete_btn").click(function(e) {      
       $('.add-deleted').toast('show');
       const li_id = $("#pdfId").val();
       $("#"+li_id).remove();  
       $('#DeleteAddModal').modal('hide'); 
      });  
   
   </script>

<script> 

   $(document).ready(function() {
  var buttonAdd = $("#add-button");
  var buttonRemove = $("#remove-button");
  var className = ".dynamic-field";
  var count = 0;
  var field = "";
  var maxFields =50;

  function totalFields() {
    return $(className).length;
  }

  function addNewField() {
    count = totalFields() + 1;
    field = $("#dynamic-field-1").clone();
    field.attr("id", "dynamic-field-" + count);
    field.children("label").text("Field " + count);
    field.find("input").val("");
    $(className + ":last").after($(field));
  }

  function removeLastField() {
    if (totalFields() > 1) {
      $(className + ":last").remove();
    }
  }

  function enableButtonRemove() {
    if (totalFields() === 2) {
      buttonRemove.removeAttr("disabled");
      buttonRemove.addClass("shadow-sm");
    }
  }

  function disableButtonRemove() {
    if (totalFields() === 1) {
      buttonRemove.attr("disabled", "disabled");
      buttonRemove.removeClass("shadow-sm");
    }
  }

  function disableButtonAdd() {
    if (totalFields() === maxFields) {
      buttonAdd.attr("disabled", "disabled");
      buttonAdd.removeClass("shadow-sm");
    }
  }

  function enableButtonAdd() {
    if (totalFields() === (maxFields - 1)) {
      buttonAdd.removeAttr("disabled");
      buttonAdd.addClass("shadow-sm");
    }
  }

  buttonAdd.click(function() {
    addNewField();
    enableButtonRemove();
    disableButtonAdd();
  });

  buttonRemove.click(function() {
    removeLastField();
    disableButtonRemove();
    enableButtonAdd();
  });
});



</script>