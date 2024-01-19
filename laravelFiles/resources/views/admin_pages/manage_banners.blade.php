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
         <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#AddBanner"><i class="fa fa-plus"></i> Add Banner</button>
      </div>
      <div class="col-md-12 admin-card mt-3">
         <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered DataTable " style="width:100%">
               <thead>
                  <tr>
                     <th>Sr. No.</th>
                     <th>Title</th>
                     <th>Image</th>
                     <th>Order</th>
                     <th>Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach($banners as $banner)
                  <tr id="tr_1">
                     <td>{{$banner["slide_order"]}}</td>
                     <td>{{$banner["title"]}}</td>
                     <td><img src="{{url('assets/images/banners/'.$banner['image_landscape'])}}" alt="" class="img-fluid" style="width:100px"></td>
                     <td>{{$banner["slide_order"]}}</td>
                     <td>
                        <label class="switch switch-success" for="banner-{{$banner['id']}}">
                           <input class="active-inactive-switch" bannerId="{{$banner['id']}}" type="checkbox" @if($banner['status']=='1' ) checked valueToSet='0' @else valueToSet='1' @endif id="banner-{{$banner['id']}}">
                           <span class="slider round"></span>
                        </label>
                     </td>
                     <td>
                        <button class="btn btn-secondary btn-sm" title="Edit Banner" data-bs-toggle="modal" data-bs-target="#EditBanner-{{$banner['id']}}" title="Edit"><i class="fa fa-edit"></i></button>

                        <div class="modal fade" id="EditBanner-{{$banner['id']}}" tabindex="-1" aria-labelledby="EditBannerLabel" aria-hidden="true">
                           <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="EditBannerLabel">Edit Banner</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                 </div>
                                 <div class="modal-body">
                                    <form action="{{ url('update-banner-exe') }}" enctype="multipart/form-data" method="post">
                                       @csrf
                                       <input type="hidden" name="bannerId" value="{{$banner['id']}}">
                                       <div class="row">
                                          <div class="col-md-12 mb-3">
                                             <label class="control-label">Title</label>
                                             <div class=""> <input type="text" name="title" class="form-control" id="title" value="{{$banner['title']}}"> </div>
                                          </div>
                                          <div class="col-md-12 mb-3">
                                             <label class="control-label">Alt</label>
                                             <div class=""> <input type="text" name="alt" class="form-control" id="title" value="{{$banner['alt']}}"> </div>
                                          </div>
                                          <div class="col-md-2 mb-3">
                                             <label class="control-label">Order</label>
                                             <div class=""> <input type="text" name="order" class="form-control" id="title" value="{{$banner['slide_order']}}"> </div>
                                          </div>
                                          <div class="col-md-10 mb-3">
                                             <label class="control-label">Link</label>
                                             <div class=""> <input type="text" name="link" class="form-control" id="title" value="{{$banner['link']}}"> </div>
                                          </div>
                                          <div class="col-md-6 mb-3">
                                             <label class="control-label">Current Desktop Image</label>
                                             <div class=""> <img src="{{url('assets/images/banners/'.$banner['image_landscape'])}}" alt="" class="img-fluid" style="width:300px"></div>
                                          </div>
                                          <div class="col-md-6 mb-3">
                                             <label class="control-label">Upload New Desktop Image <small>(1920px - 700px)</small></label>
                                             <div class=""><input type="file" name="desktop_banner" class="form-control" placeholder="upload Desktop image"></div>
                                          </div>
                                          <div class="col-md-6 mb-3">
                                             <label class="control-label">Current Mobile Image</label>
                                             <div class=""> <img src="{{url('assets/images/banners/'.$banner['image_potrait'])}}" alt="" class="img-fluid" style="width:300px"></div>
                                          </div>
                                          <div class="col-md-6 mb-3">
                                             <label class="control-label">Upload New Mobile Image <small>(600px - 520px)</small></label>
                                             <div class=""><input type="file" name="touch_banner"  class="form-control" placeholder="upload Mobile image"></div>
                                          </div>

                                          <div class="col-md-12">
                                             <input type="submit" name="submit" id="EditButton" class="btn btn-warning btn-sm" value="Update">
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <button class="btn btn-danger btn-sm DeleteModal" title="Delete Banner" id="Delete_Banner" data-id="tr_1"><i class="fa fa-trash"></i></button>
                     </td>
                  </tr>                  
                  @endforeach
               </tbody>
            </table>
         </div>

      </div>

   </div>
