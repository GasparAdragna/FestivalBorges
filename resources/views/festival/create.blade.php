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
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" value={{old('name')}}>
            </div>
            <div class="form-check">
                <input type="hidden" name="active" value="0"/>
                <input class="form-check-input" type="checkbox" name="active" id="active" value="1">
                <label class="form-check-label" for="active">
                    Activa
                </label>
            </div>
            <button class="btn btn-primary" type="submit">Enviar</button>
            <a class="btn btn-warning" href="/home">Volver</a>
        </form>
    </div>
@endsection