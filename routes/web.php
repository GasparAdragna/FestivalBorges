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
Route::get('pordia/2308', function () {
    return view('2308');
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

Route::get('/agregar/actividad', function () {
    return view('agregarActividad');
});
Route::post('/agregar/actividad', [FestivalController::class, 'agregarActividad']);



Route::post('contacto', [FestivalController::class, 'contacto']);
Route::get('talleres', [FestivalController::class, 'talleres']);
Route::get('charlas', [FestivalController::class, 'charlas']);


Route::prefix('oradores')->group(function () {
    Route::get('pablo-gianera', function () {
        return view('oradores.pablo-gianera');
    });
    Route::get('dario-sztajnszrajber', function () {
        return view('oradores.dario-sztajnszrajber');
    });
    Route::get('pedro-mairal', function () {
        return view('oradores.pedro-mairal');
    });
    Route::get('santiago-llach', function () {
        return view('oradores.santiago-llach');
    });
    Route::get('carlos-gamerro', function () {
        return view('oradores.carlos-gamerro');
    });
    Route::get('daniel-balderston', function () {
        return view('oradores.daniel-balderston');
    });
    Route::get('anibal-jarkowski', function () {
        return view('oradores.anibal-jarkowski');
    });
    Route::get('pablo-gaiano', function () {
        return view('oradores.pablo-gaiano');
    });
    Route::get('martin-kohan', function () {
        return view('oradores.martin-kohan');
    });
    Route::get('patricio-zunini', function () {
        return view('oradores.patricio-zunini');
    });
    Route::get('marcos-liyo', function () {
        return view('oradores.marcos-liyo');
    });
    Route::get('luis-bond', function () {
        return view('oradores.luis-bond');
    });
});