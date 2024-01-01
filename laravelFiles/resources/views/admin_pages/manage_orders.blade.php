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
            <table id="example" class="table table-striped table-bordered DataTable" style="width:100%">
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
                    @foreach($orders as $order)
                    <tr>
                        <td>1</td>
                        <td><a href="view-order/">ORD-12558</a></td>
                        <td><a href="view-user/">Sudnyaa Kataria</a></td>
                        <td>17/08/2023 </td>
                        <td>535.00</td>
                        <td><span class="badge bg-info text-dark">Processing</span></td>
                        <td><span class="badge bg-success">Success</span></td>
                        <td>
                            <a href="view-order/" class="btn btn-info btn-sm" title="View Order"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>