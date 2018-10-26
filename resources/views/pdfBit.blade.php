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
    <h1 style="background-color:MediumSeaGreen;">Detalle de Bítacora Salca Seguro</h1>
</center>
<div class="row">
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <tr>
                    <th>Id</th>
                    <th>Persona</th>
                    <th>Emergencia</th>
                    <th>Fecha</th>
                </tr>
                <tr>
                    <td>{{$bitacoras->idBitacora}}</td>
                    <td>{{$bitacoras->nombrePersona}}</td>
                    <td>{{$bitacoras->nombreEmergencia}}</td>
                    <td>{{$bitacoras->fechaBitacora}}</td>
                </tr>    
            </table>
        </div>
    </div>
</div>
    <center>
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="form-group">
            <h1 style="color:green;">Título Bítacora</h1>
            <h2>{{$bitacoras->tituloBitacora}}</h2>    
        </div>
    </div>
    </center>
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="form-group">
            <h1 style="color:green;">Descripción Bítacora</h1>
            <p style="font-family:courier;">{{$bitacoras->descripcionBitacora}}</p>       
        </div>
    </div>
</body>
</html>