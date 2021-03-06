$(document).ready(function()
{
         mostrarUsuario();
         mostrarCapacitacionH($('#idusuarioH').val());
         mostrarHistorial($('#idUsuarioH').val());
});

window.onload=function(){
    verUsuario()
}





/*FUNCION PARA INGRESAR LOS USUARIOS*/
function ingresarUsuario(){ 
    //Datos que se envian a la ruta
    var FrmData = {
        cedula: $('#cedulaU').val(),
        nombres: $('#nombresU').val(),
        apellidos: $('#apellidosU').val(),
        fechaNacimiento: $('#fechaNU').val(),
        sexo: $('#sexoU').val(),
        email: $('#emailU').val(),
        password: $('#passwordU').val(),
        nacionalidad: $('#nacionalidadU').val(),
        estadoCivil: $('#estadoCU').val(),
        direccion: $('#direccionU').val(),
        telefono: $('#telefonoU').val(),
        nivelEstudio: $('#nivelEU').val(),
        perfilProfesional: $('#perfilPU').val(),
        tipoSangre: $('#tiposU').val(),
        tipoUsuario_id: $('#tipousU').val(),
        area: $('#area_usuario').val(),
        sueldo: $('#sueldoU').val(),
        fechaInicio: $('#fechaInicioU').val(),
    }
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'usuario', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
           
            
          
            mostrarUsuario();      
            limpiarUsuario();
        },
        complete: function () {     
           
        }
    });  
}


/*MOSTRAR TODOS LOS EMPLEADOS*/
function mostrarUsuario(){
    $.get('listarUsuario', function (data) {   //Ruta de listar
        $("#tablaUsuario").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargarUsuario(item); // carga los datos en la tabla
        });      
    });
}

function eliminarUsuario(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url: 'usuario/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          mostrarUsuario(); // carga los datos en la tabla                       
        }
    });
}

/*MUESTRA LOS DATOS DEL USUARIO SELECCIONADO  EN EL MODAL */
function actualizarUsuario(id){ 
   // alert(id);
    $.get('actualizarUsuario/'+id,function(data){

        $('#idUsuario1').val(data.id);
        $('#ceduUsu').val(data.cedula);
        $('#nomUsu').val(data.nombres);
        $('#apeUsu').val(data.apellidos);
        $('#fnacU').val(data.fechaNacimiento);
        $('#sexUsu').val(data.sexo);
        $('#emailUsu').val(data.email);
        $('#passwordup').val(data.password);
        $('#NacUsu').val(data.nacionalidad);
        $('#estadoCUsu').val(data.estadoCivil);
        $('#DirecUsu').val(data.direccion);
        $('#TelfUsu').val(data.telefono);
        $('#nivelEUsu').val(data.nivelEstudio);
        $('#PPUsu').val(data.perfilProfesional);
        $('#tiposangreUsu').val(data.tipoSangre);
        $('#tipoUsu').val(data.tipousuario.id);
        $('#areaUsu').val(data.area);  
        $('#sueldoUsu').val(data.sueldo);  
        $('#fechaInicioUsu').val(data.fechaInicio);
    });
}



/*PARA ACTUALIZAR LOS DATOS DEL USUARIO*/
function updateUsuario(){ 
   var FrmData = {
        idUsuario: $('#idUsuario1').val(),
        cedula: $('#ceduUsu').val(),
        nombres: $('#nomUsu').val(),
        apellidos: $('#apeUsu').val(),
        fechaNacimiento: $('#fnacU').val(),
        sexo: $('#sexUsu').val(),
        email: $('#emailUsu').val(),
        password: $('#passwordup').val(),
        nacionalidad: $('#NacUsu').val(),
        estadoCivil: $('#estadoCUsu').val(),
        direccion: $('#DirecUsu').val(),
        telefono: $('#TelfUsu').val(),
        nivelEstudio: $('#nivelEUsu').val(),
        perfilProfesional: $('#PPUsu').val(),
        tipoSangre: $('#tiposangreUsu').val(),
        tipoUsuario_id: $('#tipoUsu').val(),
        area: $('#areaUsu').val(),
        sueldo: $('#sueldoUsu').val(),
        actualizarclave: $('#actualizarclave').val(),
        fechaInicio: $('#fechaInicioUsu').val(),
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'usuario/'+ $('#idUsuario').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            console.log(data);
            mostrarUsuario(); 
            limpiarUsuario();
        },
        
    });  
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiarUsuario(){
    $('#cedulaU').val('');
    $('#nombresU').val('');
    $('#apellidosU').val('');
    $('#fechaNU').val('');
    $('#emailU').val('');
    $('#passwordU').val('');
    $('#nacionalidadU').val('');
    $('#direccionU').val('');
    $('#telefonoU').val('');
    $('#perfilPU').val('');
    $('#sueldoU').val('');
    $('#fechaInicioU').val('');
}

