
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url('assets/images/inside-banner/default-banner.jpg')}}" /></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item me-2">Verify Email</li>                    
                </ol>
            </nav>
        </div>
    </section>    
    


    <section class="common-padding coing-list-wraper ">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <div class="d-flex justify-content-center">
                <h2 class="mb-3 heading-1">Verify Email</h2><br>
            </div>
            <p class="text-center text-danger" id="registrationErrorMessage">{{$registrationErrorMessage}}</p>

            <div class="row login-form-content text-start">
                <div class="col-md-4 text-center company__info">
                   <span class="company__logo">
                      <h2><i class="fas fa-sign-in-alt"></i></h2>
                   </span>
                </div>
                <div class="col-md-8 col-xs-12 col-sm-12 login_form "> 
                   <form action="{{url('verify-email-exe')}}" class="registrationForm" method="POST" class="form-group">
                        @csrf    

                        
                        <input type="text" id="first_name" class="form__input mb-2 mt-2" placeholder="Enter Verification code from Email" name="verif_code">
                        <small>{{$verif_code}}</small>
                        <button type="submit" id="registerButton" class="btn btn-explore ">Verify Email <span class="first"></span><span class="second"></span><span class="third"></span><span class="fourth"></span>
                        </button>
                   </form>
                </div>
             </div>
            
            </div>
    </section>
    <script>
        let showPasswordIcon = '<i class="fas fa-eye"></i>'
        let hidePasswordIcon = '<i class="fas fa-eye-slash"></i>'
        $("i.fas.fa-eye,button#showHidePassword").click(function (e) { 
            e.preventDefault();
            
        if ($("input#confPassword").attr("type")=="password") {
                $("input#confPassword").attr("type","text");
        } else {
                $("input#confPassword").attr("type","password");
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