@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Personas <a href="persona/create"><button class="btn btn-success fa fa-plus-circle" ></button></a></h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="table-responsive">
            <table id="personas"class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>DPI</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </thead>
            </table>
        </div>
    </div>
</div>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#personas').DataTable({
        "processing":true,
        "searching": true,
        "serverSide":true,
        "responsive": true,
        "ajax":"{{route('personas')}}",
        columns:[
            {data:"idPersona"},
            {data:"nombrePersona"},
            {data:"emailPersona"},
            {data:"telefonoPersona"},
            {data:"direccionPersona"},
            {data:"dpiPersona"},
            {
                "mRender": function(data, type, full) {
                    return '<a class="btn btn-info fa fa-pencil" href=persona/' + full['idPersona'] + '/edit></a>';
                },
                name:"idPersona"
            },
            {
                "mRender": function(data, type, full) {
                    return '<a class="btn btn-danger delete fa fa-pencil" id="'+ full['idPersona'] +'"></a>';
                },
                name:"idPersona"
            }
        ]
    });
    $(document).on('click','.delete', function(){
        var id=$(this).attr('id');
        console.log(id);
        swal({
            title: 'Estas seguro?',
            text: "No podras revertirlo!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.value) {
                window.location.href="persona/"+id;
                swal(
                'Eliminado!',
                'La persona ha sido eliminada',
                'success'
                )
            }
        });
    });
});
</script>
@endsection