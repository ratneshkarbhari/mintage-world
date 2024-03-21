
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url('assets/images/inside-banner/default-banner.jpg')}}/" /></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2">
                        <a href="{{url('/')}}/"><i class="fa fa-home"></i> Home</a>
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
                    <p class="text-center text-danger">{{$error}}</p>
                    <form method="POST" action="{{url('forgot-password-exe')}}/" >                        
                        @csrf
                        <input type="text" name="username" id="loginEmail" class="form__input" placeholder="Email" required> 
                        <span class="small text-end d-block w-100"> 
                        <button type="submit" class="btn">Send Email</button>
                    </form>
                    <p class="text-danger text-center" id="loginError"></p>                   
                    <p class="mb-4 text-center">Don't have an account? <a href="{{url('member/')}}/">Register Here</a></p>
                </div>
                </div>
        </div>
    </section>
    
</main>