
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url('assets/images/inside-banner/default-banner.jpg')}}" /></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item me-2">Forgot password</li>                    
                </ol>
            </nav>
        </div>
    </section>    


    <section class="common-padding coing-list-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <div class="d-flex justify-content-center">
                <h2 class="mb-3 heading-1">Forgot password</h2>
            </div>
            <div class="login-form-content ">
                <div class="col-md-4 text-center company__info">
                    <span class="company__logo">
                        <h2><i class="fas fa-users-cog"></i></h2>
                    </span>
                </div>
                <div class="col-md-8 col-xs-12 col-sm-12 login_form "> 
                    <p class="text-danger text-center">{{$error}}</p>
                    <form method="POST" action="{{url('forgot-password-email-verif-exe')}}" >                        
                        @csrf
                        <input type="text" name="verify_code" id="loginEmail" class="form__input form-control" placeholder="Enter Verification code"> 
                        {{-- <input type="text" name="new_password" id="newPwd" class="form__input" placeholder="Enter new Password" >  --}}
                        <div class="d-block position-relative mb-3">
                            <input required type="password" id="NewPassword" name="new_password" class="form__input m-0 passwordFields form-control" placeholder="Enter new Password" style="height: 46px">
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

                        {{-- <input type="text" name="new_password_conf" id="newPwdConf" class="form__input" placeholder="Confirm new Password">  --}}
                        <div class="d-block position-relative mb-3 mt-3 ">
                            <input required type="password" id="confPassword" name="new_password_conf"  class="form__input passwordFields m-0 form-control" placeholder="Confirm new Password" style="height: 46px">
                            <a id="showConfPassword" class="member-btn">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>

                        <span class="small text-end d-block w-100"> 
                        <button type="submit" class="btn">Verify Code</button>
                    </form>
                    <p class="text-danger text-center" id="loginError"></p>                   
                    <p class="mb-4 text-center">Don't have an account? <a href="{{url('member/')}}">Register Here</a></p>
                </div>
                </div>
        </div>
    </section>
    
    <script>
        let showPasswordIcon = '<i class="fas fa-eye"></i>'
        let hidePasswordIcon = '<i class="fas fa-eye-slash"></i>'
            $("#showPassword").click(function (e) { 
            e.preventDefault();
           if ($("input#password").attr("type")=="password") {
                $("input#password").attr("type","text");
                $(this).html('')
                $(this).html(hidePasswordIcon)
           } else {
                $("input#password").attr("type","password");
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
            if($("input#password").val()==$("input#confPassword").val()){
                $("button#registerButton").removeClass("disabled");
            }else{
                $("button#registerButton").addClass("disabled");
            }
        });

    </script>

</main>