
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/default-banner.jpg")}}" /></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2">
                        <a href="{{url("/")}}/"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item me-2">Membership Detail</li>                    
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
                         <li class="active-li"><input type="checkbox" hidden=""><label><a href="{{url("member/membership-detail/")}}/"><i class="fa fa-user"> </i> Membership Detail</a></label></li>
                         <li><input type="checkbox" hidden=""><label><a href="{{url("member/manage-address/")}}/"><i class="fa fa-user"> </i> Manage Address</a></label></li>
                         <li><input type="checkbox" hidden=""><label><a href="{{url("member/change-password/")}}/"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a></label></li>
                         <li><input type="checkbox" hidden=""><label><a href="{{url("member/myorders/")}}/"><i class="fa fa-shopping-cart" aria-hidden="true"></i> My Orders</a></label></li>
                         <li><input type="checkbox" hidden=""><label><a href="{{url("/")}}/"><i class="fa fa-power-off"></i> Logout</a></label></li> 
                      </ul>
                   </nav>
                </div>
             </div>
             <div class="col-lg-9 col-md-12 mt-md-5 mt-0 mt-lg-0">
                <div class="d-flex justify-content-between">
                    <h2 class="mb-3 heading-1">Membership Detail</h2>
                   
                </div>
                <div class="row my-profile-wrap">
                  <div class="col-md-12">
                     <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>Sr. No</th>
                                 <th>Membership</th>
                                 <th>Expiry Date</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>01</td>
                                 <td>{{session("level")}}</td>
                                 <td>
                                    30/11/2023
                                 </td>
                                 <td>
                                    @if(session("level")=="Regular")
                                    <a class="btn btn-sm btn-primary p-0 mb-0 px-2" href="{{url("upgrade-membership")}}/" >Update Membership</a>  
                                    @else
                                    --
                                    @endif

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
   
</main>