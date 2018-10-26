<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Rol;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RolFormRequest;
use DB;
use DataTables;
class RolController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){
        return view('usuario.rol.index');
    }
    public function datosRol(){
        $roles=Rol::select('idRol', 'nombreRol', 'descripcionRol');
        return DataTables::of($roles)->make(true);
    }
}
