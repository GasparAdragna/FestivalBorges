@extends('base')

@section('title')
  <title>Festival Borges - Charlas</title>
@endsection

@section('main')
  <br><br><br><br>
    <div class="container">
      <h3>Todas las charlas son gratuitas y con inscripción previa</h3>
      <br>
      @foreach ($charlas as $charla)
      <h2>{{\Carbon\Carbon::parse($charla->date)->format('d')}} de Agosto</h2>
      <div class="card">
        <div class="card-header">
          {{\Carbon\Carbon::parse($charla->date)->format('H:i')}}
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <h4>{{$charla->name}}</h4>
            <p>{{$charla->description}}</p>
            <a href="#" class="btn btn-primary">Quiero inscribirme</a>
            <footer class="blockquote-footer">A cargo de <cite title="Source Title">{{$charla->speaker}}.</cite></footer>
          </blockquote>
        </div>
      </div>
      <br>
      @endforeach
    </div>
@endsection