/*FUNCIÓN PARA CARGAR LOS USUARIOS EN LA TABLA*/
function cargarUsuario(data){
 
    $("#tablaUsuario").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.cedula +"</td>\
         <td>"+ data.nombres +"</td>\
         <td>"+ data.apellidos +"</td>\
         <td>"+ data.fechaNacimiento +"</td>\
         <td>"+ data.sexo +"</td>\
         <td>"+ data.email +"</td>\
         <td>"+ data.nacionalidad +"</td>\
         <td>"+ data.estadoCivil +"</td>\
         <td>"+ data.direccion +"</td>\
         <td>"+ data.telefono +"</td>\
         <td>"+ data.nivelEstudio +"</td>\
         <td>"+ data.perfilProfesional +"</td>\
         <td>"+ data.tipoSangre +"</td>\
         <td>"+ data.tipousuario.tipo+"</td>\
         <td>"+ data.area+"</td>\
         <td>"+ data.sueldo+"</td>\
         <td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarUsuario' onClick='actualizarUsuario("+data.id+")'><i class='fa fa-refresh'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarUsuario("+data.id+")'><i class='fa fa-trash'></i></button></td></tr>"
    );
}




$("#actualizarclave").on('change', function(e){
    if (this.checked) {
        $("#passwordupdiv").prop('hidden',false);
        $("#passwordup").prop('disabled',false);
        $("#passwordup").prop('required',true);
        $("#actualizarclave").val('1');

    } else {
        $("#passwordupdiv").prop('hidden',true);
        $("#passwordup").prop('disabled',true);
        $("#passwordup").prop('required',false);
        $("#actualizarclave").val('0');
    
    }
});


$( "#B_Usuario" ).change(function() {
   //alert($( "#dtpFecha" ).val());
   $.get('buscarUsuario/'+$('#B_Usuario').val() , function (data) { //ruta que especifica que metodo ejecutar en resource
              // limpia el tbody de la tabla
              //alert(2); 
              $('#tablaUsuario').html('');
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
               $("#tablaUsuario").append(
                      "<tr id='"+item.id+"'>"+
                      "<td>"+ item.cedula+"</td>"+
                       "<td>"+ item.nombres+"</td>"+
                       "<td>"+ item.apellidos+"</td>"+
                       "<td>"+ item.fechaNacimiento+"</td>"+
                       "<td>"+ item.sexo+"</td>"+
                       "<td>"+ item.email+"</td>"+
                       "<td>"+ item.nacionalidad+"</td>"+
                       "<td>"+ item.estadoCivil+"</td>"+
                       "<td>"+ item.direccion+"</td>"+
                       "<td>"+ item.telefono+"</td>"+
                       "<td>"+ item.nivelEstudio+"</td>"+
                       "<td>"+ item.perfilProfesional+"</td>"+
                       "<td>"+ item.tipoSangre+"</td>"+
                       "<td>"+ item.tipousuario.tipo+"</td>"+
                       "<td>"+ item.area+"</td>"+
                       "<td>"+ item.sueldo+"</td>"+
                       "<td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarUsuario' onClick='actualizarUsuario("+item.id+")'><i class='fa fa-refresh'></i></button></td>"+
                       "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarUsuario("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
                );
                
         }); 
    });
});


/////////////////////////////////////////HISTORIAL


//MUESTRA LOS DATOS DEL USUARIO SELECCIONADO  EN EL MODAL 
    function mostrarHistorial(){
    $.get('listarUsuario/', function (data) {   //Ruta de listar    
    });
}

// function actualizarUsuarioH(id){ 
//     //alert($('#idusuario_H').val());
//     $.get('actualizarUsuarioH/'+id,function(data){

//             $('#idUsuario_H').val(data.id);
            // $('#ceduUsuAc').val(data.cedula);
            // $('#nomUsuAc').val(data.nombres);
            // $('#apeUsuAc').val(data.apellidos);
            // $('#fnacUsuAc').val(data.fechaNacimiento);
            // $('#sexUsuAc').val(data.sexo);
            // $('#emailUsuAc').val(data.email);
            // $('#passwordupN').val(data.password);
            // $('#NacUsuAc').val(data.nacionalidad);
            // $('#estadoCUsuAc').val(data.estadoCivil);
            // $('#DirecUsuAc').val(data.direccion);
            // $('#TelfUsuAc').val(data.telefono);
            // $('#nivelEUsuAc').val(data.nivelEstudio);
            // $('#PPUsuAc').val(data.perfilProfesional);
            // $('#tiposangreUsuAc').val(data.tipoSangre);
            // $('#tipoUsuAc').val(data.tipousuario.id);
            // $('#areaU').val(data.area);
            // $('#sueldoAc').val(data.sueldo);
