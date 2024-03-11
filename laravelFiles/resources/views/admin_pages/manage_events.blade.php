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
         <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#AddEvent"><i class="fa fa-plus"></i> Add Event</button>
      </div>

      <div class="table-responsive">
         <table id="example" class="table table-striped table-bordered DataTable" style="width:100%">
         <thead>
               <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($events as $event)
               <tr>
                  <td>{{$event->title}}</td>
                  <td>{{$event->description}}</td>
                  
                  <td>
                     <button type="button" class="btn btn-secondary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditEvent-{{$event['id']}}" title="Edit"><i class="fa fa-edit"></i></button>
                     <!-- <button class="btn btn-danger btn-sm" title="Delete Event" data-bs-toggle="modal" data-bs-target="#DeleteEvent" title="Delete"><i class="fa fa-trash"></i></button>

                     <div class="modal fade" id="DeleteEvent" tabindex="-1" aria-labelledby="DeleteModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">

                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="AddMediaLabel">Delete Event?</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                 <input type="hidden" name="bookId" id="bookId" value="" />
                                 <div class="modal-body text-center mt-2">
                                    <h2 class="text-danger"><i class="fa fa-trash"></i></h2>
                                    <p>Do you really want to delete these Event?</p>
                                 </div>
                              </div>
                              <div class="modal-footer justify-content-center">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                 <form method="POST" action="{{url('delete-Event-exe')}}">
                                    @csrf
                                    <input type="hidden" name="EventId" value="{{$event['id']}}">
                                    <button type="submit" id="add_delete_btn" class="btn btn-danger delete-add-btn">Delete</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div> -->
                  </td>
               </tr>
               <div class="modal fade" id="EditEvent-{{$event['id']}}" tabindex="-1" aria-labelledby="EditEventLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="EditEventLabel">Edit Event</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <form action="{{url('update-event-exe')}}" class="editEventForm" method="post">
                              @csrf
                              <input type="hidden" name="id" value="{{$event['id']}}">
                              <div class="row">
                                 <div class="col-md-12 mb-3">
                                    <label class="control-label">Enter Event Name</label>
                                    <div class=""> <input type="text" name="title" class="form-control" id="event_name" value="{{$event['title']}}"></div>
                                 </div>
                                 <div class="col-md-12 mb-3">
                                    <label class="control-label">Description</label>
                                    <div class="">
                                       <textarea name="description" id="" rows="5" class="form-control ">{{$event['description']}}</textarea>
                                    </div>
                                 </div>
                                 <div class="col-md-12 mb-3">
                                    <label class="control-label">Address</label>
                                    <div class="">
                                       <textarea name="address" id="" rows="5" class="form-control ">{{$event['address']}}</textarea>
                                    </div>
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label class="control-label">Event Start Date</label>
                                    <div class="">
                                       <div id="datepicker2" class="input-group date datepicker" data-date-format="yyyy-mm-dd">
                                          <input class="form-control" type="text" value="{{$event['start']}}" id="courier_date" 
                                         name="start_date" readonly="">
                                          <span class="input-group-text input-group-addon"><i class="fa fa-calendar"></i></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label class="control-label">Event End Date</label>
                                    <div class="">
                                       <div id="datepicker3" class="input-group date datepicker" name="end_date" data-date-format="yyyy-mm-dd">
                                          <input class="form-control" type="text" value="{{$event['end']}}" id="courier_date" readonly="">
                                          <span class="input-group-text input-group-addon"><i class="fa fa-calendar"></i></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-12 mb-3"><input type="submit" name="submit" id="SubmitButton" class="btn btn-warning btn-sm" value="Submit"></div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </tbody>
         </table>
      </div>
      <div class="pagination-container">

         <p>{{$pagination_string}}</p>
         {!! $events->links() !!}

      </div>
   </div>
</div>

<div class="modal fade" id="AddEvent" tabindex="-1" aria-labelledby="AddEventLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="AddEventLabel">Add Event</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="{{url('create-new-event-exe')}}" enctype="multipart/form-data" method="post" id="createNewEventForm">
               @csrf
               <div class="row">
                  <div class="col-md-12 mb-3">
                     <label class="control-label">Enter Event Name</label>
                     <div class=""> <input type="text" name="title" class="form-control" id="event_name" value=""></div>
                  </div>
                  <div class="col-md-12 mb-3">
                     <label class="control-label">Description</label>
                     <div class="">
                        <textarea name="description" id="" rows="5" class="form-control "></textarea>
                     </div>
                  </div>
                  <div class="col-md-12 mb-3">
                     <label class="control-label">Address</label>
                     <div class="">
                        <textarea name="address" id="" rows="5" class="form-control "></textarea>
                     </div>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="control-label">Event Start Date</label>
                     <div class="">
                        <div id="datepicker2" class="input-group date datepicker" data-date-format="yyyy-mm-dd">
                           <input class="form-control" type="text" name="start_date" value="0000-00-00" id="courier_date" readonly="">
                           <span class="input-group-text input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="control-label">Event End Date</label>
                     <div class="">
                        <div id="datepicker3" class="input-group date datepicker" data-date-format="yyyy-mm-dd">
                           <input class="form-control" type="text" value="0000-00-00" id="courier_date" name="end_date" readonly="">
                           <span class="input-group-text input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 mb-3"><input type="submit" name="submit" id="SubmitButton" class="btn btn-warning btn-sm" value="Submit"></div>
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
         <strong class="me-auto"><i class="fas fa-check-circle"></i> Delete Auction</strong>
         <small>Just Now</small>
      </div>
      <div class="toast-body">
         "Your Auction" has been deleted from list.
      </div>
      <div class='toast-timeline animate'></div>
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
         Event was updated
      </div>
      <div class='toast-timeline animate'></div>
   </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
   <div id="liveToast " class="toast hide bg-danger text-white update-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-danger text-white">
         <strong class="me-auto"><i class="fas fa-check-circle"></i> Delete Auction</strong>
         <small>Just Now</small>
      </div>
      <div class="toast-body">
         Event couldnt be updated
      </div>
      <div class='toast-timeline animate'></div>
   </div>
</div>

<script>
   $("form#createNewEventForm").submit(function (e) { 
      e.preventDefault();
      let formData = new FormData(this);
      let action = $(this).attr("action");
      let method = $(this).attr("method");
      $.ajax({
         type: method,
         url: action,
         data: formData,
         contentType: false,
         processData: false,

         success: function (response) {
            if(response.result=="success"){
               $(".event-create-success").toast("show");
            }else{
               $(".event-create-failure").toast("show");

            }
               location.reload();
         }
      });
   });
   $("form.editEventForm").submit(function (e) { 
      e.preventDefault();
      let formData = new FormData(this);
      let action = $(this).attr("action");
      let method = $(this).attr("method");
      $.ajax({
         type: method,
         url: action,
         data: formData,
         contentType: false,
         processData: false,

         success: function (response) {
            if(response.result=="success"){
               $(".update-success").toast("show");
            }else{
               $(".update-failure").toast("show");

            }
               location.reload();
         }
      });      
   });
</script>