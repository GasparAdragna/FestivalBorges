@extends('base')

@section('title')
  <title>Festival Borges - Experiencia Borges</title>
@endsection

@section('main')
  <br><br><br><br>
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
    <div class="container">
      <br>
      <h3>¿Qué es Experiencia Borges?</h3>
      <p>Borges además de ser un gran escritor fue toda su vida un gran lector. En esta sección entrevistaremos a autores y artistas para que nos cuenten cómo y cuándo empezaron a leer; qué encuentros o accidentes los llevaron a descubrir sus libros preferidos; cómo eligen sus lecturas y cómo llegó Borges a ellos.</p>
      <h4>Todas las charlas son gratuitas y con inscripción previa</h4>
      <br>
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
      @foreach ($charlas as $charla)
      <h2>{{\Carbon\Carbon::parse($charla->date)->format('d')}} de Agosto</h2>
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
      @endforeach
      @include('partials/modal')
    </div>
@endsection

@section('js')
  <script src="{{asset('/js/functions.js')}}"></script>
@endsection
