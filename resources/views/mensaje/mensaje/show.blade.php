@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group">
            <label for="nombre">Id Mensaje:</label>
            <p>{{$mensajes->idMensaje}}</p>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group">
            <label for="nombre">Fecha y Hora:</label>
            <p>{{$mensajes->fechaMensaje}}</p>       
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group">
            <label for="nombre">Zona/Tipo:</label>
            <p>{{$mensajes->zonaBoton}}</p>       
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group">
            <label for="nombre">Emisor:</label>
            <p>{{$mensajes->emisorMensaje}}</p>       
        </div>
    </div>
    <center>
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="form-group">
            <label for="nombre">Título Mensaje:</label>
            <p>{{$mensajes->tituloMensaje}}</p>       
        </div>
    </div>
    </center>
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="form-group">
            <label for="nombre">Texto Mensaje:</label>
            <p>{{$mensajes->textoMensaje}}</p>       
        </div>
    </div>

    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="form-group">
            <a href="{{URL::action('MensajeController@index')}}"><i class="btn btn-success fa fa-arrow-left"></i></a>
            <a href='{{url("/pdf/{$mensajes->idMensaje}")}}'><i class="btn btn-danger fa fa-file-pdf-o"></i></a>
        </div>
    </div>
</div>
@stop