@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group">
            <label for="nombre">Id Bitácoras:</label>
            <p>{{$bitacora->idBitacora}}</p>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group">
            <label for="nombre">Fecha y Hora:</label>
            <p>{{$bitacora->fechaBitacora}}</p>       
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group">
            <label for="nombre">Persona:</label>
            <p>{{$bitacora->persona}}</p>       
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group">
            <label for="nombre">Emergencia:</label>
            <p>{{$bitacora->emergencia}}</p>       
        </div>
    </div>
    <center>
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="form-group">
            <label for="nombre">Título Bitácoras:</label>
            <p>{{$bitacora->tituloBitacora}}</p>       
        </div>
    </div>
    </center>
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="form-group">
            <label for="nombre">Texto Bitácoras:</label>
            <p>{{$bitacora->descripcionBitacora}}</p>       
        </div>
    </div>

    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="form-group">
            <a href="{{URL::action('BitacoraController@index')}}"><i class="btn btn-success fa fa-arrow-left"></i></a>
            <a href='{{url("/pdfBit/{$bitacora->idBitacora}")}}'><i class="btn btn-danger fa fa-file-pdf-o"></i></a>
        </div>
    </div>
</div>
@stop