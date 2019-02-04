$(document).ready(function()
{
          mostrarPermiso($('#idusuario').val());
          mostrarPermisoUsuario($('#idusuario').val());
          mostrarPermisoGeneral();
 });
/*FUNCION PARA INGRESAR LOS USUARIOS*/
function ingresarPermiso(){ 
    //Datos que se envian a la ruta
    var FrmData = {
        descripcion: $('#descripcionPer').val(),
        fechaInicio: $('#fechaIniPer').val(),
        fechaFin: $('#fechaFinPer').val(),
        fechaAprobJefe: $('#fechaAprobJefePer').val(),
        fechaAprobTTHH: $('#fechaAprobTTHHPer').val(),
        horaInicio: $('#horaInicioPer').val(),
        horaFin: $('#horaFinPer').val(),
        estado: $('#estadoPer').val(),
        justificacion: $('#justificacionPer').val(),
        persona_id: $('#personaIdPer').val(),
        user_id: $('#idusuario').val(),
    }
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'permiso', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
          
          
            mostrarPermiso();      
            limpiarPermiso();
        },
        complete: function () {     
           
        }
    });  
}


/*MOSTRAR TODOS LOS EMPLEADOS*/
function mostrarPermiso(id){
     $.get('listarPermiso/'+id, function (data) { 
        $("#tablaPermiso").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargarPermiso(item); // carga los datos en la tabla
        });      
    });
}

function eliminarPermiso(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url: 'permiso/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          mostrarPermiso($('#idusuario').val());   // carga los datos en la tabla                       
        }
    });
}

/*MUESTRA LOS DATOS DEL USUARIO SELECCIONADO  EN EL MODAL */
function actualizarPermiso(id){ 
    //alert(id);
    $.get('actualizarPermiso/'+id,function(data){
        
        $('#idPermiso1').val(data.id);
        $('#descPermiso').val(data.descripcion);
        $('#fecIniPermiso').val(data.fechaInicio);
        $('#fechFinPermiso').val(data.fechaFin);
        $('#fecAproJefePermiso').val(data.fechaAprobJefe);
        $('#fecAproTTHHPermiso').val(data.fechaAprobTTHH);
        $('#horaIniPermiso').val(data.horaInicio);
        $('#horaFinPermiso').val(data.horaFin);
        $('#estadoPermiso').val(data.estado);
        $('#justPermiso').val(data.justificacion);
        $('#persona_idPermiso').val(data.persona.id);
        $('#idusuario').val(data.usuario.id);
    });
}


/*PARA ACTUALIZAR LOS DATOS DEL USUARIO*/
function updatePermiso(){ 
   var FrmData = {
        idPermiso: $('#idPermiso1').val(),
        descripcion: $('#descPermiso').val(),
        fechaInicio: $('#fecIniPermiso').val(),
        fechaFin: $('#fechFinPermiso').val(),
        fechaAprobJefe: $('#fecAproJefePermiso').val(),
        fechaAprobTTHH: $('#fecAproTTHHPermiso').val(),
        horaInicio: $('#horaIniPermiso').val(),
        horaFin: $('#horaFinPermiso').val(),
        estado: $('#estadoPermiso').val(),
        justificacion: $('#justPermiso').val(),
        persona_id: $('#persona_idPermiso').val(),
        user_id: $('#idusuario').val(),
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'permiso/'+ $('#idPermiso').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            console.log(data);
            mostrarPermiso($('#idusuario').val()); 
            limpiarPermiso();
        },
        
    });  
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiarPermiso(){
    $('#descripcionPer').val('');
    $('#fechaIniPer').val('');
    $('#fechaFinPer').val('');
    $('#fechaAprobJefePer').val('');
    $('#fechaAprobTTHHPer').val('');
    $('#horaInicioPer').val('');
    $('#horaFinPer').val('');
    $('#estadoPer').val('');
    $('#justificacionPer').val('');
}

/*FUNCIÓN PARA CARGAR LOS USUARIOS EN LA TABLA*/
function cargarPermiso(data){
 
    $("#tablaPermiso").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.usuario.nombres+" "+ data.usuario.apellidos+"</td>\
         <td>"+ data.descripcion +"</td>\
         <td>"+ data.fechaInicio +"</td>\
         <td>"+ data.fechaFin +"</td>\
         <td>"+ data.horaInicio +"</td>\
         <td>"+ data.horaFin +"</td>\
         <td>"+ data.justificacion +"</td>\
         <td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarPermiso' onClick='actualizarPermiso("+data.id+")'><i class='fa fa-refresh'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarPermiso("+data.id+")'><i class='fa fa-trash'></i></button></td>"
    );
}

//APROBAR



