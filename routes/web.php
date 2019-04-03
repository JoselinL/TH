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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/probando', function () {
    return view('probando');
});

Route::resource('/dispositivos','DispositivosController');


Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});


//--------------------------------------------------------CAPACITACION
Route::resource('/capacitacion', 'Capacitaciones');
Route::get('/capacitacion', 'Capacitaciones@index');
Route::get('/buscarCapacitacion/{descripcion?}','Capacitaciones@buscarCapacitacion');
Route::get('/actualizarCapacitacion/{id}','Capacitaciones@actualizarCapacitacion');
Route::get('/listarCapacitacion/{idusuarioC}','Capacitaciones@listarCapacitacion');
Route::post('/guardarDocumento','Capacitaciones@guardarArchivo');
//--------------------------------------------------------------------


  
//----------------------------------------------------TIPO CAPACITACION
Route::resource('/tipocapacitacion', 'TipoCapacitaciones');
Route::get('/tipocapacitacion', 'TipoCapacitaciones@index');
Route::get('/buscarTC/{descripcion?}','TipoCapacitaciones@buscarTC');
Route::get('/actualizarTC/{id}','TipoCapacitaciones@show');
Route::get('/listarTC','TipoCapacitaciones@listarTC');
//--------------------------------------------------------------------



//-------------------------------------------------------------PERIODO
Route::resource('/periodo', 'Periodos');
Route::get('/periodo', 'Periodos@index');
Route::get('/buscarPeriodo/{descripcion?}','Periodos@buscarPeriodo');
Route::get('/actualizarPeriodo/{id}','Periodos@show');
Route::get('/listarPeriodo','Periodos@listarPeriodo');
//--------------------------------------------------------------------


//---------------------------------------------------------------PERMISO
Route::resource('/permiso', 'Permisos'); 

Route::get('/permiso', 'Permisos@index');
Route::get('/mispermisos', 'Permisos@indexU');
Route::get('/permisosgenerales', 'Permisos@indexP');
Route::get('/permisosaprobados', 'Permisos@indexPA');
Route::get('/permisosnoaprobados', 'Permisos@indexPNA');

Route::get('/buscarPermiso/{descripcion?}','Permisos@buscarPermiso');

Route::get('/actualizarPermiso/{id}','Permisos@actualizarPermiso');

Route::get('/listarPermiso/{idusuario}','Permisos@listarPermiso');
Route::get('/listarPermisoUsuario/{idusuario}','Permisos@listarPermisoUsuario');
Route::post('/modificarPermiso/{frmData}', 'Permisos@modificarPermiso');  
Route::get('/listarPermisoGeneral','Permisos@listarPermisoGeneral');
Route::get('/listarPermisoAprobado','Permisos@listarPermisoAprobado');
Route::get('/listarPermisoNA','Permisos@listarPermisoNA');

Route::get('/certificado/{idpdf}','Permisos@cargarPDF');

Route::post('/addObservacion/{data}','Permisos@addObservacion');
Route::get('/getObservacion/{data}','Permisos@getObservacion');

Route::get('/permisoarea/{id}','Permisos@permisoArea');
Route::post('/guardarJustificacion','Permisos@guardarJustificacion');

//-----------------------------------------------------------------------


//--------------------------------------------------------------MARCACION
Route::resource('/marcacion', 'Marcaciones');
Route::get('/marcacion', 'Marcaciones@index');
Route::get('/actualizarMarcacion/{id}','Marcaciones@actualizarMarcacion');
Route::get('/listarMarcacion/{idusuarioM}','Marcaciones@listarMarcacion');
Route::post('/guardarMarcacion','Marcaciones@guardarMarcacion');
//-----------------------------------------------------------------------


//--------------------------------------------------------------------------------VACACION
Route::resource('/vacaciones', 'Vacaciones');

