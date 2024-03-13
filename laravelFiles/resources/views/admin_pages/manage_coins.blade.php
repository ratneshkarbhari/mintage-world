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
            <a type="button" class="btn btn-primary btn-sm align-self-baseline" href="add-coin"><i class="fa fa-plus"></i> Add Coin</a>
        </div>
        <div class="table-responsive">
            <table id="coinTable" class="table table-striped table-bordered DataTable" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Obverse Image</th>
                        <th>Cat. Ref. No.</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
        
    </div>

</div>

<script>

    $("table#coinTable").DataTable({
        'ajax': '{{url("get-all-coins")}}',
        'deferRender' : true,
        'columns': [
            {
                data: 'id'
            },
            {
                data: 'obverse_image',
                render : function(data,type,full){
                    return '<img src="{{getenv("COIN_IMAGE_BASE_URL")}}'+data+'" style="width: 100px; height: 100px;">';
                }
            },
            {
                data: 'catalogue_ref_no'
            },
            
            {
                render: function (data,type,full) { 

                    return '<a href="{{url("admin/edit-coin/")}}/'+full.id+'" class="btn btn-warning btn-sm" title="Edit Product"><i class="fa fa-edit"></i></a>';

                }
            }
            
        ]
    }).order([0,'desc']);



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