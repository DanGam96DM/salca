@extends('layouts.admin')
@section('contenido')

<!DOCTYPE html>
<style>
.letragrande{font-size:40px;}
</style>
<html>
            <div class="row">
                <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                    <h3>Botones de Emergencia</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-condensed table-hover letragrande">
                                <thead>
                                    <th style="text-align:center">Zona 1</th>
                                </thead>
                                <tr>
                                    <td>
                                        <form name="form1" action="{{url('boton/boton')}}" method="POST">
                                        {{ csrf_field() }}
                                        <form method="post">
                                            <input class="btn btn-lg btn-block btn btn-success" type="submit" name="ON1" id="ON1" value="Encendido" onClick='alert("Alarma Encendida")'>
                                            <input class="btn btn-lg btn-block btn btn-danger" type="submit" name="OFF1" id="OFF1" value="Apagado" onClick='alert("Alarma Apagada")'>
                                        </form>
                                    </td>
                                </tr>
                                <thead>
                                    <th style="text-align:center">Zona 2</th>
                                </thead>
                                <tr>
                                    <td>
                                        <form name="form1" action="{{url('boton/boton')}}" method="POST">
                                        {{ csrf_field() }}
                                            <input class="btn btn-lg btn-block btn btn-success" type="submit" name="ON2" id="ON2" value="Encendido" onClick='alert("Alarma Encendida")'>
                                            <input class="btn btn-lg btn-block btn btn-danger" type="submit" name="OFF2" id="OFF2" value="Apagado" onClick='alert("Alarma Apagada")'>
                                        </form>
                                    </td>
                                </tr>

                                <thead>
                                    <th style="text-align:center">Zona 3</th>
                                </thead>
                                <tr>
                                    <td>
                                        <form name="form1" action="{{url('boton/boton')}}" method="POST">
                                        {{ csrf_field() }}
                                            <input class="btn btn-lg btn-block btn btn-success" type="submit" name="ON3" id="ON3" value="Encendido" onClick='alert("Alarma Encendida")'>
                                            <input class="btn btn-lg btn-block btn btn-danger" type="submit" name="OFF3" id="OFF3" value="Apagado" onClick='alert("Alarma Apagada")'>
                                        </form>
                                    </td>
                                </tr>

                                <thead>
                                    <th style="text-align:center">Zona 4</th>
                                </thead>
                                <tr>
                                    <td>
                                        <form name="form1" action="{{url('boton/boton')}}" method="POST">
                                        {{ csrf_field() }}
                                            <input class="btn btn-lg btn-block btn btn-success" type="submit" name="ON4" id="ON4" value="Encendido" onClick='alert("Alarma Encendida")'>
                                            <input class="btn btn-lg btn-block btn btn-danger" type="submit" name="OFF4" id="OFF4" value="Apagado" onClick='alert("Alarma Apagada")'>
                                        </form>
                                    </td>
                                </tr>

                                <thead>
                                    <th style="text-align:center">Zona 5</th>
                                </thead>
                                <tr>
                                    <td>
                                        <form name="form1" action="{{url('boton/boton')}}" method="POST">
                                        {{ csrf_field() }}
                                            <input class="btn btn-lg btn-block btn btn-success" type="submit" name="ON5" id="ON5" value="Encendido" onClick='alert("Alarma Encendida")'>
                                            <input class="btn btn-lg btn-block btn btn-danger" type="submit" name="OFF5" id="OFF5" value="Apagado" onClick='alert("Alarma Apagada")'>
                                        </form>
                                    </td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
    <html>
@endsection