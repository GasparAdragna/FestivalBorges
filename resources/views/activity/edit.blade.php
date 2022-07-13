@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Nombre de la actividad</label>
                <input type="text" name="name" class="form-control" value="{{$activity->name}}">
            </div>
            <div class="form-group">
                <label for="speaker" class="form-label">Orador</label>
                <select name="speaker_id" class="form-control" required>
                    @foreach ($oradores as $orador)
                        <option value="{{$orador->id}}" {{ $activity->speaker_id == $orador->id ? 'selected' : null}}>{{$orador->first_name}} {{$orador->last_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Descripcion</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{$activity->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="link" class="form-label">Link (opcional)</label>
                <input type="text" name="link" class="form-control" value="{{$activity->link}}">
            </div>
            <div class="form-group">
                <label for="date" class="form-label">Fecha</label>
                <input type="datetime-local" name="date" class="form-control" value="{{$activity->date}}">
            </div>
            <div class="form-group">
                <label for="festival_id" class="form-label">Festival</label>
                <select name="festival_id" id="festival_id" class="form-control">
                    @foreach ($festivals as $festival)
                        <option value="{{$festival->id}}" {{$activity->festival_id  == $festival->id ? 'selected' : null}}>{{$festival->name}}</option>
                    @endforeach
                </select>
            </div> 
            <div class="form-group">
                <label for="activity" class="form-label">Actividad</label>
                <select name="activity" id="activity" class="form-control">
                    <option value="Charla" {{ $activity->activity == "Charla" ? 'selected' : null}}>Charla</option>
                    <option value="Taller" {{ $activity->activity == "Taller" ? 'selected' : null}}>Taller</option>
                    <option value="Experiencia Borges" {{ $activity->activity == "Experiencia Borges" ? 'selected' : null}}>Experiencia Borges</option>
                </select>
            </div>
            <button class="btn btn-primary">Editar</button>
            <a href="/home" class="btn btn-success">Volver</a>
        </form>
    </div>
@endsection