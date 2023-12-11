<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
  <div class="container-fluid">
     <div class="mb-3">
        <nav aria-label="breadcrumb">
           <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Category Management</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
           </ol>
        </nav>
     </div>
     <div class="d-flex justify-content-between">
      <h2 class="title heading-3">{{$title}} </h2>
      <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#AddPeriod"><i class="fa fa-plus"></i> Add Period</button>
   </div>
     
     <div class="table-responsive">
      <table id="example" class="table table-striped table-bordered DataTable" style="width:100%">
          <thead><tr>
               <th>Sr. No.</th>
               <th>Period Title</th> 
               <th>Type</th> 
               <th>Image</th> 
               <th>Posted Dated</th> 
               <th>Action</th> 
            </tr>
          </thead>
          <tbody>
            <tr>
               <td>1</td>
               <td>Medieval</td>
               <td>Coin</td>
               <td><img src="http://www.mintageworld.com/images/period/medieval.jpg" width="100"></td>
               <td>2018-08-30 12:08:57</td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditPeriod" title="Edit"><i class="fa fa-edit"></i></button>
               </td>      
            </tr>
            <tr>
               <td>2</td>
               <td>Colonial</td>
               <td>Coin</td>
               <td><img src="http://www.mintageworld.com/images/period/british_colonial.jpg" width="100"></td>
               <td>2017-06-20 10:26:49</td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditPeriod" title="Edit"><i class="fa fa-edit"></i></button>
               </td>
            </tr>
            <tr>
               <td>3</td>
               <td>Ancient</td>
               <td>Coin</td>
               <td><img src="http://www.mintageworld.com/images/period/ancient.jpg" width="100"></td>
               <td>2018-12-07 05:21:33</td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditPeriod" title="Edit"><i class="fa fa-edit"></i></button>
               </td>
            </tr>
            <tr>
               <td>4</td>
               <td>Modern</td>
               <td>Coin</td>
               <td><img src="http://www.mintageworld.com/images/period/republic_india.jpg" width="100"></td>
               <td>2017-12-19 12:15:01</td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditPeriod" title="Edit"><i class="fa fa-edit"></i></button>
               </td>
            </tr>
            <tr>
               <td>5</td>
               <td>Hellenistic</td>
               <td>Coin</td>
               <td><img src="http://www.mintageworld.com/images/period/Hellenistic.jpg" width="100"></td>
               <td>2017-06-23 06:29:54</td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditPeriod" title="Edit"><i class="fa fa-edit"></i></button>
               </td>
            </tr>
            <tr>
               <td>6</td>
               <td>Archaic</td>
               <td>Coin</td>
               <td><img src="http://www.mintageworld.com/images/period/arcahic-greece.jpg" width="100"></td>
               <td>2017-05-16 05:55:32</td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditPeriod" title="Edit"><i class="fa fa-edit"></i></button>
               </td>      
            </tr>
            <tr>
               <td>7</td>
               <td>Classical</td>
               <td>Coin</td>
               <td><img src="http://www.mintageworld.com/images/period/classical1.jpg" width="100"></td>
               <td>2017-04-27 11:45:09</td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditPeriod" title="Edit"><i class="fa fa-edit"></i></button>
               </td>      
            </tr>
            <tr>
               <td>8</td>
               <td>United States of America</td>
               <td>Coin</td>
               <td><img src="http://www.mintageworld.com/images/period/united-states-of-america-periods.jpg" width="100"></td>
               <td>2017-11-13 04:32:40</td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditPeriod" title="Edit"><i class="fa fa-edit"></i></button>
               </td>     
            </tr>
            <tr>
               <td>9</td>
               <td>Modern</td>
               <td>Coin</td>
               <td><img src="http://www.mintageworld.com/images/period/Modern.jpg" width="100"></td>
               <td>2018-08-20 10:55:43</td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditPeriod" title="Edit"><i class="fa fa-edit"></i></button>
               </td>      
            </tr>
            <tr>
               <td>10</td>
               <td>Medieval</td>
               <td>Coin</td>
               <td><img src="http://www.mintageworld.com/images/period/Medieval.jpg" width="100"></td>
               <td>2017-07-18 11:48:22</td>
               <td>
                  <button type="button" class="btn btn-primary btn-sm align-self-baseline" data-bs-toggle="modal" data-bs-target="#EditPeriod" title="Edit"><i class="fa fa-edit"></i></button>
               </td>
            </tr>
         </tbody>           
      </table>
  </div>     
     
  </div>
