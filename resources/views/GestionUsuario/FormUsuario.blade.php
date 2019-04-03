@if(session()->has('msj'))
<div class="alert alert-success" role="alert">
  {{ session('msj') }}
</div>
@endif

@if(session()->has('errormsj'))
<div class="alert alert-danger" role="alert">
  ¡Error al guardar los datos!
</div>
@endif 

<form role="form" method="POST" enctype="multipart/form-data">

    {{ csrf_field() }} <!-- Para validar el token -->

        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="cedula"><b>C.C:</b></label>
                <input type="text" class="form-control" placeholder="Ingrese la cedula de identidad" name="cedula" id="cedulaU" value="{{ old('cedula') }}"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                @if($errors->has('cedula'))
                <span style='color:red;'> {{ $errors->first('cedula') }} </span>
                @endif
            </div>


             <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="nombres"><b>Nombres:</b></label>
                <input type="text" class="form-control" placeholder="Ingrese los nombres" name="nombres" id="nombresU" value="{{ old('nombres') }}"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                @if($errors->has('nombres'))
                <span style='color:red;'> {{ $errors->first('nombres') }} </span>
                @endif

            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="apellidos"><b>Apellidos:</b></label>
                <input type="text" class="form-control" placeholder="Ingrese los apellidos" name="apellidos" id="apellidosU" value="{{ old('apellidos') }}"/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                @if($errors->has('apellidos'))
                <span style='color:red;'> {{ $errors->first('apellidos') }} </span>
                @endif
            </div>


            <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="fechaNacimiento"><b>Fecha de nacimiento:</b></label>
                <input type="date" class="form-control" name="fechaNacimiento" id="fechaNU" value="{{ old('fechaNacimiento') }}"/>
                </div>
                @if($errors->has('fechaNacimiento'))
                <span style='color:red;'> {{ $errors->first('fechaNacimiento') }} </span>
                @endif
            </div>
        </div>


         <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label for="sexo"><b>Sexo:</b></label>
                    <select class="form-control" id="sexoU" name="sexo" >
                            <option disabled selected>Sexo</option>
                            <option>Femenino</option>
                            <option>Masculino</option>
                            <option>Indefinido</option>
                    </select>
                @if($errors->has('sexo'))
                 <span style='color:red;'> {{ $errors->first('sexo') }} </span>
                @endif
                </div>
            </div>

             <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="email"><b>E-mail:</b></label>
                <input type="text" class="form-control" placeholder="Ingrese el e-mail" name="email" id="emailU" value="{{ old('email') }}"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                @if($errors->has('email'))
                <span style='color:red;'> {{ $errors->first('email') }} </span>
                @endif

            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="password"><b>Password:</b></label>
                <input type="password" class="form-control" placeholder="Ingrese la password" name="password" id="passwordU" value="{{ old('password') }}"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                @if($errors->has('password'))
                <span style='color:red;'> {{ $errors->first('password') }} </span>
                @endif
            </div>

             <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="nacionalidad"><b>Nacionalidad:</b></label>
                 <select class="form-control" id="nacionalidadU" name="nacionalidad" >
                            <option disabled selected>Nacionalidad</option>
                            <option>Ecuatoriana</option>
                            <option>Otra</option>
                 </select>
                </div>
                @if($errors->has('nacionalidad'))
                <span style='color:red;'> {{ $errors->first('nacionalidad') }} </span>
                @endif
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label for="estadoCivil"><b>Estado civil:</b></label>
                    <select class="form-control" id="estadoCU" name="estadoCivil" >
                            <option disabled selected>Estado civil</option>
                            <option>Soltero</option>
                            <option>Casado</option>
                            <option>Unión libre</option>
                    </select>
                @if($errors->has('estadoCivil'))
                 <span style='color:red;'> {{ $errors->first('estadoCivil') }} </span>
                @endif
                </div>
            </div>

             <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="direccion"><b>Dirección:</b></label>
                <input type="text" class="form-control" placeholder="Ingrese la dirección" name="direccion" id="direccionU" value="{{ old('direccion') }}"/>
                <span class="glyphicon glyphicon-home form-control-feedback"></span>
                </div>
                @if($errors->has('direccion'))
                <span style='color:red;'> {{ $errors->first('direccion') }} </span>
                @endif
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="telefono"><b>Teléfono:</b></label>
                <input type="text" class="form-control" placeholder="Ingrese el número de teléfono" name="telefono" id="telefonoU" value="{{ old('telefono') }}"/>
                <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                </div>
                @if($errors->has('telefono'))
                <span style='color:red;'> {{ $errors->first('telefono') }} </span>
                @endif
            </div>


            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label for="nivelEstudio"><b>Nivel de estudios:</b></label>
                    <select class="form-control" id="nivelEU" name="nivelEstudio" >
                            <option disabled selected>Nivel de estudios</option>
                            <option>Primaria</option>
                            <option>Bachillerato</option>
                            <option>Tercer Nivel</option>
                            <option>Cuarto Nivel</option>
                    </select>
                @if($errors->has('nivelEstudio'))
                 <span style='color:red;'> {{ $errors->first('nivelEstudio') }} </span>
                @endif
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="perfilProfesional"><b>Perfil profesional:</b></label>
                <input type="text" class="form-control" placeholder="Ingrese el perfil profesional" name="perfilProfesional" id="perfilPU" value="{{ old('perfilProfesional') }}"/>
                <span class="glyphicon glyphicon-education form-control-feedback"></span>
                </div>
                @if($errors->has('perfilProfesional'))
                <span style='color:red;'> {{ $errors->first('perfilProfesional') }} </span>
                @endif
            </div>

            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label for="tipoSangre"><b>Tipo de sangre:</b></label>
                    <select class="form-control" id="tiposU" name="tipoSangre" >
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
                @if($errors->has('tipoSangre'))
                 <span style='color:red;'> {{ $errors->first('tipoSangre') }} </span>
                @endif
                </div>
            </div>
        </div>


         <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="tipoUsuario_id"><b>Tipo de usuario:</b></label>
                <select class="form-control" name="tipoUsuario_id" id="tipousU">
                    @foreach($tipousuario as $tu)
               
                <option value="{{ $tu->id }}">{{ $tu->tipo }}</option>
          
                    @endforeach
                 </select>
                
                </div>
                @if($errors->has('tipoUsuario_id'))
                <span style='color:red;'> {{ $errors->first('tipoUsuario_id') }} </span>
                @endif

            </div>


               <div class="col-md-6">
                <div class="form-group has-feedback">
                    <label for="area"><b>Área:</b></label>
                    <select class="form-control" id="area_usuario" name="area" >
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
                
                @if($errors->has('area'))
                 <span style='color:red;'> {{ $errors->first('area') }} </span>
                @endif

                </div>
            </div>
        </div>

       
        <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="sueldo"><b>Sueldo:</b></label>
                <input type="text" class="form-control" placeholder="Ingrese el sueldo" name="sueldo" id="sueldoU" value="{{ old('sueldo') }}"/>
                <span class="glyphicon glyphicon-usd form-control-feedback"></span>
                </div>
                @if($errors->has('sueldo'))
                <span style='color:red;'> {{ $errors->first('sueldo') }} </span>
                @endif
            </div>

             <div class="col-md-6">
                <div class="form-group has-feedback">
                <label for="fechaInicio"><b>Fecha de contratación:</b></label>
                <input type="date" class="form-control" name="fechaInicio" id="fechaInicioU" value="{{ old('fechaInicio') }}"/>
                </div>
                @if($errors->has('fechaInicio'))
                <span style='color:red;'> {{ $errors->first('fechaInicio') }} </span>
                @endif
            </div>
        </div>



    <button type="button" class="btn btn-primary" onclick="ingresarUsuario()">Guardar</button>
</form>