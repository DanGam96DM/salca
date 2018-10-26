<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
class CreditosController extends Controller
{
    function index(){
        return view('creditos.index');
    }
}
