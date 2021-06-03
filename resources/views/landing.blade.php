@extends('base')
@section('main')
  <!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
    <li data-target="#carousel-example-2" data-slide-to="3"></li>
    <li data-target="#carousel-example-2" data-slide-to="4"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100" src="images/banner1.png"
          alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Homenaje a Jorge Luis Borges a 122 años de su nacimiento.</h3>
        <p>Del 23 al 28 de agosto de 2021</p>
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
        <img class="d-block w-100" src="images/biblioteca.png"
          alt="Third slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Biblioteca Miguel Cané, donde Borges trabajó y escribió sus primeros textos ficcionales.</h3>
        <p>Participá de las visitas guiadas.</p>
        <a href="/visita"><button type="button" class="btn btn-primary btn-lg">Ir a las visitas</button></a>
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
        <h3 class="h3-responsive">¿Como escribió Borges?</h3>
        <p>No te pierdas la conferencia de Daniel Balderston, Borges Center -Universidad de Pittsburgh – Invitado Internacional</p>
        <a href="/charlas"><button type="button" class="btn btn-primary btn-lg">Ver conferencias</button></a>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="images/banner5.png"
          alt="Third slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Borges y la filosofía</h3>
        <p>No te pierdas la conferencia de DARIO SZTATJNSZRAJBER.</p>
        <a href="/charlas"><button type="button" class="btn btn-primary btn-lg">Ver conferencias</button></a>
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
  <br>
  <br>
  <br>

  {{-------------CARDS----------}}
  <div class="d-flex flex-row justify-content-center">
    <h2 class="mb-5">¿Qué hacer en el festival?</h2>
  </div>
  <div class="d-flex flex-row justify-content-around">
    <a href="/charlas">
      <div class="card" style="width: 25rem;">
        <img src="images/cuadrados/conferencias.png" class="card-img" alt="...">
        <div class="card-img-overlay">
          <div class="card-img-overlay d-flex justify-content-center align-items-center">
            <p style="color:#fff; font-size: 2em;">Charlas</p>
          </div>
        </div>
      </div>
    </a>
    <a href="/talleres">
      <div class="card" style="width: 25rem;">
        <img src="images/cuadrados/talleres.png" class="card-img" alt="...">
        <div class="card-img-overlay">
          <div class="card-img-overlay d-flex justify-content-center align-items-center">
            <p style="color:#fff; font-size: 2em;">Talleres</p>
          </div>
        </div>
      </div>
    </a>
    <a href="/maraton">
      <div class="card" style="width: 25rem;">
        <img src="images/cuadrados/lectura.png" class="card-img" alt="...">
        <div class="card-img-overlay">
          <div class="card-img-overlay d-flex justify-content-center align-items-center">
            <p style="color:#fff; font-size: 2em;">Lecturas</p>
          </div>
        </div>
      </div>
    </a>
  </div>
  <br>
  {{-- <div class="d-flex flex-row justify-content-around">
    <a href="/cine">
      <div class="card" style="width: 25rem;">
        <img src="images/cuadrados/cine.png" class="card-img" alt="...">
        <div class="card-img-overlay d-flex justify-content-center align-items-center">
          <p style="color:#fff; font-size: 2em;">Cine</p>
        </div>
      </div>
    </a>
    <a href="/visita">
      <div class="card" style="width: 25rem;">
        <img src="images/cuadrados/guiada.png" class="card-img" alt="...">
        <div class="card-img-overlay">
          <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
            <p style="color:#fff; font-size: 2em;">Visitas</p>
            <p style="color:#fff; font-size: 2em;">guiadas</p>
          </div>
        </div>
      </div>
    </a>
    <a href="/chicos">
      <div class="card" style="width: 25rem;">
        <img src="images/cuadrados/chicos.png" class="card-img" alt="...">
        <div class="card-img-overlay">
          <div class="card-img-overlay d-flex justify-content-center align-items-center">
            <p style="color:#fff; font-size: 2em;">Chicos</p>
          </div>
        </div>
      </div>
    </a>
  </div> --}}
  <br>
  <br>
  <br>

  <section class="testimonials text-center bg-light">
    <div class="container">
      <h2 class="mb-5">Participantes Festival Borges 2021</h2>
      <div class="row">
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="images/perfiles/dario SZTATJNSZRAJBER.jpg" alt="">
            <h5>Dario Sztatjnszrajber</h5>
            <p class="font-weight-light mb-0">Participante Internacional</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="images/perfiles/patricio zunini.jpg" alt="">
            <h5>Patricio Zunini</h5>
            <p class="font-weight-light mb-0">Participante Internacional</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="images/perfiles/Daniel Balderston.jpg" alt="">
            <h5>Daniel Balderston</h5>
            <p class="font-weight-light mb-0">Participante Internacional</p>
          </div>
        </div>
      </div>
      <br>
      <br>
      {{-- <div class="row">
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="images/perfiles/dario SZTATJNSZRAJBER.jpg" alt="">
            <h5>Dario Sztatjnszrajber</h5>
            <p class="font-weight-light mb-0">Participante Internacional</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="images/perfiles/Fernando-Flores-Maio.jpg" alt="">
            <h5>Fernando Flores Maio</h5>
            <p class="font-weight-light mb-0">Participante Internacional</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="images/perfiles/liliana heker.jpg" alt="">
            <h5>Liliana Heker</h5>
            <p class="font-weight-light mb-0">Participante Internacional</p>
          </div>
        </div>
      </div> --}}
      {{-- <br>
      <br> --}}
      <div class="row">
        {{-- <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="images/perfiles/beatriz sarlo.jpg" alt="">
            <h5>Beatriz Sarlo</h5>
            <p class="font-weight-light mb-0">Participante Internacional</p>
          </div>
        </div> --}}
        {{-- <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="images/perfiles/patricio zunini.jpg" alt="">
            <h5>Patricio Zunini</h5>
            <p class="font-weight-light mb-0">Participante Internacional</p>
          </div>
        </div> --}}
        {{-- <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="images/perfiles/dario SZTATJNSZRAJBER.jpg" alt="">
            <h5>Dario Sztatjnszrajber</h5>
            <p class="font-weight-light mb-0">Participante Internacional</p>
          </div>
        </div> --}}
        {{-- <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="images/perfiles/liliana heker.jpg" alt="">
            <h5>Liliana Heker</h5>
            <p class="font-weight-light mb-0">Participante Internacional</p>
          </div>
        </div> --}}
        {{-- <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="images/perfiles/Alan Pauls.jpg" alt="">
            <h5>Alan Pauls</h5>
            <p class="font-weight-light mb-0">Participante Internacional</p>
          </div>
        </div> --}}
      </div>
    </div>
  </section>
  <section class="text-center bg-light">
    <div class="container">
      <h2 class="mb-5">Nos acompañan</h2>
      <div class="row d-flex align-items-center">
        <div class="col-4">
          <img src="images/megenazgoLogo.jpg" class="card-img" alt="Logo Mecenazgo">
        </div>
        <div class="col-4">
          <img src="images/impulso-cultural.jpg" style="max-height:150px; max-width:150px;"class="card-img" alt="Logo Impulso Cultural">
        </div>
        <div class="col-4">
          <img src="images/itau_fundacion.png" class="card-img" alt="Logo Itau Fundacion">
        </div>
      </div>
      <br><br>
      <div class="row">
        <div class="col-4">
          <div class="card bg-dark">
            <img src="images/mercatus.png" class="card-img" alt="Logo Mercatus&Co">
          </div>
        </div>
        <div class="col-4">
          <div class="card bg-dark">
            <img src="images/AVENGERS logo.jpg" class="card-img" alt="Logo Mercatus&Co">
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
