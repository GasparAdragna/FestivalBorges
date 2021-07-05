@extends('base')

@section('title')
  <title>Festival Borges - Talleres</title>
@endsection

@section('main')
  <br><br><br><br>
    <div class="container">
      <h3>Todos los talleres son gratuitos y con inscripción previa</h3>
      <br>
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
      @foreach ($talleres as $taller)
      <h2>{{\Carbon\Carbon::parse($taller->date)->format('d')}} de Agosto</h2>
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
      @endforeach
    </div>
@endsection

@section('others')
  @include('partials/modal')
@endsection

@section('js')
<script src="{{asset('js/functions.js')}}"></script>
@endsection