Route::get('/vacaciones', 'Vacaciones@index');
Route::get('/misvacaciones', 'Vacaciones@indexVacacionIndividual');
Route::get('/vacacionesgenerales', 'Vacaciones@indexVacacionGeneral');
Route::get('/vacacionesaprobadas', 'Vacaciones@indexVacacionAprobada');
Route::get('/vacacionesnoaprobadas', 'Vacaciones@indexVacacionNA');

Route::get('/buscarVacacion/{descripcion?}','Vacaciones@buscarVacacion');
Route::get('/actualizarVacacion/{id}','Vacaciones@actualizarVacacion');

Route::get('/listarVacacion/{idusuario1}','Vacaciones@listarVacacion');
Route::get('/listarVacacionIndividual/{idusuario1}','Vacaciones@listarVacacionIndividual');
Route::get('/listarVacacionGeneral','Vacaciones@listarVacacionGeneral');
Route::get('/listarVacacionAprobada','Vacaciones@listarVacacionAprobada');
Route::get('/listarVacacionNA','Vacaciones@listarVacacionNA');

Route::post('/modificarVacacion/{frmData}', 'Vacaciones@modificarVacacion');  

Route::post('/addObservacionvacacion/{data}','Vacaciones@addObservacionVacacion');
Route::get('/getObservacionvacacion/{data}','Vacaciones@getObservacionVacacion');

Route::get('/certificado_vacaciones/{idcertificado}','Vacaciones@cargarCertificado');
//-----------------------------------------------------------------------------------------


//------------------------------------------------------PERIODO-PERSONA
Route::resource('/periodopersona', 'PeriodoPersonas');
Route::get('/periodopersona', 'PeriodoPersonas@index');
Route::get('/actualizarPP/{id}','PeriodoPersonas@actualizarPP');
Route::get('/listarPP','PeriodoPersonas@listarPP');
Route::get('/buscarPP/{cedula?}','PeriodoPersonas@buscarPP');
Route::get('/listarVP/{id}','PeriodoPersonas@listarVP');
//---------------------------------------------------------------------


//------------------------------------------------------VACACION-PERIODO
Route::resource('/vacacionperiodo', 'VacacionPeriodos');
Route::get('/vacacionperiodo', 'VacacionPeriodos@index');
Route::get('/actualizarVP/{id}','VacacionPeriodos@actualizarVP');

//---------------------------------------------------------------------


//--------------------------------------------------------TIPO USUARIO
Route::resource('/tipousuario', 'TipoUsuarios');
Route::get('/tipousuario', 'TipoUsuarios@index');
Route::get('/actualizarTU/{id}','TipoUsuarios@show');
Route::get('/listarTU','TipoUsuarios@listarTU');
//--------------------------------------------------------------------


//------------------------------------------------------------USUARIO
Route::resource('/usuario', 'Usuarios');
Route::get('/usuario', 'Usuarios@index');
Route::get('/buscarUsuario/{nombres?}','Usuarios@buscarUsuario');
Route::get('/actualizarUsuario/{id}','Usuarios@actualizarUsuario');
Route::get('/listarUsuario','Usuarios@listarUsuario');

//Route::get('/actualizarhistorial/{id}','Usuarios@actualizarUsuarioH');
Route::get('/historial', 'Usuarios@indexHistorial');
Route::get('/listarUsuarios', 'Usuarios@indexListado');
Route::get('/nomina', 'Usuarios@indexNomina');
Route::get('/listarUsuarioH/{idusuarioH}','Usuarios@listarUsuarioH');
// Route::get('/actualizarUsuarioH/{id}','Usuarios@actualizarUsuarioH');

//-------------------------------------------------------------------



//----------------------------------------------------REPORTE LISTADO DE USUARIOS
Route::get('listadousuarios', function () {

	$usuario =App\User::all();

    $pdf = PDF::loadview('GestionUsuario\ListadoPDF', ['usuario' => $usuario]);
    return $pdf->download('listadousuarios.pdf'); 
});
//-------------------------------------------------------------------------------

















    
