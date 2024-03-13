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
         <table id="newsTable" class="table table-striped table-bordered DataTable" style="width:100%">
            <thead>
               <tr>
                  <th>Id</th>
                  <th>Title</th>
                  <th>Custom Url</th>
                  <th width="100">Action</th>
               </tr>
            </thead>

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
            <form enctype="multipart/form-data" action="{{url('add-news-item-exe')}}" id="addNewsForm" method="post">
               @csrf
               <div class="row">
                  <div class="col-md-12 mb-3">
                     <label class="control-label">Title</label>
                     <div class=""> <input type="text" name="title" class="form-control" id="title"> </div>
                  </div>
                  <div class="col-md-12 mb-3">
                     <label class="control-label">Description</label>
                     <div class=""> <textarea name="description" id="description" class="form-control" rows="10"></textarea></div>
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
                        <input type="text" name="custom_url" class="form-control" id="custom_url">
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
      function function_one() {
      $(".datepicker")
      .datepicker({
      autoclose: true,
      todayHighlight: true,
      })
      .datepicker("update", new Date());
      };
   $("table#newsTable").DataTable({
      'ajax': '{{url("get-all-news")}}',
      'deferRender': true,
      'columns': [{
            data: 'id'
         },
         {
            data: 'title',
         },
         {
            data: 'custom_url'
         },
        
         {
            render: function(data, type, full) {

               let action = '{{url("update-news")}}';
               let newsId = full.id;

               return '<button type="button" class="btn btn-secondary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditNews-'+full.id+'" title="Edit"><i class="fa fa-edit"></i></button><div class="fade modal"aria-hidden=true aria-labelledby=exampleModalLabel id=EditNews-'+full.id+' tabindex=-1><div class="modal-dialog modal-lg"><div class="modal-content"><div class=modal-header><h1 class="fs-5 modal-title"id=EditNews-'+full.id+'Label>Edit News</h1><button class=btn-close type=button data-bs-dismiss=modal aria-label=Close></button></div><div class=modal-body><form action='+action+' class=updateNewsForm enctype="multipart/form-data" method=POST>@csrf<input type=hidden name=id value='+newsId+'><div class=row><div class="mb-3 col-md-12"><label class=control-label>Title</label><div><input name=title class=form-control id=title value='+full.title+'></div></div><div class="mb-3 col-md-12"><label class=control-label>Description</label><div><textarea class=form-control id=description name=description rows=10>'+full.description+'</textarea></div></div><div class="mb-3 col-md-6"><label class="control-label">Upload New Image</label><div><input name="image" class="form-control" type="file" placeholder="upload image"></div></div><div class="col-md-6 mb-3"><label class="control-label">Date</label><div class=""><div id="" class="input-group date datepicker" data-date-format="yyyy-mm-dd"><input class="form-control" name="date" type="date" value="" id="date"></div></div></div><div class="mb-3 col-md-6"><label class=control-label>Custom URL</label><div><input name="custom_url" value='+full.custom_url+' class=form-control id=custom_url></div></div><div class="mb-3 col-md-12"><input type=submit name=submit class="btn btn-sm btn-warning"id=EditButton type=submit value=Submit></div></div></form></div></div></div>';
            }           
         }
      ]      
   }).order([0, 'desc']);
   
   
   
  
 
</script>