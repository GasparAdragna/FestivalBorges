<div class="modal fade" id="inscripcion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="/inscribirse" method="POST">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Formulario de inscripción</h5>
            <button type="button" class="btn" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <h4 id="title"></h4>
                <p id="date"></p>
                  <div class="mb-3">
                    <label for="first_name" class="form-label">Nombre</label>
                    <input type="text" name="first_name" class="form-control" required value="{{Cookie::get('first_name')}}">
                  </div>
                  <div class="mb-3">
                    <label for="last_name" class="form-label">Apellido</label>
                    <input type="text" name="last_name" class="form-control" value="{{Cookie::get('last_name')}}" required>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{Cookie::get('email')}}" required>
                  </div>
                  <div class="mb-3">
                    <label for="birthday" class="form-label">Fecha de nacimiento</label>
                    <input type="date" name="birthday" class="form-control" value="{{Cookie::get('birthday')}}" required>
                  </div>
                  <div class="mb-3">
                    <label for="sex" class="form-label">Sexo</label>
                    <select name="sex" class="form-control" required>
                      <option value="Hombre" {{Cookie::get('sex') == 'Hombre' ? 'selected' : null}}>Hombre</option>
                      <option value="Mujer" {{Cookie::get('sex') == 'Mujer' ? 'selected' : null}}>Mujer</option>
                      <option value="Otro" {{Cookie::get('sex') == 'Otro' ? 'selected' : null}}>Otro</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="country" class="form-label">Pais</label>
                    <select name="country" class="form-control" id="pais">
                    </select>
                  </div>
                  <div class="">
                    <div class="form-check">
                        <input type="hidden" name="tyc" value="0"/>
                        <input class="form-check-input" type="checkbox" name="tyc" id="tyc" value="1" required {{Cookie::get('tyc') == 'checcked' ? 'checked' : null}}>
                        <label class="form-check-label" for="tyc">
                          Acepto los <a href="https://festivalborges.com.ar/tyc" target="_blank" rel="noopener noreferrer">Términos y Condiciones</a>
                        </label>
                    </div>
                  </div>
                  <input type="hidden" name="activity_id" value="" id="activityInput" required>
              </div> 
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Inscribirse</button>
          </div>
        </form>
      </div>
    </div>
  </div>