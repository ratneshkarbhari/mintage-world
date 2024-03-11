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
         <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#AddNews"><i class="fa fa-plus"></i> Add News</button>
      </div>

      <div class="table-responsive">
         <table id="example" class="table table-striped table-bordered DataTable" style="width:100%">
            <thead>
               <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Images</th>
                  <th width="100">Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($news as $news_item)
               <tr>
                  <td>{{$news_item['title']}}</td>
                  <td>{!!$news_item['description']!!}</td>
                  <td>
                     <img src="{{env('NEWS_IMAGE_BASE_URL').$news_item['image']}}" alt="" class="img-fluid" style="width:75px">
                  </td>

                  <td>
                     <button type="button" class="btn btn-secondary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditNews-{{$news_item['id']}}" title="Edit"><i class="fa fa-edit"></i></button>
                     <div class="modal fade" id="EditNews-{{$news_item['id']}}" tabindex="-1" aria-labelledby="EditNewsLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="EditNewsLabel">Edit News</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                 <form action="{{url('update-media-item-exe')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$news_item['id']}}">
                                    <div class="row">
                                       <div class="col-md-12 mb-3">
                                          <label class="control-label">Title</label>
                                          <div class=""> <input type="text" name="title" class="form-control" id="title" value="{{$news_item['title']}}"> </div>
                                       </div>
                                       <div class="col-md-12 mb-3">
                                          <label class="control-label">Description</label>
                                          <div class=""> <textarea name="description" id="description" class="form-control" rows="10">{{$news_item['description']}}</textarea></div>
                                       </div>
                                       <div class="col-md-6 mb-3">
                                          <label class="control-label">Current Image</label>
                                          <div class=""> <img src="{{env('NEWS_IMAGE_BASE_URL').$news_item['image']}}" alt="" class="img-fluid" style="width:100px"></div>
                                       </div>
                                       <div class="col-md-6 mb-3">
                                          <label class="control-label">Upload New Image</label>
                                          <div class=""><input name="image" type="file" class="form-control" placeholder="upload image"></div>
                                       </div>
                                       <div class="col-md-6 mb-3">
                                          <label class="control-label">Date</label>
                                          <div class="">
                                             <div id="" class="input-group date datepicker" data-date-format="yyyy-mm-dd"><input class="form-control" type="text" name="date" value="{{$news_item['media_date']}}" id="date" readonly="">
                                                <span class="input-group-text input-group-addon"><i class="fa fa-calendar"></i></span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6 mb-3">
                                          <label class="control-label">Custom URL</label>
                                          <div class="">
                                             <input type="text" name="custom_url" class="form-control" id="custom_url" value="{{$news_item['custom_url']}}">
                                          </div>
                                       </div>

                                       <div class="col-md-12 mb-3"><input type="submit" name="submit" id="EditButton" class="btn btn-warning btn-sm" value="Submit"></div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>

                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>

      <div class="pagination-container">

         <p>{{$pagination_string}}</p>
         {!! $news->links() !!}

      </div>
   </div>
</div>

<div class="modal fade" id="AddNews" tabindex="-1" aria-labelledby="AddNewsLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="AddNewsLabel">Add News</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="{{url('add-news-item-exe')}}" id="addNewsForm" method="post">
               @csrf
               <div class="row">
                  <div class="col-md-12 mb-3">
                     <label class="control-label">Title</label>
                     <div class=""> <input type="text" name="title" class="form-control" id="title" value="{{$news_item['title']}}"> </div>
                  </div>
                  <div class="col-md-12 mb-3">
                     <label class="control-label">Description</label>
                     <div class=""> <textarea name="Edit_News_Discription" id="Edit_News_Discription" class="form-control" rows="10"></textarea></div>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="control-label">Current Image</label>
                     <div class=""> </div>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="control-label">Upload New Image</label>
                     <div class=""><input name="image" type="file" class="form-control" placeholder="upload image"></div>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="control-label">Date</label>
                     <div class="">
                        <div id="" class="input-group date datepicker" data-date-format="yyyy-mm-dd">
                           <input class="form-control" name="date" type="text" value="" id="date" readonly="">
                           <span class="input-group-text input-group-addon"><i class="fa fa-calendar"></i></span>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="control-label">Custom URL</label>
                     <div class="">
                        <input type="text" name="custom_url" class="form-control" id="custom_url" value="{{$news_item['custom_url']}}">
                     </div>
                  </div>

                  <div class="col-md-12 mb-3"><input type="submit" name="submit" id="EditButton" class="btn btn-warning btn-sm" value="Submit"></div>
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
         <strong class="me-auto"><i class="fas fa-check-circle"></i> Delete News</strong>
         <small>Just Now</small>
      </div>
      <div class="toast-body">
         "Your News" has been deleted from list.
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
   $("#Delete_News").click(function(e) {
      $('.delete-success').toast('show');
   });
</script>