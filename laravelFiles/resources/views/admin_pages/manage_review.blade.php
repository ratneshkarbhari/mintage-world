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
                  <th>Mmeber</th>
                  <th>Product Name</th>
                  <th>Reting</th>
                  <th>Comment</th>
                  <!-- <th width="100">Date</th> -->
                  <th width="100">Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($reviews as $review)
               
               <tr>
                  <td>
                     @if(!is_null($review['member']))
                     {{$review['member']['name']}}
                     @endif
                  </td>
                  <td>
                     @if(!is_null($review['product']))
                     <a href="{{url('view-product/'.$review['product']['id'])}}" target="_blank" class="d-block">
                     {{$review['product']['name1']}}
                     </a>
                     @endif
                  </td>
                  <td>{{$review['rating_score']}}</td>
                  <td>{{$review['comments']}}</td>
                  <!-- <td>{{$review['date_time']}}</td> -->

                  <td style="width:80px !important">
                     @if($review['approval']=='0')
                     <button type="button" class="btn btn-success approve-review-button" reviewId="{{$review['id']}}"><i class="fa fa-check"></i></button>
                     @else
                     <button type="button" class="btn btn-danger disapprove-review-button" reviewId="{{$review['id']}}"><i class="fa fa-arrow-down " ></i></button>
                     @endif
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
      <div class="pagination-container">

         <p>{{$pagination_info_string}}</p>
         {!! $reviews->links() !!}

      </div>
   </div>
</div>


<div class="modal fade" id="EditReview" tabindex="-1" aria-labelledby="EditReviewLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="EditReviewLabel">Edit Review</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-6 mb-3">
                  <label class="control-label">Member</label>
                  <div class=""> <input type="text" name="Edit_Review_title" class="form-control" id="Edit_Review_title" value="Nandkumar Arekar" disabled></div>
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
               <div class="col-md-8 mb-3">
                  <label class="control-label">Product Name</label>
                  <div class=""><input type="text" name="Edit_Review_Product" class="form-control" id="Edit_Review_Product" value="Table Photo Frame with Personalized Birth Date Currency Note and Picture" disabled></div>
               </div>
               <div class="col-md-4 mb-3">
                  <label class="control-label">Reting</label>
                  <div class=""><input type="text" name="Edit_Review_Reting" class="form-control" id="Edit_Review_Reting" value="2.5"></div>
               </div>
               <div class="col-md-12 mb-3">
                  <label class="control-label">Comment</label>
                  <div class="">
                     <textarea id="Edit_Review_Editor" name="Edit_Review_Editor" class="editor"><p>Wish you a happy birth day and happy year ahead.</p>
                  </textarea>
                  </div>
               </div>

               <div class="col-md-12 mb-3"><input type="submit" name="submit" id="EditButton" class="btn btn-warning btn-sm" value="Submit"></div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
   <div id="liveToast " class="toast hide bg-success text-white approve-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-success text-white">
         <strong class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
         <small>Just Now</small>
      </div>
      <div class="toast-body">
         Review is visible
      </div>
      <div class='toast-timeline animate'></div>
   </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
   <div id="liveToast " class="toast hide bg-danger text-white reject-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-danger text-white">
         <strong class="me-auto"><i class="fas fa-check-circle"></i> Reject Review</strong>
         <small>Just Now</small>
      </div>
      <div class="toast-body">
         Review is taken down
      </div>
      <div class='toast-timeline animate'></div>
   </div>
</div>
<script>
   $(".approve-review-button,.disapprove-review-button").click(function(e) {
      e.preventDefault();
      let reviewId = $(this).attr("reviewId");
      console.log(reviewId);
      $.ajax({
         type: "POST",
         url: "{{url('toggle-review-status')}}",
         data: {
            "_token": "{{ csrf_token() }}",
            "review_id": reviewId
         },
         success: function(response) {
            console.log(response);
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