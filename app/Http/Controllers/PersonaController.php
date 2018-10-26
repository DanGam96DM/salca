<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Persona;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PersonaFormRequest;
use DB;
use DataTables;
class PersonaController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        
        return view('usuario.persona.index');
    }
    public function personaDatos(){
        $personas=DB::table('tbl_persona')
        ->where('condicion','=','1');
        return DataTables::of($personas)
        ->make(true);
    }
    public function create(){
        return view('usuario.persona.create');
    }
    public function store(PersonaFormRequest $request){
        $persona=new Persona();
        $persona->nombrePersona=$request->get('nombrePersona');
        $persona->direccionPersona=$request->get('direccionPersona');
        $persona->telefonoPersona=$request->get('telefonoPersona');
        $persona->emailPersona=$request->get('emailPersona');
        $persona->dpiPersona=$request->get('dpiPersona');
        $persona->condicion='1';
        $persona->condicion_user='0';
        $persona->save();
        return Redirect::to('usuario/persona');
    }
    public function show($id){
        $persona=Persona::findOrFail($id);
        $persona->condicion='0';
        $persona->condicion_user='0';
        $persona->update();
        return Redirect::to('usuario/persona');
    }
    public function edit($id){
        return view('usuario.persona.edit', ['persona'=>Persona::findOrFail($id)]);
    }
    public function update(PersonaFormRequest $request, $id){
        $persona=Persona::findOrFail($id);
        $persona->nombrePersona=$request->get('nombrePersona');
        $persona->direccionPersona=$request->get('direccionPersona');
        $persona->telefonoPersona=$request->get('telefonoPersona');
        $persona->emailPersona=$request->get('emailPersona');
        $persona->dpiPersona=$request->get('dpiPersona');
        $persona->update();
        return Redirect::to('usuario/persona'); 
    }
    public function destroy($id){
        $persona=Persona::findOrFail($id);
        $persona->condicion='0';
        $persona->update();
        return Redirect::to('usuario/persona'); 
    }
}
