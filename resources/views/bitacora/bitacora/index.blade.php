@extends('layouts.admin')
@section('contenido')
<div class="col-lg-4 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-green">
        <div class="inner">
            <h3>{{$usuarios}}<sup style="font-size: 20px">#</sup></h3>

            <p>Usuarios Registrados</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{URL::action('UserController@index')}}" class="small-box-footer">Mas información<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-yellow">
        <div class="inner">
            <h3>{{$radios}}</h3>

            <p>Radios Registrados</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="{{URL::action('RadioController@index')}}" class="small-box-footer">Mas información<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-blue">
        <div class="inner">
            <h3>{{$emergencias}}</h3>

            <p>Emergencias Registradas</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        </div>
    </div>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Bitácoras <a href="bitacora/create"><button class="btn btn-success fa fa-plus-circle"></button></a></h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="table-responsive">
            <table id="bitacoras" class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Nombre persona</th>
                        <th>Nombre emergencia</th>
                        <th>Editar</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#bitacoras').DataTable({
        "processing":true,
        "searching": true,
        "serverSide":true,
        "responsive": true,
        "ajax":"{{route('bitacoras')}}",
        columns:[
            {data:"idBitacora", name:"b.idBitacora"},
            {data:"tituloBitacora", name:"b.tituloBitacora"},
            {data:"descripcionBitacora", name:"b.descripcionBitacora"},
            {data:"fechaBitacora", name:"b.fechaBitacora"},
            {data:"nombrePersona", name:"tbl_persona.nombrePersona"},
            {data:"nombreEmergencia", name:"tbl_emergencia.nombreEmergencia"},
            {
                "mRender": function(data, type, full) {
                    return '<a class="btn btn-info fa fa-pencil" href=bitacora/' + full['idBitacora'] + '/edit></a>';
                },
                name:"b.idBitacora"
            },
            {
                "mRender": function(data, type, full) {
                    return '<a class="btn btn-warning fa fa-eye" href=bitacora/' + full['idBitacora'] + '></a>';
                },
                name:"b.idBitacora"
            }
        ]
    });
});
</script>
@endsection