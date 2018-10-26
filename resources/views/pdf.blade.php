<!DOCTYPE html>
<html>
<body>
    <head>
        <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            border-spacing: 15px;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            border: 1px solid black;
            padding: 5px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        </style>
    </head>
<center>
    <h1 style="background-color:MediumSeaGreen;">Detalle de Mensaje Salca Seguro</h1>
</center>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-condensed table-hover">
        <tr>
            <th>Id</th>
            <th>Emisor</th>
            <th>Zona/tipo</th>
            <th>Fecha/hora</th>
        </tr>
        <tr>
            <td>{{$mensajes->idMensaje}}</td>
            <td>{{$mensajes->emisorMensaje}}</td>
            <td>{{$mensajes->zonaBoton}}</td>
            <td>{{$mensajes->fechaMensaje}}</td>
        </tr>
    </table>
</div>
    <center>
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="form-group">
            <h1 style="color:green;">Título Mensaje</h1>
            <h2>{{$mensajes->tituloMensaje}}</h2>    
        </div>
    </div>
    </center>
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="form-group">
            <h1 style="color:green;">Cuerpo del Mensaje</h1>
            <p style="font-family:courier;">{{$mensajes->textoMensaje}}</p>       
        </div>
    </div>
</body>
</html>
