@extends('base')
@section('title')
    <title>Festival Borges - Contacto</title>
@endsection

@section('main')
    <div class="container">
        <div class="d-flex">
            <br><br><br><br><br>
        </div>
        <div class="row">
            <div class="col-12">
                <h2>Contactate con nosotros</h2>
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
                <br>
                <form class="row" method="post">
                    @csrf
                    <div class="col-12 mb-3">
                        <label for="name" class="form-label">Nombre completo</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="subject" class="form-label">Asunto</label>
                        <input type="text" class="form-control" id="subject" name="subject" value="{{old('subject')}}" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="message" class="form-label">Mensaje</label>
                        <textarea name="message" id="message" rows="4" class="form-control" required>{{old('message')}}</textarea>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection