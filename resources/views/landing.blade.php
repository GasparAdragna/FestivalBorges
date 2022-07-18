@extends('base')

@section('title')
    <title>Festival Borges - Home</title>
@endsection

@section('main')
<div class="container">
  <div class="d-sm-none d-flex">
    <br><br><br>
  </div>

</div>
  <!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade d-none d-md-flex" data-ride="carousel" data-interval="8000">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100" src="images/banner2022.jpg"
          alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Gratuito, con inscripción previa, virtual a través de nuestro canal de youtube.</h3>
        <a href="/pordia"><button type="button" class="btn btn-primary btn-lg">Ver actividades por día</button></a>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="images/obra.png"
          alt="Second slide">
        <div class="mask rgba-black-strong"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Una vez que entramos a la literatura de  Borges no queremos salir.</h3>
        <p>Participá de los talleres de lectura e interpretación de sus textos.</p>
        <a href="/talleres"><button type="button" class="btn btn-primary btn-lg">Ver talleres</button></a>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="images/banner4.png"
          alt="Third slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">No te pierdas la charlas de los escritores españoles Javier Cercas y Luis García Montero - Invitados Internacionales</h3>
        <a href="/charlas"><button type="button" class="btn btn-primary btn-lg">Ver charlas</button></a>
      </div>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->
  <br>
  <br>
  <br>


  {{-------------CARDS----------}}
  <div class="container-fluid text-center">
    <h2 class="mb-5">¿Qué hacer en el Festival?</h2>
    <div class="row">
      <div class="col-lg-4 d-flex justify-content-center">
        <a href="/charlas">
          <div class="card">
            <img src="images/cuadrados/conferencias.png" class="card-img" alt="...">
            <div class="card-img-overlay">
              <div class="card-img-overlay d-flex justify-content-center align-items-center">
                <p style="color:#fff; font-size: 2em;">Charlas</p>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-4 d-flex justify-content-center">
        <a href="/talleres">
          <div class="card">
            <img src="images/cuadrados/talleres.png" class="card-img" alt="...">
            <div class="card-img-overlay">
              <div class="card-img-overlay d-flex justify-content-center align-items-center">
                <p style="color:#fff; font-size: 2em;">Talleres</p>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-4 d-flex justify-content-center">
        <a href="/leer-a-borges">
          <div class="card">
            <img src="images/cuadrados/lectura.png" class="card-img" alt="...">
            <div class="card-img-overlay">
              <div class="card-img-overlay d-flex justify-content-center align-items-center">
                <p style="color:#fff; font-size: 2em;">Leer a Borges</p>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
  <br>

  <section class="testimonials text-center bg-light">
    <div class="container">
      <h2 class="">Participantes {{$festival->name}}</h2>
      <p class="mb-5">Podés hacer click en el nombre del orador para ver su perfil</p class="mb-5">
      <div class="row">
        @foreach ($oradores as $speaker)
          <div class="col-lg-4 col-md-6">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <a href="/orador/{{$speaker->slug}}"><img class="img-fluid rounded-circle mb-3" src="{{asset('storage/images/perfiles/'.$speaker->photo)}}" alt="{{$speaker->first_name}} {{$speaker->last_name}}"></a>
              <h5><a href="/orador/{{$speaker->slug}}">{{$speaker->first_name}} {{$speaker->last_name}}</a></h5>
              <p class="font-weight-light mb-0">Participante {{$speaker->location}}</p>
              <br>
            </div>
          </div>
        @endforeach
      </div>
      <br>
      <h2 class="mb-5">Talleres de lectura</h2>
      <div class="row">
        @foreach ($talleristas as $speaker)
          <div class="col-lg-4 col-md-6">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <a href="/orador/{{$speaker->slug}}"><img class="img-fluid rounded-circle mb-3" src="{{asset('storage/images/perfiles/'.$speaker->photo)}}" alt="{{$speaker->first_name}} {{$speaker->last_name}}"></a>
              <h5><a href="/orador/{{$speaker->slug}}">{{$speaker->first_name}} {{$speaker->last_name}}</a></h5>
              <p class="font-weight-light mb-0">Participante {{$speaker->location}}</p>
              <br>
            </div>
          </div>
        @endforeach
      </div>
      <br>
      {{-- <h2 class="mb-5">Experiencia Borges</h2>
      <div class="row">
        @foreach ($experiencias as $speaker)
          <div class="col-lg-4 col-md-6">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <a href="/orador/{{$speaker->slug}}"><img class="img-fluid rounded-circle mb-3" src="{{asset('storage/images/perfiles/'.$speaker->photo)}}" alt="{{$speaker->first_name}} {{$speaker->last_name}}"></a>
              <h5><a href="/orador/{{$speaker->slug}}">{{$speaker->first_name}} {{$speaker->last_name}}</a></h5>
              <p class="font-weight-light mb-0">Participante {{$speaker->location}}</p>
              <br>
            </div>
          </div>
        @endforeach
      </div> --}}
      <br>
      <br>
    </div>
  </section>
  <section class="text-center bg-light">
    <div class="container">
      <h2 class="mb-5">Nos apoyan</h2>
      <div class="row d-flex align-items-center">
        <div class="col-4">
          <a href="https://www.buenosaires.gob.ar/mecenazgo" target="_blank">
            <img src="images/megenazgoLogo.jpg" class="sponsor" alt="Logo Mecenazgo">
          </a>
        </div>
        <div class="col-4">
          <a href="https://www.buenosaires.gob.ar/cultura/impulso-cultural" target="_blank" rel="noopener noreferrer">
            <img src="images/impulso-cultural.jpg" style="max-height:100px; max-width:100px;"class="sponsor" alt="Logo Impulso Cultural">
          </a>
        </div>
        <div class="col-4">
          <a href="https://www.fundacionitau.org.ar/" target="_blank">
            <img src="images/itau_fundacion.png" class="sponsor" alt="Logo Itau Fundacion">
          </a>
        </div>
      </div>
      <br><br>
      <div class="row d-flex align-items-center">
        <div class="col-4">
          <div class="card bg-dark d-flex justify-content-center">
            <a href="http://mercatus.com.ar/" target="_blank" rel="noopener noreferrer">
              <img src="images/mercatus.png" class="sponsor" alt="Logo Mercatus&Co">
            </a>
          </div>
        </div>
        <div class="col-4">
          <a href="https://www.bajalibros.com/AR" target="_blank">
            <img src="images/Bajalibros.png" class="sponsor" alt="Logo Bajalibros">
          </a>
        </div>
        <div class="col-4">
            <img src="images/BA-2.png" class="sponsor" alt="Logo BA">
        </div>
      </div>
    </div>
  </section>
  {{-- <div class="modal fade show" id="thankYouModal" tabindex="-1" aria-labelledby="thankYouModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <img src="/images/festival gracias.png" alt="Muchas gracias" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div> --}}
@endsection


@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.min.js">
</script>
{{-- <script type="text/javascript">
 $(document).ready(function() {
     if ($.cookie('pop') == null) {
         $('#thankYouModal').modal('show');
         $.cookie('pop', '1');
     }
 });
</script> --}}
@endsection