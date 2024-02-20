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
                    <form id="RegForm" action="{{url('registration-exe')}}" class="registrationForm" method="POST" class="form-group">

                        @csrf
                        <label for="" class="w-100 mt-5 mb-0"><b>First Name</b></label>
                        <input type="text" id="first_name" name="first_name" class="form__input mb-0 mt-0" title="Min. 4 to Max. 20 characters" minlength="4" maxlength="20" required="">
                        <p class="error-message text-danger mb-3"></p>
                        <label for="" class="w-100 mb-0"><b>Last Name</b></label>
                        <input type="text" id="last_name" name="last_name" class="form__input mb-0 mt-0" title="Min. 4 to Max. 20 characters" minlength="4" maxlength="20" required="">
                        <p class="error-message text-danger mb-3"></p>
                        <label for="" class="w-100"><b>Email ID</b></label>
                        <input type="text" id="email" name="EmailID" class="form__input mb-0 mt-0" placeholder="" required="">
                        <p class="error-message text-danger mb-3"></p>
                        <label for="" class="w-100"><b>Mobile No</b></label>
                        <input type="text" id="mobile_number" name="MobileNo" class="form__input mb-0 mt-0" minlength="10" maxlength="10" title="10 characters length" placeholder="" required="">
                        <p class="error-message text-danger mb-3"></p>




                        <div class="d-block position-relative mb-0 mt-2 password-div">
                            <label for="" class="w-100 mb-0"><b>Password</b></label>
                            <input type="password" id="NewPassword" name="password" class="form__input mb-0 mt-0 passwordFields" title="" placeholder="" required="">
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
                        <p class="error-message text-danger mb-3"></p>


                        <div class="d-block position-relative mb-2 mt-2 password-div">
                            <label for="" class="w-100 mb-0"><b>Confirm Password</b></label>
                            <input type="password" id="confPassword" name="confPassword" class="form__input m-0 passwordFields" placeholder="" style="height: 46px">
                            <a id="showConfPassword" class="member-btn">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                        <p class="error-message text-danger mb-3"></p>
                        <label for="" class="w-100 mb-0"><b>Country</b></label>
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
                        <p class="text-danger d-none" id="registrationErrorToShow">Passwords dont match</p>
                        <button type="submit" id="registerButton" class="btn btn-explore disabled">Register <span class="first"></span><span class="second"></span><span class="third"></span><span class="fourth"></span>
                        </button>
                        <p class="text-center">Aleady a member? <a href="{{url('application/login')}}">Login here</a> </p>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 999">
        <div id="liveToast " class="toast hide bg-danger text-white registration-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-white">
                <strong class="me-auto"><i class="fas fa-check-circle"></i> Failure</strong>
                <small>Just Now</small>
            </div>
            <div class="toast-body">
               <span id="registration-error-message"></span>
            </div>
            <div class='toast-timeline animate'></div>
        </div>
    </div>
    <script>
        let showPasswordIcon = '<i class="fas fa-eye"></i>'
        let hidePasswordIcon = '<i class="fas fa-eye-slash"></i>'
        $("#showPassword").click(function(e) {
            e.preventDefault();
            if ($("input#NewPassword").attr("type") == "password") {
                $("input#NewPassword").attr("type", "text");
                $(this).html('')
                $(this).html(hidePasswordIcon)
            } else {
                $("input#NewPassword").attr("type", "password");
                $(this).html('')
                $(this).html(showPasswordIcon)
            }
        });

        $("#showConfPassword").click(function(e) {
            e.preventDefault();
            if ($("input#confPassword").attr("type") == "password") {
                $("input#confPassword").attr("type", "text");
                $(this).html('')
                $(this).html(hidePasswordIcon)
            } else {
                $("input#confPassword").attr("type", "password");
                $(this).html('')
                $(this).html(showPasswordIcon)
            }
        });
        $(".passwordFields").change(function(e) {
            e.preventDefault();
            if ($("input#NewPassword").val() == $("input#confPassword").val()) {
                $("button#registerButton").removeClass("disabled");
                $("p#registrationErrorToShow").addClass("d-none");
            } else {
                $("p#registrationErrorToShow").removeClass("d-none");
                $("button#registerButton").addClass("disabled");
            }
        });
    </script>
    <script>
        $("input#first_name,input#last_name").keydown(function(e) {
            if ((/\d/g).test(e.key)) e.preventDefault();
        });

        // $("form#RegForm").submit(function (e) { 
        //     e.preventDefault();


        // });

        $("#RegForm").submit(function(e) {
            e.preventDefault();
            // alert("entered");
            var fname = document.getElementById('first_name').value;
            var lname = document.getElementById('last_name').value;
            var email = document.getElementById('email').value;
            var pnumber = document.getElementById('mobile_number').value;
            var newpassword = document.getElementById('NewPassword').value;
            var confpassword = document.getElementById('confPassword').value;
            var message = document.getElementsByClassName("error-message");
            var text = "";

            // Validation start
            var pattern1 = /^[A-Za-z]+$/;
            if (fname == " " || fname.match(pattern1)) {
                text = "";
                message[0].innerHTML = text;


            } else {
                text = "Only letters & Min. 4 to Max. 20 lenght";
                message[0].innerHTML = text;
            }


            var pattern2 = /^[A-Za-z]+$/;
            if (lname == " " || lname.match(pattern2)) {
                text = "";
                message[1].innerHTML = text;

            } else {
                text = "Only letters & Min. 4 to Max. 20 lenght";
                message[1].innerHTML = text;
            }

            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var atpos = email.indexOf("@");
            var dotpos = email.lastIndexOf(".");

            if (email == " " || email.match(mailformat) || atpos > 1 && (dotpos - atpos > 2)) {
                text = "";
                message[2].innerHTML = text;

            } else {
                text = "Wrong email format : abc@xyz.com";
                message[2].innerHTML = text;
            }

            var numbers = /^[6-9]{1}[0-9]{9}/;
            if (pnumber == " " || pnumber.match(numbers)) {
                text = "";
                message[3].innerHTML = text;

            } else {
                text = "Please Enter 10 Digit Indian Mobile No";
                message[3].innerHTML = text;
            }

            var pattern3 = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
            if (pattern3.test(newpassword)) {
                console.log("valid");
                text = "";
                message[4].innerHTML = text;

            } else {
                text = "";
                message[4].innerHTML = "Invalid Password Please follow the pattern";
                console.log('invalid');
            }

            var pattern4 = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
            if (pattern4.test(confpassword)) {
                console.log("valid confirm");
                text = "";
                message[5].innerHTML = text;

            } else {
                text = "";
                message[5].innerHTML = "Invalid Password Please follow the pattern";
                console.log('invalid');
            }

            // Form processing

            let formData = $(this).serialize();
            let action = $(this).attr("action");
            let method = $(this).attr("method");
            
            $.ajax({
                type: method,
                url: action,
                data: formData,
                success: function (response) {
                    console.log(response);
                    if(response.result=="success"){
                        window.location.replace("{{ url('verify-email-page') }}");
                    }else{
                        $("span#registration-error-message").html(response.message);
                        $(".registration-failure").toast("show");
                    }
                }
            });

        });
    </script>
</main>