<?php

use App\Models\Product;

?>

<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/default-banner.jpg")}}" /></section>

    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2"><a href="http://localhost/mintage-world"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item me-2" aria-current="page"><a href="http://localhost/mintage-world/shop">Shopping </a></li>
                    <li class="breadcrumb-item me-2" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="common-padding coing-list-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <div class="d-flex justify-content-between">
                <h2 class="mb-3 heading-1">SHOPPING CART ({{count($cart_items)}})</h2>
            </div>

            <div class="cart row">
                <div class="basket col-lg-8 col-md-7 col-12">
                    @if (empty($cart_items))                    
                        <h1>No Items in Cart</h1>
                    @else
                        @php
                        $subTotal = 0.00;
                        @endphp
                        @foreach ($cart_items as $cart_item)
                        @php
                        $product = Product::find($cart_item["product_id"]);
                        $itemCost = $product["price"]*$cart_item["quantity"];
                        $subTotal += $itemCost;
                        $imgParts = explode("/",Product::find($cart_item["product_id"])["img"]);
                        @endphp
                        <div class="shopping-cart-wrap" id="cart-item-{{$cart_item["product_id"]}}">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href=""><img src="{{getenv("PRODUCT_IMAGE_BASE_URL").$imgParts[2]}}" class="img-fluid cart-img" alt=""></a>
                                </div>
                                <div class="col-md-6">
                                    <div class="shopping-cart-title">
                                        <a href="#">{{$product["name1"]}}</a>
                                        <small class="d-none" id="product-price-{{$product["id"]}}">{{$product["price"]}}</small>
                                        <div class="product-count">
                                            <div action="#" class="d-flex">
                                                <button class="qtyminus" productId="{{$product["id"]}}">-</button>
                                                <input type="text" name="quantity" value="{{$cart_item["quantity"]}}" class="qty" id="quantity-{{$product["id"]}}">
                                                <button class="qtyplus" productId="{{$product["id"]}}">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 text-md-end mt-md-0 mt-3">
                                    <div class="price "><span class="me-2 d-inline-block"> </span> <i class="fas fa-rupee-sign"></i> <span class="cart-item-amount" id="cart-item-amount-{{$product["id"]}}">{{$itemCost}}</span></div>
                                    <div class="shopping-cart-remove">
                                        <button pid="{{$product["id"]}}" class="deleteFromCart btn btn-danger btn-sm" ><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @endforeach

                        
                    @endif

                    


                </div>
                @if (!empty($cart_items))

                <div class="shopping-cart-summary col-lg-4 col-md-5 col-12">
                    <div class="shopping-summary">
                        <div class="shopping-cart-header">
                            Shopping Summary
                        </div>
                        <div class="table-responsive mb-3">
                            @php
                            session([
                                "subtotal" => $subTotal
                            ])
                            @endphp
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><b>Sub-Total:</b></td>
                                        <td class="text-end"><label for="" id="lblSubTotal"> {{$subTotal}}</label></td>
                                    </tr>
                                    <tr class="discount-row">
                                        <td><b>Coupon Discount</b></td>
                                        <td class="text-end"><label for="" id="lblCouponDisc"> {{$discount}}</label></td>
                                    </tr>
                                    <tr class="total-row">
                                        <td><b>Total :</b>
                                            <span class="d-block small">(Prices are inclusive of all taxes)</span>
                                        </td>
                                        <td class="text-end"><i class="fas fa-rupee-sign"></i><label for="" id="lblTotal"> {{$subTotal - $discount}}</label></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="Coupon Code">
                            <div class="shopping-cart-header">
                                Use Coupon Code
                            </div>
                            <label for="">Enter your coupon here</label>
                            <div class="d-flex">
                                <input type="text" name="" value="{{session("code")}}" id="txtCouponCode" class="form-control">
                                <button id="apply-coupon" class="btn btn-sm btn-info text-white ">Apply</button>
                            </div>

                        </div>
                       
                        <div class="shopping-cart-btn">
                            <a class="btn btn-sm btn-primary " href="{{url('/shop')}}"><i class="fab fa-opencart"></i> Continue Shopping</a>
                            <a class="btn btn-lg  btn-success " href="{{url('/checkout')}}"><i class="fa fa-check-double"></i> Checkout</a>
                            
                        </div>
                    </div>
                </div>

                @endif
            </div>

        </div>
    </section>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 999">
        <div id="liveToast " class="toast hide bg-danger text-white add-to-cart-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header bg-danger text-white">         
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
            <small>Just Now</small>
            {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
          </div>
          <div class="toast-body">
            "Your Product" has been deleted from cart.
          </div>
          <div class='toast-timeline animate'></div>
        </div>
      </div>

      <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 999">
        <div id="liveToast " class="toast hide bg-success text-white coupon-apply-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header bg-success text-white">         
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
            <small>Just Now</small>
            {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
          </div>
          <div class="toast-body">
            Coupon successfully applied
          </div>
          <div class='toast-timeline animate'></div>
        </div>
      </div>
      <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 999">
        <div id="liveToast " class="toast hide bg-danger text-white coupon-apply-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header bg-danger text-white">         
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
            <small>Just Now</small>
            {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
          </div>
          <div class="toast-body">
            Coupon not applied
          </div>
          <div class='toast-timeline animate'></div>
        </div>
      </div>
</main>

<script>

    // function recalculateSubTotal() {
    //     let subTotal = 0.00;


    // }

 let recalculateSubTotal = () => {
    // console.log("enter")
    let subTotal = 0.00;
    let listItems1 = document.querySelectorAll(".cart-item-amount");  
    let lblSubTotal =   document.getElementById("lblSubTotal");
    let lblCouponDisc =   document.getElementById("lblCouponDisc");
    let lblTotal =   document.getElementById("lblTotal");
    listItems1.forEach(function (item) {
        subTotal = subTotal + parseInt(item.innerText);
    });
    // console.log(parseInt(lblCouponDisc.innerText));
    lblSubTotal.innerText = subTotal;
    lblTotal.innerText = parseInt(lblSubTotal.innerText) - parseInt(lblCouponDisc.innerText);
 }
    $(".qtyminus").click(function (e) {
        e.preventDefault();
        let pid = $(this).attr("productId");
        let currentQuantity = $("input#quantity-"+pid).val();
        if(parseInt(currentQuantity)!=1){
            $.ajax({
            type: "POST",
                url: "{{url('decrease-cart-item-quantity')}}",
                data: {
                    "_token" : "{{ csrf_token() }}",
                    "pid" : pid,
                },
                success: function (response) {
                    let productPrice = $("small#product-price-"+pid).html();
                    let productQty = $("input#quantity-"+pid).val();
                    cartItemAmount = parseInt(productPrice)*parseInt(productQty);
                    $("span#cart-item-amount-"+pid).html(cartItemAmount)     
                    recalculateSubTotal();                                
                }
            });
        }
    });

    $(".qtyplus").click(function (e) { 
        e.preventDefault();
        let pid = $(this).attr("productId");
        let cartItemAmount = 0.00;
        $.ajax({
            type: "POST",
            url: "{{url('increase-cart-item-quantity')}}",
            data: {
                "_token" : "{{ csrf_token() }}",
                "pid" : pid,
            },
            success: function (response) {
                let productPrice = $("small#product-price-"+pid).html();
                let productQty = $("input#quantity-"+pid).val();
                cartItemAmount = parseInt(productPrice)*parseInt(productQty);
                $("span#cart-item-amount-"+pid).html(cartItemAmount)
                recalculateSubTotal();
             }
        });
    });


    $(".deleteFromCart").click(function (e) { 
        e.preventDefault();
        let pid = $(this).attr("pid");
       
        $.ajax({
            type: "POST",
            url: "{{url('delete-cart-item')}}",
            data: {
                "_token" : "{{ csrf_token() }}",
                "pid" : pid,
            },
            success: function (response) {                
                $("div#cart-item-"+pid).remove();
                $('.add-to-cart-success').toast('show');
                recalculateSubTotal();                 
            } 
        });
        
    });

    $("button#apply-coupon").click(function (e) { 
        e.preventDefault();
        let codeEntered = $("#txtCouponCode").val();
        $.ajax({
            type: "POST",
            url: "{{url('apply-coupon-exe')}}",
            data: {
                "_token" : "{{ csrf_token() }}",

                "code" : codeEntered
            },
            success: function (response) {
                if(response.message=="coupon-applied"){
                    $(".coupon-apply-success").toast("show");
                    location.reload();
                }else{
                    $(".coupon-apply-failure").toast("show");
                }
            }
        });
    });

</script>