/*    });
}*/



// /*PARA ACTUALIZAR LOS DATOS DEL USUARIO*/
function updateUsuarioHistorial(){ 

   var FrmData = {
        idUsuario: $('#idUsuarioN').val(),
        cedula: $('#cedulaUsuarioN').val(),
        nombres: $('#nomUsuarioN').val(),
        apellidos: $('#apeUsuarioN').val(),
        fechaNacimiento: $('#fnacUN').val(),
        sexo: $('#sexUsuarioN').val(),
        email: $('#emailUsuarioN').val(),
        password: $('#passwordupN').val(),
        nacionalidad: $('#NacUsuarioN').val(),
        estadoCivil: $('#estadoCUsuarioN').val(),
        direccion: $('#DirecUsuarioN').val(),
        telefono: $('#TelfUsuarioN').val(),
        nivelEstudio: $('#nivelEUsuarioN').val(),
        perfilProfesional: $('#PPUsuarioN').val(),
        tipoSangre: $('#tiposangreUsuarioN').val(),
        tipoUsuario_id: $('#tipoUsuarioN').val(),
        area: $('#areaN').val(),
        sueldo: $('#sueldoN').val(),
        actualizarclave: $('#actualizarclaveN').val(),
        fechaInicio: $('#fechaInicioN').val(),
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'listarUsuario/'+ $('#idUsuarioH').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            console.log(data);
            mostrarHistorial($('#idUsuarioH').val());
        },
        
    });  
}



function verUsuario(){ 
   //alert ($('#idusuarioH').val());
   //$('#nomUsuarioN').val('hola');

   var id= $('#idusuarioH').val();
  
   // $.ajaxSetup({
   //      headers: {
   //          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   //      }
   //  });
   //  $.ajax({
   //      url: 'listarUsuarioH/'+ id, // Url que se envia para la solicitud esta en el web php es la ruta
   //      method: "GET",             // Tipo de solicitud que se enviará, llamado como método
   //      data: id,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
   //      success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
   //      {

   //          //alert(data.id);
   //          //$('#nomUsuarioN').val(data.nombres);
   //      },error: function(){
   //          alert('error');
   //      },
        
   //  });  

     $.get('listarUsuarioH/'+id, function (data) {   //Ruta de listar
        $('#cedulaUsuarioN').val(data.cedula);
        $('#nomUsuarioN').val(data.nombres);
        $('#apeUsuarioN').val(data.apellidos);
        $('#fnacUN').val(data.fechaNacimiento);
        $('#sexUsuarioN').val(data.sexo);
        $('#emailUsuarioN').val(data.email);
        $('#passwordupN').val(data.password);
        $('#NacUsuarioN').val(data.nacionalidad);
        $('#estadoCUsuarioN').val(data.estadoCivil);
        $('#DirecUsuarioN').val(data.direccion);
        $('#TelfUsuarioN').val(data.telefono);
        $('#nivelEUsuarioN').val(data.nivelEstudio);
        $('#PPUsuarioN').val(data.perfilProfesional);
        $('#tiposangreUsuarioN').val(data.tipoSangre);
        $('#tipoUsuarioN').val(data.tipousuario.id);
        $('#areaN').val(data.area);
        $('#sueldoN').val(data.sueldo);
        $('#fechaInicioN').val(data.fechaInicio);
    });
    
}


$("#actualizarclaveN").on('change', function(e){
    if (this.checked) {
        $("#passwordupdivN").prop('hidden',false);
        $("#passwordupN").prop('disabled',false);
        $("#passwordupN").prop('required',true);
        $("#actualizarclaveN").val('1');

    } else {
        $("#passwordupdivN").prop('hidden',true);
        $("#passwordupN").prop('disabled',true);
        $("#passwordupN").prop('required',false);
        $("#actualizarclaveN").val('0');
    
    }
});







/////////////////////////////////////////MOSTRAR CAPACITACIONES
function mostrarCapacitacionH(id){
    $.get('listarCapacitacion/'+id, function (data) {   //Ruta de listar
        $("#tablaCapacitacionH").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargarCapacitacionH(item); // carga los datos en la tabla
        });      
    });
}


function cargarCapacitacionH(data){
 
    $("#tablaCapacitacionH").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.descripcion +"</td>\
         <td>"+ data.fechaInicio +"</td>\
         <td>"+ data.fechaFin +"</td>\
         <td>"+ data.tipocapacitacion.descripcion +"</td>\
         <td class='row'><button type='button' class='btn btn-info' id='btn-confirm' ><a href='"+data.documento+"'><i class='fa fa-download'></i></a></button></td>"
    );
}


