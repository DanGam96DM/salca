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
    <h1 style="background-color:MediumSeaGreen;">Listado de Radios Salca Seguro</h1>
</center>
<div class="row">
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <tr>
                    <th>Id</th>
                    <th>Persona</th>
                    <th>Descripción</th>
                    <th>Clave</th>
                </tr>
                @foreach($radios as $rad)
                <tr>
                    <td>{{$rad->idRadio}}</td>
                    <td>{{$rad->nombrePersona}}</td>
                    <td>{{$rad->descripcionRadio}}</td>
                    <td>{{$rad->claveRadio}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</body>
</html>