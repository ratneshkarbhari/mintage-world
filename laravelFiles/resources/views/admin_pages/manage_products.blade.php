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
         <table id="manageProducts" class="table table-striped table-hover table-bordered  DataTable" style="width:100%">
            <thead>
               <tr>
                  <th>Product Name</th>
                  <th>Category</th>
                  <th>SKU</th>
                  <th>Stock</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th width="80">Action</th>
               </tr>
            </thead>
            <tbody>



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
   //Datatable invoking script

   $("#manageProducts").DataTable({
      'ajax': '{{url("get-all-products")}}',
      'columns': [
         
         {
            data: 'name1'
         },
         {
            data: 'product_category',
            render: function(data, type) {
               return data.cat_name;
            }
         },
         {
            data: 'sku',
         },
         {
            data: 'instock'
         },
         {
            data : 'price'
         },
         {
            data: 'status'
         },
         {
            render : function(data,type,full){
               return '<a href="{{url("admin/edit-product/")}}/'+full.id+'" class="btn btn-warning btn-sm" title="Edit Product"><i class="fa fa-edit"></i></a>';
            }
         }
      ]
   });


   $(".delete-product-form").submit(function(e) {
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
         success: function(response) {

            if (response == "success") {
               $(".delete-success").toast("show");
            } else {
               $(".delete-failure").toast("show");
            }

         }
      });


      $('.modal').modal('hide');
      $("tr#" + pid).addClass("d-none");

   });
</script>