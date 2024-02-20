<style>
    section.header-wrap,footer{
        display: none;
    }
    .admin-bg{
    background: #212529;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}
.menu-container {
    display: none;
}
</style>
<main id="admin-login" class="w-100" >
    <div class="container">
        <div class="row justify-content-center">         
            <div class="card col-md-6 p-0">
                <div class="card-header text-center">
                    <h3 class="page-title text-success mb-0">Admin Login</h3>
                </div>
                <div class="card-body">
                    <form action="#" id="adminLoginForm">                        
                        @csrf
                        <div class="form-group mb-3">
                            <label for="login-username"><b>Username</b></label>
                            <input type="text" class="form-control form__input" name="username" id="admin-login-username" placeholder="">
                        </div>
                        <div class="form-group  mb-3" style="position: relative">
                            <label for="login-password"><b>Password</b></label>
                            <input type="password" class="form__input mb-1 form-control" name="password" id="admin-login-password"  placeholder="">
                            <a id="showHidePassword" class="member-btn" style="font-size: 20px; top: 28px;">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                        <span class="small text-end d-block w-100  mb-3">
                        <a href="{{url('member/forgotpassword')}}"> Forgot password?</a> </span>
                        <button type="button" class="btn btn-primary w-100" id="adminLoginButton">Login</button>
                    </form>
                </div>            
            </div>
        </div>
    </div>
</main>

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
                    
                    window.location.replace("{{url("admin/dashboard")}}");
                    
                } else {
                    
                    $("p#loginError").html("Email or password is incorrect");

                }
            }
        });
        
    });
    let showPasswordIcon = '<i class="fas fa-eye"></i>'
    let hidePasswordIcon = '<i class="fas fa-eye-slash"></i>'
    $("#showHidePassword").click(function (e) { 
        e.preventDefault();
       if ($("input#admin-login-password").attr("type")=="password") {
            $("input#admin-login-password").attr("type","text");
            $(this).html('')
            $(this).html(hidePasswordIcon)
       } else {
            $("input#admin-login-password").attr("type","password");
            $(this).html('')
            $(this).html(showPasswordIcon)
       }
    });

    $(function() {
  $('body').addClass('admin-bg');
});
</script>