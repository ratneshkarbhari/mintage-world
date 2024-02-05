<main class="page-content">
   <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/default-banner.jpg")}}" /></section>

   <section class="breadcrumb-wraper">
      <div class="container-fluid px-lg-2 px-lg-5">
         <nav aria-label="breadcrumb" class="breadcrumb-title-box">
            <ol class="breadcrumb">
               <li class="breadcrumb-item me-2"><a href="http://localhost/mintage-world"><i class="fa fa-home"></i> Home</a></li>
               <li class="breadcrumb-item me-2" aria-current="page"><a href="http://localhost/mintage-world/shop">Shopping </a></li>
               <li class="breadcrumb-item me-2" aria-current="page">Checkout</li>
            </ol>
         </nav>
      </div>
   </section>

   <section class="common-padding coing-list-wraper">
      <div class="container-fluid  px-lg-2 px-lg-5">
         <div class="d-flex justify-content-between">
            <h2 class="mb-3 heading-1">CHECKOUT</h2>
         </div>
         <div class="row">
           
            <div class="col-md-8 booking-wrap">
               <div class="step-wrap  mb-3">
                  <h6 class="heading-2"><b>Confirm Order</b></h6>
                  <div class="checkout-content-box payment-method-box" style="display: block;">
                     <div class="row heading-row border-bottom-0 w-100 m-auto">
                        <div class="col-md-2"><strong>Image</strong></div>
                        <div class="col-md-3"><strong>Product Name</strong></div>
                        <div class="col-md-3"><strong>Price</strong></div>
                        <div class="col-md-1"><strong>Qty</strong></div>
                        <div class="col-md-3"><strong>Total</strong></div>
                     </div>
                     <!-- repeat div in loop start -->
                     @php $subtotal = 0.00; @endphp
                     @foreach($cart_items as $cart_item)
                     @php
                     $product = $cart_item["product"];
                     $imgParts = explode("/",$product["img"]);
                     @endphp
                     <div class="row content-row border-bottom-0 w-100 m-auto">
                        <div class="col-md-2 col-4 img-div">
                           <img src="{{getenv('PRODUCT_IMAGE_BASE_URL').$imgParts[2]}}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-3 col-8 product-name-div">
                           <p><strong>{{$cart_item["product"]["name1"]}}</strong> </p>
                        </div>
                        <div class="col-md-3 col-12 d-md-flex align-items-center justify-content-center">
                           <span class="d-md-none d-block m-heading font-weight-bold">Price</span>
                           <div class="cart-quantity text-right">
                              <span class="cart-price m-0"><i class="fa fa-inr" aria-hidden="true"></i> {{$product["price"]}}</span>
                           </div>
                        </div>
   
                        <div class="col-md-1 col-12 d-md-flex align-items-center justify-content-center">
                           <span class="d-md-none d-block m-heading font-weight-bold">Qty</span>
                           <div class="cart-quantity m-0 text-right">{{$cart_item["quantity"]}}</div>
                        </div>
                        <div class="col-md-3 col-12 d-md-flex align-items-center justify-content-center">
                           <span class="d-md-none d-block m-heading font-weight-bold">Total</span>
                           <span class="cart-final-price m-0 font-weight-bold"> {{$itemPrice = $product["price"]*$cart_item["quantity"]}}</span>
                           {{-- @php $subtotal+=$itemPrice; @endphp --}}
                        </div>
                     </div>
                     @endforeach
                     <!-- repeat div in loop end -->
                     <div class="row total-row w-100 m-auto">
                        <div class="col-md-10 col-6 total-heading font-weight-bold">SubTotal:</div>
                        <div class="col-md-2 col-6 total-amount font-weight-bold">₹ {{session("subtotal")}}</div>
                     </div>
                  </div>
               </div>
               <input type="hidden" name="billing_address">
               <input type="hidden" name="billing_city">
               <input type="hidden" name="billing_state">
               <input type="hidden" name="billing_country">
               <input type="hidden" name="billing_pincode">
               <input type="hidden" name="shipping_address">
               <input type="hidden" name="shipping_city">
               <input type="hidden" name="shipping_state">
               <input type="hidden" name="shipping_country">
               <input type="hidden" name="shipping_pincode">

               @if(session("member_id"))
               <div class="step-wrap  mt-3">
                  <h6 class="heading-2"><b>Billing Addresses</b></h6>
                  <div class="mt-3 radio-btn-wrap checkout-user-detail">
                     <ul class="mb-0">
                        @if($member["address"])
                           <li id="add_1" class="w-100 mb-3 me-0 pb-3 border-bottom d-md-flex justify-content-between">
                              <div>
                                 <input type="radio" id="lblAdd1" name="billing_address"
                                 pincode="{{$member['pincode']}}" first_name="{{$member['first_name']}}" last_name="{{$member['last_name']}}"
                                 address="{{$member['address']}}" 
                                 mobile_number="{{$member['mobile_number']}}" 
                                 city = "{{$member['city']}}"
                                 state = "{{$member['state']}}"
                                 country = "{{$member['country']}}"
                                 checked="">
                                 <label for="lblAdd1"><span>{{$member["first_name"]}} {{ $member["last_name"] }}</span>
                                 <br>
                                 {{$member["address"]}}<br>
                                 {{$member["city"]}},{{$member["state"]}}, {{$member["pincode"]}}<br>
                                 {{$member["country"]}}</label>
                                 <div class="check"></div>
                              </div>
                              <div class="btn-row">                                 
                                 <button class="btn btn-secondary btn-sm " data-bs-toggle="modal" data-bs-target="#EditAddModal"><i class="fa fa-pen"></i> Edit</button>
                                 <button class="btn btn-danger btn-sm DeleteAddModal" id="" data-id="add_1"><i class="fa fa-trash"></i> Delete</button>
                              </div>
                           </li>
                        @endif                        
                        @if($member["addresses"])
                        @foreach($member["addresses"] as $address)
                           <li id="add_1" class="w-100 mb-3 me-0 pb-3 border-bottom d-md-flex justify-content-between">
                              <div>
                                 <input type="radio"
                                 @if($address['default']=="yes")
                                 checked 
                                 @endif

                                 pincode="{{$address['zip']}}" first_name="{{$address['first_name']}}" last_name="{{$address['last_name']}}"
                                 address="{{$address['address']}}" 
                                 mobile_number="{{$address['mobile_number']}}" 
                                 city = "{{$address['city']}}"
                                 state = "{{$address['state']}}"
                                 country = "{{$address['country']}}"

                                 id="lblAdd12" name="billing_address">
                                 <label for="lblAdd12"><span>{{$address["first_name"]}} {{ $address["last_name"] }}</span><br>
                                 {{$address["address"]}}<br>
                                 {{$address["city"]}},{{$address["state"]}}, {{$address["zip"]}}<br>
                                 {{$address["country"]}}</label>
                                 <div class="check"></div>
                              </div>
                              <div class="btn-row">                                 
                                 <button class="btn btn-secondary btn-sm " data-bs-toggle="modal" data-bs-target="#EditAddModal"><i class="fa fa-pen"></i> Edit</button>
                                 <button class="btn btn-danger btn-sm DeleteAddModal" id="" data-id="add_1"><i class="fa fa-trash"></i> Delete</button>
                              </div>
                           </li>
                        @endforeach
                        @endif
                        <li class="w-100">
                           <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#NewAddModal"><i class="fa fa-location"></i>Add New Address</button>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="step-wrap  mt-3">
                  <h6 class="heading-2"><b>Shipping Addresses</b></h6>
                  <div class="mt-3 radio-btn-wrap checkout-user-detail">
                     <ul class="mb-0">
                        @if($member["address"]!=NULL)
                           <li id="add_1" class="w-100 mb-3 me-0 pb-3 border-bottom d-md-flex justify-content-between">
                              <div>
                                 <input type="radio" id="lblAdd1" class="shipping_address" name="shipping_address" pincode="{{$member['pincode']}}" first_name="{{$member['first_name']}}" last_name="{{$member['last_name']}}"
                                 address="{{$member['address']}}" 
                                 mobile_number="{{$member['mobile']}}" 
                                 city = "{{$member['city']}}"
                                 state = "{{$member['state']}}"
                                 country = "{{$member['country']}}"
                                 checked="">
                                 <label for="lblAdd1"><span>{{$member["first_name"]}} {{ $member["last_name"] }}</span>
                                 <br>
                                 {{$member["address"]}}<br>
                                 {{$member["city"]}},{{$member["state"]}}, {{$member["pincode"]}}<br>
                                 {{$member["country"]}}</label>
                                 <div class="check"></div>
                              </div>
                              <div class="btn-row">                                 
                              <button class="btn btn-secondary btn-sm " data-bs-toggle="modal" data-bs-target="#EditAddModal"><i class="fa fa-pen"></i> Edit</button>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#Delete-Address-{{$address['id']}}" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                              <div class="modal fade" id="Delete-Address-{{$address['id']}}" tabindex="-1" aria-labelledby="Delete-Address-{{$address['id']}}Label" aria-hidden="true">
                                 <div class="modal-dialog">
                                    <div class="modal-content">
                                       <div class="modal-header">
                                       <h1 class="modal-title fs-5" id="Delete-Address-{{$address['id']}}Label">Delete Address</h1>
                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>
                                       <div class="modal-body">
                                       Are you Sure?
                                       </div>
                                       <div class="modal-footer">
                                          <form pid="{{$address['id']}}" class="Delete-Address-Form" method="post" action="{{url('delete-address-exe')}}">
                                          @csrf
                                          <input type="hidden" name="pid" value="{{$address['id']}}">
                                          <button type="submit" class="btn btn-primary btn-danger">DELETE ADDRESS PERMANENTLY</button>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           </li>
                        @endif
                        @if($member["addresses"])
                        @foreach($member["addresses"] as $address)
                           <li class="w-100 mb-3 me-0 pb-3 border-bottom d-md-flex justify-content-between">
                              <div>
                                 <input type="radio"
                                 @if($address['default']=="yes")
                                 checked 
                                 @endif
                                 pincode="{{$address['zip']}}" first_name="{{$address['first_name']}}" last_name="{{$address['last_name']}}"
                                 address="{{$address['address']}}" 
                                 mobile_number="{{$address['mobile_number']}}" 
                                 city = "{{$address['city']}}"
                                 state = "{{$address['state']}}"
                                 country = "{{$address['country']}}"
                                 id="lblAdd12" class="shipping_address" name="shipping_address">
                                 <label for="lblAdd12"><span>{{$address["first_name"]}} {{ $address["last_name"] }}</span><br>
                                 {{$address["address"]}}<br>
                                 {{$address["city"]}},{{$address["state"]}}, {{$address["zip"]}}<br>
                                 {{$address["country"]}}
                                 </label>
                                 <div class="check"></div>
                              </div>
                              <div class="btn-row">                                 
                                 <button class="btn btn-secondary btn-sm " data-bs-toggle="modal" data-bs-target="#EditAddModal"><i class="fa fa-pen"></i> Edit</button>
                                 <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                              </div>
                           </li>
                        @endforeach
                        @endif
                        <li class="w-100">
                           <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#NewAddModal"><i class="fa fa-location"></i>Add New Address</button>
                        </li>
                     </ul>
                  </div>
               </div>
               @endif
              

            </div>
            <div class="col-md-4 checkout-summary mt-3 mt-md-0">
               <div class="border p-2 py-3 ">
                  <h6 class="heading-2"><b>Order Summary</b></h6>
                  <div class="table-responsive">
                     <table class="table">
                        <tbody>
                           <tr>
                              <td class="border-bottom ps-0 pe-0">
                                 Subtotal
                              </td>
                              <td class="border-bottom text-end ps-0 pe-0">₹ {{session("subtotal")}}</td>
                           </tr>
                           <tr>
                              <td class="border-bottom ps-0 pe-0">
                                 Coupon
                              </td>
                              <td class="couponAmount border-bottom text-end ps-0 pe-0"> ₹ {{session("discount")}} </td>
                           </tr>
                           <tr>
                              <td class="border-bottom ps-0 pe-0">
                                 Shipping
                              </td>
                              <td class="border-bottom text-end ps-0 pe-0">
                                 <span class="shipping_charges">₹
                                    @if(session("subtotal")<499) @php $shipping=100; @endphp @else @php $shipping=0; @endphp @endif {{$shipping}} </span>
                              </td>
                           </tr>
                           <tr>
                              <td class="ps-0 pe-0">
                                 <strong>Total</strong>
                              </td>
                              <td class="border-bottom text-end ps-0 pe-0">
                                 <strong class="grand_total text-end">₹ {{$payable}}</strong>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>


                  @if(session("member_id"))

                  <div class="submit-box mt-2 w-100 text-end">
                     <button id="rzp-button1" type="submit" class="btn btn-success btn-lg 
                     
                     " <?php
                     if(count($member['addresses'])==0){
                     echo "disabled";
                  }
                     ?>><i class="fa fa-check-double"></i>
                        Pay now</button>
                  </div>

                  @else


                  <button type="button" class="btn btn-success btn-lg  " data-bs-toggle="modal" data-bs-target="#LoginModal">
                     <i class="fa fa-check-double"></i> Login to checkout
                     <span class="first"></span>
                     <span class="second"></span>
                     <span class="third"></span>
                     <span class="fourth"></span>
                  </button>

                  @endif


               </div>
            </div>

         </div>

      </div>
      </div>
   </section>

   <div class="modal fade" id="EditAddModal" tabindex="-1" aria-labelledby="EditAddModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
            <div class="modal-body text-start p-3">
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               <h4 class="text-start mb-3">Edit Address</h4>
               <hr>
               <div class="add-wraper">
                  <div class="row">
                     <div class="col-md-6 mb-3">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Name" value="Nandkumar">
                     </div>
                     <div class="col-md-6 mb-3">
                        <label for="last_name">Last Name</label>
                        <input name="last_name" type="text" class="form-control" id="lastName" value="Arekar">
                     </div>
                     <div class="col-md-4  mb-3">
                        <label for="inputMobileNo">Mobile No</label>
                        <input type="number" class="form-control" id="inputMobileNo" placeholder="Mobile No" value="9898989898">
                     </div>
                     <div class="col-md-12  mb-3">
                        <label for="inputAddress">Address</label>
                        <textarea name="address" class="form-control" cols="30" rows="5">ultra media ent. pvt ltd, 2C third floor, thakker Ind. Estate, Lower Parel (E)
                        </textarea>
                     </div>
                     <div class="col-md-6  mb-3">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity" placeholder="City" value="Mumbai">
                     </div>
                     <div class="col-md-6  mb-3">
                        <label for="inputState">State</label>
                        <select id="inputState" name="inputState" class="form-control" required="required">
                           <option value="">--- Select your state ---</option>
                           <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                           <option value="Andhra Pradesh">Andhra Pradesh</option>
                           <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                           <option value="Assam">Assam</option>
                           <option value="Bihar">Bihar</option>
                           <option value="Chandigarh">Chandigarh</option>
                           <option value="Chhattisgarh">Chhattisgarh</option>
                           <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                           <option value="Daman and Diu">Daman and Diu</option>
                           <option value="Delhi">Delhi</option>
                           <option value="Goa">Goa</option>
                           <option value="Gujarat">Gujarat</option>
                           <option value="Haryana">Haryana</option>
                           <option value="Himachal Pradesh">Himachal Pradesh</option>
                           <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                           <option value="Jharkhand">Jharkhand</option>
                           <option value="Karnataka">Karnataka</option>
                           <option value="Kerala">Kerala</option>
                           <option value="Lakshadweep">Lakshadweep</option>
                           <option value="Madhya Pradesh">Madhya Pradesh</option>
                           <option value="Maharashtra" selected="selected">Maharashtra</option>
                           <option value="Manipur">Manipur</option>
                           <option value="Meghalaya">Meghalaya</option>
                           <option value="Mizoram">Mizoram</option>
                           <option value="Nagaland">Nagaland</option>
                           <option value="Orissa">Orissa</option>
                           <option value="Pondicherry">Pondicherry</option>
                           <option value="Punjab">Punjab</option>
                           <option value="Rajasthan">Rajasthan</option>
                           <option value="Sikkim">Sikkim</option>
                           <option value="Tamil Nadu">Tamil Nadu</option>
                           <option value="Telangana">Telangana</option>
                           <option value="Tripura">Tripura</option>
                           <option value="Uttar Pradesh">Uttar Pradesh</option>
                           <option value="Uttaranchal">Uttaranchal</option>
                           <option value="West Bengal">West Bengal</option>
                        </select>
                     </div>
                     <div class="col-md-6  mb-3">
                        <label for="inputZip">Zip Code</label>
                        <input type="number" class="form-control" id="inputZip" placeholder="Zip Code" value="400084">
                     </div>
                     <div class="col-md-6  mb-3">
                        <label for="inputCountry">Country</label>
                        <select id="inputCountry" name="inputCountry" class="form-control" required="required">
                           <option value="113" selected="selected">India</option>
                        </select>
                     </div>
                     <div class="col-md-6  mb-3">
                        <button type="submit" class="btn btn-success btn-sm">Update Address</button>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="modal fade" id="NewAddModal" tabindex="-1" aria-labelledby="NewAddModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
            <div class="modal-body text-start p-3">
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               <h4 class="text-start mb-3">Add New Address</h4>
               <hr>
               <form action="{{ url('create-new-address-for-member') }}" method="POST">
                  @csrf
                  <input type="hidden" name="member_id" value="{{session('member_id')}}">
                  <div class="add-wraper">
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <label for="firstName">First Name</label>
                           <input name="first_name" type="text" class="form-control" id="firstName">
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="lastName">Last Name</label>
                           <input name="last_name" type="text" class="form-control" id="lastName">
                        </div>
                        <div class="col-md-6  mb-3">
                           <label for="mobileNumber">Mobile No</label>
                           <input name="mobile_number" type="text" class="form-control" id="mobileNumber">
                        </div>
                        <div class="col-md-6  mb-3">
                           <label for="addressTag">Tag</label>
                           <select id="addressTag" name="address_tag" class="form-control" required="required">
                              <option value="Home" selected="selected">Home</option>
                              <option value="Office" selected="selected">Office</option>
                              <option value="Other" selected="selected">Other</option>
                           </select>
                        </div>
                        <div class="col-md-12  mb-3">
                           <label for="inputAddress">Address</label>
                           <textarea name="address" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                        <div class="col-md-6  mb-3">
                           <label for="city">City</label>
                           <input name="city" type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="col-md-6  mb-3">
                           <label for="inputState">State</label>
                           <select id="inputState" name="state" class="form-control" required="required">
                              <option value="">Select your state ---</option>
                              <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                              <option value="Andhra Pradesh">Andhra Pradesh</option>
                              <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                              <option value="Assam">Assam</option>
                              <option value="Bihar">Bihar</option>
                              <option value="Chandigarh">Chandigarh</option>
                              <option value="Chhattisgarh">Chhattisgarh</option>
                              <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                              <option value="Daman and Diu">Daman and Diu</option>
                              <option value="Delhi">Delhi</option>
                              <option value="Goa">Goa</option>
                              <option value="Gujarat">Gujarat</option>
                              <option value="Haryana">Haryana</option>
                              <option value="Himachal Pradesh">Himachal Pradesh</option>
                              <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                              <option value="Jharkhand">Jharkhand</option>
                              <option value="Karnataka">Karnataka</option>
                              <option value="Kerala">Kerala</option>
                              <option value="Lakshadweep">Lakshadweep</option>
                              <option value="Madhya Pradesh">Madhya Pradesh</option>
                              <option value="Maharashtra">Maharashtra</option>
                              <option value="Manipur">Manipur</option>
                              <option value="Meghalaya">Meghalaya</option>
                              <option value="Mizoram">Mizoram</option>
                              <option value="Nagaland">Nagaland</option>
                              <option value="Orissa">Orissa</option>
                              <option value="Pondicherry">Pondicherry</option>
                              <option value="Punjab">Punjab</option>
                              <option value="Rajasthan">Rajasthan</option>
                              <option value="Sikkim">Sikkim</option>
                              <option value="Tamil Nadu">Tamil Nadu</option>
                              <option value="Telangana">Telangana</option>
                              <option value="Tripura">Tripura</option>
                              <option value="Uttar Pradesh">Uttar Pradesh</option>
                              <option value="Uttaranchal">Uttaranchal</option>
                              <option value="West Bengal">West Bengal</option>
                           </select>
                        </div>
                        <div class="col-md-6  mb-3">
                           <label for="inputZip">Zip Code</label>
                           <input name="zip" type="number" class="form-control" id="inputZip">
                        </div>
                        <div class="col-md-6  mb-3">
                           <label for="inputCountry">Country</label>
                           <select id="inputCountry" name="country" class="form-control" required="required">
                              <option value="113" selected="selected">India</option>
                           </select>
                        </div>

                     </div>
                  </div>
                  <button type="submit" class="btn btn-success btn-sm">Add Address</button>
               </form>
            </div>
         </div>
      </div>
   </div>

   {{-- <div class="modal fade" id="DeleteAddModal" tabindex="-1" aria-labelledby="DeleteAddModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <input type="hidden" name="bookId" id="bookId" value=""/>
            <div class="modal-body text-center mt-5">
               <h4 class="modal-title w-100">Are you sure?</h4>	      
               <p>Do you really want to delete these records?</p>
            </div>
            <div class="modal-footer justify-content-center">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
               <button type="button" id="add_delete_btn" class="btn btn-danger delete-add-btn">Delete</button>
            </div>
         </div>
      </div>
   </div>      --}}
   <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 999">
      <div id="liveToast " class="toast hide bg-success text-white add-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">         
          <strong class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
          <small>Just Now</small>
          {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
        </div>
        <div class="toast-body">
          "Your Address" has been Added / Update in list Successfully.
        </div>
        <div class='toast-timeline animate'></div>
      </div>
    </div>
   <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 999">
      <div id="liveToast " class="toast hide bg-danger text-white add-deleted position-relative" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">         
          <strong class="me-auto"><i class="fas fa-check-circle"></i> Addres Deleted </strong>
          <small>Just Now</small>
          {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
        </div>
        <div class="toast-body">
         "Your Addres" has been deleted from list. 
        </div>
        <div class='toast-timeline animate'></div>
      </div>
    </div>
</main>

<script>
   $(document).ready(function () {
      let shippingAddressField = $("input[name=shipping_address]:checked");
      let billingAddressField = $("input[name=billing_address]:checked");


      $.ajax({
         type: "POST",
         url: "{{url('create-order-exe')}}",
         data: {
            "_token": "{{ csrf_token() }}",

            "rzp_order_id" : '{{$order["id"]}}',
            "shipping_address" : shippingAddressField.attr("address"),
            "shipping_city" : shippingAddressField.attr("city"),
            "shipping_state" : shippingAddressField.attr("state"),
            "shipping_country" : shippingAddressField.attr("country"),
            "shipping_mobile_number" : shippingAddressField.attr("mobile_number"),
            "shipping_pincode" : billingAddressField.attr("pincode"),
            "billing_address" : billingAddressField.attr("address"),
            "billing_city" : billingAddressField.attr("city"),
            "billing_state" : billingAddressField.attr("state"),
            "billing_country" : billingAddressField.attr("country"),
            "billing_mobile_number" : billingAddressField.attr("mobile_number"),
            "billing_pincode" : billingAddressField.attr("pincode"),
            "status" : "Payment Processing",
            "payment_status" : "Processing",
         },
         success: function (response) {
            console.log("order-created");
            // $('.add-success').toast('show');
         }
      });
   });
</script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
   var options = {
      "key": '{{getenv('RAZOR_KEY ')}}', // Enter the Key ID generated from the Dashboard
      "amount": "{{$payable*100}}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
      "currency": "INR",
      "name": "Mintage World",
      "description": "Ecommerce Sale",
      "image": "https://www.mintageworld.com/public/img/zf2-logo.png",
      "order_id": '{{$order["id"]}}', //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
      "handler": function(response) {

         let rzpOrderId = response.razorpay_order_id;

         $.ajax({
            type: "POST",
            url: "{{url('place-order-exe')}}",
            data: {
               "_token": "{{ csrf_token() }}",
               "status" : "Not Confirmed",
               "payment_status" : "Success"
            },
            success: function(response) {

               if (response == "updated") {

                  window.location.replace('{{url("payment-successful")}}');


               } else {


                  $("#failureMessage").html("Payment failed try again");

               }

            }
         });

      },
      "modal": {
         "ondismiss": function(){

            $.ajax({
               type: "POST",
               url: "{{url('update-order-exe')}}",
               data: {
                  "_token": "{{ csrf_token() }}",
                  "gw_tx_id": '{{$order["id"]}}',
                  "status" : "Cancelled",
                  "payment_status" : "Cancelled"
               },
               success: function(response) {

                  if (response == "order-updated") {

                     $("#failureMessage").html("Complete the payment to place your order");

                  }

               }
            });
            
         }
      },
      "theme": {
         "color": "#e19726"
      }
   };
   var rzp1 = new Razorpay(options);
   rzp1.on('payment.failed', function(response) {
      $("p#failureMessage").html("Payment failed, Contact support and mention {{$order['id']}} .");
   });
   document.getElementById('rzp-button1').onclick = function(e) {

      
      
      rzp1.open();
      e.preventDefault();
   }
</script>



<script>

$(function(){
  $(".DeleteAddModal").click(function(){
     $('#bookId').val($(this).data('id')); 
    $("#DeleteAddModal").modal("show");    
  });
});


   $("#add_delete_btn").click(function(e) {      
    $('.add-deleted').toast('show');
    const li_id = $("#bookId").val();
    $("#"+li_id).remove();  
    $('#DeleteAddModal').modal('hide'); 
   });  
</script>