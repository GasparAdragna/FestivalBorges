@extends('base')

@section('title')
  <title>Festival Borges - Anibal Jarkoski</title>
@endsection

@section('main')
<br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="/images/perfiles/anibal Jarkowski.jpg" alt="Anibal Jarkowski" class="img-fluid rounded-circle">
        </div>
        <div class="col-md-6">
            <h2 class="mt-4">Aníbal Jarkowski</h2>
            <p>Participante Local</p>
            <br>
            <p>Licenciado
                en Letras de la Universidad de Buenos
               
               Aires.
                Profesor adjunto interino  de Literatura Argentina II y Problemas de Literatura Argentina en la Facultad de Filosofía y Letras de la UBA. Profesor del seminario Teorías de la Ficción en la Maestría de Escritura Creativa de la UNTREF. Vice-rector del Colegio
                Paideia de Villa Crespo. Publicó artículos, ensayos y prólogos dedicados a las obras de Borges, Juan José Saer, Roberto Arlt, Manuel Puig, Ezequiel Martínez Estrada, David Viñas, Oliverio Girondo, Antonio Di Benedetto, Julio Cortázar, Abelardo Castillo, entre
                otros. Dictó cursos de extensión y capacitación docente en instituciones como el Ministerio de Educación de la Nación, Gobierno de la Ciudad de Buenos Aires, MALBA y AAMNBA.
               Es autor de las novelas <b><i>Rojo amor</i></b> (1993), <b><i>Tres</i></b> (1998) y <b><i>El trabajo</i></b> (2007).</p>
            <br>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Actividad en la que participa
                  </div>
                <div class="card-body">
                  <h5 class="card-title">La ciudad en los textos de Borges</h5>
                  <p class="card-text">Buenos
                    Aires en la obra de Borges aparece como una ciudad real pero también como una ciudad inventada que el autor creó con sus cuentos. A partir de la lectura y análisis de varios de sus textos haremos un recorrido por los pasajes que conforman Buenos Aires, una
                    ciudad entre real y mítica.</p>
                  <blockquote class="blockquote mt-0">
                    <footer class="blockquote-footer">Fecha y hora a confirmar</footer>
                  </blockquote>
                  <button class="btn btn-primary" onclick="inscribirse(6, 'La ciudad en los textos de Borges', 'Anibal Jarkowski', '2021-08-24 18:00:00')">Quiero inscribirme</button>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection

@section('others')
    @include('partials/modal')
@endsection

@section('js')
    <script src="{{asset('js/functions.js')}}"></script>
@endsection
