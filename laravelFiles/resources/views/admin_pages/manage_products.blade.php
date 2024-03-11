<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
   <div class="container-fluid">
      <div class="mb-3">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
               <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
            </ol>
         </nav>
      </div>
      <div class="d-flex justify-content-between">
         <h2 class="title heading-3">{{$title}} </h2>
         <a class="btn btn-primary btn-sm align-self-baseline" title="Add Product" href="add-product"> <i class="fa fa-plus"></i> Add Product </a>
      </div>
      <div class="table-responsive">
         <table id="example" class="table table-striped table-hover table-bordered  DataTable" style="width:100%">
            <thead>
               <tr>
                  <th>Sr. No.</th>
                  <th>Product Name</th>
                  <th>Category</th>
                  <th>SKU</th>
                  <th>Stock</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th width="100">Action</th>
               </tr>
            </thead>
            <tbody>

               @php
               $productCounter = 1;
               @endphp

               @foreach($latest_twenty_five_products as $product)
               <tr id="{{$product['id']}}">
                  <td>{{$productCounter}}</td>
                  <td><a href="{{url('admin/edit-product/'.$product['id'])}}">{{$product["name1"]}}</a></td>
                  <td>{{$product["product_category"]["cat_name"]}}</td>
                  <td>{{$product["sku"]}}</td>
                  <td>{{$product["instock"]}}</td>
                  <td>{{$product["price"]}}</td>
                  <td>
                     <label class="switch switch-success" for="chk1">
                        <input type="checkbox" 

                        @if($product["status"]=="Active")
                        checked
                        @endif

                        id="chk1">
                        <span class="slider round"></span>
                     </label>
                  </td>
                  <td>

                     <a href="{{url('admin/edit-product/'.$product['id'])}}" class="btn btn-warning btn-sm" title="Edit Product"><i class="fa fa-edit"></i></a>

                     <button type="button" data-bs-toggle="modal" data-bs-target="#delete-product-{{$product['id']}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>

                     <div class="modal fade" id="delete-product-{{$product['id']}}" tabindex="-1" aria-labelledby="delete-product-{{$product['id']}}Label" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                              <h1 class="modal-title fs-5" id="delete-product-{{$product['id']}}Label">Delete Product</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              Are you Sure?
                              </div>
                              <div class="modal-footer">
                                 <form pid="{{$product['id']}}" class="delete-product-form" method="post" action="{{url('delete-product-exe')}}">
                                 @csrf
                                 <input type="hidden" name="pid" value="{{$product['id']}}">
                                 <button type="submit" class="btn btn-primary btn-danger">DELETE PRODUCT PERMANENTLY</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                  </td>
               </tr>
               @php
               $productCounter++;
               @endphp
               @endforeach

            </tbody>
         </table>
      </div>

   </div>
</div>


<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
   <div id="liveToast " class="toast hide bg-success text-white delete-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-success text-white">
         <h4>Product Deletion</h4>
      </div>
      <div class="toast-body">
         <p>Successful!</p>
      </div>
      <div class='toast-timeline animate'></div>
   </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
   <div id="liveToast " class="toast hide bg-danger text-white delete-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-danger text-white">
         <h4>Product Deletion</h4>
      </div>
      <div class="toast-body">
         <p>Failure!</p>
      </div>
      <div class='toast-timeline animate'></div>
   </div>
</div>




<script>
   $(".delete-product-form").submit(function (e) { 
      e.preventDefault();
      let url = $(this).attr("action");
      let method = $(this).attr("method");
      let formData = new FormData(this);

      let pid = $(this).attr("pid");


      $.ajax({
         type: method,
         url: url,
         data: formData,
         contentType: false,
         processData: false,
         success: function (response) {

            if (response=="success") {
               $(".delete-success").toast("show");         
            } else {
               $(".delete-failure").toast("show");
            }

         }
      });
      
      
      $('.modal').modal('hide');
      $("tr#"+pid).addClass("d-none");

   });
</script>