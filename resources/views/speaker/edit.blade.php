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
                <input type="text" name="first_name" class="form-control" value="{{$speaker->first_name}}">
            </div>
            <div class="form-group">
                <label for="last_name" class="form-label">Apellido</label>
                <input type="text" name="last_name" class="form-control" value="{{$speaker->last_name}}">
            </div>
            <div class="form-group">
                <label for="location" class="form-label">Location</label>
                <input type="text" name="location" class="form-control" value="{{$speaker->location}}">
            </div>
            <div class="form-group">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" value="{{$speaker->slug}}">
            </div>
            <div class="form-group">
                <label for="bio" class="form-label">Descripcion</label>
                <textarea name="bio" id="description" cols="30" rows="5" class="form-control">{{$speaker->bio}}</textarea>
            </div>
            <div class="col-6">
                <img src="{{asset('/storage/images/perfiles/'.$speaker->photo)}}" alt="{{$speaker->first_name}} {{$speaker->last_name}}" class="img-fluid rounded-circle">
            </div>
            <div class="form-group">
                <label for="image">Cambiar Foto: (opcional)</label>
                <input type="file" class="form-control-file" name="image" accept="image/*">
            </div>
            <button class="btn btn-primary">Editar</button>
            <a href="/home" class="btn btn-success">Volver</a>
        </form>
    </div>
@endsection