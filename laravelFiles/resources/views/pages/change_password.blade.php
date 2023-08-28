
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/default-banner.jpg")}}" /></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2">
                        <a href="{{url("/")}}"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item me-2">Change Password</li>                    
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
                         <li class="active-li"><input type="checkbox" hidden=""><label><a href="{{url("member/change-password/")}}"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a></label></li>
                         <li><input type="checkbox" hidden=""><label><a href="{{url("member/myorders/")}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> My Orders</a></label></li>
                         <li><input type="checkbox" hidden=""><label><a href="{{url("/")}}"><i class="fa fa-power-off"></i> Logout</a></label></li> 
                      </ul>
                   </nav>
                </div>
             </div>
             <div class="col-lg-9 col-md-12 mt-md-5 mt-0 mt-lg-0">
                <div class="d-flex justify-content-between">
                    <h2 class="mb-3 heading-1">Change Password</h2> 
                </div>
                <div class="row my-profile-wrap">
                    <div class="col-md-6 mb-3">
                       <label for="" class="w-100 mb-2">Change New Password</label>
                       <input type="Password" name="" id="TxtPwd" value="" class="form-control" onkeyup='check()' required>
                       <div class="divider w-100 mb-3"></div>
                       <div class="form-group" style="position: relative">
                       <label for="" class="w-100 mb-2">Confirm New Password</label>                        
                       <input type="Password" name="" id="TxtConfPwd" value="" class="form-control" onkeyup='check()' required>   
                       <button style="position: absolute;top: 45%; right: 0%;" id="showHidePassword" class="btn">
                        <i class="fas fa-eye"></i>
                        </button>
                    </div>
                       <div class="divider w-100 mb-3"></div>      
                       <p id="alertPassword"></p>

                       <button type="button" class="btn btn-sm btn-explore"> 
                        Update Password 
                        <span class="first"></span>
                        <span class="second"></span>
                        <span class="third"></span>
                        <span class="fourth"></span>
                    </button>
                    </div> 
                 </div>
            </div>
            </div>
        </div>
    </section>
    <script> 
        var check = function() { 
            let TxtPwd = document.getElementById('TxtPwd');
            let TxtConfPwd = document.getElementById('TxtConfPwd');
            let alertPassword = document.getElementById('alertPassword');

            if (TxtPwd.value == "" && TxtConfPwd.value == "")  {
            alertPassword.style.display = 'none';            
            }
            
      else if (TxtPwd.value == TxtConfPwd.value)  {
        alertPassword.style.display = 'block';
        alertPassword.style.color = '#8CC63E';
        alertPassword.innerHTML = '<span><i class="fas fa-check-circle"></i> Confirm Password Match !</span>';
      } else {
        alertPassword.style.display = 'block';
        alertPassword.style.color = '#EE2B39';        
        alertPassword.innerHTML = '<span><i class="fas fa-exclamation-triangle"></i> Confirm Password Not Matching</span>';
      }
  }
    let showPasswordIcon = '<i class="fas fa-eye"></i>'
    let hidePasswordIcon = '<i class="fas fa-eye-slash"></i>'
    $("button#showHidePassword").click(function (e) { 
        e.preventDefault();
       if ($("input#TxtConfPwd").attr("type")=="password") {
            $("input#TxtConfPwd").attr("type","text");
            $(this).html('')
            $(this).html(hidePasswordIcon)
       } else {
            $("input#TxtConfPwd").attr("type","password");
            $(this).html('')
            $(this).html(showPasswordIcon)
       }
    });
    </script>


</main>