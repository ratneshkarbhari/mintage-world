@php

use App\Models\Product;
@endphp

<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
  <div class="container-fluid">
     <div class="mb-3">
        <nav aria-label="breadcrumb">
           <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url("admin/dashboard")}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url("admin/manage-orders")}}">Orders</a></li>
              <li class="breadcrumb-item active" aria-current="page">View Order</li>
           </ol>
        </nav>
     </div>
     <div class="d-flex justify-content-between">
        <h2 class="title heading-3">{{$title}} </h2>
        <a class="btn btn-primary btn-sm align-self-baseline" title="Print Invoice" onclick="printDiv('printableArea')"> <i class="fa fa-print"></i> Print </a> 
     </div>
     <div class="col-md-12 admin-card mt-3">
        <div id="printableArea" class="card-body p-0 ">  
           <div class="print-header">
              <div class="row">
                 <div class="col-md-4"> <img src="https://www.mintageworld.com/public/img/logo.png" class="img-fluid print-logo mb-2" alt=""/> </div>
                 <div class="col-md-8 text-end">
                  <h4>Mintage World Pvt. Ltd</h4>                    
                 </div>

                 <div class="col-md-12 text-center border-top pt-2">
                  <p class="mb-0"><b>Head Office:</b> 2-C, Thacker Indl. Estate  N. M. Joshi Marg, Lower Parel (E), Mumbai - 400 011</p>
                 </div>
                 <div class="col-md-6">
                  <p><b>Tel:</b> 022 - 40190400<br> 
                     <b>Email ID: </b>info@mintageworld.com<br>  
                  </p>
                 </div>
                 <div class="col-md-6 text-end"> 
                     <p><b>GSTIN :</b> 09AACCU0657N1ZW<br> 
                     <b>PAN No.</b> AACCU0657N</p>
                  </p>
                 </div>
                 <div class="col-md-12 border-bottom"></div>
              </div>

           </div>
           <div class="row mb-4 border-bottom pb-2">
              <div class="col-md-6">
                 <div class="invoice-no">
                    <h3 class="text-danger">#{{$order["orderid"]}}</h3>
                    <span class="small"><b>Order Date : </b>20-11-2023</span> 
                 </div>
              </div>
              <div class="col-md-6 text-end">
                 <p class="mb-0"><b>Invoice No : </b> {{$order["orderid"]}}<br> <strong>Order Status : </strong> {{$order["status"]}} <br> <strong>Payment Status : </strong> RAZORPAY - {{$order["payment_status"]}}</p>
              </div>
           </div>
           <div class="row mb-4 cust-detail">
              <div class="col-md-4">
                 <h6 class="mb-3 text-primary"><b>Customer Details :</b></h6>
                 <p class="mb-0">{!! $order["payment_address"] !!}</p>
                 <p>{{$order["City"]}}  {{$order["State"]}}  {{$order["PinCode"]}}</p> 

              </div>
              <div class="col-md-4"> </div>
              <div class="col-md-4 text-end">
                 <h6 class="mb-3 text-primary"><b>Delivery Address :</b></h6>
                 <p class="mb-0">
                  {!! $order["Shipping_Address1"] !!}
                 </p>
                 <p>{{$order["City"]}}  {{$order["State"]}} {{$order["PinCode"]}}</p> 
              </div>
           </div>
           <div class="table-responsive">
              <table class="table table-bordered">
                 <thead>
                    <tr>
                       <td class="text-start">Sr No</td>
                       <td class="text-start">Product Image </td>
                       <td class="text-start">Product Name</td> 
                       <td class="text-end">Unit Price</td>
                       <td class="text-end">Quantity</td>                       
                       <td class="text-end">Net Amount</td> 
                       <td class="text-end">Tax Amount</td>
                       <td class="text-end">Total</td>
                    </tr>
                 </thead>
                 <tbody>
                     @php
                     $orderProductsCounter = 1;
                     $subtotal = 0.00;
                     $totalWeight = 0.00;
                     @endphp
                     @foreach($order["order_products"] as $product)
                     @php
                     $pdata = Product::find($product["productid"]);
                     
                     if($pdata["img"]!=""){

                     $imgParts = explode("/",$pdata["img"]);

                     }else{

                     $imgParts[2] = "noimage.jpg";

                     }
                     @endphp
                     <tr>
                        <td class="text-start">1</td>
                        <td class="text-start"> <img src="{{env('PRODUCT_IMAGE_BASE_URL').$imgParts[2]}}" alt="Global Collectibles of Mahatma Gandhi Through Banknotes, Coins &amp; Stamps Hardcover Book" width="50" height="50"> </td>
                        <td class="text-start">{{$pdata["name1"]}} <br> SKU -  {{$pdata['sku']}}<br>
                        HSN - {{$pdata['hsn']}}<br>
                        </td>
                        <td class="text-end">{{$product["price"]}}</td>
                        <td class="text-end">{{$product["quantity"]}}</td>                      
                        <td class="text-end">
                        @php
                        $amount = $product["price"]*$product["quantity"];
                        @endphp
                        {{$amount}}</td> 
                        <td class="text-end">{{$tax = 0.12*$amount}}<br><small>(12%)</small> </td>
                        <td class="text-end">{{$amountWTax = $amount+$tax}}</td>
                    </tr>
                     @php
                     $orderProductsCounter++;
                     $subtotal=$subtotal+$amountWTax;
                     @endphp
                     @endforeach
                    <tr>
                       <td colspan="7" class="text-end">Sub-Total</td>
                       <td class="text-end">{{$subtotal}}</td>
                    </tr>
                    <tr>
                       <td colspan="7" class="text-end"> Shipping Rate</td>
                       <td class="text-end">
                        @if($subtotal<500)
                        {{$shipping = 500}}
                        @else
                        {{$shipping=0.00}}
                        @endif
                       </td>
                    </tr>
                    <tr>
                       <td colspan="4" class="text-end">Total Weight	</td>
                       <td class="text-end">0</td>
                       <td  colspan="2" class="text-end">Coupon</td>
                       <td class="text-end">@if($order["discount"]=="")
                        {{$discount = 0.00}}
                        @else
{{                        $discount = $order["discount"]}}
                        @endif
                       </td>
                    </tr>
                    <tr>
                       <td colspan="7" class="text-end">Total</td>
                       <td class="text-end"><i class="fa fa-rupee-sign"></i> {{
                        $payable = $subtotal+$shipping-$discount;

                       }}</td>
                    </tr>
                 </tbody>
              </table>
           </div>
        </div>
     </div>
     <div class="col-md-12 admin-card mt-3">
        <div class="d-block">
           <h3 class="card-heading-1"><span> Update Payment & Order History</span></h3>
        </div>
        <div class="card-body p-0">
           <div class="card-body p-0">
              <ul class="nav nav-tabs d-none d-lg-flex" id="myTab" role="tablist">
                 <li class="nav-item" role="presentation"> <button class="nav-link active" id="tab-onw" data-bs-toggle="tab" data-bs-target="#tab-pane-one" type="button" role="tab" aria-controls="tab-pane-one" aria-selected="true">History</button> </li>
                 <li class="nav-item" role="presentation"> <button class="nav-link" id="tab-two" data-bs-toggle="tab" data-bs-target="#tab-pane-two" type="button" role="tab" aria-controls="tab-pane-two" aria-selected="false">Additional</button> </li>
                 <li class="nav-item" role="presentation"> <button class="nav-link" id="tab-two" data-bs-toggle="tab" data-bs-target="#tab-pane-three" type="button" role="tab" aria-controls="tab-pane-three" aria-selected="false">Update Payment</button> </li>
              </ul>
              <div class="tab-content accordion" id="myTabContent">
               <div class="tab-pane fade show active accordion-item border-top-0 rounded-0" id="tab-pane-one" role="tabpanel" aria-labelledby="tab-one" tabindex="0">
                  <h2 class="accordion-header d-lg-none" id="headingOne"> <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">History</button> </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show  d-lg-block border-0" aria-labelledby="headingOne" data-bs-parent="#myTabContent">
                     <div class="accordion-body">                          
                        <div class="d-block">
                           <h4 class="border-bottom pb-2 text-primary mb-4">Add Order History</h4>
                           <input type="hidden" value="{{$order['orderid']}}" id="orderid" name="orderid">
                           <div class="row mb-3">
                            <div class="col-md-2 mb-2"> <label class="control-label" for="status">Order Status</label> </div>
                             
                              <div class="col-md-10 mb-2">
                                 <select id="order_status" class="form-control" id="status" name="status">
                                    <option 
                                    @if($order["status"]=="Canceled")
                                    selected
                                    @endif
                                    value="Canceled">Canceled</option>
                                    <option 
                                    @if($order["status"]=="Order Pending")
                                    selected
                                    @endif
                                    value="Order Pending">Order Pending</option>
                                    <option
                                    @if($order["status"]=="Not Confirmed")
                                    selected
                                    @endif
                                    value="Not Confirmed" selected="selected">Not Confirmed</option>
                                    <option
                                    @if($order["status"]=="Pending")
                                    selected
                                    @endif
                                    value="Pending">Pending</option>
                                    <option value="Under Processing" @if($order["status"]=="Under Processing")
                                    selected
                                    @endif>Under Processing</option>
                                    <option 
                                    @if($order["status"]=="Dispatched")
                                    selected
                                    @endif
                                    value="Dispatched">Dispatched</option>
                                    <option value="Delivered">Delivered</option>
                                 </select>
                              </div>
                              <div class="col-md-2 mb-2"><label class="control-label" for="courier_name">Courier Name</label> </div>
                              
                              <div class="col-md-10 mb-2">
                                 <select class="form-control" id="courier_name" name="courier_name" onchange="changeFunc();">
                                    <option 
                                    
                                    value="">Select courier name</option>
                                    <option 
                                    @if($order['couriers']=='Anjani')
                                    selected
                                    @endif
                                    value="Anjani">Anjani</option>
                                    <option 
                                    @if($order['couriers']=='Blue Dart')
                                    selected
                                    @endif
                                    value="Blue Dart">Blue Dart</option>
                                    <option
                                    @if($order['couriers']=='DTDC')
                                    selected
                                    @endif
                                    value="DTDC">DTDC</option>
                                    <option
                                    @if($order['couriers']=='Fed Ex')
                                    selected
                                    @endif
                                    value="Fed Ex">Fed Ex</option>
                                    <option
                                    @if($order['couriers']=='Post')
                                    selected
                                    @endif
                                    value="Post">Post</option>
                                    <option 
                                    @if($order['couriers']=='Professional')
                                    selected
                                    @endif
                                    value="Professional">Professional</option>
                                    <option
                                    @if($order['couriers']=='Aramex')
                                    selected
                                    @endif
                                    value="Aramex">Aramex</option>
                                    <option 
                                    @if($order['couriers']=='Delhivery')
                                    selected
                                    @endif
                                    value="Delhivery">Delhivery</option>
                                    <option
                                    @if($order['couriers']=='Tirupati Courier')
                                    selected
                                    @endif
                                    value="Tirupati Courier">Tirupati Courier</option>
                                    <option 
                                    
                                    @if($order['couriers']=='Other')
                                    selected
                                    @endif
                                    value="Other">Other</option>
                                 </select>
                              </div>
                              <div class="col-md-2 mb-2"><label for="courier_number" class="control-label">Tracking Number</label></div>                               
                              <div class="col-md-10 mb-2"> <input type="textbox" value="{{$order['tracking_number']}}" id="courier_number" placeholder="Enter Courier Number" class="form-control" name="courier_number"> </div>

                              <div class="col-md-2 mb-2"><label for="courier_date" class="control-label">Courier Date</label> </div>                              
                              <div class="col-sm-10 mb-2"> 
                                 <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
                                    <input class="form-control" type="text" value="{{$order['courier_date']}}" id="courier_date" readonly="">

                                    <span class="input-group-text input-group-addon"><i class="fa fa-calendar"></i></span>
                                    
                                </div>
                              </div>
                             
                              <div class="col-md-2 mb-2"><label for="dispatch" class="control-label">Details</label> </div>                              
                              <div class="col-sm-10 mb-2"> <textarea class="form-control" id="description" placeholder="Enter Description" rows="2" name="dispatch"></textarea> </div>

                              <div class="col-md-2 d-none d-md-block"></div>
                              <div class="col-md-10">
                               <button id="AddHistory" data-loading-text="Loading..." class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Add History</button>
                              </div>   
                           </div> 
                        </div>
                     </div>
                  </div>
               </div>
                 <div class="tab-pane fade show accordion-item border-top-0 rounded-0" id="tab-pane-two" role="tabpanel" aria-labelledby="tab-two" tabindex="0">
                    <h2 class="accordion-header d-lg-none" id="headingOne"> <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"> Additional</button></h2>
                    <div id="collapseTwo" class="accordion-collapse collapse show  d-lg-block border-0" aria-labelledby="headingTwo" data-bs-parent="#myTabContent">
                       <div class="accordion-body">
                        <div class="table-responsive">
                          <table class="table table-bordered">
                             <thead>
                                <tr>
                                   <td colspan="2">Browser</td>
                                </tr>
                             </thead>
                             <tr>
                                <td colspan="2">
                                   <div id="map"> <img src="https://maps.googleapis.com/maps/api/staticmap?center=19.0728,72.8826&amp;zoom=13&amp;size=900x150&amp;maptype=roadmap%20&amp;markers=color:green%7Clabel:G%7C19.0728,72.8826%20" alt="" /></div>
                                </td>
                             </tr>
                             <tr>
                                <td class="col-md-2">IP Address</td>
                                <td>114.143.194.18</td>
                             </tr>
                             <tr>
                                <td class="col-md-2">Hostname</td>
                                <td><span id="hostname" name="hostname">static-18.194.143.114-tataidc.co.in</span></td>
                             </tr>
                             <tr>
                                <td class="col-md-2">City</td>
                                <td><span id="city" name="city">Mumbai, Maharashtra, IN </span></td>
                             </tr>
                             <tr>
                                <td class="col-md-2">Latitude/Longitude</td>
                                <td><span id="loc" name="loc">19.0728,72.8826</span></td>
                             </tr>
                             <tr>
                                <td class="col-md-2">Network</td>
                                <td><span id="org" name="org">AS17762 Tata Teleservices Maharashtra Ltd</span></td>
                             </tr>
                             <tr>
                                <td class="col-md-2">User Agent</td>
                                <td>Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36 Edg/119.0.0.0</td>
                             </tr>
                          </table>
                        </div>
                       </div>
                    </div>
                 </div>
                 <div class="tab-pane fade accordion-item border-top-0 rounded-0" id="tab-pane-three" role="tabpanel" aria-labelledby="tab-three" tabindex="0">
                    <h2 class="accordion-header d-lg-none" id="headingThree"> <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Update Payment</button> </h2>
                    <div id="collapseThree" class="accordion-collapse collapse d-lg-block border-0" aria-labelledby="headingThree" data-bs-parent="#myTabContent">
                       <div class="accordion-body">                          
                        <div class="d-block">
                           <h4 class="border-bottom pb-2 text-primary mb-4">Update Payment Status</h4>
                           <form  action="{{ url('update-payment-status') }}" id="changePaymentStatusForm" method="post">
                              @csrf
                              <input type="hidden" name="orderid" value="{{$order['orderid']}}">
                              <div class="row mb-3">
                                 <div class="col-md-2 mb-2"> 
                                    <label for="payment_status" class="control-label">Payment Status</label> 
                                 </div>
                              
                                 <div class="col-md-10 mb-2">
                                    <select class="form-control" id="payment_status" name="payment_status">
                                       <option @if($order['payment_status']="Success")
                                       selected
                                       @endif
                                       value="Success">Success</option>
                                       <option @if($order['payment_status']="Failed")
                                       selected
                                       @endif
                                       value="Failed">Failed</option>
                                       <option @if($order['payment_status']="Refund")
                                       selected
                                       @endif
                                       value="Refund">Refund</option>
                                       <option @if($order['payment_status']="Partial 
                                       Refund")
                                       selected
                                       @endif
                                       value="Partial Refund">Partial Refund</option>
                                 </select>
                                 </div>
                                 <div class="col-md-2 mb-2"><label for="payment_note" class="control-label">Payment Note</label> </div>
                                 
                                 <div class="col-md-10 mb-2">
                                    <textarea class="form-control" id="payment_note" placeholder="Enter Note" rows="2" name="payment_note"></textarea>
                                 </div>    
                                 <div class="col-md-2 d-none d-md-block">
                                 
                                 </div>
                                 <div class="col-md-10">
                                    <button class="btn btn-primary btn-sm" data-loading-text="Loading..." id="UpdatePayment"><i class="fa fa-plus-circle"></i> Update Payment</button>
                                 </div>                          
                              </div>
                           </form>
                        </div>
                     </div>
                    </div>
                 </div>
              </div>
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

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
   <div id="liveToast " class="toast hide bg-success text-white payment-update-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
       <div class="toast-header bg-success text-white">
           <strong class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
           <small>Just Now</small>
       </div>
       <div class="toast-body">
           Payment status updated Successfully
       </div>
       <div class='toast-timeline animate'></div>
   </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
   <div id="liveToast " class="toast hide bg-danger text-white payment-update-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
       <div class="toast-header bg-danger text-white">
           <strong class="me-auto"><i class="fas fa-check-circle"></i> Failure</strong>
           <small>Just Now</small>
       </div>
       <div class="toast-body">
           Payment status update failure
       </div>
       <div class='toast-timeline animate'></div>
   </div>
</div>

<script>
   $("#AddHistory").click(function(e) {
     
      let order_status = $("select#order_status").val();
      let courier_name = $("select#courier_name").val();
      let courier_number = $("input#courier_number").val();
      let courier_date = $("input#courier_date").val();
      let orderid = $("input#orderid").val();
      let description = $("textarea#description").val();

      $.ajax({
         type: "POST",
         url: "{{url('update-order-status')}}",
         data: {
            "_token": "{{ csrf_token() }}",
            "orderid" : orderid,
            "status" : order_status,
            "courier_name" : courier_name,
            "courier_number" : courier_number,
            "courier_date" : courier_date,
            "description" : description
         },
         success: function (response) {
            if(response=='order-updated'){
               $('.update-success').toast('show'); 
            }  
         }
      });

   

   });  

    
   $("form#changePaymentStatusForm").submit(function (e) { 
      e.preventDefault();
      let url = $(this).attr("action");
      let method = $(this).attr("method");
      let formData = new FormData(this);

      $.ajax({
         type: method,
         url: url,
         data: formData,
         contentType: false,
         processData: false,
         success: function (response) {
            if (response.result=="success") {
               $(".payment-update-success").toast("show");         
            } else {
               $(".payment-update-failure").toast("show");
            }

         }
      });
   });

</script>