<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware'=>['guest']], function(){
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    //Route::resource('usuario/usuario', 'UserController');
});

Route::group(['middleware'=>['auth']], function(){

    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/main', function () {
        return view('boton/boton/index');
    })->name('main');

    Route::group(['middleware'=>['Administrador']], function(){
        Route::resource('usuario/persona', 'PersonaController');
        Route::get('personaDatos', 'PersonaController@personaDatos')->name('personas');
        Route::resource('emergencia/emergencia', 'EmergenciaController');
        Route::get('emergenciaDatos', 'EmergenciaController@emergenciaDatos')->name('emergencias');
        Route::resource('usuario/rol', 'RolController');
        Route::get('datosRol', 'RolController@datosRol')->name('roles');
        Route::post('boton/boton',  'BotonController@store');
        Route::resource('radio/radio', 'RadioController');
        Route::get('radioDatos', 'RadioController@radioDatos')->name('radios');
        Route::resource('bitacora/bitacora', 'BitacoraController');
        Route::get('bitacoraDatos', 'BitacoraController@bitacoraDatos')->name('bitacoras');
        Route::resource('usuario/usuario', 'UserController');
        Route::get('userDatos', 'UserController@userDatos')->name('usuarios');
        Route::resource('mensaje/mensaje', 'MensajeController');
        Route::get('mensajeDatos', 'MensajeController@mensajeDatos')->name('mensajes');
        Route::get('pdf/{id}',  'MensajeController@pdf');
        Route::get('pdfBit/{id}',  'BitacoraController@pdf');
        Route::get('pdfRad',  'RadioController@pdf');
        Route::resource('creditos', 'CreditosController');
        //Route::resource('boton/boton', 'BotonController@index');
    });

    Route::group(['middleware'=>['Niveldos']], function(){
        Route::resource('mensaje/mensaje', 'MensajeController');
        Route::get('mensajeDatos', 'MensajeController@mensajeDatos')->name('mensajes');
        Route::resource('boton/boton', 'BotonController');
        Route::resource('creditos', 'CreditosController');
    });
    
    Route::group(['middleware'=>['Niveltres']], function(){
        Route::get('mensaje', 'BotonController@mensajeUno');
        Route::resource('creditos', 'CreditosController');
    });
});


//Route::get('/home', 'HomeController@index')->name('home');
