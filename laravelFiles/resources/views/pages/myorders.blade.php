
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/default-banner.jpg")}}" /></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2">
                        <a href="{{url("/")}}/"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item me-2">My Orders</li>                    
                </ol>
            </nav>
        </div>
    </section>
    <section class="common-padding coing-list-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5">
           <div class="row">
            <div class="col-lg-3 col-md-12 left-filter-wrap ">
                <div id="InfoFilter" class="filter-wrap">
                   <div class="filter-link"><i class="fa fa-filter" aria-hidden="true"></i> <b>SHOP BY CATEGORIES</b> </div>
                </div>
                <div id="CategoryMenu" class="category-menu">
                   <nav class="nav" role="navigation">
                      <div class="cat-heading">
                         <b><i class="fa fa-filter" aria-hidden="true"></i>My Account</b> 
                         <div id="CatClose" class="categories-close">X</div>
                      </div>
                      <ul class="nav__list">                          
                         <li><input type="checkbox" hidden=""><label><a href="{{url("member/dashboard/")}}/"><i class="fa fa-user"> </i> Profile</a></label></li>
                         <li class=""><input type="checkbox" hidden=""><label><a href="{{url("member/membership-detail/")}}/"><i class="fa fa-user"> </i> Membership Detail</a></label></li>
                         <li><input type="checkbox" hidden=""><label><a href="{{url("member/manage-address/")}}/"><i class="fa fa-user"> </i> Manage Address</a></label></li>
                         <li><input type="checkbox" hidden=""><label><a href="{{url("member/change-password/")}}/"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a></label></li>
                         <li class="active-li"><input type="checkbox" hidden=""><label><a href="{{url("member/myorders/")}}/"><i class="fa fa-shopping-cart" aria-hidden="true"></i> My Orders</a></label></li>
                         <li><input type="checkbox" hidden=""><label><a href="{{url("/")}}/"><i class="fa fa-power-off"></i> Logout</a></label></li> 
                      </ul>
                   </nav>
                </div>
             </div>
             <div class="col-lg-9 col-md-12 mt-md-5 mt-0 mt-lg-0">
                <div class="d-flex justify-content-between">
                    <h2 class="mb-3 heading-1">My Orders</h2> 
                </div>
                <div class="title"> <p class="d-block"><b>Note:</b></p> 
                    <p>In case the order doesn’t go through (i.e - you don’t receive an order confirmation email) but you’ve still received a message from your bank or wallet provider stating that the amount has been debited, don’t worry!  </p>
                    <p>We will have to check the status on our payment gateway. It will be updated in 24 hours or you can contact our Customer Support : <a href="tel:02240190400">022-40190400</a></p>
                </div>

                <div class="table-responsive" id="orders">
                    <table class="table table-bordered table-striped  my-order-table">
                        <thead class="table-primary">
                        <tr>
                            <th>Order ID</th>
                            <th class="order-detail-th">Order Detail</th>
                            <th>Order Date</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach ($orders as $order)

                            <tr>
                                <td><a class="order-popup" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#InvoiceModal"><b>{{$order["orderid"]}}</b></a></td>
                                <td>                          
                                    <ul class="order-list">
                                        @foreach ($order["order_products"] as $product)
                                            

                                        <li class="d-flex justify-content">
                                            <div class="order-img">
                                                {{-- <a href="#"><img src="{{$}}" alt="" class="img-fluid"></a> --}}
                                            </div>
                                            <div class="order-name">
                                                <a href="#">{{$product["productname"]}}</a>
                                                <span>
                                                    Quantity : {{$product["quantity"]}} 
                                               </span>
                                                <span>
                                                    <i class="fa fa-rupee-sign "></i> {{$product["price"]}} 
                                                </span>
                                            </div>
                                        </li>
                                        
                                        @endforeach

                                    </ul> 
                                </td>
                                <td>{{date('d-m-Y',strtotime($order["ordered"]))}}</td>
                                <td> <i class="fa fa-rupee-sign "></i> {{$order["payableamount"]}}</td>
                                <td><div class="alert alert-warning">
                                    @if($order["status"]=="Not Confirmed")
                                    Placed
                                    @else
                                    $order["status"]
                                    @endif
                                </div></td>
                            </tr>
                            
                            
                            @endforeach



                        </tbody>


                    </table>
                </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