</div>


<div class="modal fade" id="AddBanner" tabindex="-1" aria-labelledby="AddBannerLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="AddBannerLabel">Add Banner</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="{{ url('create-new-banner') }}" enctype="multipart/form-data" method="post">
               @csrf
               <div class="row">
                  <div class="col-md-12 mb-3">
                     <label class="control-label">Title</label>
                     <div class=""> <input type="text" name="title" class="form-control" id="title" value=""> </div>
                  </div>
                  <div class="col-md-12 mb-3">
                     <label class="control-label">Alt</label>
                     <div class=""> <input type="text" name="alt" class="form-control" id="title" value=""> </div>
                  </div>
                  <div class="col-md-2 mb-3">
                     <label class="control-label">Order</label>
                     <div class=""> <input type="text" name="order" class="form-control" id="title" value=""> </div>
                  </div>
                  <div class="col-md-10 mb-3">
                     <label class="control-label">Link</label>
                     <div class=""> <input type="text" name="link" class="form-control" id="title" value=""> </div>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="control-label">Upload Desktop Image <small>(1920px - 700px)</small></label>
                     <div class=""><input type="file" name="desktop_banner" class="form-control" accept="image/*" placeholder="upload image"></div>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="control-label">Upload Mobile Image <small>(600px - 520px)</small></label>
                     <div class=""><input type="file" name="touch_banner" class="form-control" accept="image/*" placeholder="upload image"></div>
                  </div>
                  <div class="col-md-12">
                     <input type="submit" name="submit" id="AddButton" class="btn btn-warning btn-sm" value="Submit">
                  </div>
               </div>
            </form>
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
         <strong class="me-auto"><i class="fas fa-check-circle"></i> Delete Banner</strong>
         <small>Just Now</small>
         {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
      </div>
      <div class="toast-body">
         "Your Banner" has been deleted from list.
      </div>
      <div class='toast-timeline animate'></div>
   </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
   <div id="liveToast " class="toast hide bg-danger text-white set-status-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-danger text-white">
         <strong class="me-auto"><i class="fas fa-check-circle"></i> Set Banner Status</strong>
         <small>Just Now</small>
         {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
      </div>
      <div class="toast-body">
         "Your Banner" status is changed
      </div>
      <div class='toast-timeline animate'></div>
   </div>
</div>

<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModal" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      
      <div class="modal-content"> 
         <div class="modal-header">
            <h5 class="modal-title" id="AddMediaLabel">Delete Banner?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body"> 
         <input type="hidden" name="bookId" id="bookId" value=""/>
         <div class="modal-body text-center mt-2">   
            <h2 class="text-danger"><i class="fa fa-trash"></i></h2>
            <p>Do you really want to delete these Banner?</p>
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
   $("#AddButton").click(function(e) {
      $('.update-success').toast('show');
      $('#AddBanner').modal('hide');
   });
   $("#EditButton").click(function(e) {
      $('.update-success').toast('show');
      $('#EditBanner').modal('hide');
   });
    
   $(".active-inactive-switch").on('change', function(e) {
      e.preventDefault();
      let bannerId = $(this).attr("bannerId");

      let statusToSet = $(this).attr('valueToSet');

      $.ajax({
         type: "POST",
         url: "{{ url('set-banner-status') }}",
         data: {
            "_token": "{{ csrf_token() }}",
            "bannerId": bannerId,
            "statusToSet": statusToSet
         },
         success: function(response) {
            $(".set-status-success").toast("show");
         }
      });

   });

   $(function(){
  $(".DeleteModal").click(function(){
     $('#bookId').val($(this).data('id')); 
    $("#DeleteModal").modal("show");    
  });
});


   $("#add_delete_btn").click(function(e) {      
    $('.add-deleted').toast('show');
    const li_id = $("#bookId").val();
    $("#"+li_id).remove();  
    $('#DeleteModal').modal('hide'); 
   });
   
</script>