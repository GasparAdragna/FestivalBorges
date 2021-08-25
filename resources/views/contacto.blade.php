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
                <h4>Las charlas y talleres NO se publicarán en YouTube una vez finalizada la actividad por el momento. Si te perdiste una actividad o querés reverla, seguinos en Instagram para enterarte cuando publicamos los videos. </h4>
                <h4>Si no recibió el link a la charla, lo más probable es que esté en su casilla SPAM. La noche anterior enviamos todos los correos a los inscriptos</h4>
                <p>Las actividades son <b>gratuitas</b> y con inscripcion previa. Para inscribirse, visite las actividades <a href="/pordia" target="_blank">por día</a> y haga click en "Quiero registrarme" en la actividad deseada</p>
                <form class="row" method="post" id="contactForm">
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
                        <div class="g-recaptcha" data-sitekey="6Lep4DYbAAAAADaD0fLTaD4n-L4muB9M0n8tvqJ1"></div>
                        <br>
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(){
            window.event.preventDefault();
            Swal.fire({
                title: 'Por favor lea lo siguiente:',
                html:
                '<p> Las actividades pasadas <b>no se pueden rever</b> por el momento. </p>' +
                '<p> Si no le llegó el link a la charla seguramente está en su casilla de SPAM o No Deseado. </p>' +
                '<p> Enviamos los correos con los links la noche anterior a todos los inscriptos. </p>' + 
                '<p> Si no le funciona el botón del mail, copie y pegue la dirección en su navegador </p>',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Enviar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('contactForm').submit()
                }
            })
        });
    </script>
@endsection