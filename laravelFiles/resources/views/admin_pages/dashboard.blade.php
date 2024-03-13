
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">

    <div class="container-fluid">

        <h2 class="title d-block heading-3">{{$title}}</h2>
        <h4 class="heading-4">Orders</h4>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered DataTable" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Order Id</th>
                        <th>Customer Name</th>
                        <th>Order Date</th>
                        <th>Amount (RS)	</th>
                        <th>Status</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @php 
                    
                    $orderCounter = 1;
                    @endphp
                    @foreach($latest_orders as $order)

                    <tr>
                        <td>{{$orderCounter}}</td>
                        <td><a href="view-order/">{{$order["orderid"]}}</a></td>
                        <td><a href="#">{{$order["Shipping_Name1"]}}</a></td>
                        <td>17/08/2023	</td>
                        <td>{{$order['totalamt']}}</td>
                        <td><span class="badge bg-info text-dark">{{$order["status"]}}</span></td>
                        @if($order["payment_status"]=="Success")
                        <td><span class="badge bg-success">Success</span></td>
                        @else
                        <td><span class="badge bg-danger">Failure</span></td>
                        @endif
                        <td>
                            <a href="view-order/{{$order['orderid']}}" class="btn btn-info btn-sm" title="View Order"><i class="fa fa-eye"></i></a>
                                                    
                        </td>
                    </tr>
                    
                    @php 
                    $orderCounter++;
                    @endphp
                    @endforeach
                     
                </tbody> 
            </table>
        </div>

        <h4 class="heading-4 mt-5">Recently Added</h4>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered DataTable " style="width:100%">
                <thead>
                    <tr>
                        <th>Sr. No.</th>                       
                        <th>Product Id	</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Qty.</th>
                        <th>Amount (RS)	</th>
                        <th>Status</th> 
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @php 
                    $productCounter = 1;
                    @endphp
                    @foreach($latest_products as $product)
                    @php
                    $imgParts = explode("/",$product["img"]);
                    @endphp
                    <tr>
                        <td>{{$productCounter}}</td>
                        <td>{{$product["id"]}}</td>
                        <td>
                            @if(isset($imgParts[2]))
                            <img src="{{env('PRODUCT_IMAGE_BASE_URL').$imgParts[2]}}" class="img-fluid" width="100" height="100">
                            @else
                            <img src="{{env('PRODUCT_IMAGE_BASE_URL').$product['img']}}" class="img-fluid" width="100" height="100">
                            @endif
                        </td>
                        <td>{{$product["name1"]}}</td>
                        <td>{{$product["instock"]}}</td>
                        <td>{{$product["price"]}}</td>
                        <td>  
                            @if($product["status"]=="Active")
                            <label class="switch switch-success" for="chk1">
                              <input type="checkbox" checked id="chk1">
                              <span class="slider round"></span> 
                            </label> 
                            @else
                            <label class="switch switch-success" for="chk1">
                              <input type="checkbox"  id="chk1">
                              <span class="slider round"></span> 
                            </label> 
                            @endif
                        </td>
                        <td>
                            <a href="{{url('edit-product/'.$product['id'])}}" class="btn btn-warning btn-sm" title="Edit Product"><i class="fa fa-edit"></i></a>
                                                    
                        </td>
                    </tr>
                    
                    @php
                    $productCounter++;
                    @endphp
                    @endforeach
                    
                     
                </tbody> 
            </table>
        </div>


    </div>

</div>