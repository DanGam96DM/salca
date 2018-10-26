@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de roles</h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="table-responsive">
            <table id="roles"class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- then dataTables -->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#roles').DataTable({
        "processing":true,
        "searching": true,
        "serverSide":true,
        "responsive": true,
        "ajax":"{{route('roles')}}",
        "columns":[
            {"data":"idRol"},
            {"data":"nombreRol"},
            {"data":"descripcionRol"}
        ]
    });
});
</script>
@endsection