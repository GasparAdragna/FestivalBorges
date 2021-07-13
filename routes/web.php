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

use App\Http\Controllers\FestivalController;

Route::get('/', function () {
    return view('landing');
});
Route::get('chicos', function () {
    return view('chicos');
});
Route::get('cine', function () {
    return view('cine');
});
Route::get('lecturas', function () {
    return view('lecturas');
});
Route::get('maraton', function () {
    return view('maraton');
});
Route::get('visita', function () {
    return view('visita');
});
Route::get('sobre', function () {
    return view('sobre');
});
Route::get('organizacion', function () {
    return view('organizacion');
});
Route::get('biografia', function () {
    return view('biografia');
});
Route::get('pordia', function () {
    return view('pordia');
});
Route::get('pordia/2408', function () {
    return view('2408');
});
Route::get('persona', function () {
    return view('persona');
});
Route::get('contacto', function () {
    return view('contacto');
});

Route::get('bienvenido', function () {
    return view('bienvenido');
});

Route::post('/inscribirse', [FestivalController::class, 'inscribirse']);

Route::post('contacto', [FestivalController::class, 'contacto']);
Route::get('talleres', [FestivalController::class, 'talleres']);
Route::get('charlas', [FestivalController::class, 'charlas']);
Route::get('pordia/{id}', [FestivalController::class, 'porDia']);

Route::get('orador/{speaker}', [FestivalController::class, 'speaker']);
Route::get('tallerista/{speaker}', [FestivalController::class, 'speaker']);


Route::middleware(['auth'])->group(function () {
    Route::get('/agregar/actividad', [FestivalController::class, 'vistaAgregarActividad']);
    Route::get('/agregar/orador', [FestivalController::class, 'vistaAgregarOrador']);
    Route::post('/agregar/actividad', [FestivalController::class, 'agregarActividad']);
    Route::post('/agregar/orador', [FestivalController::class, 'agregarOrador']);
    Route::get('/inscriptos', [FestivalController::class, 'verInscriptos']);
    Route::get('/descargar/inscriptos', [FestivalController::class, 'descargarInscriptos']); 
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
