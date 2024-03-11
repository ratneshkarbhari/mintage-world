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
         <form action="{{url('update-product-exe')}}" id="update-product-form" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="pid" value="{{$productToEdit['id']}}">
            <div class="row">
               <div class="col-md-12 mb-3">
                  <div class="form-group">
                     <label for="name1">Product Name</label>
                     <input name="name1" id="name1" type="text" class="form-control" placeholder="Enter Product Name" value="{{$productToEdit['name1']}}">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="category">Product Category</label>
                     <select name="category" id="category" class="form-control js-example-basic-single">
                        <option value="">Select Category</option>
                        @foreach($product_categories as $category)
                        <option value="{{$category['id']}}" @if($productToEdit["category"]==$category['id']) selected @endif>{{$category['cat_name']}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="sub_cat">Product Sub Category</label>
                     <input name="sub_cat" id="sub_cat" type="text" class="form-control" placeholder="Enter Sub Category" value="{{$productToEdit['sub_cat']}}">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="instock">In Stock</label>
                     <input name="instock" id="instock" type="number" class="form-control" placeholder="Enter In Stock" value="{{$productToEdit['instock']}}">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="price">Price</label>
                     <input name="price" id="price" type="number" class="form-control" placeholder="Enter Price" value="{{$productToEdit['price']}}">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="sku">Sku</label>
                     <input name="sku" id="sku" type="text" class="form-control" placeholder="Enter SKU" value="{{$productToEdit['sku']}}">
                  </div>
               </div>


               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="notes">Notes</label>
                     <input name="notes" id="notes" type="text" class="form-control" placeholder="Enter Notes" value="{{$productToEdit['notes']}}">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="status">Status</label>
                     <select name="status" id="status" class="form-control">
                        <option value="">Select Status</option>
                        <option @if($productToEdit['status']=='Active' ) selected @endif value="Active">Active</option>
                        <option @if($productToEdit['status']=='Inactive' ) selected @endif value="Inactive">Inactive</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="date_option">Date Option</label>
                     <select name="date_option" id="date_option" class="form-control">
                        <option value="">Select Option</option>
                        <option @if($productToEdit['date_option']=='Yes' ) selected @endif value="Yes">Yes</option>
                        <option @if($productToEdit['date_option']=='No' ) selected @endif value="No" selected>No</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="custom_url">Custom URL </label>
                     <input name="custom_url" id="custom_url" type="text" class="form-control" placeholder="Please Enter Custom URL" value="{{$productToEdit['custom_url']}}">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="accesories_type">Accesories Type</label>
                     <input name="accesories_type" id="accesories_type" type="text" class="form-control" placeholder="Enter Accesories Type" value="{{$productToEdit['accesories_type']}}">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="denomination">Denomination</label>
                     <input name="denomination" id="denomination" type="text" class="form-control" placeholder="Enter Denomination" value="{{$productToEdit['denomination']}}">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="issue_year">Issue Year</label>
                     <input name="issue_year" id="issue_year" type="text" class="form-control" placeholder="Enter Year" value="{{$productToEdit['issue_year']}}">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="condition">Condition</label>
                     <input name="condition" id="condition" type="text" class="form-control" placeholder="Enter Condition" value="{{$productToEdit['condition']}}">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="type_series">Type Series</label>
                     <input name="type_series" id="type_series" type="text" class="form-control" placeholder="Enter Type Series" value="{{$productToEdit['type_series']}}">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="keywords">Keywords(Search)</label>
                     <input name="keywords" id="keywords" type="text" class="form-control" placeholder="Enter Keywords" value="{{$productToEdit['keywords']}}">
                  </div>
               </div>
               <div class="col-md-12 mb-3">
                  <div class="form-group">
                     <label for="editor">Description</label>
                  </div>
                  <div id="editor" class="editor">
                     {!! $productToEdit['desc1'] !!}
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="meta_title">Meta Title</label>
                     <input name="meta_title" id="meta_title" type="text" class="form-control" placeholder="Please Enter Product Meta Title" value="{{$productToEdit['meta_title']}}">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="meta_keywords">Meta Keywords</label>
                     <textarea name="meta_keywords" id="meta_keywords" tabindex="2" class="form-control" placeholder="Enter Meta Keywords" value="{{$productToEdit['meta_keywords']}}"></textarea>
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="meta_content">Meta Description</label>
                     <textarea name="meta_content" id="meta_content" tabindex="2" class="form-control" placeholder="Enter Meta Description" value="{{$productToEdit['meta_content']}}"></textarea>
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="schema_code">Schema Code Script</label>
                     <textarea name="schema_code" id="schema_code" class="form-control" placeholder="Enter Schema Code Script" value="{{$productToEdit['schema_code']}}"></textarea>
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="color">Color</label>
                     <input name="color" id="color" type="text" class="form-control" placeholder="Enter Color" value="{{$productToEdit['color']}}">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="size">Size</label>
                     <input name="size" id="size" type="text" class="form-control" placeholder="Enter Size" value="{{$productToEdit['size']}}">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="product_type">Product Type</label>
                     <input name="product_type" id="product_type" type="text" class="form-control" placeholder="Enter Product Type" value="{{$productToEdit['product_type']}}">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="weight">Weight</label>
                     <input name="weight" id="weight" type="text" class="form-control" placeholder="Enter Weight" value="{{$productToEdit['weight']}}">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="xbxh">Actual LXBXH</label>
                     <input name="xbxh" id="xbxh" type="text" class="form-control" placeholder="Enter Actual L*B*H" value="{{$productToEdit['xbxh']}}">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="discount">Discount <small class="text-danger">( Please do not enter percentage sign )</small></label>
                     <input name="discount" id="discount" type="text" class="form-control" placeholder="Enter Discount" value="{{$productToEdit['discount']}}">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="videoid">Video ID <small class="text-danger">( Please do not enter Full YOUTUBE URL Eg: QLtJHvGC3MQ )</small></label>
                     <input name="videoid" id="videoid" type="text" class="form-control" placeholder="Enter Video ID" value="">
                  </div>
               </div>
               @php
                  $imgParts = explode("/",$productToEdit["img"]);
               @endphp
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="fileupload">Poster Image <small class="text-danger">(600 X 600) <a class="" href="#">MICMMAR30804.jpg</a></small></label>
                     <input name="featured_image" id="fileupload" type="file" accept="image/*" class="form-control" style="width:100%;height:auto">
                     <img id="image_upload_preview" src="{{env('PRODUCT_IMAGE_BASE_URL').$imgParts[2]}}" style="height:30%;width:30%;border-width:0px;" alt="Image Not Available">
                  </div>
               </div>
               <div class="col-md-6 mb-3">
                  <div class="form-group">
                     <label for="prodimages">Upload Multiple Gallery Image <small class="text-danger">(600px X 600px)</small></label>
                     <div class="input-group">
                        <input accept="image/*" name="prodimages[]" id="prodimages" type="file" class="form-control" multiple="multiple">
                     </div>
                     <p class="help-block">Upload only PNG and JPEG file's.</p>
                  </div>
               </div>
               <div class="col-md-12 mb-3">
                  <div class="table-responsive">
                     <table id="images" class="table table-striped table-bordered table-hover">
                        <thead>
                           <tr>
                              <td class="text-left">Image</td>
                              <td class="text-left">Image Type</td>
                              <td class="text-left">Image Name</td>
                              <td class="text-left">Action</td>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($productToEdit["product_images"] as $product_image)

                           <tr id="image-row0-{{$product_image['image_id']}}">
                              <td class="text-left">
                                 <a target="_blank" href="{{ getenv('PRODUCT_EXTRA_IMAGE_BASE_URL').$product_image['image_name'] }}">
                                    <img src="{{ getenv('PRODUCT_EXTRA_IMAGE_BASE_URL').$product_image['image_name'] }}" alt="" width="75px" height="50px">
                                 </a>
                              </td>
                              <td class="text-left">image/jpeg</td>
                              <td class="text-left">{{$product_image['image_name']}}</td>
                              <td>
                                 <button type="button" data-bs-toggle="modal" data-bs-target="#delete-product-modal-{{$product_image['image_id']}}" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                 <div class="modal fade" id="delete-product-modal-{{$product_image['image_id']}}" tabindex="-1" aria-labelledby="delete-product-modal-{{$product_image['image_id']}}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="delete-product-modal-{{$product_image['image_id']}}Label">Delete Product</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                          Are you sure?
                                          </div>
                                          <div class="modal-footer">
                                             <button type="button"
                                             product_image_id="{{$product_image['image_id']}}"
                                             class="btn btn-danger product_image_delete_button">Delete</button>
                                          </form>
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
               </div>
               <div class="col-md-12 mb-3">
                  <label for="">Variation</label>
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover" id="myTable">
                        <thead>
                           <tr>
                              <td class="text-left w-50">Product</td>
                              <td class="text-left">Variation Title</td>
                              <td><a class="btn btn-primary btn-sm mb-0 addProduct" id="" onclick="addRow()">Add +</a></td>
                           </tr>
                        </thead>
                        <tbody id="content">
                           @if(count($variations)==0)
                           <input type="hidden">
                           <tr id="CloneTr">
                              <input type="hidden" name="existing_variation_ids[]" value="x">
                              <td>
                                 <select class="form-control js-example-basic-single" name="variation_pids[]">
                                    <option value="0">Select Product</option>
                                    @php
                                    $optionString = '';
                                    @endphp
                                    @foreach($category_products as $catPro)
                                    <?php
                                    $optionString .= '<option value="' . $catPro["id"] . '">' . $catPro["name1"] . '</option>';
                                    ?>
                                    <option value="{{$catPro['id']}}">{{$catPro['name1']}}</option>
                                    @endforeach
                                 </select>
                              </td>
                              <td class="text-left">
                                 <input name="variation_titles[]" id="" type="text" class="form-control" placeholder="Enter Variation Title" value="">
                              </td>
                              <td class="text-left">
                                 <input type="button" class="btn btn-danger btn-sm remove" value="Remove">
                              </td>
                           </tr>
                           @else
                           @foreach($variations as $variation)
                           <tr id="CloneTr">
                              <input type="hidden" name="existing_variation_ids[]" value="{{$variation['id']}}">
                              <td>
                                 <select class="form-control js-example-basic-single" name="variation_pids[]">
                                    <option value="0">Select Product</option>
                                    <?php
                              $optionString = '';
                              ?>
                              @foreach($category_products as $catPro)
                              <?php
                              $optionString .= '<option value="' . $catPro["id"] . '">' . $catPro["name1"] . '</option>';
                              ?>
                              <option 
                              @if($variation['variation_product_id']==$catPro['id'])
                              selected
                              @endif
                              value="{{$catPro['id']}}">{{$catPro['name1']}}</option>
                              @endforeach
                                 </select>
                              </td>
                              <td class="text-left">
                                 <input name="variation_titles[]" id="" type="text" class="form-control" placeholder="Enter Variation Title" value="{{$variation['variation_name']}}">
                              </td>
                              <td class="text-left">
                                 <input type="button" class="btn btn-danger btn-sm remove" value="Remove">
                              </td>
                           </tr>
                           @endforeach
                           @endif
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="col-md-12 mb-3 d-flex justify-content-between">
                  <button class="btn btn-sm btn-primary" id="SubmitButton">Save</button>
               </div>
            </div>
         </form>
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
         Updated Successfully
      </div>
      <div class='toast-timeline animate'></div>
   </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
   <div id="liveToast " class="toast hide bg-success text-white product-image-delete-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-success text-white">
         <strong class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
         <small>Just Now</small>
      </div>
      <div class="toast-body">
         Gallery image deleted Successfully
      </div>
      <div class='toast-timeline animate'></div>
   </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
   <div id="liveToast " class="toast hide bg-danger text-white update-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-danger text-white">
         <strong class="me-auto"><i class="fas fa-check-circle"></i> Failure</strong>
         <small>Just Now</small>
      </div>
      <div class="toast-body">
         Update failed
      </div>
      <div class='toast-timeline animate'></div>
   </div>
</div>
<script>
   function addRow(e) {
      var id = Math.random().toFixed(2) * 100;
      document.querySelector('#content').insertAdjacentHTML(
         'afterbegin',
         `<tr> 
            <input type="hidden" name="existing_variation_ids[]" value="x">
         <td class="text-left">
         <div class="form-group">
            <select class="form-control js-example-basic-single" name="variation_pids[]">
            <option value="0">Select Product</option>{!!$optionString!!}</select>
      </div>
   </td>
   <td class="text-left">
   <input name="variation_titles[]" id="" type="text" class="form-control" placeholder="Enter Variation Title" value="">      
   </td>
   <td class="text-left">
   <input type="button" class="btn btn-danger btn-sm remove" value="Remove"> 
   </td>
   </tr>`
      )
      $('.js-example-basic-single').select2();

   }
   $('table').on('click', 'input[type="button"].remove', function(e) {
      $(this).closest('tr').remove()
   })

   $("form#update-product-form").submit(function(e) {
      e.preventDefault();
      let formData = new FormData(this);
      $.ajax({
         type: "POST",
         url: $(this).attr("action"),
         data: formData,
         contentType: false,
         processData: false,
         success: function(response) {
            if(response.result=="success"){
               $('.update-success').toast('show');
            }else{
               $(".update-failure").toast("show");
            }
         }
      });

   });


   $(".product_image_delete_button").click(function (e) { 
      e.preventDefault();      
      console.log(this);
      let product_image_id = $(this).attr("product_image_id");
      
      $.ajax({
         type: "POST",
         url: "{{url('delete-product-image-exe')}}",
         data: {
            "_token": "{{ csrf_token() }}",
            "product_image_id" : product_image_id
         },
         success: function (response) {
            if (response.result=="success") {
               $(".product-image-delete-success").toast("show");
               $('.modal').modal('hide');

               $("tr#image-row0-"+product_image_id).addClass("d-none");
            }
         }
      });
   });
   
</script>