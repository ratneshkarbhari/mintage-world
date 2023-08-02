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
                <h2 class="mb-3 heading-1">SHOPPING CART (1)</h2>
            </div>           
          <div class="row">
            <div class="col-md-8 booking-wrap">
                <div class="step-wrap  mt-3">
                   <h6 class="heading-2"><b>Delivery Addresses</b></h6>
                   <div class="mt-3 radio-btn-wrap checkout-user-detail">
                      <ul class="mb-0">
                        <li class="w-100 mb-3 me-0 pb-3 border-bottom d-md-flex justify-content-between">
                            <div>
                                <input type="radio" id="lblAdd1" name="selector" checked="">
                                <label for="lblAdd1"><span>Nandkumar Arekar</span><br>1/3 Shivsagar Rahiwashi Sangh, Bhatwadi, Ghatkopar (W), Mumbai - 400086, Maharashtra, India.</label>                  
                                <div class="check"></div>
                            </div>                           
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#EditAddModal"><i class="fa fa-pen"></i> Edit</button>
                         </li>

                         <li class="w-100 mb-3 me-0 pb-3 border-bottom d-md-flex justify-content-between">
                           <div>
                               <input type="radio" id="lblAdd12" name="selector">
                               <label for="lblAdd12"><span>Ratnesh</span><br>1/3 Shivsagar Rahiwashi Sangh, Bhatwadi, Ghatkopar (W), Mumbai - 400086, Maharashtra, India.</label>                  
                               <div class="check"></div>
                           </div>                           
                           <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#EditAddModal"><i class="fa fa-pen"></i> Edit</button>
                        </li>
                         <li class="w-100">
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#NewAddModal"><i class="fa fa-location"></i>Add New Address</button>
                         </li>
                      </ul>
                   </div>
                </div>
                <div class="step-wrap  mt-5 PM-wrap">
                   <h6 class="heading-2"><b>Payment Method</b></h6>
                   <p>Choose Payment Gateway:</p> 
                     <input type="radio" name="ePayment" id="ccavenue" class="hidden" /><label for="ccavenue"><img src="https://www.mintageworld.com/img/ccavenue.jpg" class="img-fluid" alt="" /></label>
                     <input type="radio" name="ePayment" id="razorpay" class="hidden" /><label for="razorpay"><img src="https://www.mintageworld.com/img/Razorpay.jpg" class="img-fluid" alt="" /></label>
                </div>
                <div class="step-wrap  mt-5">
                   <h6 class="heading-2"><b>Confirm Order</b></h6>
                   <div class="checkout-content-box payment-method-box" style="display: block;">
                      <div class="row heading-row border-bottom-0 w-100 m-auto">
                         <div class="col-md-2"><strong>Image</strong></div>
                         <div class="col-md-3"><strong>Product Name</strong></div>
                         <div class="col-md-2"><strong>Price</strong></div>
                         <div class="col-md-2"><strong>Discount</strong></div>
                         <div class="col-md-1"><strong>Qty</strong></div>
                         <div class="col-md-2"><strong>Total</strong></div>
                      </div>
                      <!-- repeat div in loop start -->
                      <div class="row content-row border-bottom-0 w-100 m-auto">
                         <div class="col-md-2 col-4 img-div">
                            <img src="https://s3-ap-southeast-1.amazonaws.com/mint-product-img/MICCVIEC8764.jpg" alt="" class="img-fluid">
                         </div>
                         <div class="col-md-3 col-8 product-name-div">
                            <p><strong>British India Victoria Empress - 1/12 Anna Coin 1897 calcutta</strong> </p>
                         </div>
                         <div class="col-md-2 col-12 d-md-flex align-items-center justify-content-center">
                            <span class="d-md-none d-block m-heading font-weight-bold">Price</span> 
                            <div class="cart-quantity text-right">
                               <span class="cart-price m-0"><i class="fa fa-inr" aria-hidden="true"></i>  600</span>
                            </div>
                         </div>
                         <div class="col-md-2 col-12 d-md-flex align-items-center justify-content-center">
                            <span class="d-md-none d-block m-heading font-weight-bold">Discount</span> 
                            <div class="cart-quantity text-right">
                               <span class="cart-price m-0"><i class="fa fa-inr" aria-hidden="true"></i> 00 </span>
                            </div>
                         </div>
                         <div class="col-md-1 col-12 d-md-flex align-items-center justify-content-center">
                            <span class="d-md-none d-block m-heading font-weight-bold">Qty</span> 
                            <div class="cart-quantity m-0 text-right">1</div>
                         </div>
                         <div class="col-md-2 col-12 d-md-flex align-items-center justify-content-center">
                            <span class="d-md-none d-block m-heading font-weight-bold">Total</span> 
                            <span class="cart-final-price m-0 font-weight-bold"> 600</span>
                         </div>
                      </div>
                      <!-- repeat div in loop end -->
                      <div class="row total-row w-100 m-auto">
                         <div class="col-md-10 col-6 total-heading font-weight-bold">Sub Total:</div>
                         <div class="col-md-2 col-6 total-amount font-weight-bold">₹  600</div>
                      </div>
                      <input type="hidden" name="sub_total" value="199">
                   </div>
                </div>
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
                               <td class="border-bottom text-end ps-0 pe-0">₹ 1349</td>
                            </tr>
                            <tr>
                               <td class="border-bottom ps-0 pe-0">
                                  Coupon
                               </td>
                               <td class="couponAmount border-bottom text-end ps-0 pe-0"> ₹ 0 </td>
                            </tr>
                            <tr>
                               <td class="border-bottom ps-0 pe-0">
                                  Shipping
                               </td>
                               <td class="border-bottom text-end ps-0 pe-0">
                                  <span class="shipping_charges">₹ 00</span>
                               </td>
                            </tr>
                            <tr>
                               <td class="ps-0 pe-0">
                                  <strong>Total</strong>
                               </td>
                               <td class="border-bottom text-end ps-0 pe-0">
                                  <strong class="grand_total text-end">₹ 1349</strong>
                               </td>
                            </tr>
                         </tbody>
                      </table>
                   </div>
                   <div class="submit-box mt-2 w-100 text-end">
                      <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-check-double"></i> Place Order</button>
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
                  <div class="row" >
                     <div class="col-md-8 mb-3">
                        <label for="inputName">Name</label>
                        <input type="text" 
                            class="form-control" 
                            id="inputName" 
                            placeholder="Name" value="Nandkumar Arekar">
                     </div>
                     <div class="col-md-4  mb-3">
                        <label for="inputMobileNo">Mobile No</label>
                        <input type="number" 
                            class="form-control" 
                            id="inputMobileNo" 
                            placeholder="Mobile No" value="9898989898">
                     </div>
                     <div class="col-md-12  mb-3">
                        <label for="inputAddress">Address</label>
                        <input type="text" 
                            class="form-control" 
                            id="inputAddress" 
                            placeholder="Address" value="1/3 shivsagar rahiwashi sangh, ,bhatwadi, ghatkopar west">
                     </div>
                     <div class="col-md-6  mb-3">
                        <label for="inputCity">City</label>
                        <input type="text" 
                        class="form-control" 
                        id="inputCity" 
                        placeholder="City" value="Mumbai">
                     </div>
                     <div class="col-md-6  mb-3">
                        <label for="inputState">State</label>
                        <select id="inputState" name="inputState" class="form-control" required="required"><option value="">--- Select your state ---</option>
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
                           <option value="West Bengal">West Bengal</option></select>
                     </div>
                     <div class="col-md-6  mb-3">
                        <label for="inputZip">Zip Code</label>
                        <input type="number" 
                        class="form-control" 
                        id="inputZip" 
                        placeholder="Zip Code" value="400084">
                     </div>
                     <div class="col-md-6  mb-3">
                        <label for="inputCountry">Country</label>
                        <select id="inputCountry" name="inputCountry" class="form-control" required="required"><option value="113" selected="selected">India</option></select>
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
               <div class="add-wraper">
                  <div class="row" >
                     <div class="col-md-8 mb-3">
                        <label for="inputName">Name</label>
                        <input type="text" 
                            class="form-control" 
                            id="inputName">
                     </div>
                     <div class="col-md-4  mb-3">
                        <label for="inputMobileNo">Mobile No</label>
                        <input type="number" 
                            class="form-control" 
                            id="inputMobileNo"  >
                     </div>
                     <div class="col-md-12  mb-3">
                        <label for="inputAddress">Address</label>
                        <input type="text" 
                            class="form-control" 
                            id="inputAddress"  >
                     </div>
                     <div class="col-md-6  mb-3">
                        <label for="inputCity">City</label>
                        <input type="text" 
                        class="form-control" 
                        id="inputCity"  >
                     </div>
                     <div class="col-md-6  mb-3">
                        <label for="inputState">State</label>
                        <select id="inputState" name="inputState" class="form-control" required="required"><option value="">Select your state ---</option>
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
                           <option value="West Bengal">West Bengal</option></select>
                     </div>
                     <div class="col-md-6  mb-3">
                        <label for="inputZip">Zip Code</label>
                        <input type="number" 
                        class="form-control" 
                        id="inputZip">
                     </div>
                     <div class="col-md-6  mb-3">
                        <label for="inputCountry">Country</label>
                        <select id="inputCountry" name="inputCountry" class="form-control" required="required"><option value="113" selected="selected">India</option></select>
                     </div>                   
                  </div> 
               </div>
            </div>
         </div>
      </div>
   </div>

</main>