<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mensaje;
use App\Mail\Emergencia;
use Illuminate\Mail\Mailable;
use App\Boton;
use App\Persona;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\BotonFormRequest;
use DB;

class BotonController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        if($request){
            $query=trim($request->get('searchText'));
            $botones=DB::table('tbl_boton')->where('zonaBoton', 'LIKE', '%'.$query.'%')
            ->where('estadoBoton','=','1')
            ->orderBy('idBoton', 'desc')
            ->paginate(10);
            return view('boton.boton.index', ['botones'=>$botones, 'searchText'=>$query]);
        }
    }
    public function store(Request $request)
    {
        if($request->input('ON1')){
            //guardar mensaje
            $fechaActual=date('Y-m-d H:i:s');
            $mensaje=new Mensaje();
            $mensaje->tituloMensaje='Nueva emergencia en la Zona 1 de la ciudad';
            $mensaje->textoMensaje='Se ha reportado una nueva emergencia en la zona 1 de la ciudad ';
            $mensaje->fechaMensaje=$fechaActual;
            $mensaje->emisorMensaje=Auth::user()->usuario;
            $mensaje->idBoton='1';
            $mensaje->save();

            //enviar mensaje
            $personas = Persona::pluck('emailPersona');
            Mail::to($personas)->send(new Emergencia($mensaje));

            //cambiar el estado del boton
            file_put_contents("output1.php", "salida1=ON"); 
            return view('boton.boton.index');
        }
        else if($request->input('OFF1')){
            file_put_contents("output1.php", "salida1=OFF");
            return view('boton.boton.index');
        }
        else if($request->input('ON2')){
            //guardar mensaje
            $fechaActual=date('Y-m-d H:i:s');
            $mensaje=new Mensaje();
            $mensaje->tituloMensaje='Nueva emergencia en la Zona 2 de la ciudad';
            $mensaje->textoMensaje='Se ha reportado una nueva emergencia en la zona 2 de la ciudad ';
            $mensaje->fechaMensaje=$fechaActual;
            $mensaje->emisorMensaje=Auth::user()->usuario;
            $mensaje->idBoton='2';
            $mensaje->save();

            //enviar mensaje
            $personas = Persona::pluck('emailPersona');
            Mail::to($personas)->send(new Emergencia($mensaje));

            //cambiar el estado del boton
            file_put_contents("output2.php", "salida2=ON");
            return view('boton.boton.index');
        }
        else if($request->input('OFF2')){
            file_put_contents("output2.php", "salida2=OFF");
            return view('boton.boton.index');
        }
        else if($request->input('ON3')){
            //guardar mensaje
            $fechaActual=date('Y-m-d H:i:s');
            $mensaje=new Mensaje();
            $mensaje->tituloMensaje='Nueva emergencia en la Zona 3 de la ciudad';
            $mensaje->textoMensaje='Se ha reportado una nueva emergencia en la zona 3 de la ciudad ';
            $mensaje->fechaMensaje=$fechaActual;
            $mensaje->emisorMensaje=Auth::user()->usuario;
            $mensaje->idBoton='3';
            $mensaje->save();

            //enviar mensaje
            $personas = Persona::pluck('emailPersona');
            Mail::to($personas)->send(new Emergencia($mensaje));

            //cambiar el estado del boton
            file_put_contents("output3.php", "salida3=ON");
            return view('boton.boton.index');
        }
        else if($request->input('OFF3')){
            file_put_contents("output3.php", "salida3=OFF");
            return view('boton.boton.index');
        }
        else if($request->input('ON4')){
            //guardar mensaje
            $fechaActual=date('Y-m-d H:i:s');
            $mensaje=new Mensaje();
            $mensaje->tituloMensaje='Nueva emergencia en la Zona 4 de la ciudad';
            $mensaje->textoMensaje='Se ha reportado una nueva emergencia en la zona 4 de la ciudad ';
            $mensaje->fechaMensaje=$fechaActual;
            $mensaje->emisorMensaje=Auth::user()->usuario;
            $mensaje->idBoton='5';
            $mensaje->save();

            //enviar mensaje
            $personas = Persona::pluck('emailPersona');
            Mail::to($personas)->send(new Emergencia($mensaje));

            //cambiar el estado del boton
            file_put_contents("output4.php", "salida4=ON");
            return view('boton.boton.index');
        }
        else if($request->input('OFF4')){
            file_put_contents("output4.php", "salida4=OFF");
            return view('boton.boton.index');
        }
        else if($request->input('ON5')){
            //guardar mensaje
            $fechaActual=date('Y-m-d H:i:s');
            $mensaje=new Mensaje();
            $mensaje->tituloMensaje='Nueva emergencia en la Zona 5 de la ciudad';
            $mensaje->textoMensaje='Se ha reportado una nueva emergencia en la zona 5 de la ciudad ';
            $mensaje->fechaMensaje=$fechaActual;
            $mensaje->emisorMensaje=Auth::user()->usuario;
            $mensaje->idBoton='6';
            $mensaje->save();

            //enviar mensaje
            $personas = Persona::pluck('emailPersona');
            Mail::to($personas)->send(new Emergencia($mensaje));

            //cambiar el estado del boton
            file_put_contents("output5.php", "salida5=ON");
            return view('boton.boton.index');
        }
        else if($request->input('OFF5')){
            file_put_contents("output5.php", "salida5=OFF");
            return view('boton.boton.index');
        }

    }    
}
