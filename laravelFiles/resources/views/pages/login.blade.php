
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
        <div class="container-fluid  px-lg-2 px-lg-5">
            <div class="d-flex justify-content-between">
                <h2 class="mb-3 heading-1">Sign In</h2>
            </div>
            <div class="login-form-content ">
                <div class="col-md-4 text-center company__info">
                    <span class="company__logo">
                        <h2><i class="fas fa-sign-in-alt"></i></h2>
                    </span>
                </div>
                <div class="col-md-8 col-xs-12 col-sm-12 login_form "> 
                    
                    <form action="{{url("coin-info-filter-exe")}}" id="memberLoginForm">                        
                        @csrf
                        <input type="text" name="username" id="login-username" class="form__input" placeholder="Username">
                        <input type="password" name="password" id="login-password" class="form__input mb-1" placeholder="Password">
                        <span class="small text-end d-block w-100">
                        <a href="{{url("member/forgotpassword/")}}"> Forgot password?</a> </span>
                        <button type="button" class="btn" id="loginButton">Login</button>
                    </form>
                    <p class="text-danger text-center" id="loginError"></p>
                    <script>
                       $("button#loginButton").click(function (e) { 
                            e.preventDefault();
                            let username = $("input#login-username").val();
                            let password = $("input#login-password").val();
                            $.ajax({
                                type: "POST",
                                url: "{{url('member-login-exe')}}",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "username" : username,
                                    "password" : password
                                },
                                success: function (response) {
                                    if (response=="login-success") {
                                        location.reload();
                                    }else{
                                        $("p#loginError").html("Email or password is incorrect");
                                    }
                                }
                            });
                       });
                    </script>
                    <p class="mb-4 text-center">Don't have an account? <a href="{{url("member/")}}">Register Here</a></p>
                </div>
                </div>
        </div>
    </section>
    
</main>