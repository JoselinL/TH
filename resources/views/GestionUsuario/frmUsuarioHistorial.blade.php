<div class="modal-body">
  <form id="formregistromodal"  method="post"> 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="id" id="idUsuarioN" hidden >
        <div class="row">
        
          
        <div class="row">  
        <div class="col-md-6">
             <div class="form-group has-feedback">
                <label> <b>C.I:</b></label>
                <input type="text" class="form-control" id="cedulaUsuarioN" name="cedula"required disabled=""/>
              </div>
        </div>


        <div class="col-md-6">
             <div class="form-group has-feedback">
                <label> <b>Nombres:</b></label>
                <input type="text" class="form-control" id="nomUsuarioN" name="nombres"required disabled=""/>
              </div>
        </div>
        </div>

        <div class="row"> 
        <div class="col-md-6">
             <div class="form-group has-feedback">
                <label> <b>Apellidos:</b></label>
                <input type="text" class="form-control" id="apeUsuarioN" name="apellidos"required disabled=""/>
              </div>
        </div>


        <div class="col-md-6">
             <div class="form-group has-feedback">
                <label> <b>Fecha de nacimiento:</b></label>
                <input type="date" class="form-control" id="fnacUN" name="fechaNacimiento"required disabled=""/>
              </div>
        </div>
        </div>


        <div class="row"> 
        <div class="col-md-6">
             <div class="form-group has-feedback">
                <label> <b>Sexo:</b></label>
                <select class="form-control" id="sexUsuarioN" name="sexo" disabled="">
                        <option disabled selected>Sexo</option>
                        <option>Femenino</option>
                        <option>Masculino</option>
                        <option>Indefinido</option>
                </select>
              </div>
        </div>


        <div class="col-md-6">
             <div class="form-group has-feedback">
                <label> <b>E-mail:</b></label>
                <input type="text" class="form-control" id="emailUsuarioN" name="email"required disabled=""/>
              </div>
        </div>
        </div>

        <div class="row"> 
        <div class="col-md-6">
             <div class="form-group has-feedback">
                <label> <b>Nacionalidad:</b></label>
                <input type="text" class="form-control" id="NacUsuarioN" name="nacionalidad"required disabled=""/>
              </div>
        </div>


        <div class="col-md-6">
             <div class="form-group has-feedback">
                <label> <b>Estado civil:</b></label>
                <select class="form-control" id="estadoCUsuarioN" name="estadoCivil" disabled="">
                        <option disabled selected>Estado civil</option>
                        <option>Soltero</option>
                        <option>Casado</option>
                        <option>Unión libre</option>
                </select>
              </div>
        </div>
        </div>


        <div class="row"> 
         <div class="col-md-6">
             <div class="form-group has-feedback">
                <label> <b>Dirección:</b></label>
                <input type="text" class="form-control" id="DirecUsuarioN" name="direccion"required disabled=""/>
              </div>
        </div>



        <div class="col-md-6">
             <div class="form-group has-feedback">
                <label> <b>Teléfono:</b></label>
                <input type="text" class="form-control" id="TelfUsuarioN" name="telefono"required disabled=""/>
              </div>
        </div>
        </div>


        <div class="row">
        <div class="col-md-6">
             <div class="form-group has-feedback">
                <label> <b>Nivel de estudios:</b></label>
                <select class="form-control" id="nivelEUsuarioN" name="nivelEstudio" disabled="">
                        <option disabled selected>Nivel de estudios</option>
                        <option>Primaria</option>
                        <option>Bachillerato</option>
                        <option>Tercer Nivel</option>
                        <option>Cuarto Nivel</option>
                </select>
              </div>
        </div>


        <div class="col-md-6">
             <div class="form-group has-feedback">
                <label> <b>Perfil profesional:</b></label>
                <input type="text" class="form-control" id="PPUsuarioN" name="perfilProfesional"required  disabled="" />
              </div>
        </div>
        </div>


        <div class="row">
        <div class="col-md-6">
             <div class="form-group has-feedback">
                <label> <b>Tipo de sangre:</b></label>
                <select class="form-control" id="tiposangreUsuarioN" name="tipoSangre" disabled="">
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


        <div class="col-md-6">
              <div class="form-group has-feedback" id="tipoUsuario_idN">
                <label for="tipoUsuario_id">Tipo de usuario:</label>

                  <select class="form-control" name="tipoUsuario_id" id="tipoUsuarioN" disabled="">
                    @if(isset($tipousuario))
                    @foreach($tipousuario as $s)
                  <option value="{{ $s->id}}">{{ $s->tipo }}</option>               
                    @endforeach
                    @endif
                  </select>
        </div>
        </div>
        </div>



        <div class="row">
        <div class="col-md-6">
             <div class="form-group has-feedback">
                <label> <b>Área:</b></label>
                <select class="form-control" id="areaN" name="area" disabled="">
                         <option disabled selected>Área</option>
                         <option>Archivo</option>
                         <option>Auditoría Interna</option>
                         <option>Contabilidad</option>
                         <option>Financiera</option>
                         <option>Tecnologías de la información</option>
                         <option>Talento Humano</option>
                         <option>Tesorería</option>
                         <option>Rentas Internas</option>
                </select>
              </div>
        </div>

        <div class="col-md-6">
             <div class="form-group has-feedback">
                <label> <b>Sueldo:</b></label>
                <input type="text" class="form-control" id="sueldoN" name="sueldo"required  disabled="" />
              </div>
        </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-4">
              <label class="lcontainer" style="color: blue; font-size: 14px">Actualizar Contraseña?
              <input type="checkbox" name="actualizarclave" id="actualizarclaveN">
                <span class="lcheckmark"></span>
              </label>
            </div>
            <div class="col-md-4">
                <div class="form-group has-feedback" id="passwordupdivN" hidden>
                  <input type="password" class="form-control" id="passwordupN" placeholder="Password" name="passwordup" disabled />
                </div>
            </div>
            <div class="col-md-4">
            </div>  
        </div> 
-->



  </form>

</div>

      <div class="modal-footer">
         <button type="button" onclick="mostrarHistorial();" data-dismiss="modal" class="btn btn-primary">Actualizar Datos</button>
      </div>
<br>
<br>
<h3 align="center">CAPACITACIONES REALIZADAS</h3>
<br>
 @include('GestionUsuario.MostrarHistorialCapacitacion')     
  </div>