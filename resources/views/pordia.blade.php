@extends('base')

@section('title')
  <title>Festival Borges - Actividades por día</title>
@endsection

@section('main')
  @php
    function eliminar_acentos($cadena){
        
        //Reemplazamos la A y a
        $cadena = str_replace(
        array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
        array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
        $cadena
        );

        //Reemplazamos la E y e
        $cadena = str_replace(
        array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
        array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
        $cadena );

        //Reemplazamos la I y i
        $cadena = str_replace(
        array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
        array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
        $cadena );

        //Reemplazamos la O y o
        $cadena = str_replace(
        array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
        array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
        $cadena );

        //Reemplazamos la U y u
        $cadena = str_replace(
        array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
        array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
        $cadena );

        //Reemplazamos la N, n, C y c
        $cadena = str_replace(
        array('Ñ', 'ñ', 'Ç', 'ç'),
        array('N', 'n', 'C', 'c'),
        $cadena
        );
        
        return $cadena;
      }
  @endphp
  <br><br><br><br><br><br>
    <div class="container">
      <h3>Actividades por día:</h3>
      <p>Hace click en un dia para ver las actividades programadas para esa fecha</p>
      <div class="text-center">
        <a href="/pordia/23"><button type="button" class="btn btn-primary btn-lg mt-2">23 de Agosto</button></a>
        <a href="/pordia/24"><button type="button" class="btn btn-primary btn-lg mt-2">24 de Agosto</button></a>
        <a href="/pordia/25"><button type="button" class="btn btn-primary btn-lg mt-2">25 de Agosto</button></a>
        <a href="/pordia/26"><button type="button" class="btn btn-primary btn-lg mt-2">26 de Agosto</button></a>
        <a href="/pordia/27"><button type="button" class="btn btn-primary btn-lg mt-2">27 de Agosto</button></a>
        <a href="/pordia/28"><button type="button" class="btn btn-primary btn-lg mt-2">28 de Agosto</button></a>
      </div>

      @if ($errors->any())
      <div class="alert alert-danger mt-3">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
      @if (session('status'))
          <div class="alert alert-success mt-3" role="alert">
              {{ session('status') }}
          </div>
      @endif
      @if (session('error'))
          <div class="alert alert-danger mt-3" role="alert">
              {{ session('error') }}
          </div>
      @endif
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
              @php
                  $nombre = eliminar_acentos($charla->speaker);
                  $nombre = explode(" ", $nombre);
              @endphp
              <footer class="blockquote-footer mb-3">A cargo de <a href="/orador/{{strtolower($nombre[0])}}-{{strtolower($nombre[1])}}" target="_blank"><cite title="Source Title">{{$charla->speaker}}.</cite></a></footer>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inscripcion" onclick="inscribirse({{$charla->id}}, '{{$charla->name}}', '{{$charla->speaker}}', '{{$charla->date}}')">Quiero inscribirme</button>
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
              @php
                $nombre = eliminar_acentos($taller->speaker);
                $nombre = explode(" ", $nombre);
              @endphp
              <footer class="blockquote-footer mb-3">A cargo de <a href="/orador/{{strtolower($nombre[0])}}-{{strtolower($nombre[1])}}" target="_blank"><cite title="Source Title">{{$taller->speaker}}.</cite></a></footer>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inscripcion" onclick="inscribirse({{$taller->id}}, '{{$taller->name}}', '{{$taller->speaker}}', '{{$taller->date}}')">Quiero inscribirme</button>
            </blockquote>
          </div>
        </div>
        <br>
        @empty
          <p>No hay talleres programados para este día</p>
        @endforelse
        <h3>Experiencia Borges</h3>
        @forelse ($actividades->where('activity','Experiencia Borges') as $experiencia)
        <div class="card">
          <div class="card-header">
            {{\Carbon\Carbon::parse($experiencia->date)->format('H:i')}}hs
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <h4>{{$experiencia->name}}</h4>
              <p>{{$experiencia->description}}</p>
              @php
                $nombre = eliminar_acentos($experiencia->speaker);
                $nombre = explode(" ", $nombre);
              @endphp
              <footer class="blockquote-footer mb-3">A cargo de <a href="/orador/{{strtolower($nombre[0])}}-{{strtolower($nombre[1])}}" target="_blank"><cite title="Source Title">{{$experiencia->speaker}}.</cite></a></footer>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inscripcion" onclick="inscribirse({{$experiencia->id}}, '{{$experiencia->name}}', '{{$experiencia->speaker}}', '{{$taller->date}}')">Quiero inscribirme</button>
            </blockquote>
          </div>
        </div>
        <br>
        @empty
          <p>No hay experiencias programadas para este día</p>
        @endforelse
      @endisset
    </div>
@endsection

@section('others')
    @include('partials/modal')
@endsection

@section('js')
    <script src="{{asset('js/functions.js')}}"></script>
@endsection
