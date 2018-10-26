<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Radio;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RadioFormRequest;
use DB;
use DataTables;
class RadioController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        return view('radio.radio.index');
    }
    public function radioDatos(){
        $radios=DB::table('tbl_radio as r')
        ->join('tbl_persona as p', 'r.idPersona', '=', 'p.idPersona')
        ->select('r.idRadio', 'p.nombrePersona', 'r.descripcionRadio', 'r.claveRadio')
        ->where('r.estadoRadio','=','1');
        return DataTables::of($radios)->make(true);
    }
    public function create(){
        $personas=DB::table('tbl_persona')->where('condicion', '=', '1')->get();
        return view('radio.radio.create', ['personas'=>$personas]);
    }
    public function store(RadioFormRequest $request){
        $radio=new Radio();
        $radio->descripcionRadio=$request->get('descripcionRadio');
        $radio->claveRadio=$request->get('claveRadio');
        $radio->estadoRadio='1';
        $radio->idPersona=$request->get('idPersona');
        $radio->save();
        return Redirect::to('radio/radio');
    }
    public function show($id){
        $radio=Radio::findOrFail($id);
        $radio->estadoRadio='0';
        $radio->update();
        return Redirect::to('radio/radio');
    }
    public function edit($id){
        $radio=Radio::findOrFail($id);
        $personas=DB::table('tbl_persona')->where('condicion', '=', '1')->get();
        return view('radio.radio.edit', ['radio'=>$radio, 'personas'=>$personas]);
    }
    public function update(RadioFormRequest $request, $id){
        $radio=Radio::findOrFail($id);
        $radio->descripcionRadio=$request->get('descripcionRadio');
        $radio->claveRadio=$request->get('claveRadio');
        $radio->idPersona=$request->get('idPersona');
        $radio->update();
        return Redirect::to('radio/radio'); 
    }
    public function destroy($id){
        $radio=Radio::findOrFail($id);
        $radio->estadoRadio='0';
        $radio->update();
        return Redirect::to('radio/radio'); 
    }
    public function pdf(){
        $radios=DB::table('tbl_radio as r')
        ->join('tbl_persona as p', 'r.idPersona', '=', 'p.idPersona')
        ->select('r.idRadio', 'p.nombrePersona', 'r.descripcionRadio', 'r.claveRadio')
        ->orderBy('idRadio', 'asc')
        ->get();
        $pdf=\PDF::loadView('pdfRad', ['radios'=>$radios]);
        return $pdf->download('Radio.pdf');
    }
}
