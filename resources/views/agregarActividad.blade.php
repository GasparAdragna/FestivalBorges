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
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="speaker" class="form-label">Orador</label>
                <select name="speaker_id" class="form-control" required>
                    @foreach ($oradores as $orador)
                        <option value="{{$orador->id}}">{{$orador->first_name}} {{$orador->last_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Descripcion</label>
                <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="date" class="form-label">Fecha</label>
                <input type="datetime-local" name="date" class="form-control">
            </div>
            <div class="form-group">
                <label for="activity" class="form-label">Actividad</label>
                <select name="activity" id="activity" class="form-control">
                    <option value="Charla">Charla</option>
                    <option value="Taller">Taller</option>
                    <option value="Experiencia Borges">Experiencia Borges</option>
                </select>
            </div>
            <button class="btn btn-primary">Enviar</button>
        </form>
    </div>
@endsection