
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/default-banner.jpg")}}" /></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2">
                        <a href="{{url("/")}}"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item me-2">Sign In</li>                    
                </ol>
            </nav>
        </div>
    </section>    


    <section class="common-padding coing-list-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5 text-center">
            <div class="d-flex justify-content-center">
                <h2 class="mb-3 heading-1">Sign In</h2>
            </div>
            <div class="login-form-content ">
                <div class="col-md-4 text-center company__info">
                    <span class="company__logo">
                        <h2><i class="fas fa-sign-in-alt"></i></h2>
                    </span>
                </div>
                <div class="col-md-8 col-xs-12 col-12 login_form  text-start"> 

                    <p class="text-success text-center">
                        {{$success}}
                    </p>
                    
                    <form action="{{url('member-login-exe')}}" id="memberLoginForm" method="POST">                        
                        @csrf
                        <div class="form-group mb-3 mt-5">
                        <label for="login-username"><b>Email ID</b></label>
                        <input type="text" name="username" id="login-username" class="form__input m-0" placeholder="">
                        </div>
                        <div class="form-group mb-3" style="position: relative">
                        <label for="login-password"><b>Password</b></label>
                        <div class="d-block position-relative">
                            <input type="password" name="password" id="login-password" class="form__input m-0" placeholder="" style="height: 46px">
                            <a  id="showHidePassword" class="member-btn">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div> 
                        </div>
                        <span class="small text-end d-block w-100">
                        <a href="{{url('member/forgotpassword/')}}"> Forgot password?</a> </span>
                        <button type="button" class="btn" id="loginButton">Login</button>
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
        $("#showHidePassword").click(function (e) { 
        e.preventDefault();
       if ($("input#login-password").attr("type")=="password") {
            $("input#login-password").attr("type","text");
            $(this).html('')
            $(this).html(hidePasswordIcon)
       } else {
            $("input#login-password").attr("type","password");
            $(this).html('')
            $(this).html(showPasswordIcon)
       }
    });



    
    </script>
</main>