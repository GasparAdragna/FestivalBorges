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
                        <a href="/agregar/festival" class="btn btn-primary">Agregar Festival</a>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <p>Cuidado al agregar oradores o actividades, estos cambios impactan directamente sobre la página</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-5">
            <h2>Oradores</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Locación</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($speakers as $speaker)
                        <tr>
                            <th>{{ $speaker->id }}</th>
                            <td>{{ $speaker->first_name }}</td>
                            <td>{{ $speaker->last_name }}</td>
                            <td>{{ $speaker->location }}</td>
                            <td>{{ $speaker->slug }}</td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <a href="/orador/editar/{{ $speaker->slug }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-12 mt-5">
            <h2>Actividades</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre Taller</th>
                        <th scope="col">Actividad</th>
                        <th scope="col">Orador</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Festival</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $activity)
                    <tr>
                        <th>{{ $activity->id }}</th>
                        <td>{{ $activity->name }}</td>
                        <td>{{ $activity->activity }}</td>
                        <td>{{ $activity->speakerModel->first_name }} {{ $activity->speakerModel->last_name }}</td>
                        <td>{{ $activity->date }}</td>
                        <td>{{ $activity->festival->name }}</td>
                        <td>
                            <div class="row">
                                <div class="col">
                                    <a href="/actividad/editar/{{ $activity->id }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12 mt-5">
            <h2>Festivales</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Activo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($festivals as $festival)
                    <tr>
                        <th>{{ $festival->id }}</th>
                        <td>{{ $festival->name }}</td>
                        <td>{{ $festival->active ? 'Activo' : 'No activo' }}</td>
                        <td>
                            <div class="row">
                                <div class="col">
                                    <a href="/festival/editar/{{ $festival->id }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
