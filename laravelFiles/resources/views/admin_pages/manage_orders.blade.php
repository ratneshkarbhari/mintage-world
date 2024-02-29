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
                        <th>Sr. No.</th>
                        <th>Order Id</th>
                        <th>Customer Name</th>
                        <th>Order Date</th>
                        <th>Amount (RS) </th>
                        <th>Status</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @php 
                    
                    $orderCounter = 1;
                    @endphp
                    @foreach($orders as $order)

                    <tr>
                        <td>{{$orderCounter}}</td>
                        <td><a href="view-order/">{{$order["orderid"]}}</a></td>
                        <td><a href="#">{{$order["Shipping_Name1"]}}</a></td>
                        <td>
                        @php
                        $convertedDate = date("d/m/Y",strtotime($order["modified_date"]))
                        @endphp
                        
                        {{$convertedDate}}	</td>
                        <td>{{$order['totalamt']}}</td>
                        <td><span class="badge bg-info text-dark">{{$order["status"]}}</span></td>
                        @if($order["payment_status"]=="Success")
                        <td><span class="badge bg-success">Success</span></td>
                        @else
                        <td><span class="badge bg-danger">Failure</span></td>
                        @endif
                        <td>
                            <a href="{{ url('admin/view-order/'.$order['orderid']) }}" class="btn btn-info btn-sm" title="View Order"><i class="fa fa-eye"></i></a>
                                                    
                        </td>
                    </tr>
                    
                    @php 
                    $orderCounter++;
                    @endphp
                    @endforeach
                     
                </tbody> 
            </table>
        </div>

    </div>
</div>

<script>

let table = new DataTable('#manageOrders');


</script>