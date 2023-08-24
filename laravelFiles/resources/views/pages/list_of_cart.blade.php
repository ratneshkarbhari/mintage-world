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

                        @foreach ($cart_items as $cart_item)
                        @php
                        $imgParts = explode("/",Product::find($cart_item["product_id"])["img"]);


                        @endphp
                        <div class="shopping-cart-wrap">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href=""><img src="{{getenv("PRODUCT_IMAGE_BASE_URL").$imgParts[2]}}" class="img-fluid cart-img" alt=""></a>
                                </div>
                                <div class="col-md-6">
                                    <div class="shopping-cart-title">
                                        <a href="#">Malaysia Currency Note 1 Ringgit</a>
                                        <div class="product-count">
                                            <div action="#" class="d-flex">
                                                <div class="qtyminus">-</div>
                                                <input type="text" name="quantity" value="{{$cart_item["quantity"]}}" class="qty">
                                                <div class="qtyplus">+</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 text-md-end mt-md-0 mt-3">
                                    <div class="price "><span class="me-2 d-inline-block"><i class="fas fa-rupee-sign"></i> 299 </span> <i class="fas fa-rupee-sign"></i> 175</div>
                                    <div class="shopping-cart-remove">
                                        <button class="btn btn-danger btn-sm" href="#"><i class="fa fa-trash"></i></button>
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
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><b>Sub-Total:</b></td>
                                        <td class="text-end"><label for="" id="lblSubTotal"> 998</label></td>
                                    </tr>
                                    <tr class="discount-row">
                                        <td><b>Coupon Discount</b></td>
                                        <td class="text-end"><label for="" id="lblCouponDisc"> 00</label></td>
                                    </tr>
                                    <tr class="total-row">
                                        <td><b>Total :</b>
                                            <span class="d-block small">(Prices are inclusive of all taxes)</span>
                                        </td>
                                        <td class="text-end"><i class="fas fa-rupee-sign"></i><label for="" id="lblTotal"> 998</label></td>
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
                                <input type="text" name="" id="txtCouponCode" class="form-control">
                                <button class="btn btn-sm btn-info text-white ">Apply</button>
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

</main>