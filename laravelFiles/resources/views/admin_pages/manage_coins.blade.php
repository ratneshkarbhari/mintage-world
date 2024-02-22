<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-4">
    <div class="container-fluid">
        <div class="mb-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item">Information</li>

                    <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                </ol>
            </nav>
        </div>
        <div class="d-flex justify-content-between">
            <h2 class="title heading-3">{{$title}} </h2>
            <!-- <a type="button" class="btn btn-primary btn-sm align-self-baseline" href="add-coin"><i class="fa fa-plus"></i> Add Coin</a> -->
        </div>
        <div class="table-responsive">
            <table id="coinTable" class="table table-striped table-bordered DataTable" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Obverse Image</th>
                        <th>Cat. Ref. No.</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coins as $coin)
                    <tr id="coin-list-item-{{$coin['id']}}">
                        <td>{{$coin['id']}}</td>
                        <td><img src="{{getenv('COIN_IMAGE_BASE_URL').$coin['obverse_image']}}" class="img-fluid" width="100" height="100"></td>
                        <td>{{$coin['catalogue_ref_no']}}</td>
                        <td>
                            <label class="switch switch-success" for="chk1">
                                <input type="checkbox" class="set-coin-status" checked value="1">
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <a href="{{ url('admin/edit-coin/'.$coin['id']) }}" class="btn btn-warning btn-sm" title="Edit Product"><i class="fa fa-edit"></i></a>

                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteCoinModal-{{$coin['id']}}" class="btn btn-danger"><i class="fa fa-trash"></i></button>

                            <div class="modal fade" id="deleteCoinModal-{{$coin['id']}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Coin</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure?
                                        </div>
                                        <div class="modal-footer">
                                            <form coinId={{$coin['id']}} class="delete-coin-form" action="{{url('delete-coin-exe')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="coinid" value="{{$coin['id']}}">
                                                <button type="submit" class="btn btn-danger">Delete Coin</button>

                                            </form>

                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination-container">

            <p>{{$pagination_string}}</p>
            {!! $coins->withQueryString()->links() !!}

        </div>
    </div>

</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="liveToast " class="toast hide bg-danger text-white delete-failure position-relative" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-white">
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Success</strong>
            <small>Just Now</small>
        </div>
        <div class="toast-body">
            Delete Failed
        </div>
        <div class='toast-timeline animate'></div>
    </div>
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="liveToast " class="toast hide bg-success text-white delete-success position-relative" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto"><i class="fas fa-check-circle"></i> Delete Coin</strong>
            <small>Just Now</small>
        </div>
        <div class="toast-body">
            Deleted Successfully
        </div>
        <div class='toast-timeline animate'></div>
    </div>
</div>
<script>
    $(".set-coin-status").click(function(e) {
        e.preventDefault();
        let coinId = $(this).attr("coinId");
        $.ajax({
            type: "POST",
            url: "{{url('set-coin-status-exe')}}",
            data: {
                "coinId": coinId,
                "status": $(this).val()
            },
            success: function(response) {
                console.log(response)
            }
        });
    });

    $("form.delete-coin-form").submit(function(e) {
        e.preventDefault();
        let action = $(this).attr("action");
        let method = $(this).attr("method");
        let formData = $(this).serialize();
        let coinId = $(this).attr("coinId");
        $.ajax({
            type: method,
            url: action,
            data: formData,
            success: function(response) {
                if (response.result == "success") {
                    $(".delete-success").toast("show");
                    $("tr#coin-list-item-" + coinId).hide();
                    $('#deleteCoinModal-'+coinId).modal('hide');
                } else {
                    $(".delete-failure").toast("show");

                }
            }
        });
    });
</script>