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
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\SpeakerController;

Route::get('/2021', function () {
    return view('2021');
});

Route::get('chicos', function () {
    return view('chicos');
});
Route::get('cine', function () {
    return view('cine');
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
Route::get('/', [FestivalController::class, 'landing']);
Route::post('contacto', [FestivalController::class, 'contacto']);
Route::get('talleres', [FestivalController::class, 'talleres']);
Route::get('charlas', [FestivalController::class, 'charlas']);
Route::get('leer-a-borges', [FestivalController::class, 'leer']);
Route::get('experiencia-borges', [FestivalController::class, 'experiencia']);
Route::get('pordia/{id}', [FestivalController::class, 'porDia']);

Route::get('orador/{speaker}', [FestivalController::class, 'speaker']);
Route::get('tallerista/{speaker}', [FestivalController::class, 'speaker']);


Route::middleware(['auth'])->group(function () {
    Route::get('/agregar/actividad', [ActivityController::class, 'create']);
    Route::post('/agregar/actividad', [ActivityController::class, 'store']);
    Route::get('/actividad/editar/{activity}', [ActivityController::class, 'edit']);
    Route::post('/actividad/editar/{activity}', [ActivityController::class, 'update']);
    Route::post('/actividad/eliminar/{activity}', [ActivityController::class, 'destroy']);
    Route::get('/agregar/festival', [FestivalController::class, 'create']);
    Route::post('/agregar/festival', [FestivalController::class, 'store']);
    Route::get('/festival/editar/{festival}', [FestivalController::class, 'edit']);
    Route::post('/festival/editar/{festival}', [FestivalController::class, 'update']);
    Route::post('/agregar/orador', [SpeakerController::class, 'store']);
    Route::get('/agregar/orador', [SpeakerController::class, 'create']);
    Route::get('/orador/editar/{speaker}', [SpeakerController::class, 'edit']);
    Route::post('/orador/editar/{speaker}', [SpeakerController::class, 'update']);
    Route::post('/orador/eliminar/{speaker}', [SpeakerController::class, 'destroy']);
    Route::get('/inscriptos', [FestivalController::class, 'verInscriptos']);
    Route::get('/descargar/inscriptos', [FestivalController::class, 'descargarInscriptos']);
    Route::get('/descargar/inscriptos/unicos', [FestivalController::class, 'descargarInscriptosUnicos']); 
});


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
