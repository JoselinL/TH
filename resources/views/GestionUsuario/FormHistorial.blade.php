<div class="modal-body">
  <form id="formregistromodal"  method="post"> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="id"  hidden >
        <div class="row">
        
        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>C.I:</b></label>
                <input type="text" class="form-control" id="ceduUsu" name="nombres"required />
              </div>
        </div>


        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Nombres:</b></label>
                <input type="text" class="form-control" id="nomUsu" name="nombres"required />
              </div>
        </div>


        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Apellidos:</b></label>
                <input type="text" class="form-control" id="apeUsu" name="apellidos"required />
              </div>
        </div>


        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Fecha de nacimiento:</b></label>
                <input type="date" class="form-control" id="fnacU" name="fechaNacimiento"required />
              </div>
        </div>


        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Sexo:</b></label>
                <select class="form-control" id="sexUsu" name="sexo" >
                        <option disabled selected>Sexo</option>
                        <option>Femenino</option>
                        <option>Masculino</option>
                        <option>Indefinido</option>
                </select>
              </div>
        </div>


        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>E-mail:</b></label>
                <input type="text" class="form-control" id="emailUsu" name="email"required />
              </div>
        </div>


      <div class="row">
            <div class="col-md-4">
              <label class="lcontainer" style="color: blue; font-size: 14px">Actualizar Contraseña?
                <input type="checkbox" name="actualizarclave" id="actualizarclave">
                  <span class="lcheckmark"></span>
              </label>
            </div>
            <div class="col-md-4">
                <div class="form-group has-feedback" id="passwordupdiv" hidden>
                  <input type="password" class="form-control" id="passwordup" placeholder="Password" name="passwordup" disabled />
                </div>
            </div>
            <div class="col-md-4">
            </div>  
        </div>


        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Nacionalidad:</b></label>
                <input type="text" class="form-control" id="NacUsu" name="nacionalidad"required />
              </div>
        </div>


        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Estado civil:</b></label>
                <select class="form-control" id="estadoCUsu" name="estadoCivil" >
                        <option disabled selected>Estado civil</option>
                        <option>Soltero</option>
                        <option>Casado</option>
                        <option>Unión libre</option>
                </select>
              </div>
        </div>


         <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Dirección:</b></label>
                <input type="text" class="form-control" id="DirecUsu" name="direccion"required />
              </div>
        </div>



        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Teléfono:</b></label>
                <input type="text" class="form-control" id="TelfUsu" name="telefono"required />
              </div>
        </div>


        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Nivel de estudios:</b></label>
                <select class="form-control" id="nivelEUsu" name="nivelEstudio" >
                        <option disabled selected>Nivel de estudios</option>
                        <option>Primaria</option>
                        <option>Bachillerato</option>
                        <option>Tercer Nivel</option>
                        <option>Cuarto Nivel</option>
                </select>
              </div>
        </div>


        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Perfil profesional:</b></label>
                <input type="text" class="form-control" id="PPUsu" name="perfilProfesional"required />
              </div>
        </div>


        <div class="col-md-4">
             <div class="form-group has-feedback">
                <label> <b>Tipo de sangre:</b></label>
                <select class="form-control" id="tiposangreUsu" name="tipoSangre" >
                        <option disabled selected>Tipo de sangre</option>
                         <option>A+</option>
                         <option>A-</option>
                         <option>B+</option>
                         <option>B-</option>
                         <option>O+</option>
                         <option>O-</option>
                         <option>AB+</option>
                         <option>AB-</option>
                </select>
              </div>
        </div>


        <div class="col-md-4">
              <div class="form-group has-feedback" id="tipoUsuario_id">
                <label for="tipoUsuario_id">Tipo de usuario:</label>

                  <select class="form-control" name="tipoUsuario_id" id="tipoUsu">
                    @if(isset($tipousuario))
                    @foreach($tipousuario as $s)
                  <option value="{{ $s->id}}">{{ $s->tipo }}</option>               
                    @endforeach
                    @endif
                  </select>
        </div>
        </div>
  </form>
</div>

      <div class="modal-footer">
        <button type="button" onclick="updateUsuarioHistorial();" data-dismiss="modal" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
  </div>