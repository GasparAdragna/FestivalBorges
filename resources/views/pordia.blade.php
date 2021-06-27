@extends('base')

@section('title')
  <title>Festival Borges - Actividades por día</title>
@endsection

@section('main')
  <br><br><br><br><br><br>
    <div class="container">
      <h3>Actividades por día:</h3>
      <br>
      <a href="/pordia/23"><button type="button" class="btn btn-primary btn-lg">23 de Agosto</button></a>
      <a href="/pordia/24"><button type="button" class="btn btn-primary btn-lg">24 de Agosto</button></a>
      <a href="/pordia/25"><button type="button" class="btn btn-primary btn-lg">25 de Agosto</button></a>
      <a href="/pordia/26"><button type="button" class="btn btn-primary btn-lg">26 de Agosto</button></a>
      <a href="/pordia/27"><button type="button" class="btn btn-primary btn-lg">27 de Agosto</button></a>
      <a href="/pordia/28"><button type="button" class="btn btn-primary btn-lg">28 de Agosto</button></a>

      @isset($actividades)
      <h2 class="mt-3">{{$dia}} de Agosto</h2>
      <br>
      <h3>Charlas</h3>
        @forelse ($actividades->where('activity','Charla') as $charla)
        <div class="card">
          <div class="card-header">
            {{\Carbon\Carbon::parse($charla->date)->format('H:i')}}hs
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
        @empty
          <p>No hay charlas programadas aún para este día</p>
        @endforelse
        <h3>Talleres</h3>
        @forelse ($actividades->where('activity','Taller') as $taller)
        <div class="card">
          <div class="card-header">
            {{\Carbon\Carbon::parse($taller->date)->format('H:i')}}hs
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
        @empty
          <p>No hay talleres programaddos para este día</p>
        @endforelse
      @endisset

    </div>
@endsection
