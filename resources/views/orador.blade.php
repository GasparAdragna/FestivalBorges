@extends('base')

@section('title')
  <title>Festival Borges - {{$speaker->first_name}} {{$speaker->last_name}}</title>
@endsection

@section('main')
<br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <img src="{{asset('/storage/images/perfiles/'.$speaker->photo)}}" alt="{{$speaker->first_name}} {{$speaker->last_name}}" class="img-fluid rounded-circle">
        </div>
        <div class="col-md-6">
            <h2 class="mt-4">{{$speaker->first_name}} {{$speaker->last_name}}</h2>
            <p>Participante {{$speaker->location}}</p>
            <br>
             {!!$speaker->bio!!}
            <br>
        </div>
    </div>
    <br>
    @if ($activities->count() > 0)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Actividad en la que participa
                    </div>
                    @if ($activities->count() > 1)
                        <div class="card-body">
                            <h5 class="card-title">Lectura y análisis de los cuentos:</h5>
                            <div class="row">
                                @foreach ($activities as $actividad)
                                <div class="col">
                                    <h5 class="card-text mb-0"><b><i>{{$actividad->name}}</i></b></h5>
                                    <blockquote class="blockquote mt-0">
                                    <footer class="blockquote-footer">{{\Carbon\Carbon::parse($actividad->date)->format('d')}} de Agosto {{\Carbon\Carbon::parse($actividad->date)->format('H:i')}}hs</footer>
                                    </blockquote>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inscripcion" onclick="inscribirse({{$actividad->id}}, '{{$actividad->name}}', '{{$actividad->speaker}}', '{{$actividad->date}}')">Quiero inscribirme</button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    @elseif ($activities->count() == 1)
                    @php
                        $activity = $activities->first();
                    @endphp
                        <div class="card-body">
                            <h5 class="card-title">{{$activity->name}}</h5>
                            <p class="card-text">{{$activity->description}}</p>
                            <blockquote class="blockquote mt-0">
                            <footer class="blockquote-footer">{{\Carbon\Carbon::parse($activity->date)->format('d')}} de Agosto {{\Carbon\Carbon::parse($activity->date)->format('H:i')}}hs</footer>
                            </blockquote>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inscripcion" onclick="inscribirse({{$activity->id}}, '{{$activity->name}}', '{{$activity->speaker}}', '{{$activity->date}}')">Quiero inscribirme</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
    <br>
    @if (count($pastActivities) > 0)
        <div class="row">
            <div class="col-12">
                <h2>Ediciones anteriores del festival</h2>
                <br>
                <div class="card">
                    <div class="card-header">
                        Actividades en ediciones anteriores
                    </div>
                    @if ($pastActivities->count() > 1)
                        <div class="card-body">
                            <h5 class="card-title">Lectura y análisis de los cuentos:</h5>
                            <div class="row">
                                @foreach ($pastActivities as $actividad)
                                <div class="col">
                                    <h5 class="card-text mb-0"><b><i>{{$actividad->name}}</i></b></h5>
                                    <blockquote class="blockquote mt-0">
                                    <footer class="blockquote-footer">{{\Carbon\Carbon::parse($actividad->date)->format('d')}} de Agosto de {{\Carbon\Carbon::parse($actividad->date)->format('Y')}} {{\Carbon\Carbon::parse($actividad->date)->format('H:i')}}hs</footer>
                                    </blockquote>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    @elseif ($pastActivities->count() == 1)
                    @php
                        $activity = $pastActivities->first();
                    @endphp
                        <div class="card-body">
                            <h5 class="card-title">{{$activity->name}}</h5>
                            <p class="card-text">{{$activity->description}}</p>
                            <blockquote class="blockquote mt-0">
                            <footer class="blockquote-footer">{{\Carbon\Carbon::parse($activity->date)->format('d')}} de Agosto de {{\Carbon\Carbon::parse($activity->date)->format('Y')}} {{\Carbon\Carbon::parse($activity->date)->format('H:i')}}hs</footer>
                            </blockquote>
                        </div>
                    @endif
                </div>
            </div>
        </div>        
    @endif

</div>
@endsection

@section('others')
    @include('partials/modal')
@endsection

@section('js')
    <script src="{{asset('js/functions.js')}}"></script>
@endsection
