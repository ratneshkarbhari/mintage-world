<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
  <div class="container-fluid">
     <div class="mb-3">
        <nav aria-label="breadcrumb">
           <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Category Management</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
           </ol>
        </nav>
     </div>
     <div class="d-flex justify-content-between">
      <h2 class="title heading-3">{{$title}} </h2>
      <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#AddPeriod"><i class="fa fa-plus"></i> Add Period</button>
   </div>
     
     <div class="table-responsive">
      <table id="example" class="table table-striped table-bordered DataTable" style="width:100%">
          <thead><tr>
               <th>Sr. No.</th>
               <th>Period Title</th> 
               <th>Type</th> 
               <th>Image</th> 
               <th>Action</th> 
            </tr>
          </thead>
          <tbody>

            @php
            $counter = 1;
            $categories = [
               "1" => "Coin",
               "2" => "Note",
               "3" => "Stamp"
            ];
            @endphp
            @foreach($periods as $period)
            <tr>
               <td>{{$counter}}</td>
               <td>{{$period['title']}}</td>
               <td>{{$categories[$period['category_id']]}}</td>
               <td><img src="{{ getenv('PERIOD_IMAGE_BASE_URL').$period['image'] }}" width="100"></td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditPeriod-{{$period['id']}}" title="Edit"><i class="fa fa-edit"></i></button>
                  <div class="modal fade" id="EditPeriod-{{$period['id']}}" tabindex="-1" aria-labelledby="EditPeriod-{{$period['id']}}Label" aria-hidden="true">
                     <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="EditPeriodLabel">Edit Period</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <form  action="{{ url('update-period-exe') }}" enctype="multipart/form-data" method="POST">
                              @csrf

                              <input type="hidden" name="periodId" value="{{$period['id']}}">
                              <div class="modal-body"> 
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 control-label">Title</label> 
                                       <div class="col-md-9"> <input name="title" class="form-control textarea" value="{{$period['title']}}" required="required" id="title" placeholder="Enter Title"  /></div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 control-label">Country</label> 
                                       <div class="col-md-9">
                                          <select name="country" class="form-control" required="required">
                                             <option value="">Select Country</option>
                                             @foreach($countries as $country)
                                             <option
                                             @if($period['country_id']==$country['id'])
                                             selected
                                             @endif
                                             value="{{$country['id']}}">{{$country['name']}}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 control-label">Type</label> 
                                       <div class="col-md-9">
                                          <select name="type" class="form-control" required="required" >
                                             <option value="">Select Type</option>
                                             <option @if($period['category_id']==1)
                                             selected
                                             @endif value="1">Coin</option>
                                             <option @if($period['category_id']==2)
                                             selected
                                             @endif value="2">Note</option>
                                             <option @if($period['category_id']==3)
                                             selected
                                             @endif value="3">Stamp</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 control-label">Order By (e.g. 1,2,3)</label> 
                                       <div class="col-md-9"> <input type="text" name="orderby" class="form-control" id="orderby" placeholder="Enter Order By" value="{{$period['order_by']}}"  /> </div>
                                    </div> 
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 control-label">Current Image</label> 
                                       <div class="col-md-9">
                                          <img src="{{ getenv('PERIOD_IMAGE_BASE_URL').$period['image'] }}" class="img-gluid">                
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-3 control-label">Upload Image</label> 
                                       <div class="col-md-9">
                                          <input name="featured_image" type="file" accept="image/*" class="form-control image-preview-filename">                      
                                       </div>
                                    </div>           
                              </div>
                           <div class="modal-footer">
                              <input type="submit" name="submit" id="EditButton" class="btn btn-warning btn-sm" value="Submit">                           </form>

                              <!-- <input type="reset" value="Reset" class="btn btn-warning btn-sm"> -->
                           </div>
                        </div>
                     </div>
                  </div>
               </td>      
            </tr>
            @php
            $counter++;
            @endphp
            @endforeach
            
         </tbody>           
      </table>
  </div>     
     
  </div>
</div>
  
<div class="modal fade" id="AddPeriod" tabindex="-1" aria-labelledby="AddPeriodLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="AddPeriodLabel">Add Period</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <form action="{{url('create-new-period')}}" method="POST" enctype="multipart/form-data">
         @csrf
       <div class="modal-body"> 
            <div class="form-group row mb-3">
               <label class="col-md-3 control-label">Enter Title</label> 
               <div class="col-md-9"> 
               <input type="text" class="form-control" name="title">
               </div>
            </div>
            <div class="form-group row mb-3">
               <label class="col-md-3 control-label">Country</label> 
               <div class="col-md-9">
                  <select name="country" class="form-control" required="required">
                     <option value="">Select Country</option>
                     @foreach($countries as $country)
                     <option value="{{$country['id']}}">{{$country['name']}}</option>
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="form-group row mb-3">
               <label class="col-md-3 control-label">Type</label> 
               <div class="col-md-9">
                  <select name="type" class="form-control" required="required">
                     <option value="">Select Type</option>
                     <option value="1">Coin</option>
                     <option value="2">Note</option>
                     <option value="3">Stamp</option>
                  </select>
               </div>
            </div>
            <div class="form-group row mb-3">
               <label class="col-md-3 control-label">Upload Image</label> 
               <div class="col-md-9">
                  <input name="fileupload" type="file" class="form-control image-preview-filename">                      
               </div>
            </div>
            <div class="form-group row">
               <label class="col-md-3 control-label">Order By (e.g. 1,2,3)</label> 
               <div class="col-md-9"> <input type="text" name="orderby" class="form-control" id="orderby" placeholder="Enter Order By" value=""> </div>
            </div> 
       </div>
       <div class="modal-footer">
         <input type="submit" name="submit" id="SubmitButton" class="btn btn-warning btn-sm" value="Submit">
         </form>
         <input type="reset" value="Reset" class="btn btn-warning btn-sm">
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
   <div id="liveToast " class="toast hide bg-danger text-white edit-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
       <div class="toast-header bg-danger text-white">
           <strong class="me-auto"><i class="fas fa-check-circle"></i> Error</strong>
           <small>Just Now</small>
           {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
       </div>
       <div class="toast-body">
         Something went wrong. Please contact to Administration
       </div>
       <div class='toast-timeline animate'></div>
   </div>
</div>

<script>
    $("#SubmitButton").click(function(e) {
     $('.update-success').toast('show');
     $('#EditPeriod').modal('hide');
     $('#AddPeriod').modal('hide');
    }); 
    $("#EditButton").click(function(e) {
     $('.update-success').toast('show');
     $('#EditPeriod').modal('hide');
     $('#AddPeriod').modal('hide');
    }); 

</script>