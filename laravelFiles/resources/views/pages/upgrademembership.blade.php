
<main class="page-content">
    <section class="inside-banner"><img class="w-100 img-fluid" src="{{url("assets/images/inside-banner/default-banner.jpg")}}" /></section>
    <section class="breadcrumb-wraper">
        <div class="container-fluid px-lg-2 px-lg-5">
            <nav aria-label="breadcrumb" class="breadcrumb-title-box">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item me-2">
                        <a href="{{url("/")}}"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item me-2">Upgrade Membership</li>                    
                </ol>
            </nav>
        </div>
    </section>    


    <section class="common-padding coing-list-wraper">
        <div class="container-fluid  px-lg-2 px-lg-5">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12"></div>
                <div class="col-lg-4 col-md-12 col-sm-12 text-center">
    
                    <div class="d-flex justify-content-between">
                        <h2 class="mb-3 heading-1">Upgrade Membership for 500 ₹</h2>
                    </div>

                    <h1 id="successMessage" class="text-center text-success">

                    </h1>
                    <h1 id="failureMessage" class="text-center text-danger">

                    </h1>

                    <button  class="btn btn-success" id="rzp-button1" type="button">
                    
                        Pay ₹ 500

                    </button>
    
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12"></div>
            </div>
        </div>
    </section>
    
</main>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": '{{getenv('RAZOR_KEY')}}', // Enter the Key ID generated from the Dashboard
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
            url: "{{url('upgrade-membership-to-premium')}}",
            data: {
                "_token" : "{{ csrf_token() }}",
                "member_id" : '{{session("member_id")}}'
            },
            success: function (response) {
                
                if (response=="membership-upgrade-successful") {
                    
                    $("#successMessage").html("Membership upgrade is successful, <a href='{{url("logout")}}'>Logout</a> and login again to enjoy premium access");

                } else {
                    

                    $("#failureMessage").html("Membership upgrade failed, Contact support and mention {{$order['id']}} if your payment was successful");

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
