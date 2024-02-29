<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
   <div class="container-fluid">
      <div class="mb-3">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
               <li class="breadcrumb-item"><a href="{{url('admin/manage-products')}}">Manage Products</a></li>
               <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
            </ol>
         </nav>
      </div>
      <div class="d-flex justify-content-between">
         <h2 class="title heading-3">{{$title}} </h2>
      </div>
      <div class="add-form">
         <form action="{{url('create-product-exe')}}" id="createProductForm" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
               <div class="col-md-12 mb-3">
                  <div class="form-group">
                     <label for="name1">Product Name</label>
                     <input name="name1" id="name1" type="text" class="form-control" placeholder="Enter Product Name" required="required" value="">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="category">Product Category</label>
                     <select name="category" id="category" class="form-control js-example-basic-single" required="required">
                        <option value="">Select Category</option>

                        @foreach($product_categories as $category)
                        <option value="{{$category['id']}}">{{$category['cat_name']}}</option>
                        @endforeach

                     </select>
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="sub_cat">Product Sub Category</label>
                     <input name="sub_cat" id="sub_cat" type="text" class="form-control" placeholder="Enter Sub Category" value="">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="instock">In Stock</label>
                     <input name="instock" id="instock" type="number" class="form-control" required="required" placeholder="Enter In Stock" value="">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="price">Price</label>
                     <input name="price" id="price" type="number" class="form-control" required="required" placeholder="Enter Price" value="">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="sku">Sku</label>
                     <input name="sku" id="sku" type="text" class="form-control" placeholder="Enter SKU" value="">
                  </div>
               </div>
               
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="notes">Notes</label>
                     <input name="notes" id="notes" type="text" class="form-control" placeholder="Enter Notes" value="">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="status">Status</label>
                     <select name="status" id="status" class="form-control" required="required">
                        <option value="">Select Status</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="date_option">Date Option</label>
                     <select name="date_option" id="date_option" class="form-control">
                        <option value="">Select Option</option>
                        <option value="Yes">Yes</option>
                        <option value="No" selected="selected">No</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="custom_url">Custom URL </label>
                     <input name="custom_url" id="custom_url" type="text" class="form-control" placeholder="Please Enter Custom URL" required="required" value="">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="accesories_type">Accesories Type</label>
                     <input name="accesories_type" id="accesories_type" type="text" class="form-control" placeholder="Enter Accesories Type" value="">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="denomination">Denomination</label>
                     <input name="denomination" id="denomination" type="text" class="form-control" placeholder="Enter Denomination" value="">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="issue_year">Issue Year</label>
                     <input name="issue_year" id="issue_year" type="text" class="form-control" placeholder="Enter Year" value="">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="condition">Condition</label>
                     <input name="condition" id="condition" type="text" class="form-control" placeholder="Enter Condition" value="">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="type_series">Type Series</label>
                     <input name="type_series" id="type_series" type="text" class="form-control" placeholder="Enter Type Series" value="">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="keywords">Keywords(Search)</label>
                     <input name="keywords" id="keywords" type="text" class="form-control" placeholder="Enter Keywords" value="">
                  </div>
               </div>
               <div class="col-md-12 mb-3">
                  <div class="form-group">
                     <label for="desc1">Description</label>
                  </div>
                  <div id="editor" class="editor"></div>
               </div>
               <!-- <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="meta_title">Meta Title</label>
                     <input name="meta_title" id="meta_title" type="text" class="form-control" placeholder="Please Enter Product Meta Title" value="">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="meta_keywords">Meta Keywords</label>
                     <textarea name="meta_keywords" id="meta_keywords" tabindex="2" class="form-control" placeholder="Enter Meta Keywords"></textarea>
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="meta_content">Meta Description</label>
                     <textarea name="meta_content" id="meta_content" tabindex="2" class="form-control" placeholder="Enter Meta Description"></textarea>
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="schema_code">Schema Code Script</label>
                     <textarea name="schema_code" id="schema_code" class="form-control" placeholder="Enter Schema Code Script"></textarea>
                  </div>
               </div> -->
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="color">Color</label>
                     <input name="color" id="color" type="text" class="form-control" placeholder="Enter Color" value="">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="size">Size</label>
                     <input name="size" id="size" type="text" class="form-control" placeholder="Enter Size" value="">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="product_type">Product Type</label>
                     <input name="product_type" id="product_type" type="text" class="form-control" placeholder="Enter Product Type" value="">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="weight">Weight</label>
                     <input name="weight" id="weight" type="text" class="form-control" placeholder="Enter Weight" value="">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="xbxh">Actual LXBXH</label>
                     <input name="xbxh" id="xbxh" type="text" class="form-control" placeholder="Enter Actual L*B*H" value="">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="price">Discount <small class="text-danger">( Please do not enter percentage sign )</small></label>
                     <input name="discount" id="discount" type="text" class="form-control" placeholder="Enter Discount" value="00">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="videoid">Video ID <small class="text-danger">( Please do not enter Full YOUTUBE URL Eg: QLtJHvGC3MQ )</small></label>
                     <input name="videoid" id="videoid" type="text" class="form-control" placeholder="Enter Video ID" value="">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label>Poster Image <small class="text-danger">(600px X 600px)</small></label>
                     <input name="fileupload" id="fileupload" type="file" class="form-control" style="width:100%;height:auto">

                  </div>
               </div>
               <div class="col-md-12 mb-3">
                  <div class="form-group">
                     <label>Upload Multiple Gallery Image <small class="text-danger">(600px X 600px)</small></label>
                     <div class="input-group">
                        <input name="prodimages[]" id="prodimages" type="file" class="form-control" multiple="multiple">
                        <input name="MAX_FILE_SIZE" id="MAX_FILE_SIZE" type="hidden" value="10000000">
                     </div>
                     <p class="help-block">Upload only PNG and JPEG file's.</p>
                  </div>
               </div>

               
               <div class="col-md-12 mb-3">
                  <button class="btn btn-sm btn-primary" type="submit">Submit</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>


<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
   <div id="liveToast " class="toast hide bg-success text-white product-create-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-success text-white">
         <strong class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
         <small>Product Created Successfully</small>
      </div>
      <div class="toast-body">
         Add Successfully
      </div>
      <div class='toast-timeline animate'></div>
   </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
   <div id="liveToast " class="toast hide bg-danger text-white product-create-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-danger text-white">
         <strong class="me-auto"><i class="fas fa-check-circle"></i> Error</strong>
         <small>Product Creation Failed</small>
      </div>
      <div class="toast-body">
         Something went wrong. Please contact to Administration
      </div>
      <div class='toast-timeline animate'></div>
   </div>
</div>

<script>
   $("form#createProductForm").submit(function (e) { 
      e.preventDefault();
      let url = $(this).attr("action");
      let method = $(this).attr("method");
      let data = new FormData(this);

      $.ajax({
         type: method,
         url: url,
         data: data,
         contentType: false,
         processData: false,
         success: function(response) {
            if(response.result=="success"){
               $('.product-create-success').toast('show');
            }else{
               $(".product-create-failure").toast("show");
            }
         }
      });

      
   });
</script>