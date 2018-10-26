@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Mensajes <a href="mensaje/create"><button class="btn btn-success fa fa-plus-circle"></button></a></h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="table-responsive">
            <table id="mensajes" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Texto</th>
                        <th>Fecha y Hora</th>
                        <th>Emisor</th>
                        <th>Zona</th>
                        <th>Opciones</th>
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
    $('#mensajes').DataTable({
        "processing":true,
        "searching": true,
        "serverSide":true,
        "responsive": true,
        "ajax":"{{route('mensajes')}}",
        "columns":[
            {"data":"idMensaje", name:"m.idMensaje"},
            {"data":"tituloMensaje", name:"m.tituloMensaje"},
            {"data":"textoMensaje", name:"m.textoMensaje"},
            {"data":"fechaMensaje", name:"m.fechaMensaje"},
            {"data":"emisorMensaje", name:"m.emisorMensaje"},
            {"data":"zonaBoton", name:"b.zonaBoton"},
            {
                "mRender": function(data, type, full) {
                    return '<a class="btn btn-warning fa fa-eye" href=mensaje/' + full['idMensaje'] + '></a>';
                },
                name:"m.idMensaje"
            }
        ]
    });
});
</script>
@endsection
