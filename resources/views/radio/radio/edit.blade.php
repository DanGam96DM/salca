@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <h3>Editar Radio: {{$radio->claveRadio}} <a href="{{URL::action('RadioController@index')}}"><i class="btn btn-success fa fa-arrow-left"></i></a></h3>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {!! Form::model($radio, ['method'=>'PATCH', 'route'=>['radio.update', $radio->idRadio]])!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="nombre">Descripción Radio</label>
            <input type="text" name="descripcionRadio" class="form-control" value="{{$radio->descripcionRadio}}" placeholder="Nombre">
        </div>
        <div class="form-group">
            <label for="nombre">Clave Radio</label>
            <input type="text" name="claveRadio" class="form-control" value="{{$radio->claveRadio}}" placeholder="Direccion">
        </div>
        <div class="form-group">
        <label>Persona</label>
            <select name="idPersona" class="form-control">
            @foreach($personas as $per)
                @if($per->idPersona==$radio->idPersona)
                <option value="{{$per->idPersona}}" class="form-control" selected >{{$per->nombrePersona}}</option>
                @else
                <option value="{{$per->idPersona}}" class="form-control">{{$per->nombrePersona}}</option>
                @endif
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-primary fa fa-check-square-o" type="submit"></button>
            <button class="btn btn-danger fa fa-times" type="reset"></button>
        </div>
        {{Form::close()}}
    </div>
</div>
@stop