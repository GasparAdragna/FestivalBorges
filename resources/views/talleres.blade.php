@extends('base')

@section('title')
  <title>Festival Borges - Talleres</title>
@endsection

@section('main')
  <br><br><br><br>
    <div class="container">
      <h3>Todos los talleres son gratuitos y con inscripción previa</h3>
      <br>
      @foreach ($talleres as $taller)
      <h2>{{\Carbon\Carbon::parse($taller->date)->format('d')}} de Agosto</h2>
      <div class="card">
        <div class="card-header">
          {{\Carbon\Carbon::parse($taller->date)->format('H:i')}}
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <h4>{{$taller->name}}</h4>
            <p>{{$taller->description}}</p>
            <a href="#" class="btn btn-primary">Quiero inscribirme</a>
            <footer class="blockquote-footer">A cargo de <cite title="Source Title">{{$taller->speaker}}.</cite></footer>
          </blockquote>
        </div>
      </div>
      <br>
      @endforeach
    </div>
@endsection
