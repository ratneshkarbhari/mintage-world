<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
    <div class="container-fluid">
        <div class="mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex justify-content-between">
            <h2 class="title heading-3">{{$title}} </h2>
        </div>
        <div class="table-responsive">
            <table id="manageOrders" class="table table-striped table-bordered DataTable" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Order Id</th>
                        <th>Customer Name</th>
                        <th>Order Date</th>
                        <th>Amount (RS) </th>
                        <th>Status</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
            </table>
        </div>

    </div>
</div>

<script>
    // let table = new DataTable('#manageOrders');


    $("#manageOrders").DataTable({
        'ajax': '{{url("get-all-orders")}}',
        'columns': [

            {
                data: 'id'
            },
            {
                data: 'orderid'
            },
            {
                data: 'Shipping_Name1',
            },
            {
                data: 'ordered'
            },
            {
                data: 'payableamount'
            },
            {
                data: 'status',
                // render : function(data,type,full){

                //     return '<span class="badge bg-info text-dark">'+data+'</span>';

                // }
            },
            {
                data : 'payment_status',
                // render: function(data, type, full) {
                //     return '<span class="badge bg-success">'+data+'</span>';
                // }
            },
            {
                render : function(data, type, full){
                    return '<a href="http://localhost/mintage-world/admin/view-order/'+full.orderid+'" class="btn btn-info btn-sm" title="View Order"><i class="fa fa-eye"></i></a>';
                }
            }
        ]
    }).order([0,'desc'])
</script>