<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
  <div class="container-fluid">
     <div class="mb-3">
        <nav aria-label="breadcrumb">
           <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="dashboard">Home</a></li> 
            <li class="breadcrumb-item"><a href="manage-product-categories">Manage Shopping Categories</a></li> 
            <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
           </ol>
        </nav>
     </div>
     <div class="d-flex justify-content-between">
      <h2 class="title heading-3">{{$title}} </h2>      
   </div> 
   <div class="col-md-12 event-table mt-3">
    <div class="row">
        <div class="col-md-12 mb-3">
            <label >Shopping Category Name</label> 
            <input name="cat_name" id="cat_name" type="text" class="form-control" placeholder="Please Enter Product Category" required="required" value="Banknote Accessories"> 
        </div>
        <div class="col-md-6 mb-3">
            <label>Sort Order</label>
            <input name="cat_order" id="cat_order" type="text" class="form-control" placeholder="Order No" required="required" value="6">
        </div>
        <div class="col-md-6 mb-3">
            <label>Select Parent Category</label>
            <select name="Parent_Category" id="Parent_Category" class="form-control">
                <option value="0">Select Parent</option>
                <option value="1">3D Puzzles</option>
                <option value="2">Accessories</option>
                <option value="16">Buy Stamps</option>
            </select>
        </div>
        <div class="col-md-12 mb-3">
            <label >Footer Description</label> 
            <div id="editor" class="editor">
                <h1>Buy Banknote Accessories Online at Mintage World</h1>
                <p>There are some things in life which you should never compromise on. If you are a passionate collector of Banknotes then you would know how valuable your collection is. Mintage world offers a chance to buy lighthouse <strong>banknote accessories online</strong> that will help you nurture and protect your precious collection of banknotes. If you are looking for a premium <strong>banknote album</strong> to <strong>banknote sleeves</strong> then here is paradise for you. Our collection has the widest range of world-class accessories that your notes stay fresh as ever.</p>
                <p>You might be already aware that how the market value of old banknotes changes drastically depending upon the condition of your note. Just a minor fold mark might cost you a lot. That’s the reason why it is always advised by experts that collectors should ideally invest in good quality lighthouse <strong>banknote collecting supplies</strong> so that you won’t have to regret later. The materials used for making these amazing products ensure that your notes are away from any kind of moisture or dust. If you want to ensure that your notes are never folded or torn. Arranging your notes and keeping them presentable is also a knack that good collectors inculcate. Buy banknote accessories online at Mintage World to keep your collection well-arranged based on different categories. Impress everyone not only with your amazing collection but also by flaunting your top-notch banknote collecting supplies. Notes that are well-maintained for several years will fetch you a lot of money in the future. So don’t be complacent about the quality of accessories that you buy.</p>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <label >Meta Title</label> 
            <input name="meta_title" id="meta_title" type="text" class="form-control" placeholder="Please Enter Product Meta Title" value="Banknote Collecting Supplies - Buy Banknote Accessories Online">
        </div>
        <div class="col-md-6 mb-3">
            <label >Meta Keywords</label> 
            <textarea name="meta_keywords" id="meta_keywords" tabindex="2" class="form-control" placeholder="Enter Meta Keywords">banknote collecting supplies, buy banknote collecting supplies online, banknote accessories, buy banknote accessories online</textarea>
        </div>
        <div class="col-md-12 mb-3">
            <label >Meta Description</label> 
            <textarea name="meta_content" id="meta_content" tabindex="2" class="form-control" placeholder="Enter Meta Description">Browse through quality lighthouse banknote collecting supplies online at low price in India. Buy best banknote accessories with free shipping for organizing your currency collection.</textarea>
        </div>
        <div class="col-md-6 mb-3">
            <label >Custom URL</label> 
            <input name="custom_url" id="custom_url" type="text" class="form-control" placeholder="Please Enter Custom URL" value="banknote-accessories">
        </div>
        <div class="col-md-3 mb-3">
            <label class="w-100 mb-2">Status</label> 
            <label class="switch switch-success" for="chk1">
                <input type="checkbox" checked id="chk1">
                <span class="slider round"></span> 
            </label> 
             
        </div>
        <div class="col-md-12 mb-3">
            <label class="d-md-block d-none">&nbsp;</label> 
            <button class="btn-primary btn btn-sm" id="SubmitButton">Submit</button>
        </div>


    </div>
      
      
        
</div>   
  </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="liveToast " class="toast hide bg-success text-white update-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
            <small>Just Now</small>
            {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
        </div>
        <div class="toast-body">
            Saved Successfully
        </div>
        <div class='toast-timeline animate'></div>
    </div>
 </div>
 <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="liveToast " class="toast hide bg-danger text-white edit-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Error</strong>
            <small>Just Now</small>
            {{-- <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button> --}}
        </div>
        <div class="toast-body">
          Something went wrong. Please contact to Administration
        </div>
        <div class='toast-timeline animate'></div>
    </div>
 </div>
 
 <script>
     $("#SubmitButton").click(function(e) {
      $('.update-success').toast('show'); 
     });  
 </script>