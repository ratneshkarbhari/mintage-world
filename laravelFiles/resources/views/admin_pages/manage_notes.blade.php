
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">    
   <div class="container-fluid">
        <div class="mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item">Information</li>
                    <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                </ol>
                </nav>  
        </div>
        <div class="d-flex justify-content-between">
           <h2 class="title heading-3">{{$title}}</h2>
            <a type="button" class="btn btn-primary btn-sm align-self-baseline" href="add-note"><i class="fa fa-plus"></i> Add note</a>  
        </div> 
        <div class="table-responsive">
            <table id="notesTable" class="table table-striped table-bordered DataTable" style="width:100%">
                <thead>
                    <tr>
                        <th>Id	</th>
                        <th>Image</th>
                        <th>Cat. Ref. No</th> 
                        <th>Action</th>
                    </tr>
                </thead>
                
            </table>
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
   <div id="liveToast " class="toast hide bg-danger text-white delete-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
       <div class="toast-header bg-danger text-white">
           <strong class="me-auto"><i class="fas fa-check-circle"></i> Delete Note</strong>
           <small>Just Now</small>
       </div>
       <div class="toast-body">
         Delete Successfully
       </div>
       <div class='toast-timeline animate'></div>
   </div>
</div>

<script> 
    $(".btn-danger").click(function(e) {
        $('.delete-failure').toast('show'); 
    });  
    $("table#notesTable").DataTable({
        'ajax': '{{url("get-all-notes")}}',
        'deferRender' : true,
        'columns': [
            {
                data: 'id'
            },
            {
                data: 'obverse_image',
                render : function(data,type,full){
                    return '<img src="{{getenv("NOTE_BASE_URL")}}'+data+'" style="width: 100px; height: 100px;">';
                }
            },
            {
                data: 'catalogue_ref_no'
            },
            {
                render: function (data,type,full) { 

                    return '<a href="{{url("admin/edit-note/")}}/'+full.id+'" class="btn btn-warning btn-sm" title="Edit Product"><i class="fa fa-edit"></i></a>';

                }
            }
            
        ]
    }).order([0,'desc']);
</script>