$( "#B_Permiso" ).change(function() {
   //alert($( "#dtpFecha" ).val());
   $.get('buscarPermiso/'+$('#B_Permiso').val() , function (data) { //ruta que especifica que metodo ejecutar en resource
              // limpia el tbody de la tabla
              //alert(2); 
              $('#tablaPermiso').html('');
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
               $("#tablaPermiso").append(
                       "<tr id='"+item.id+"'>"+
                       "<td>"+ item.usuario.nombres+" "+ item.usuario.apellidos+"</td>"+
                       "<td>"+ item.descripcion+"</td>"+
                       "<td>"+ item.fechaInicio+"</td>"+
                       "<td>"+ item.fechaFin+"</td>"+
                       "<td>"+ item.horaInicio+"</td>"+
                       "<td>"+ item.horaFin+"</td>"+
                       "<td>"+ item.justificacion+"</td>"+
                       "<td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarPermiso' onClick='actualizarPermiso("+item.id+")'><i class='fa fa-refresh'></i></button></td>"+
                       "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarPermiso("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
                );
                
         }); 
    });
});


//----------------------PERMISOS INDIVIDUALES

function mostrarPermisoUsuario(id){
    $.get('listarPermisoUsuario/'+id, function (data) {   //Ruta de listar
        $("#tablaPermisoUsuario").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargarPermisoUsuario(item); // carga los datos en la tabla
        });      
    });
}



function mostrarPDF(id){
    $.get('certificado/'+id, function (data) {   //Ruta de listar
        $("#tablaPDF").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargarPDF(item); // carga los datos en la tabla
        });      
    });
}


function cargarPDF(data){
 
    $("#tablaPDF").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.usuario.nombres+" "+ data.usuario.apellidos+"</td>\
         <td>"+ data.persona.cedula +"</td>\
         <td>"+ data.fechaInicio +"</td>\
         <td>"+ data.fechaFin +"</td>\
         <td>"+ data.jefeAprueba +"</td>\
         <td>"+ data.tthhAprueba +"</td>"
    );
}



function cargarPermisoUsuario(data){
 
    var fila='';

    fila+='<tr>';
    fila+='<td>'+ data.usuario.nombres+' '+ data.usuario.apellidos+'</td>';
    fila+='<td>'+ data.descripcion +'</td>';
    fila+='<td>'+ data.fechaInicio +'</td>';
    fila+='<td>'+ data.fechaFin +'</td>';
    fila+='<td>'+ data.horaInicio +'</td>';
    fila+='<td>'+ data.horaFin +'</td>';
    fila+='<td>'+ data.justificacion +'</td>';
    fila+="<td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarPermisoUsuario' onClick='actualizarPermisoUsuario("+data.id+")'><i class='fa fa-refresh'></i></button></td>";
    fila+="<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarPermisoUsuario("+data.id+")'><i class='fa fa-trash'></i></button></td>";
    
    if (data.estado==2) {
        fila+="<td class='row'><button type='button' class='btn btn-success'><a href='certificado' class='fa fa-file-pdf-o '></a></button></td>";

    }else{
        fila+="<td class='row'><button type='button' class='btn btn-success' disabled><i class='fa fa-file-pdf-o '></i></button></td>";

    }

    $("#tablaPermisoUsuario").append(fila);



    // $("#tablaPermisoUsuario").append(
    //     "<tr id='fila_cod"+"'>\
    //      <td>"+ data.usuario.nombres+" "+ data.usuario.apellidos+"</td>\
    //      <td>"+ data.descripcion +"</td>\
    //      <td>"+ data.fechaInicio +"</td>\
    //      <td>"+ data.fechaFin +"</td>\
    //      <td>"+ data.horaInicio +"</td>\
    //      <td>"+ data.horaFin +"</td>\
    //      <td>"+ data.justificacion +"</td>\
    //      <td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarPermisoUsuario' onClick='actualizarPermisoUsuario("+data.id+")'><i class='fa fa-refresh'></i></button></td>\
    //      <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarPermisoUsuario("+data.id+")'><i class='fa fa-trash'></i></button></td>\
    //      <td class='row'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#certificadoUsuario' onClick='certificadoUsuario("+data.id+")'><i class='fa fa-file-pdf-o '></i></button></td>"
    // );
}


function actualizarPermisoUsuario(id){ 
    //alert(id);
    $.get('actualizarPermiso/'+id,function(data){
        
        $('#idPermiso1').val(data.id);
        $('#descPermiso').val(data.descripcion);
        $('#fecIniPermiso').val(data.fechaInicio);
        $('#fechFinPermiso').val(data.fechaFin);
        $('#fecAproJefePermiso').val(data.fechaAprobJefe);
        $('#fecAproTTHHPermiso').val(data.fechaAprobTTHH);
        $('#horaIniPermiso').val(data.horaInicio);
        $('#horaFinPermiso').val(data.horaFin);
        $('#estadoPermiso').val(data.estado);
        $('#justPermiso').val(data.justificacion);
        $('#persona_idPermiso').val(data.persona.id);
        $('#idusuario').val(data.usuario.id);
    });
}


/*PARA ACTUALIZAR LOS DATOS DEL USUARIO*/

