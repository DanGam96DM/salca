<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Persona;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UserFormRequest;
use DB;
use DataTables;
class UserController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        return view('usuario.usuario.index');
    }
    public function userDatos(){
        $usuarios=DB::table('user as u')
        ->join('tbl_persona as p', 'u.idPersona', '=', 'p.idPersona')
        ->join('tbl_rol as r', 'u.idRol', '=', 'r.idRol')
        ->select('u.id', 'u.usuario','p.nombrePersona', 'r.nombreRol', 'p.idPersona')
        ->where('u.condicion', '=', '1')
        ->where('p.condicion_user','=','1');
        return DataTables::of($usuarios)->make(true);
    }
    public function create(){
        $personas=DB::table('tbl_persona')
        ->where('condicion', '=', '1')
        ->where('condicion_user', '=', '0')
        ->get();
        $roles=DB::table('tbl_rol')->where('estadoRol', '=', '1')->get();
        return view('usuario.usuario.create', ['personas'=>$personas, 'roles'=>$roles]);
    }
    public function store(UserFormRequest $request){
        $usuario=new User();
        $usuario->idPersona=$request->get('idPersona');
        $usuario->idRol=$request->get('idRol');
        $usuario->usuario=$request->get('usuario');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->condicion='1';
        $usuario->save();

        $persona=Persona::findOrFail($request->get('idPersona'));
        $persona->condicion_user='1';
        $persona->update();
        
        return Redirect::to('usuario/usuario');
    }
    public function show($id){
        $usuario=User::findOrFail($id);
        $usuario->condicion='0';
        $usuario->update();

        $idPersona=DB::table('user')
        ->select('idPersona')
        ->where('id', '=', $id)
        ->first();
        //dd($idPersona);
        $persona=Persona::findOrFail($idPersona->idPersona);
        $persona->condicion_user='0';
        $persona->update();

        return Redirect::to('usuario/usuario'); 
    }
    public function edit($id){
        $usuario=User::findOrFail($id);
        $personas=DB::table('tbl_persona')->where('condicion', '=', '1')->get();
        $roles=DB::table('tbl_rol')->where('estadoRol', '=', '1')->get();
        return view('usuario.usuario.edit', ['usuario'=>$usuario, 'personas'=>$personas, 'roles'=>$roles]);
    }
    public function update(UserFormRequest $request, $id){
        $usuario=User::findOrFail($id);
        $usuario->idPersona=$request->get('idPersona');
        $usuario->idRol=$request->get('idRol');
        $usuario->usuario=$request->get('usuario');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->update();
        return Redirect::to('usuario/usuario'); 
    }
    public function destroy($id){
        $usuario=User::findOrFail($id);
        $usuario->condicion='0';
        $usuario->update();

        $idPersona=DB::table('user')
        ->select('idPersona')
        ->where('id', '=', $id)
        ->first();
        //dd($idPersona);
        $persona=Persona::findOrFail($idPersona->idPersona);
        $persona->condicion_user='0';
        $persona->update();

        return Redirect::to('usuario/usuario'); 
    }
}
