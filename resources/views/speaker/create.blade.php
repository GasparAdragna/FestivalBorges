@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="callout callout-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="" method="post" enctype="multipart/form-data">
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
                <label for="image">Foto:</label>
                <input type="file" class="form-control-file" name="image" required accept="image/*">
            </div>
            <button class="btn btn-primary">Enviar</button>
            <a href="/home" class="btn btn-warning">Volver</a>
        </form>
    </div>
@endsection