<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Se ha reportado una emergencia</title>
</head>
<body>
    <p>{{$mensaje->tituloMensaje}}</p>
    <ul>
        <li>Contenido: {{$mensaje->textoMensaje}}</li>
        <li>Fecha: {{$mensaje->fechaMensaje}}</li>
        <li>Emisor: {{$mensaje->emisorMensaje}}</li>
    </ul>
    </ul>
</body>
</html>