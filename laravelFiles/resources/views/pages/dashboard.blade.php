
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
                         <li><input type="checkbox" hidden=""><label><a href="{{url("member/dashboard/")}}"><i class="fa fa-user"> </i> Profile</a></label></li>
                         <li><input type="checkbox" hidden=""><label><a href="{{url("member/change-password/")}}"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a></label></li>
                         <li><input type="checkbox" hidden=""><label><a href="{{url("member/myorders/")}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> My Orders</a></label></li>
                         <li><input type="checkbox" hidden=""><label><a href="{{url("/")}}"><i class="fa fa-power-off"></i> Logout</a></label></li> 
                      </ul>
                   </nav>
                </div>
             </div>
             <div class="col-lg-9 col-md-12 mt-md-5 mt-0 mt-lg-0">
                <div class="d-flex justify-content-between">
                    <h2 class="mb-3 heading-1">My Account</h2>
                </div>
             </div>
            </div>
        </div>
    </section>
    
</main>