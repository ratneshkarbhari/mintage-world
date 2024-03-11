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
            <a class="btn btn-primary btn-sm align-self-baseline" title="Add Category" href="add-category"> <i class="fa fa-plus"></i> Add Category </a>
        </div>
        <div class="col-md-12 mt-3">
            <div class="table-responsive">
                <table id="manageCategories" class="table table-striped table-bordered DataTable " style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $srNo = 1;
                        @endphp
                        @foreach($categories as $category)
                        <tr id="cat-{{$category['id']}}">
                            <td>{{$srNo}}</td>
                            <td>{{$category['cat_name']}} </td>
                            <td>
                                <label class="switch switch-success" for="chk1">
                                    <input active-inactive-pcat="{{$category['id']}}" type="checkbox" checked class="active-inactive-switch">
                                    <span class="slider round"></span>
                                </label>
                            </td>
                            <td>
                                <a href="{{ url('admin/edit-category/'.$category['id']) }}" class="btn btn-warning btn-sm" title="Edit Category"><i class="fa fa-edit"></i></a>
                                <a href="#" id="DeleteCategory" class="btn btn-danger  btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$category['id']}}" title="Delete Category"><i class="fa fa-trash"></i></a>
                                <div class="modal fade" id="deleteModal-{{$category['id']}}" tabindex="-1" aria-labelledby="deleteModal-{{$category['id']}}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModal-{{$category['id']}}Label">Delete Category Confirmation</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Are you sure you want to delete this?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <form shopping_cat_id="{{$category['id']}}" class="deleteCatForm" action="{{url('delete-shopping-category')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="shopping_cat_id" value="{{$category['id']}}">
                                                    <button type="submit" class="btn btn-danger">Yes</button>
                                                </form>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @php
                        $srNo++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="liveToast " class="toast hide bg-danger text-white category-delete position-relative" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Category Deleted</strong>
            <small>Just Now</small>
        </div>
        <div class="toast-body">
            Delete Category Success
        </div>
        <div class='toast-timeline animate'></div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="liveToast " class="toast hide bg-danger text-white delete-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Delete Error</strong>
            <small>Just Now</small>
        </div>
        <div class="toast-body">
            Something went wrong. Please contact developers.
        </div>
        <div class='toast-timeline animate'></div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="liveToast " class="toast hide bg-success text-white category-create position-relative" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Category Created</strong>
            <small>Just Now</small>
        </div>
        <div class="toast-body">
            Delete Category Successfully
        </div>
        <div class='toast-timeline animate'></div>
    </div>
</div>
<script>

    //Datatable invoking script
    let table = new DataTable('#manageCategories');

    // delete sc script
    $(".deleteCatForm").submit(function(e) {
        e.preventDefault();
        let deleteFormData = $(this).serializeArray();
        let categoryId = $(this).attr("shopping_cat_id");
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: deleteFormData,
            success: function(response) {
                if (response == "success") {
                    $(".category-delete").toast("show");
                    $('.modal').modal('hide');

                    $("tr#cat-" + categoryId).addClass("d-none");
                } else {
                    $(".delete-failure").toast("show");
                }
            }
        });
    });
</script>