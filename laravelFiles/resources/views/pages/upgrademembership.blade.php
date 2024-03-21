
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/default-banner.jpg")}}" /></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2">
                        <a href="{{url("/")}}/"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item me-2">Upgrade Membership</li>                    
                </ol>
            </nav>
        </div>
    </section>    


    <section class="common-padding coing-list-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <div class="row"> 
                <div id="upgrade_membership_wrap" class="col-lg-12 col-md-12 col-sm-12 text-center"> 
                    <div class="">
                    <h2>Subscribe To Premium</h2>
                    <p>Our membership  are made for eveyone. Whether you're just starting Premium Membership,  we have a 1 year membership plan that's right for you. </p>
                    </div>
                    <div class="card-section" id="card-section">
                        <div class="card">
                          <div class="card-part card-top">
                            <span class="card-icon"><i class="fas fa-user-check"></i></span>
                            <h2 class="card-title">Premium</h2>
                          </div>
                          <div class="card-part card-center">
                            <span class="sign"><i class="fas fa-rupee-sign"></i></span>
                            <span class="price">500</span> 
                          </div>
                          <div class="card-part card-bottom">
                            <ul class="list-options">
                            <li>Premium annual plan</li>
                            <li>Easy access</li>
                            <li>Get access to premium history content</li>
                            <li>Access to over 2000+ history content files</li>
                            <li>Real time download</li>
                            
                            </ul>
                            <button  class="btn btn-success btn-signup" id="rzp-button1" type="button">                    
                                Pay Now
                            </button>
                          </div>
                        </div>
                      </div>                 
    
                </div>
                <div id="membership_response" class="col-lg-12 col-md-12 col-sm-12">
                    <div id="successMessage" class="text-center text-success">
                        <div class="success-card">
                            <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                              <i class="checkmark">✓</i>
                            </div>
                              <h1>Success</h1> 
                              <p>We received your premium membership request,<br/> Please <a href="http://localhost/mintage-world/logout" class="link-primary"><b>Logout</b></a> and Login again to access premium membership.</p>
                        </div>
                    </div>
                    <div id="failureMessage" class="text-center text-danger">
                        <div class="success-card">
                            <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                                <i class="fas fa-ban text-danger"></i>
                            </div>
                              <h1 class="text-danger">Failed</h1> 
                              <p>
                                Membership upgrade failed, Contact support and <br>mention <b>{{$order['id']}}</b> if your payment was successful.
                              </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    
</main>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    $(document).ready(function() {
    $("#upgrade_membership_wrap").addClass("d-block");
    $("#successMessage").addClass("d-none");
    $("#failureMessage").addClass("d-none");
});     
</script>
<script>
var options = {
    "key": '{{getenv('RAZOR_KEY')}}/', // Enter the Key ID generated from the Dashboard
    "amount": "100", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Mintage World",
    "description": "Membership Upgrade",
    "image": "https://www.mintageworld.com/public/img/zf2-logo.png",
    "order_id": '{{$order["id"]}}', //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){

        let rzpOrderId = response.razorpay_order_id;
        
        $.ajax({
            type: "POST",
            url: "{{url('upgrade-membership-to-premium')}}/",
            data: {
                "_token" : "{{ csrf_token() }}",
                "member_id" : '{{session("member_id")}}/'
            },
            success: function (response) {                
                if (response=="membership-upgrade-successful") {                    
                    // $("#successMessage").html("Membership upgrade is successful, <a href='{{url("logout")}}/'>Logout</a> and login again to enjoy premium access");
                    $("#upgrade_membership_wrap").addClass("d-none");
                    $("#successMessage").addClass("d-block");
                    $("#failureMessage").addClass("d-none");
                } else {
                    // $("#failureMessage").html("Membership upgrade failed, Contact support and mention {{$order['id']}} if your payment was successful");
                    $("#upgrade_membership_wrap").addClass("d-none");
                    $("#successMessage").addClass("d-none");
                    $("#failureMessage").addClass("d-block");
                }

            }
        });

    },
    
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#e19726"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
    $("#failureMessage").html("Membership upgrade failed, Contact support and mention {{$order['id']}} if your payment was successful");
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
