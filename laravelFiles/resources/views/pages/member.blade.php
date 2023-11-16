
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url('assets/images/inside-banner/default-banner.jpg')}}" /></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item me-2">Registration</li>                    
                </ol>
            </nav>
        </div>
    </section>    
    


    <section class="common-padding coing-list-wraper ">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <div class="d-flex justify-content-center">
                <h2 class="mb-3 heading-1">New Member Registration</h2><br>
            </div>
            <p class="text-center text-danger" id="registrationErrorMessage">{{$registrationErrorMessage}}</p>

            <div class="row login-form-content text-start">
                <div class="col-md-4 text-center company__info">
                   <span class="company__logo">
                      <h2><i class="fas fa-sign-in-alt"></i></h2>
                   </span>
                </div>
                <div class="col-md-8 col-xs-12 col-sm-12 login_form "> 
                   <form action="{{url('registration-exe')}}" class="registrationForm" method="POST" class="form-group">

                   @csrf    
                        <input type="text" id="first_name" class="form__input mb-2 mt-2" placeholder="John" name="first_name">

                      <input type="text" id="last_name" class="form__input mb-2 mt-2" placeholder="Doe" name="last_name">
                      <input type="text" id="email" class="form__input mb-2 mt-2" placeholder="Email ID" name="EmailID">
                      <input type="text" id="mobile_number" class="form__input mb-2 mt-2" placeholder="Mobile No" name="MobileNo">
                      <input type="password" id="password" class="form__input mb-2 mt-2 passwordFields" placeholder="Password" name="password">
                      <div class="d-block position-relative">
                        <input type="password" id="confPassword" class="form__input mb-2 mt-2 passwordFields" placeholder="Confirm Password" name="confPassword">
                        <button id="showHidePassword" class="member-btn">
                          <i class="fas fa-eye"></i>
                      </button>
                      </div>
                     
                      <select name="country_id" class="form-control" required="" disabled>
                         <option value="113" selected="">India</option>
                      </select>
                      <hr>
                      <p class="mb-2 text-start"><b>What describes you the best?</b></p>
                      <select name="profile" class="form-control" required="">
                         <option value="">--- Please Select ---</option>
                         <option value="exhibitor">Exhibitor</option>
                         <option value="trader">Trader</option>
                         <option value="collector">Collector</option>
                         <option value="student">Student</option>
                         <option value="none">None</option>
                      </select>
                      <div class="form-group w-100 text-start mt-2 mb-2">
                         <p class="mb-2"><b>What are you most interested in?</b></p>
                         <label class="checkbox-inline me-2"><input type="checkbox" class="me-2" name="collecting[]" value="coin">Coin</label>
                         <label class="checkbox-inline me-2"><input type="checkbox" class="me-2" name="collecting[]" value="note">Note</label>
                         <label class="checkbox-inline me-2"><input type="checkbox" class="me-2" name="collecting[]" value="stamp">Stamp</label>
                         <label class="checkbox-inline "><input type="checkbox" class="me-2" name="collecting[]" value="none">None</label>
                      </div>
                      <div class="form-group w-100 text-start mb-2">
                         <p class="mb-2"><b>Do you want to recieve future communication from Mintage world?</b></p>
                         <label class="checkbox-inline me-2"><input type="radio" class="checkbox-inline me-2" required="" name="listing" value="yes">Yes</label>
                         <label class="checkbox-inline"><input type="radio" class="checkbox-inline me-2" required="" name="listing" value="no">No</label>

                         <span class="small text-start d-block w-100 ">Dont worry we wont spam you. </span>

                      </div>
                      <button type="submit" id="registerButton" class="btn btn-explore disabled">Register <span class="first"></span><span class="second"></span><span class="third"></span><span class="fourth"></span>
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