</div>
  
<div class="modal fade" id="AddPeriod" tabindex="-1" aria-labelledby="AddPeriodLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="AddPeriodLabel">Add Period</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body"> 
            <div class="form-group row mb-3">
               <label class="col-md-3 control-label">Enter Title</label> 
               <div class="col-md-9"> <textarea name="title" class="form-control textarea" required="required" id="title" placeholder="Enter Title"></textarea> </div>
            </div>
            <div class="form-group row mb-3">
               <label class="col-md-3 control-label">Type</label> 
               <div class="col-md-9">
                  <select name="type" class="form-control" required="required">
                     <option value="">Select Type</option>
                     <option value="1">Coin</option>
                     <option value="2">Note</option>
                     <option value="3">Stamp</option>
                  </select>
               </div>
            </div>
            <div class="form-group row mb-3">
               <label class="col-md-3 control-label">Upload Image</label> 
               <div class="col-md-9">
                  <input name="fileupload" type="file" class="form-control image-preview-filename">                      
               </div>
            </div>
            <div class="form-group row">
               <label class="col-md-3 control-label">Order By (e.g. 1,2,3)</label> 
               <div class="col-md-9"> <input type="text" name="orderby" class="form-control" id="orderby" placeholder="Enter Order By" value=""> </div>
            </div> 
       </div>
       <div class="modal-footer">
         <input type="submit" name="submit" id="submitbutton" class="btn btn-warning btn-sm" value="Submit">
         <input type="reset" value="Reset" class="btn btn-warning btn-sm">
       </div>
     </div>
   </div>
 </div>

 <div class="modal fade" id="EditPeriod" tabindex="-1" aria-labelledby="EditPeriodLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="EditPeriodLabel">Edit Period</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body"> 
            <div class="form-group row mb-3">
               <label class="col-md-3 control-label">Title</label> 
               <div class="col-md-9"> <input name="title" class="form-control textarea" required="required" id="title" placeholder="Enter Title" disabled /></div>
            </div>
            <div class="form-group row mb-3">
               <label class="col-md-3 control-label">Type</label> 
               <div class="col-md-9">
                  <select name="type" class="form-control" required="required" disabled>
                     <option value="">Select Type</option>
                     <option value="1">Coin</option>
                     <option value="2">Note</option>
                     <option value="3">Stamp</option>
                  </select>
               </div>
            </div>
            <div class="form-group row mb-3">
               <label class="col-md-3 control-label">Order By (e.g. 1,2,3)</label> 
               <div class="col-md-9"> <input type="text" name="orderby" class="form-control" id="orderby" placeholder="Enter Order By" disabled /> </div>
            </div> 
            <div class="form-group row mb-3">
               <label class="col-md-3 control-label">Current Image</label> 
               <div class="col-md-9">
                  <img src="https://www.mintageworld.com/public/images/period/medieval.jpg" alt="" class="img-fluid" />                 
               </div>
            </div>
            <div class="form-group row">
               <label class="col-md-3 control-label">Upload Image</label> 
               <div class="col-md-9">
                  <input name="fileupload" type="file" class="form-control image-preview-filename">                      
               </div>
            </div>           
       </div>
       <div class="modal-footer">
         <input type="submit" name="submit" id="submitbutton" class="btn btn-warning btn-sm" value="Submit">
         <input type="reset" value="Reset" class="btn btn-warning btn-sm">
       </div>
     </div>
   </div>
 </div>