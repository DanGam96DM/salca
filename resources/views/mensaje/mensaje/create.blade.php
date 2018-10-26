@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <h3>Nuevo Mensaje <a href="{{URL::action('MensajeController@index')}}"><i class="btn btn-success fa fa-arrow-left"></i></a></h3>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
        {!! Form::open(array('url'=>'mensaje/mensaje', 'method'=>'POST', 'autocomplete'=>'off'))!!}
        {{Form::token()}}
<div class="row">
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="form-group">
            <label for="nombre">Título Mensaje</label>
            <input type="text" name="tituloMensaje" class="form-control" placeholder="Título">
        </div>
    </div>
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="form-group">
            <label for="nombre">Texto Mensaje</label>
            <textarea name="textoMensaje" class="form-control" placeholder="Texto del mensaje" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div class="col-lg-16 col-md-12 col-sm-12 col-xs-16">
        <div class="form-group">
            <button class="btn btn-primary fa fa-paper-plane" type="submit"></button>
            <button class="btn btn-danger fa fa-times" type="reset"></button>
        </div>
    </div>
</div>
        {{Form::close()}}
@stop