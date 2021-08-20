@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Inscriptos</h2>
                </div>
                <div class="card-body d-flex justify-content-around">
                    <a href="/inscriptos" class="btn btn-primary">Ver inscriptos</a>
                    <a href="/descargar/inscriptos" class="btn btn-success"> <i class="fas fa-file-excel"></i> Descargar Inscriptos</a>
                    <a href="/descargar/inscriptos/unicos" class="btn btn-success"> <i class="fas fa-file-excel"></i> Descargar Unicos</a>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Agregar</h2>
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-around">
                        <a href="/agregar/orador" class="btn btn-primary">Agregar Orador</a>
                        <a href="/agregar/actividad" class="btn btn-primary">Agregar Actividad</a>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <p>No agregar oradores o actividades! Estos cambios impactan directamente sobre la página</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
