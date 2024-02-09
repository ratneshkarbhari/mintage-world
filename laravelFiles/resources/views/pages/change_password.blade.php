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
                                <li class=""><input type="checkbox" hidden=""><label><a href="{{url("member/membership-detail/")}}"><i class="fa fa-user"> </i> Membership Detail</a></label></li>
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
                        <p id="errorMessage" class="text-danger">{{$errorMessage}}</p>
                        <p id="successMessage" class="text-success">{{$successMessage}}</p>
                    </div>
                    <form  action="{{url('set-new-password')}}" method="post">
                        @csrf
                        <div class="row my-profile-wrap">
                            <div class="col-md-6 mb-3">
                                <label for="" class="w-100 mb-2">Change New Password</label>
                                <div class="d-block position-relative mb-2 mt-2 ">
                                    <input required type="password" id="NewPassword" name="password"  class="form__input passwordFields m-0 form-control" placeholder=""  style="height: 46px">
                                    <a id="showPassword" class="member-btn">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <div class="tooltip-div">
                                        <i class="fa fa-info-circle link-primary"> </i>
                                        <ul>
                                            <li>Must be 8 character</li>
                                            <li>Must contain at least one character uppercase</li>
                                            <li>Must contain at least one character lowsercase</li>
                                            <li>Must contain at least one specaial character</li>
                                            <li>Must contain at least a number</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="divider w-100 mb-3"></div>
                                <div class="form-group" style="position: relative">
                                    <label for="" class="w-100 mb-2">Confirm New Password</label>

                                    <div class="d-block position-relative mb-2 mt-2 ">
                                        <input required type="password" id="confPassword" name="confPassword" class="form__input passwordFields m-0 form-control" placeholder=""   style="height: 46px">
                                        <a id="showConfPassword" class="member-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="divider w-100 mb-3"></div>
                                <p id="alertPassword"></p>

                                <button type="submit" id="UpdateButton"  class="btn btn-sm btn-explore">
                                    Update Password
                                    <span class="first"></span>
                                    <span class="second"></span>
                                    <span class="third"></span>
                                    <span class="fourth"></span>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        var check = function() {
            let TxtPwd = document.getElementById('TxtPwd');
            let TxtConfPwd = document.getElementById('TxtConfPwd');
            let alertPassword = document.getElementById('alertPassword');

            if (TxtPwd.value == "" && TxtConfPwd.value == "") {
                alertPassword.style.display = 'none';
            } else if (TxtPwd.value == TxtConfPwd.value) {
                alertPassword.style.display = 'block';
                alertPassword.style.color = '#8CC63E';
                alertPassword.innerHTML = '<span><i class="fas fa-check-circle"></i> Confirm Password Match !</span>';
            } else {
                alertPassword.style.display = 'block';
                alertPassword.style.color = '#EE2B39';
                alertPassword.innerHTML = '<span><i class="fas fa-exclamation-triangle"></i> Confirm Password Not Matching</span>';
            }
        }
        // let showPasswordIcon = '<i class="fas fa-eye"></i>'
        // let hidePasswordIcon = '<i class="fas fa-eye-slash"></i>'
        // $("button#showHidePassword").click(function (e) { 
        //     e.preventDefault();
        //    if ($("input#TxtConfPwd").attr("type")=="password") {
        //         $("input#TxtConfPwd").attr("type","text");
        //         $(this).html('')
        //         $(this).html(hidePasswordIcon)
        //    } else {
        //         $("input#TxtConfPwd").attr("type","password");
        //         $(this).html('')
        //         $(this).html(showPasswordIcon)
        //    }
        // });
    </script>
   <script>
    let showPasswordIcon = '<i class="fas fa-eye"></i>'
    let hidePasswordIcon = '<i class="fas fa-eye-slash"></i>'
        $("#showPassword").click(function (e) { 
        e.preventDefault();
       if ($("input#NewPassword").attr("type")=="password") {
            $("input#NewPassword").attr("type","text");
            $(this).html('')
            $(this).html(hidePasswordIcon)
       } else {
            $("input#NewPassword").attr("type","password");
            $(this).html('')
            $(this).html(showPasswordIcon)
       }
    });

    $("#showConfPassword").click(function (e) { 
        e.preventDefault();
       if ($("input#confPassword").attr("type")=="password") {
            $("input#confPassword").attr("type","text");
            $(this).html('')
            $(this).html(hidePasswordIcon)
       } else {
            $("input#confPassword").attr("type","password");
            $(this).html('')
            $(this).html(showPasswordIcon)
       }
    });
    $(".passwordFields").change(function (e) { 
        e.preventDefault();
        if($("input#NewPassword").val()==$("input#confPassword").val()){
            $("button#registerButton").removeClass("disabled");
        }else{
            $("button#registerButton").addClass("disabled");
        }
    });

</script>

</main>