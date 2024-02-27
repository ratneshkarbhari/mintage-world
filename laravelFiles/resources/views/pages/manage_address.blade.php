
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/default-banner.jpg")}}" /></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2">
                        <a href="{{url("/")}}"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item me-2">Manage Address</li>                    
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
                         <li><input type="checkbox" hidden=""><label><a href="{{url("member/dashboard/")}}"><i class="fa fa-user"> </i> Profile</a></label></li>
                         <li><input type="checkbox" hidden=""><label><a href="{{url("member/membership-detail/")}}"><i class="fa fa-user"> </i> Membership Detail</a></label></li>
                         <li class="active-li"><input type="checkbox" hidden=""><label><a href="{{url("member/manage-address/")}}"><i class="fa fa-map-marker-alt"> </i> Manage Address</a></label></li>
                         <li><input type="checkbox" hidden=""><label><a href="{{url("member/change-password/")}}"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a></label></li>
                         <li><input type="checkbox" hidden=""><label><a href="{{url("member/myorders/")}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> My Orders</a></label></li>
                         <li><input type="checkbox" hidden=""><label><a href="{{url("/")}}"><i class="fa fa-power-off"></i> Logout</a></label></li> 
                      </ul>
                   </nav>
                </div>
             </div>
             <div class="col-lg-9 col-md-12 mt-md-5 mt-0 mt-lg-0">
               <div class="d-flex justify-content-between align-items-center">
                  <h2 class="mb-3 heading-1">Manage Address</h2>
                  <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#NewAddModal"><i class="fa fa-location"></i>Add New Address</button>
              </div>

               
                <div class="row my-profile-wrap">
                  <div class="col-md-12">
                     <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>Sr. No</th>
                                 <th>Tag</th>
                                 <th>Name</th> 
                                 <th>Address</th>                                 
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>01</td>
                                 <td>Home</td>
                                 <td>Nandkumar Arekar</td>
                                 <td>1/3 SHivsagar Rahiwashi sangh Bhatwadi Ghatkopar West Mumbai - 400084<br>
                                    9930176267
                                 </td>                                 
                                 <td>
                                    <button class="btn btn-secondary btn-sm " data-bs-toggle="modal" data-bs-target="#EditAddModal-sa-member"><i class="fa fa-pen"></i></button> 
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-address">
                                       <i class="fa fa-trash"></i></button>
                                 </td>
                              </tr>
                              <tr>
                                 <td>02</td>
                                 <td>Office</td>
                                 <td>Nandkumar Arekar</td>
                                 <td>1/3 SHivsagar Rahiwashi sangh Bhatwadi Ghatkopar West Mumbai - 400084<br>
                                    9930176267
                                 </td>                                 
                                 <td>
                                    <button class="btn btn-secondary btn-sm " data-bs-toggle="modal" data-bs-target="#EditAddModal-sa-member"><i class="fa fa-pen"></i></button> 
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-address">
                                       <i class="fa fa-trash"></i></button>
                                 </td>
                              </tr>
                              <tr>
                                 <td>03</td>
                                 <td>Other</td>
                                 <td>Nandkumar Arekar</td>
                                 <td>1/3 SHivsagar Rahiwashi sangh Bhatwadi Ghatkopar West Mumbai - 400084<br>
                                    9930176267
                                 </td>                                  
                                 <td>
                                    <button class="btn btn-secondary btn-sm " data-bs-toggle="modal" data-bs-target="#EditAddModal-sa-member"><i class="fa fa-pen"></i></button> 
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete-address">
                                       <i class="fa fa-trash"></i></button>
                                 </td>
                              </tr>

                           </tbody>
                        </table>
                     </div>
                  </div>
                     
                 </div>
             </div>
            </div>
        </div>
    </section>
 

    <div class="modal fade" id="EditAddModal-sa-member" tabindex="-1" aria-labelledby="EditAddModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
            <div class="modal-body text-start p-3">
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               <h4 class="text-start mb-3">Edit Address</h4>
               <hr>
               <div class="add-wraper">
                  <form class="update-member-address-form" action="{{url('update-member-address')}}" method="post">
                     {{-- @csrf
                     <input type="hidden" name="member_id" value=""> --}}
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <label for="inputName">First Name</label>
                           <input type="text" class="form-control" id="inputName" placeholder="Name" 
                           {{-- value="{{$member['first_name']}}"  --}}
                           pattern="[A-Za-z]" title="Enter only character / Max. limit is 20" required>                                                      
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="last_name">Last Name</label>
                           <input name="last_name" type="text" class="form-control" id="lastName" 
                           {{-- value="{{$member['last_name']}}"  --}}
                           pattern="[A-Za-z]" title="Enter only character / Max. limit is 20" required>
                        </div>
                        <div class="col-md-4  mb-3">
                           <label for="inputMobileNo">Mobile No</label>
                           <input type="text" class="form-control" id="inputMobileNo" name="mobile" placeholder="Mobile No" minlength="10" maxlength="10" title="Enter Only Indian 10 Digits Mobile No" pattern="[6-9]{1}[0-9]{9}" 
                           {{-- value="{{$member['mobile']}}" --}}
                            required>
                           
                        </div>
                        <div class="col-md-12  mb-3">
                           <label for="inputAddress">Address</label>
                           <textarea name="address" class="form-control" cols="30" rows="5">
                              {{-- {{$member['address']}} --}}                           
                           </textarea>
                        </div>
                        <div class="col-md-6  mb-3">
                           <label for="inputCity">City</label>
                           <input type="text" class="form-control" id="inputCity" name="city" placeholder="City" 
                           {{-- value="{{$member['city']}}" --}}
                           required>
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
                           <input type="number" class="form-control" id="inputZip" placeholder="Zip Code" maxlength="6" minlength="6" pattern="[0-9]*" title="Only 6 Digit" name="pincode" 
                           {{-- value="{{$member['pincode']}}" --}}
                           required>
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
                  </form>
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
            <form id="createNewAddress" action="{{ url('create-new-address-for-member') }}" method="POST">
               @csrf
               <input type="hidden" name="member_id" value="{{session('member_id')}}">
               <div class="add-wraper">
                  <div class="row">
                     <div class="col-md-6 mb-3">
                        <label for="firstName">First Name</label>
                        <input name="first_name" type="text" class="form-control" id="firstName" maxlength="20" pattern="[A-Za-z]{0,20}" title="Enter only character / Max. limit is 20" required>                           
                     </div>
                     <div class="col-md-6 mb-3">
                        <label for="lastName">Last Name</label>
                        <input name="last_name" type="text" class="form-control" id="lastName" maxlength="20" pattern="[A-Za-z]{0,20}" title="Enter only character / Max. limit is 20" required>                           
                     </div>
                     <div class="col-md-6  mb-3">
                        <label for="mobileNumber">Mobile No</label>
                        <input name="mobile_number" type="text" class="form-control" id="mobileNumber" minlength="10" maxlength="10" title="Enter Only Indian 10 Digits Mobile No" pattern="[6-9]{1}[0-9]{9}" required>                           
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
                        <input name="city" type="text" class="form-control" id="inputCity" required>
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
                        <input name="zip" type="text" class="form-control" id="inputZip" maxlength="6" minlength="6" pattern="[0-9]*" title="Only 6 Digit" required>
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


<div class="modal fade" id="delete-address" tabindex="-1" aria-labelledby="Delete-Address" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="Delete-Address-9Label">Delete Address</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            Are you Sure?
         </div>
         <div class="modal-footer">
            <form class="Delete-Address-Form" method="post" action="#">
               <input type="hidden" name="_token" value=""><input type="hidden" name="address_id" value="9">
               <button type="submit" class="btn btn-danger btn-sm">DELETE ADDRESS PERMANENTLY</button>
            </form>
         </div>
      </div>
   </div>
</div>
  
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 999">
   <div id="liveToast " class="toast bg-success text-white add-to-cart-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
       <div class="toast-header bg-success text-white">
           <strong class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
           <small>Just Now</small>
           
       </div>
       <div class="toast-body">
           "Your Address" is added to list.
       </div>
       <div class="toast-timeline animate"></div>
   </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 999">
<div id="liveToast " class="toast hide bg-danger text-white add-to-cart-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header bg-danger text-white">
        <strong class="me-auto"><i class="fas fa-check-circle"></i> Failure</strong>
        <small>Just Now</small>
        
    </div>
    <div class="toast-body">
      "Your Address" is not to list please contact administrator.
    </div>
    <div class="toast-timeline animate"></div>
</div>
</div> 
</main>