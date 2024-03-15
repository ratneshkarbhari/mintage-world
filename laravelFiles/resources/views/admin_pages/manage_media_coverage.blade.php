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
         <a class="btn btn-primary btn-sm align-self-baseline" href="{{url('admin/add-media-coverage')}}"><i class="fa fa-plus"></i> Add Media</a>
      </div>
      <div class="col-md-12 admin-card mt-3">
         <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered DataTable " style="width:100%">
               <thead>
                  <tr>
                     <th>Title</th>
                     <th>Date</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($media_coverage_items as $media_coverage_item)
                  <tr>
                     <td>{{$media_coverage_item['title']}}</td>
                     <td>{{$media_coverage_item['datetime']}}</td>
                     <td>
                        <a class="btn btn-secondary btn-sm" href="{{url('admin/edit-media-coverage')}}" title="Edit Media" href=""><i class="fa fa-edit"></i></a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
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
         <strong class="me-auto"><i class="fas fa-check-circle"></i> Delete Media</strong>
         <small>Just Now</small>
         {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
      </div>
      <div class="toast-body">
         "Your Media" has been deleted from list.
      </div>
      <div class='toast-timeline animate'></div>
   </div>
</div>
<div class="modal fade" id="DeleteAddModal" tabindex="-1" aria-labelledby="DeleteAddModal" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">

      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="AddMediaLabel">Delete Media Records?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <input type="hidden" name="bookId" id="bookId" value="" />
            <div class="modal-body text-center mt-2">
               <h2 class="text-danger"><i class="fa fa-trash"></i></h2>
               <p>Do you really want to delete these media records?</p>
            </div>
         </div>
         <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
            <button type="button" id="add_delete_btn" class="btn btn-danger delete-add-btn">Delete</button>
         </div>
      </div>
   </div>
</div>

<script>
   $(function() {
      $(".DeleteAddModal").click(function() {
         $('#bookId').val($(this).data('id'));
         $("#DeleteAddModal").modal("show");
      });
   });


   $("#add_delete_btn").click(function(e) {
      $('.add-deleted').toast('show');
      const li_id = $("#bookId").val();
      $("#" + li_id).remove();
      $('#DeleteAddModal').modal('hide');
   });
</script>