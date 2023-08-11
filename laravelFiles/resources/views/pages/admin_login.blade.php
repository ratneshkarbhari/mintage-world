<main id="admin-login" class="page-content">
    <div class="container">
        
        <div class="text-center">
            <h1 class="page-title">Admin Login</h1>
        
            <p class="text-danger" id="loginError"></p>

        </div>


        <div class="row">
        
            <div class="col-lg-4 col-md-12 col-sm-12"></div>
            <div class="col-lg-4 col-md-12 col-sm-12">

                <form action="#" id="adminLoginForm">                        
                    @csrf
                    <div class="form-group">
                        <label for="login-username">Username</label>
                        <input type="text" class="form-control form__input" name="username" id="admin-login-username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="login-password">Password</label>
                        <input type="password" class="form__input mb-1 form-control" name="password" id="admin-login-password"  placeholder="Password">
                    </div>
                    <span class="small text-end d-block w-100">
                    <a href="{{url('member/forgotpassword')}}"> Forgot password?</a> </span>
                    <button type="button" class="btn btn-primary w-100" id="adminLoginButton">Login</button>
                </form>

            </div>
            <div class="col-lg-4 col-md-12 col-sm-12"></div>
            
        
        </div>
    </div>
</main>
<style>
    section.header-wrap,footer{
        display: none;
    }
</style>
<script>
    $("button#adminLoginButton").click(function (e) { 
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "{{url('admin-login-exe')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                "admin_username" : $("input#admin-login-username").val(),
                "admin_password" : $("input#admin-login-password").val()
            },            
            success: function (response) {

                console.log(response);

                if (response=="login-success") {
                    
                    window.location.replace("{{url("dashboard")}}");
                    
                } else {
                    
                    $("p#loginError").html("Email or password is incorrect");

                }
            }
        });
        
    });
</script>