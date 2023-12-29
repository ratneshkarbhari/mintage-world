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
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>

               @php
               $productCounter = 1;
               @endphp

               @foreach($latest_twenty_five_products as $product)
               <tr>
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
                     <a href="#" class="btn btn-danger btn-sm" id="DeleteProduct" title="Delet Product"><i class="fa fa-trash"></i></a>
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
   <div id="liveToast " class="toast hide bg-danger text-white edit-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-danger text-white">
         <strong class="me-auto"><i class="fas fa-check-circle"></i> Delete Product</strong>
         <small>Just Now</small>
         {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
      </div>
      <div class="toast-body">
         Delete Product Successfully
      </div>
      <div class='toast-timeline animate'></div>
   </div>
</div>

<script>
   $("#DeleteProduct").click(function(e) {
      if (confirm("Do you really want to delete this Product?")) {
         $('.edit-failure').toast('show');
      }
   });
</script>