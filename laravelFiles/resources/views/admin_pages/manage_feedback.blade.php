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
                  <th>Member</th>
                  <th>Category</th>
                  <th>Comment On</th>
                  <th>Comment</th>
                  <th width="100">Date</th>
                  <th width="100">Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($feedback_entries as $feedback)
               <tr>
                  <td>{{$feedback['member']['name']}}</td>
                  <td>

                     @if($feedback['feedback_id']==1)
                     Coin
                     @elseif($feedback['feedback_id']==2)
                     Note
                     @else
                     Stamp
                     @endif

                  </td>
                  <td>
                     @if($feedback['feedback_id']==1)
                     <a href="{{url('coin/detail/'.$feedback['coin']['id'])}}" target="_blank" class="d-block">See Coin</a>
                     @elseif($feedback['feedback_id']==2)
                     <a href="{{url('note/detail/'.$feedback['note']['id'])}}" target="_blank" class="d-block">See Note</a>
                     @else
                     <a href="{{url('stamp/detail/'.$feedback['stamp']['id'])}}" target="_blank" class="d-block">See Stamp</a>
                     @endif
                  </td>
                  <td>{{$feedback['comment']}}</td>
                  <td>{{date("d-m-Y",strtotime($feedback['created']))}}</td>

                  <td style="width:80px !important">
                     <!-- <a href="{{url('edit-feedback/'.$feedback['id'])}}" class="btn btn-secondary btn-sm align-self-baseline"><i class="fa fa-edit"></i></a> -->
                     @if($feedback['status']=='0')
                     <button type="button" class="btn btn-success approve-feedback-button" feedbackId="{{$feedback['id']}}"><i class="fa fa-check"></i></button>
                     @else
                     <button type="button" class="btn btn-danger disapprove-feedback-button" feedbackId="{{$feedback['id']}}"><i class="fa fa-arrow-down " ></i></button>
                     @endif

                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>

      <div class="pagination-container">

         <p>{{$pagination_string}}</p>
         {!! $feedback_entries->links() !!}

      </div>
   </div>
</div>


<div class="modal fade" id="EditFeedback" tabindex="-1" aria-labelledby="EditFeedbackLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="EditFeedbackLabel">Edit Feedback</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-6 mb-3">
                  <label class="control-label">Member</label>
                  <div class=""> <input type="text" name="Edit_Feedback_title" class="form-control" id="Edit_Feedback_title" value="Nandkumar Arekar" disabled></div>
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
               <div class="col-md-6 mb-3">
                  <label class="control-label">Category</label>
                  <div class="">
                     <input type="text" name="Edit_Feedback_Category" class="form-control" id="Edit_Feedback_Category" value="Coin" disabled>
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <label class="control-label">Comment On</label>
                  <div class="">
                     <a href="{{url('view-product/1639-afganistan-description-card-500-afghani/')}}" target="_blank" class="d-block">Afghanistan Banknote 500 Afghani with Description</a>
                  </div>
               </div>

               <div class="col-md-12 mb-3">
                  <label class="control-label">Description</label>
                  <div class="">
                     <textarea id="Edit_Feedback_Editor" name="Edit_Feedback_Editor" class="editor"><p>Dear Sir, 
                     <br>I have a note with prefix as AC 19 in my possession. request you to please update the same</p>
                  </textarea>
                  </div>
               </div>



               <div class="col-md-12 mb-3"><input type="submit" name="submit" id="EditButton" class="btn btn-warning btn-sm" value="Submit"></div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $(".approve-feedback-button,.disapprove-feedback-button").click(function(e) {
      e.preventDefault();
      let feedbackId = $(this).attr("feedbackId");
      $.ajax({
         type: "POST",
         url: "{{url('toggle-feedback-status')}}",
         data: {
            "_token": "{{ csrf_token() }}",
            "feedback_id": feedbackId
         },
         success: function(response) {
            if (response.result == "success") {
               $(".approve-success").toast("show");
            } else {
               $(".reject-success").toast("show");
            }
            location.reload();
         }
      });
   });
</script>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
   <div id="liveToast " class="toast hide bg-success text-white approve-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-success text-white">
         <strong class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
         <small>Just Now</small>
      </div>
      <div class="toast-body">
         Feedback is visible
      </div>
      <div class='toast-timeline animate'></div>
   </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
   <div id="liveToast " class="toast hide bg-danger text-white reject-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-danger text-white">
         <strong class="me-auto"><i class="fas fa-check-circle"></i> Reject Feedback</strong>
         <small>Just Now</small>
      </div>
      <div class="toast-body">
         Feedback is taken down
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
   $("#Delete_Feedback").click(function(e) {
      $('.delete-success').toast('show');
   });
</script>