<div class="modal fade order-detail-popup" id="InvoiceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Order Detail</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="invoice" class="effect2">    
                <div id="invoice-top" class="pb-0 row">
                    <div class="col-md-6"> <div class="logo"><img src="https://www.mintageworld.com/public/img/zf2-logo.png" alt="Logo"></div></div>
                    <div class="col-md-6">
                        <div class="title" style="text-align: right">   
                            <h5 class="mb-0">Invoice #<span class="invoiceVal invoice_num">Sept-04-23/01</span></h5>
                            <p>Order Date: <span id="invoice_date">01 Feb 2018</span></p>                    
                          </div><!--End Title--> 
                    </div>
                 
                 
                  <div class="address-line col-md-12">
                    <p class="mb-0"><b>ULTRA MINTAGE WORLD LTD.</b></p>
                    <p class="mb-0"> <small> 2-C, Thackar Indl. Estate N. M. Joshi Marg, Lower Parel (E), Mumbai - 400 011.</small></p>
                    <p class="mb-0"><small>022 - 40190400</small></p>
                  </div>
                </div><!--End InvoiceTop-->
             
                
                <div id="invoice-mid">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="mb-0">Billing Address</p>
                            <p class="mb-0"><b>Nandkumar Arekar</b></p>
                            <p class="mb-0">1/3 Shivsagar Rahiwashi Sangh, Bhatwadi, Ghatkopar West, Mumbai - 400086</p>
                            <p class="mb-0">Mobile : 9930176267</p>                            
                        </div>
                        <div class="col-md-6">
                            <p class="mb-0">Shipping Address</p>
                            <p class="mb-0"><b>Nandkumar Arekar</b></p>
                            <p class="mb-0">1/3 Shivsagar Rahiwashi Sangh, Bhatwadi, Ghatkopar West, Mumbai - 400086</p>
                            <p class="mb-0">Mobile : 9930176267</p>                            
                        </div>
                    </div>

                         
                </div><!--End Invoice Mid-->
                
                <div id="invoice-bot">                  
                    <div class="table-responsive">
                      <table class="table-main table table-striped table-bordered">
                        <thead>    
                            <tr class="tabletitle table-primary">
                              <th>No</th>
                              <th>Product Name</th>
                              <th>Quantity</th>
                              <th>Price</th>  
                              <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr class="list-item">
                              <td data-label="No" class="tableitem">1</td>
                              <td data-label="Product Name" class="tableitem">Gujarat Sultanate Coin of Nasir Al Din Mahmud Shah I - Copper Half Falus</td>
                              <td data-label="Quantity" class="tableitem">1</td>
                              <td data-label="Price" class="tableitem">650</td>
                              <td data-label="Total" class="tableitem">650</td> 
                        </tr>
                        <tr class="list-item">
                          <td data-label="No" class="tableitem">2</td>
                          <td data-label="Product Name" class="tableitem">Gujarat Sultanate Coin of Nasir Al Din Mahmud Shah I - Copper Half Falus</td>
                          <td data-label="Quantity" class="tableitem">1</td>
                          <td data-label="Price" class="tableitem">650</td>
                          <td data-label="Total" class="tableitem">650</td> 
                    </tr>
                          <tr class="list-item total-row table-dark">
                              <th colspan="4" class="tableitem">Grand Total</th>
                              <td data-label="Grand Total" class="tableitem">1300</td>
                          </tr>
                      </tbody></table>
                    </div><!--End Table--> 
                    
                  </div>
                <footer>
                  <div id="legalcopy">
                    <P class="mb-0">*This is a computer generated invoice and does not require a physical signature</P>
                    <p class="mb-0">Our mailing address is:
                        <span class="email"><a href="mailto:info@mintageworld.com">info@mintageworld.com</a></span>
                    </p>
                  </div>
                </footer>
              </div>
        </div>
        <div class="modal-footer"> 
          <button type="button" class="btn btn-primary"  onclick="printDiv('invoice')"><i class="fas fa-print"></i> Print</button>
        </div>
      </div>
    </div>
  </div>
<script>
    function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
window.onafterprint = function() {
        window.location.reload(true);
    };
    </script>
</main>