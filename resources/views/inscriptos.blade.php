@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h4>Total de inscriptos: {{$participants->count()}}</h4>
            <h4>Total de inscriptos únicos: {{$participants->unique('email')->count()}}</h4>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <th>Actividad</th>
                        <th>Orador</th>
                        <th>Fecha</th>
                        <th>Inscriptos</th>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr>
                                <td>{{$activity->name}}</td>
                                <td>{{$activity->speaker}}</td>
                                <td>{{\Carbon\Carbon::parse($activity->date)->format('d')}} de Agosto {{\Carbon\Carbon::parse($activity->date)->format('H:i')}}hs</td>
                                <td>{{$participants->where('activity_id', $activity->id)->count()}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
