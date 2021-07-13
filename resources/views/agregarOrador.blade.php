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
                <label for="first_name" class="form-label">Nombre</label>
                <input type="text" name="first_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="last_name" class="form-label">Apellido</label>
                <input type="text" name="last_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="location" class="form-label">Location</label>
                <input type="text" name="location" class="form-control">
            </div>
            <div class="form-group">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control">
            </div>
            <div class="form-group">
                <label for="bio" class="form-label">Descripcion</label>
                <textarea name="bio" id="description" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="photo" class="form-label">Foto</label>
                <input type="text" name="photo" class="form-control">
            </div>
            <button class="btn btn-primary">Enviar</button>
        </form>
    </div>
@endsection