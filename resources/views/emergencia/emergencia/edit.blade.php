@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
        <h3>Editar Emergencia: {{$emergencia->nombreEmergencia}} <a href="{{URL::action('EmergenciaController@index')}}"><i class="btn btn-success fa fa-arrow-left"></i></a></h3>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {!! Form::model($emergencia, ['method'=>'PATCH', 'route'=>['emergencia.update', $emergencia->idEmergencia]])!!}
        {{Form::token()}}
        <div class="form-group">
            <label for="nombre">Nombre Emergencia</label>
            <input type="text" name="nombreEmergencia" class="form-control" value="{{$emergencia->nombreEmergencia}}" placeholder="Nombre">
        </div>
        <div class="form-group">
            <label for="nombre">Descripcion Emergencia</label>
            <input type="text" name="descripcionEmergencia" class="form-control" value="{{$emergencia->descripcionEmergencia}}" placeholder="Descripcion">
        </div>
        <div class="form-group">
            <button class="btn btn-primary fa fa-check-square-o" type="submit"></button>
            <button class="btn btn-danger fa fa-times" type="reset"></button>
        </div>
        {{Form::close()}}
    </div>
</div>
@stop