</div>
</div>
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3   border-top text-center w-100">
    <div class="d-block text-center w-100">
        <span class="mb-3 mb-md-0 text-body-secondary">Copyright 2023 Mintage World. All rights reserved</span>
    </div>
</footer>


<script src="{{url('assets/admin/js/bootstrap.bundle.min.js')}}"></script>
<!-- Template Javascript -->

<script src="{{url('assets/admin/js/color-modes.js')}}"></script>
<script type="text/javascript" language="javascript" src="{{url('assets/admin/js/ckeditor.js')}}"></script>
<script type="text/javascript" language="javascript" src="{{url('assets/admin/js/dashboard.js')}}"></script>
<script type="text/javascript" language="javascript" src="{{url('assets/admin/js/jquery.dataTables.min.js')}}"></script> 
<script type="text/javascript" language="javascript" src="{{url('assets/admin/js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" language="javascript" src="{{url('assets/admin/js/jszip.min.js')}}"></script>
<script type="text/javascript" language="javascript" src="{{url('assets/admin/js/pdfmake.min.js')}}"></script>
<script type="text/javascript" language="javascript" src="{{url('assets/admin/js/vfs_fonts.js')}}"></script>
<script type="text/javascript" language="javascript" src="{{url('assets/admin/js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" language="javascript" src="{{url('assets/admin/js/buttons.print.min.js')}}"></script>
<script type="text/javascript" language="javascript" src="{{url('assets/admin/js/bootstrap-datepicker.js')}}"></script>



<script>
    new DataTable('.DataTable', {   
        dom: 'lBfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'], 
    });
</script>
 <script>
    new DataTable('#example1', {
    ajax: '{{url('assets/admin/json/data2.txt')}}',
    columns: [
        
{ data: 'id' },
{ data: 'denomination_id' },
{ data: 'ruler_id' },
{ data: 'metal_id' },
{ data: 'minting_technique_id' },
{ data: 'rarity_id' },
{ data: 'calender_system_id' },
{ data: 'shape_id' }
    ]
    
});
 </script>  

  

<script src="{{url('assets/admin/js/select2.min.js')}}"></script>
<script>
    $(".js-example-basic-single").select2({
        placeholder: "Select Here",
        allowClear: true
    }); 
  </script>


</body>

</html>