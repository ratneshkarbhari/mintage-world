
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/default-banner.jpg")}}" /></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2">
                        <a href="{{url("/")}}"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item me-2">My Account</li>                    
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
                         <li class="active-li"><input type="checkbox" hidden=""><label><a href="{{url("member/dashboard/")}}"><i class="fa fa-user"> </i> Profile</a></label></li>
                         <li class=""><input type="checkbox" hidden=""><label><a href="{{url("member/membership-detail/")}}"><i class="fa fa-user"> </i> Membership Detail</a></label></li>
                         <li><input type="checkbox" hidden=""><label><a href="{{url("member/change-password/")}}"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a></label></li>
                         <li><input type="checkbox" hidden=""><label><a href="{{url("member/myorders/")}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> My Orders</a></label></li>
                         <li><input type="checkbox" hidden=""><label><a href="{{url("/")}}"><i class="fa fa-power-off"></i> Logout</a></label></li> 
                      </ul>
                   </nav>
                </div>
             </div>
             <div class="col-lg-9 col-md-12 mt-md-5 mt-0 mt-lg-0">
                <div class="d-flex justify-content-between">
                    <h2 class="mb-3 heading-1">My Profile</h2>
                    <span class="d-inline-block"><a href="javascript:void(0)" class="btn btn-primary btn-sm" id="edit_profile"  onclick="removeattr()"><i class="fa fa-edit"></i> Edit Profile</a></span>
                </div>
                <div class="row my-profile-wrap">
                    <div class="col-md-4 mb-3">
                       <label for="" class="w-100 mb-2">Name</label>
                       <input type="text" name="" id="TxtName" value="{{session("first_name")}} {{session("last_name")}}" class="form-control inp-dis" disabled>
                       <div class="divider w-100 mb-3"></div>
                       <label for="" class="w-100 mb-2">Member Type</label> 
                        @if(session("level")=="Regular")
                        <div class="d-flex justify-content-between">
                           <div class="d-inline-block alert alert-success p-0 mb-0 px-2">{{session("level")}}</div>  
                           <a class="btn btn-sm btn-primary p-0 mb-0 px-2" href="{{url("upgrade-membership")}}">Update Membership</a>  
                        </div>
                        @else
                        <div class="d-inline-block alert alert-success p-0 mb-0 px-2">{{session("level")}}</div>  
                        @endif
 

                       
                       <div class="divider w-100 mb-3"></div>
                       <label for="" class="w-100 mb-2">Email ID</label>
                       <input type="text" name="" id="TxtEmailID" value="{{session("email")}}" class="form-control inp-dis" disabled >
                       <div class="divider w-100 mb-3"></div>
                       <label for="" class="w-100 mb-2">Mobile No</label>
                       <input type="text" name="" id="TxtMobileNo" value="{{$user["mobile"]}}" class="form-control inp-dis" disabled > 
                    </div>
                    <div class="col-md-8 mb-3">
                       <div class="row">
                          <div class="col-md-12 mb-3">
                             <label for="" class="w-100 mb-2">Address</label>
                             <textarea name="address" class="form-control inp-dis" placeholder="Enter address" rows="4"  disabled>{{$user["address"]}}</textarea>
                          </div>
                          <div class="col-md-6 mb-3">
                             <label for="" class="w-100 mb-2">Country</label>
                             <select name="country_id" class="form-control inp-dis" required="required" disabled>
                                <option value="113" selected="selected">India</option>
                             </select>
                          </div>
                          <div class="col-md-6 mb-3">
                             <label for="" class="w-100 mb-2">State</label>
                             <select name="state_id" class="form-control inp-dis" required="required" disabled>
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
                          <div class="col-md-6 mb-3">
                             <label for="" class="w-100 mb-2">City</label>
                             <input type="text" name="city" class="form-control inp-dis" value="{{$user["city"]}}" disabled>
                          </div>
                          <div class="col-md-6 mb-3">
                             <label for="" class="w-100 mb-2">Pin Code</label>
                             <input type="text" name="pincode" class="form-control inp-dis" placeholder="Enter pin code" required="required" value="{{$user["pincode"]}}" disabled>
                          </div>
                       </div>
                    </div>
                    <div class="col-md-12 d-none" id="udate-profile-btn">
                        <button type="button" id="updateProfile" class="btn btn-sm btn-explore"> 
                            Update Profile
                            <span class="first"></span>
                            <span class="second"></span>
                            <span class="third"></span>
                            <span class="fourth"></span>
                        </button>
                        
                        <button type="button" class="btn btn-sm btn-danger rounded-pill" onclick="removeattr()"> 
                           CANCEL 
                       </button>
                    </div>
                 </div>
             </div>
            </div>
        </div>
    </section>
    <script>
      function removeattr() {
      let edit_profile = document.getElementById("edit_profile");
      let udate_profile_btn = document.getElementById("udate-profile-btn");
      if (edit_profile.className === "btn btn-primary btn-sm") {        
         edit_profile.className = "btn btn-primary btn-sm d-none";
         document.querySelectorAll('.inp-dis').forEach(b=>b.removeAttribute('disabled'));
         udate_profile_btn.className = "col-md-12";
      } 
      else {
         edit_profile.className = "btn btn-primary btn-sm";
         document.querySelectorAll('.inp-dis').forEach(b=>b.setAttribute('disabled', 'true'));         
         udate_profile_btn.className = "col-md-12 d-none";
      }
      } 
    </script>
</main>