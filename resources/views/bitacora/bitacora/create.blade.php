@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <h3>Nueva Bitácora <a href="{{URL::action('BitacoraController@index')}}"><i class="btn btn-success fa fa-arrow-left"></i></a></h3>
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
        {!! Form::open(array('url'=>'bitacora/bitacora', 'method'=>'POST', 'autocomplete'=>'off'))!!}
        {{Form::token()}}
<div class="row">
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="form-group">
            <label for="nombre">Título Bitácora</label>
            <input type="text" name="tituloBitacora" class="form-control" placeholder="Título">
        </div>
    </div>
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="form-group">
            <label for="nombre">Descripción Bítacora</label>
            <textarea name="descripcionBitacora" class="form-control" placeholder="Descripción" cols="30" rows="10"></textarea>
        </div>
    </div>
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="form-group">
            <label>Persona</label>
            <select name="idPersona" class="form-control">
            @foreach($personas as $per)
                <option value="{{$per->idPersona}}" class="form-control" >{{$per->nombrePersona}}</option>
            @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="form-group" >
            <label>Emergencia</label>
            <select name="idEmergencia" class="form-control">
            @foreach($emergencias as $em)
                <option value="{{$em->idEmergencia}}" class="form-control" >{{$em->nombreEmergencia}}</option>
            @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <div class="form-group">
            <button class="btn btn-primary fa fa-check-square-o" type="submit"></button>
            <button class="btn btn-danger fa fa-times" type="reset"></button>
        </div>
    </div>
</div>
        {{Form::close()}}
@stop