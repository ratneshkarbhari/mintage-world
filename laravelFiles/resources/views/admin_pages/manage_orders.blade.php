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
         <h2 class="title heading-3">{{$title}}  </h2> 
      </div> 
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
                 <tr>
                     <td>1</td>
                     <td><a href="view-order/">ORD-12558</a></td>
                     <td><a href="view-user/">Sudnyaa Kataria</a></td>
                     <td>17/08/2023	</td>
                     <td>535.00</td>
                     <td><span class="badge bg-info text-dark">Processing</span></td>
                     <td><span class="badge bg-success">Success</span></td>
                     <td>
                         <a href="view-order/" class="btn btn-info btn-sm" title="View Order"><i class="fa fa-eye"></i></a>                                                 
                     </td>
                 </tr>
                 <tr>
                     <td>2</td>
                     <td><a href="view-order/">ORD-12558</a></td>
                     <td><a href="view-user/">Sudnyaa Kataria</a></td>
                     <td>17/08/2023	</td>
                     <td>535.00</td>
                     <td><span class="badge bg-warning text-dark">Not Confirmed</span></td>
                     <td><span class="badge bg-danger">Failed</span>                        
                         <i class="fas fa-info-circle ms-2"  data-bs-toggle="tooltip" data-bs-placement="top" title="Payment processing cancelled by user"></i>
                     </td>
                     <td>
                         <a href="#" class="btn btn-info btn-sm" title="View Order"><i class="fa fa-eye"></i></a>
                                                 
                     </td>
                 </tr>
                 <tr>
                     <td>3</td>
                     <td><a href="view-order/">ORD-12558</a></td>
                     <td><a href="view-user/">Sudnyaa Kataria</a></td>
                     <td>17/08/2023	</td>
                     <td>535.00</td>
                     <td><span class="badge bg-info text-dark">Processing</span></td>
                     <td><span class="badge bg-success">Success</span></td>
                     <td>
                         <a href="#" class="btn btn-info btn-sm" title="View Order"><i class="fa fa-eye"></i></a>
                                                 
                     </td>
                 </tr>
                 <tr>
                     <td>4</td>
                     <td><a href="view-order/">ORD-12558</a></td>
                     <td><a href="view-user/">Sudnyaa Kataria</a></td>
                     <td>17/08/2023	</td>
                     <td>535.00</td>
                     <td><span class="badge bg-warning text-dark">Not Confirmed</span></td>
                     <td>
                         <span class="badge bg-danger">Cancelled</span> 
                         <i class="fas fa-info-circle ms-2"  data-bs-toggle="tooltip" data-bs-placement="top" title="Payment processing cancelled by user"></i>
                              
                              
                     </td>
                     <td>
                         <a href="#" class="btn btn-info btn-sm" title="View Order"><i class="fa fa-eye"></i></a>
                                                 
                     </td>
                 </tr>
                 <tr>
                     <td>5</td>
                     <td><a href="view-order/">ORD-12558</a></td>
                     <td><a href="view-user/">Sudnyaa Kataria</a></td>
                     <td>17/08/2023	</td>
                     <td>535.00</td>
                     <td><span class="badge bg-info text-dark">Processing</span></td>
                     <td><span class="badge bg-success">Success</span></td>
                     <td>
                         <a href="#" class="btn btn-info btn-sm" title="View Order"><i class="fa fa-eye"></i></a>
                                                 
                     </td>
                 </tr>
                 <tr>
                     <td>6</td>
                     <td><a href="view-order/">ORD-12558</a></td>
                     <td><a href="view-user/">Sudnyaa Kataria</a></td>
                     <td>17/08/2023	</td>
                     <td>535.00</td>
                     <td><span class="badge bg-success">Dispatched</span></td>
                     <td><span class="badge bg-success">Success</span></td>
                     <td>
                         <a href="#" class="btn btn-info btn-sm" title="View Order"><i class="fa fa-eye"></i></a>
                                                 
                     </td>
                 </tr>
                 <tr>
                     <td>7</td>
                     <td><a href="view-order/">ORD-12558</a></td>
                     <td><a href="view-user/">Sudnyaa Kataria</a></td>
                     <td>17/08/2023	</td>
                     <td>535.00</td>
                     <td><span class="badge bg-info text-dark">Processing</span></td>
                     <td><span class="badge bg-success">Success</span></td>
                     <td>
                         <a href="#" class="btn btn-info btn-sm" title="View Order"><i class="fa fa-eye"></i></a>
                                                 
                     </td>
                 </tr>
                 <tr>
                     <td>8</td>
                     <td><a href="view-order/">ORD-12558</a></td>
                     <td><a href="view-user/">Sudnyaa Kataria</a></td>
                     <td>17/08/2023</td> 
                     <td>535.00</td>
                     <td><span class="badge bg-secondary text-dark">Delivered</span></td>
                     <td><span class="badge bg-success">Success</span></td>
                     <td>
                         <a href="#" class="btn btn-info btn-sm" title="View Order"><i class="fa fa-eye"></i></a>
                                                 
                     </td>
                 </tr>
                  
             </tbody> 
         </table>
     </div>
      
    </div>
  </div>