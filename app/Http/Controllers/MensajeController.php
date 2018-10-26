<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;
use App\Mensaje;
use App\Persona;
use App\Mail\Emergencia;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\MensajeFormRequest;
use DataTables;
use DB;
class MensajeController extends Controller
{
    public function index(Request $request){
        return view('mensaje.mensaje.index');
    }
    public function mensajeDatos(){
        $mensajes=DB::table('tbl_mensaje as m')
        ->join('tbl_boton as b', 'm.idBoton', '=', 'b.idBoton')
        ->select('m.idMensaje','m.tituloMensaje', 'm.textoMensaje', 'm.fechaMensaje', 'm.emisorMensaje', 'b.zonaBoton');
        return DataTables::of($mensajes)->make(true);
    }
    public function create(){
        $personas=DB::table('tbl_persona')->where('condicion', '=', '1')->get();
        $botones=DB::table('tbl_boton')->where('estadoBoton', '=', '1')->get();
        return view('mensaje.mensaje.create', ['personas'=>$personas, 'botones'=>$botones]);
    }
    public function store(MensajeFormRequest $request){
        //guardar mensaje
        $fechaActual=date('Y-m-d H:i:s');
        $mensaje=new Mensaje();
        $mensaje->tituloMensaje=$request->get('tituloMensaje');
        $mensaje->textoMensaje=$request->get('textoMensaje');
        $mensaje->fechaMensaje=$fechaActual;
        $mensaje->emisorMensaje=Auth::user()->usuario;
        $mensaje->idBoton='4';
        $mensaje->save();

        //enviar mensaje
        $personas = Persona::pluck('emailPersona');
        Mail::to($personas)->send(new Emergencia($mensaje));
        return Redirect::to('mensaje/mensaje');
    }
    public function show($id){
        $mensajes=DB::table('tbl_mensaje as m')
        ->join('tbl_boton as b', 'm.idBoton', '=', 'b.idBoton')
        ->select('m.idMensaje','m.tituloMensaje', 'm.textoMensaje', 'm.fechaMensaje', 'm.emisorMensaje', 'b.zonaBoton')
        ->where('m.idMensaje', '=', $id)
        ->first();
        return view('mensaje.mensaje.show', compact('mensajes'));
    }
    public function pdf($id){
        $mensajes=DB::table('tbl_mensaje as m')
        ->join('tbl_boton as b', 'm.idBoton', '=', 'b.idBoton')
        ->select('m.idMensaje','m.tituloMensaje', 'm.textoMensaje', 'm.fechaMensaje', 'm.emisorMensaje', 'b.zonaBoton')
        ->where('m.idMensaje', '=', $id)
        ->first();
        $pdf=\PDF::loadView('pdf', ['mensajes'=>$mensajes]);
        return $pdf->download('Mensaje.pdf');
    }
}