function updatePermisoUsuario(){ 
   var FrmData = {
        idPermiso: $('#idPermiso1').val(),
        descripcion: $('#descPermiso').val(),
        fechaInicio: $('#fecIniPermiso').val(),
        fechaFin: $('#fechFinPermiso').val(),
        fechaAprobJefe: $('#fecAproJefePermiso').val(),
        fechaAprobTTHH: $('#fecAproTTHHPermiso').val(),
        horaInicio: $('#horaIniPermiso').val(),
        horaFin: $('#horaFinPermiso').val(),
        estado: $('#estadoPermiso').val(),
        justificacion: $('#justPermiso').val(),
        persona_id: $('#persona_idPermiso').val(),
        user_id: $('#idusuario').val(),
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'permiso/'+ $('#idPermiso').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            console.log(data);
            mostrarPermisoUsuario($('#idusuario').val()); 
            limpiarPermiso();
        },
        
    });  
}


function eliminarPermisoUsuario(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url: 'permiso/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          mostrarPermisoUsuario($('#idusuario').val());                       
        }
    });
}


$( "#B_PermisoIndividual" ).change(function() {
   //alert($( "#dtpFecha" ).val());
   $.get('buscarPermiso/'+$('#B_PermisoIndividual').val() , function (data) { //ruta que especifica que metodo ejecutar en resource
              // limpia el tbody de la tabla
              //alert(2); 
              $('#tablaPermisoUsuario').html('');
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
               $("#tablaPermiso").append(
                       "<tr id='"+item.id+"'>"+
                       "<td>"+ item.usuario.nombres+" "+ item.usuario.apellidos+"</td>"+
                       "<td>"+ item.descripcion+"</td>"+
                       "<td>"+ item.fechaInicio+"</td>"+
                       "<td>"+ item.fechaFin+"</td>"+
                       "<td>"+ item.horaInicio+"</td>"+
                       "<td>"+ item.horaFin+"</td>"+
                       "<td>"+ item.justificacion+"</td>"+
                       "<td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarPermiso' onClick='actualizarPermiso("+item.id+")'><i class='fa fa-refresh'></i></button></td>"+
                       "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarPermiso("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
                );
                
         }); 
    });
});













//-------------------PERMISOS GENERALES

function mostrarPermisoGeneral(){
    $.get('listarPermisoGeneral/', function (data) {   //Ruta de listar
        $("#tablaPermisoGeneral").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargarPermisoGeneral(item); // carga los datos en la tabla
        });      
    });
}



/*MUESTRA LOS DATOS DEL USUARIO SELECCIONADO  EN EL MODAL */


function cargarPermisoGeneral(data){
    $("#tablaPermisoGeneral").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.usuario.nombres+" "+ data.usuario.apellidos+"</td>\
         <td>"+ data.descripcion +"</td>\
         <td>"+ data.fechaInicio +"</td>\
         <td>"+ data.fechaFin +"</td>\
         <td>"+ data.horaInicio +"</td>\
         <td>"+ data.horaFin +"</td>\
         <td class='row'><button type='button' class='btn btn-info' onClick=''><i class='fa fa-eye'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-success' onClick='AprobarPermiso("+data.id+")'><i class='fa fa-check'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-danger' onClick=''><i class='fa fa-close'></i></button></td>"
    );
}

function AprobarPermiso(_id){
  
  var FrmData ={
    idPermiso: _id,
    idusuario: $('#idusuario_').val(),
  }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'modificarPermiso/'+FrmData, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            mostrarPermisoGeneral();
            if (data=='Y') {
                //alert("Haz aprobado este permiso")
            }
        },
        complete: function () {     
           
        }
    });  
   //alert('idusuario:'+ FrmData.idusuario +'    idpermiso:'+FrmData.idPermiso);


}

$( "#B_PermisoGeneral" ).change(function() {
   //alert($( "#dtpFecha" ).val());
   $.get('buscarPermiso/'+$('#B_PermisoGeneral').val() , function (data) { //ruta que especifica que metodo ejecutar en resource
              // limpia el tbody de la tabla
              //alert(2); 
              $('#tablaPermisoGeneral').html('');
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
               $("#tablaPermisoGeneral").append(
                       "<tr id='"+item.id+"'>"+
                       "<td>"+ item.usuario.nombres+" "+ item.usuario.apellidos+"</td>"+
                       "<td>"+ item.descripcion+"</td>"+
                       "<td>"+ item.fechaInicio+"</td>"+
                       "<td>"+ item.fechaFin+"</td>"+
                       "<td>"+ item.horaInicio+"</td>"+
                       "<td>"+ item.horaFin+"</td>"+
                       "<td class='row'><button type='button' class='btn btn-info' onClick=''><i class='fa fa-eye'></i></button></td>"+
                       "<td class='row'><button type='button' class='btn btn-success' onClick='AprobarPermiso("+data.id+")'><i class='fa fa-check'></i></button></td>"+
                       "<td class='row'><button type='button' class='btn btn-danger' onClick=''><i class='fa fa-close'></i></button></td>"  
                                            

                );
                
         }); 
    });
});




