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
                  <td>{{$news_item['description']}}</td>
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
                              <div class="row">
                                 <div class="col-md-12 mb-3">
                                    <label class="control-label">Title</label>
                                    <div class=""> <input type="text" name="Edit_News_title" class="form-control" id="Edit_News_title" value="Vijaynagar Emperor Tirumala Raya issued gold Pagoda depicting Lord Rama and Sita seated with Lakshmana"> </div>
                                 </div>
                                 <div class="col-md-12 mb-3">
                                    <label class="control-label">Discription</label>
                                    <div class=""> <textarea name="Edit_News_Discription" id="Edit_News_Discription" class="form-control" rows="10">Jai Shri Ram!<br><br>

                  The New #RamMandir in #Ayodhya, #Uttar Pradesh, is a sacred site for Hinduism. May the inauguration of the Ram Mandir bring peace, harmony, and spiritual enlightenment to all.<br><br>
                  India has a long tradition of minting coins with images of Gods and Goddesses. <br><br>
                  Vijaynagar emperor Tirumala Raya issued this Gold Pagoda, 3.5g, depicting Lord #Rama and Sita seated with Lakshmana, standing as an attendant on the obverse. The reverse of the coin features the Devanagari legend Sri Tirumala. <br><br>

                  Image Courtesy: Oswal Antiques
                     
                                 </textarea></div>
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label class="control-label">Current Image</label>
                                    <div class=""> <img src="https://s3-ap-southeast-1.amazonaws.com/mint-news/vijaynagar-emperor-tirumala-raya-fold-pagoda-depicting-lord-rama.jpg" alt="" class="img-fluid" style="width:100px"></div>
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label class="control-label">Upload New Image</label>
                                    <div class=""><input type="file" class="form-control" placeholder="upload image"></div>
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label class="control-label">Date</label>
                                    <div class="">
                                       <div id="" class="input-group date datepicker" data-date-format="yyyy-mm-dd">
                                          <input class="form-control" type="text" value="0000-00-00" id="courier_date" readonly="">
                                          <span class="input-group-text input-group-addon"><i class="fa fa-calendar"></i></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label class="control-label">Custom URL</label>
                                    <div class="">
                                       <input type="text" name="Edit_News_url" class="form-control" id="Edit_News_url" value="vijaynagar-emperor-tirumala-raya-fold-pagoda-depicting-lord-rama">
                                    </div>
                                 </div>

                                 <div class="col-md-12 mb-3"><input type="submit" name="submit" id="EditButton" class="btn btn-warning btn-sm" value="Submit"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                     <!-- <button class="btn btn-danger btn-sm" title="Delete News" data-bs-toggle="modal" data-bs-target="#DeleteNews" title="Delete"><i class="fa fa-trash"></i></button>
                     <div class="modal fade" id="DeleteNews" tabindex="-1" aria-labelledby="DeleteModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="AddMediaLabel">Delete News?</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                 <input type="hidden" name="bookId" id="bookId" value="" />
                                 <div class="modal-body text-center mt-2">
                                    <h2 class="text-danger"><i class="fa fa-trash"></i></h2>
                                    <p>Do you really want to delete these News?</p>
                                 </div>
                              </div>
                              <div class="modal-footer justify-content-center">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                 <form method="POST" action="{{url('delete-News-exe')}}">
                                    @csrf
                                    <input type="hidden" name="NewsId" value="{{}}">
                                    <button type="submit" id="add_delete_btn" class="btn btn-danger delete-add-btn">Delete</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div> -->
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
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
            <div class="row">
               <div class="col-md-12 mb-3">
                  <label class="control-label">Title</label>
                  <div class=""> <input type="text" name="News_title" class="form-control" id="News_title" value=""> </div>
               </div>
               <div class="col-md-12 mb-3">
                  <label class="control-label">Discription</label>
                  <div class=""> <textarea name="News_Discription" id="News_Discription" class="form-control" rows="10"></textarea></div>
               </div>
               <div class="col-md-12 mb-3">
                  <label class="control-label">Upload Image</label>
                  <div class=""><input type="file" class="form-control" placeholder="upload image"></div>
               </div>
               <div class="col-md-12 mb-3">
                  <label class="control-label">Date</label>
                  <div class="">
                     <div id="" class="input-group date datepicker" data-date-format="yyyy-mm-dd">
                        <input class="form-control" type="text" value="0000-00-00" id="courier_date" readonly="">
                        <span class="input-group-text input-group-addon"><i class="fa fa-calendar"></i></span>
                     </div>
                  </div>
               </div>
               <div class="col-md-12 mb-3"><input type="submit" name="submit" id="SubmitButton" class="btn btn-warning btn-sm" value="Submit"></div>
            </div>
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