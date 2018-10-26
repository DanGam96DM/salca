<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Bitacora;
use App\Persona;
use App\Emergencia; 
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\BitacoraFormRequest;
use DB;
use Barryvdh\DomPDF\Facade as PDF;
use DataTables;
class BitacoraController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        $usuarios=DB::table('user')
        ->select('usuario')
        ->where('condicion', '=', '1')
        ->count();
        $radios=DB::table('tbl_radio')
        ->select('claveRadio')
        ->where('estadoRadio', '=', '1')
        ->count();
        $emergencias=DB::table('tbl_mensaje')
        ->select('nombrePersona')
        ->where('idBoton', '!=', '4')
        ->count();

        return view('bitacora.bitacora.index', ['usuarios'=>$usuarios, 'radios'=>$radios, 'emergencias'=>$emergencias]);

    }
    public function bitacoraDatos(){
        $bitacoras=DB::table('tbl_bitacora as b')
        ->join('tbl_persona', 'b.idPersona', '=', 'tbl_persona.idPersona')
        ->join('tbl_emergencia', 'b.idEmergencia', '=', 'tbl_emergencia.idEmergencia')
        ->select('b.idBitacora','b.tituloBitacora', 'b.descripcionBitacora', 'b.fechaBitacora', 'tbl_persona.nombrePersona', 'tbl_emergencia.nombreEmergencia');
        return DataTables::of($bitacoras)->make(true);
    }
    public function create(){
        $personas=DB::table('tbl_persona')->where('condicion', '=', '1')->get();
        $emergencias=DB::table('tbl_emergencia')->where('condicion', '=', '1')->get();
        return view('bitacora.bitacora.create', ['personas'=>$personas, 'emergencias'=>$emergencias]);
    }
    public function store(BitacoraFormRequest $request){
        $fechaActual=date('Y-m-d H:i:s');
        $bitacora=new Bitacora();
        $bitacora->tituloBitacora=$request->get('tituloBitacora');
        $bitacora->descripcionBitacora=$request->get('descripcionBitacora');
        $bitacora->fechaBitacora=$fechaActual;
        $bitacora->idPersona=$request->get('idPersona');
        $bitacora->idEmergencia=$request->get('idEmergencia');
        $bitacora->save();
        return Redirect::to('bitacora/bitacora');
    }
    public function show($id){
        $bitacora=DB::table('tbl_bitacora as b')
        ->join('tbl_persona as p', 'b.idPersona', '=', 'p.idPersona')
        ->join('tbl_emergencia as e', 'b.idEmergencia', '=', 'e.idEmergencia')
        ->select('b.idBitacora','b.tituloBitacora', 'b.descripcionBitacora', 'b.fechaBitacora', 'p.nombrePersona as persona', 'e.nombreEmergencia as emergencia')
        ->where('b.idBitacora','=',$id)
        ->first();
        return view('bitacora.bitacora.show', compact('bitacora'));
    }
    public function edit($id){
        $bitacora=Bitacora::findOrFail($id);
        $personas=DB::table('tbl_persona')->where('condicion', '=', '1')->get();
        $emergencias=DB::table('tbl_emergencia')->where('condicion', '=', '1')->get();
        return view('bitacora.bitacora.edit', ['bitacora'=>$bitacora, 'personas'=>$personas, 'emergencias'=>$emergencias]);
    }
    public function update(BitacoraFormRequest $request, $id){
        $bitacora=Bitacora::findOrFail($id);
        $bitacora->tituloBitacora=$request->get('tituloBitacora');
        $bitacora->descripcionBitacora=$request->get('descripcionBitacora');
        $bitacora->idPersona=$request->get('idPersona');
        $bitacora->idEmergencia=$request->get('idEmergencia');
        $bitacora->update();
        return Redirect::to('bitacora/bitacora'); 
    }
    public function pdf($id){
        $bitacoras=DB::table('tbl_bitacora as b')
        ->join('tbl_persona as p', 'b.idPersona', '=', 'p.idPersona')
        ->join('tbl_emergencia as e', 'b.idEmergencia', '=', 'e.idEmergencia')
        ->select('b.idBitacora','b.tituloBitacora', 'b.descripcionBitacora', 'b.fechaBitacora', 'p.nombrePersona', 'e.nombreEmergencia')
        ->where('b.idBitacora', '=', $id)
        ->first();
        $pdf=\PDF::loadView('pdfBit', ['bitacoras'=>$bitacoras]);
        return $pdf->download('Bitacora.pdf');
    }
}
