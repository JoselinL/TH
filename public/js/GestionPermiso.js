$(document).ready(function()
{
          mostrarPermiso($('#idusuario').val());
          mostrarPermisoUsuario($('#idusuario').val());
          mostrarPermisoGeneral();
          mostrarPermisosAprobados();
          mostrarPermisosNA();
          
 });



/*FUNCION PARA NO INGRESAR FECHAS MAL*/

// $('#fechaFinPer').change(function(){
//     if ($('#fechaIniPer').val()<=$('#fechaFinPer').val()) {
//     }else{
//         alert('Seleccione una fecha valida');
//         $('#fechaFinPer').val($('#fechaIniPer').val());
//     }

// });

/*FUNCION PARA INGRESAR LOS USUARIOS*/

function ingresarPermiso(documentop){ 
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
        justificacion: documentop,
        persona_id: $('#personaIdPer').val(),
        user_id: $('#idusuario').val(),
        catalogo: $('#catalogoPer').val(),
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
          
            mostrarPermiso($('#idusuario').val());      
            limpiarPermiso();
             mostrarPermiso();
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
        $('#catalogoPermiso').val(data.catalogo);
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
        catalogo: $('#catalogoPermiso').val(),
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
    $('#catalogoPer').val('');
}

/*FUNCIÓN PARA CARGAR LOS USUARIOS EN LA TABLA*/
function cargarPermiso(data){
 
    $("#tablaPermiso").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.usuario.cedula+"</td>\
         <td>"+ data.usuario.nombres+" "+ data.usuario.apellidos+"</td>\
         <td>"+ data.descripcion +"</td>\
         <td>"+ data.fechaInicio +"</td>\
         <td>"+ data.fechaFin +"</td>\
         <td>"+ data.horaInicio +"</td>\
         <td>"+ data.horaFin +"</td>\
         <td>"+ data.catalogo +"</td>\
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
                       "<td>"+ item.usuario.cedula+"</td>"+
                       "<td>"+ item.usuario.nombres+" "+ item.usuario.apellidos+"</td>"+
                       "<td>"+ item.descripcion+"</td>"+
                       "<td>"+ item.fechaInicio+"</td>"+
                       "<td>"+ item.fechaFin+"</td>"+
                       "<td>"+ item.horaInicio+"</td>"+
                       "<td>"+ item.horaFin+"</td>"+
                       "<td>"+ item.catalogo+"</td>"+
                       "<td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarPermiso' onClick='actualizarPermiso("+item.id+")'><i class='fa fa-refresh'></i></button></td>"+
                       "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarPermiso("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
                );
                
         }); 
    });
});


//----------------------------------------------------------PERMISOS INDIVIDUALES

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
    var estado="";
    var fila='';

    fila+='<tr>';
    fila+='<td>'+ data.usuario.cedula +'</td>';
    fila+='<td>'+ data.usuario.nombres+' '+ data.usuario.apellidos+'</td>';
    fila+='<td>'+ data.descripcion +'</td>';
    fila+='<td>'+ data.fechaInicio +'</td>';
    fila+='<td>'+ data.fechaFin +'</td>';
    fila+='<td>'+ data.horaInicio +'</td>';
    fila+='<td>'+ data.horaFin +'</td>';
    fila+='<td>'+ data.catalogo +'</td>';
    fila+="<td class='row'><button type='button' class='btn btn-info' id='btn-confirm' ><a href='"+data.justificacion+"'><i class='fa fa-download'></i></a></button></td>";
   if (data.estado==2) {
       fila+="<td><spam class='label label-success'>Aprobado</spam></td>";
    }else if (data.estado==1 && data.tthhAprueba != null) {
        fila+="<td><spam class='label label-warning'>Aprobado por el director de Talento Humano</spam></td>";
    }else if (data.estado==1 && data.jefeAprueba != null) {
        fila+="<td><spam class='label label-warning'>Aprobado por el responsable del area</spam></td>";
    }else if (data.estado<2) {
        fila+="<td><spam class='label label-warning'>Pendiente</spam></td>";
    }else if (data.estado==3) {
        fila+="<td><spam class='label label-danger'>Rechazado</spam></td>";
    }
    
    //fila+="<td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarPermisoUsuario' onClick='actualizarPermisoUsuario("+data.id+")'><i class='fa fa-refresh'></i></button></td>";
    //fila+="<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarPermisoUsuario("+data.id+")'><i class='fa fa-trash'></i></button></td>";
    
    var url="../../TalentoHumano/public/certificado/"+data.id;
    if (data.estado==2) {
            fila+="<td class='row'><a href='"+url+"' class='btn btn-success' id='btn-confirm'><i class='fa fa-file-text'></i></a</td>";
    
    }
    if (data.estado==3) {
            fila+='<td class="row"><button type="button" class="btn btn-danger" onClick="vermensajeObservacion('+data.id+')" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-file"></i></button></td>';
    
    }
    else if (data.estado==0 || data.estado==1) {
        //fila+="<td class='row'><button type='button' class='btn btn-success' disabled><i class='fa fa-file-pdf-o '></i></button></td>";
        //fila+="<td class='row'><button type='button' class='btn btn-danger' onClick='vermensajeObservacion("+data.id+")'><i class='fa fa-file'></i></button></td>";
            fila+='<td class="row"><button type="button" class="btn btn-warning" id= "btn-confirm"><i class="fa fa-file-text"></i></button></td>';
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


function descargarPDF(id){ 
    alert(id);
    $.get('certificado/'+id,function(){
        
      
    });
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
        $('#catalogoPermiso').val(data.catalogo);
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
        catalogo: $('#catalogoPermiso').val(),
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


// function eliminarPermisoUsuario(id){
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     var FrmData ;
//     $.ajax({
//         url: 'permiso/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
//         method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
//         data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
//         success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
//         {   
//           mostrarPermisoUsuario($('#idusuario').val());                       
//         }
//     });
// }


$( "#B_PermisoIndividual" ).change(function() {
   //alert($( "#dtpFecha" ).val());
   $.get('buscarPermiso/'+$('#B_PermisoIndividual').val() , function (data) { //ruta que especifica que metodo ejecutar en resource
              // limpia el tbody de la tabla
              //alert(2); 
              $('#tablaPermisoUsuario').html('');
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
               $("#tablaPermiso").append(
                       "<tr id='"+item.id+"'>"+
                       "<td>"+ item.usuario.cedula+"</td>"+
                       "<td>"+ item.usuario.nombres+" "+ item.usuario.apellidos+"</td>"+
                       "<td>"+ item.descripcion+"</td>"+
                       "<td>"+ item.fechaInicio+"</td>"+
                       "<td>"+ item.fechaFin+"</td>"+
                       "<td>"+ item.horaInicio+"</td>"+
                       "<td>"+ item.horaFin+"</td>"+
                       "<td>"+ item.catalogo+"</td>"
                       //"<td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarPermiso' onClick='actualizarPermiso("+item.id+")'><i class='fa fa-refresh'></i></button></td>"
                );
                
         }); 
    });
});








//------------------------------------------------PERMISOS GENERALES

function mostrarPermisoGeneral(){
    $.get('listarPermisoGeneral/', function (data) {   //Ruta de listar
        $("#tablaPermisoGeneral").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargarPermisoGeneral(item); // carga los datos en la tabla
        });      
    });
}



function mostrarPermisosAprobados(){
    $.get('listarPermisoAprobado/', function (data) {   //Ruta de listar
        $("#tablaPermisosAprobados").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargarPermisosAprobados(item); // carga los datos en la tabla
        });      
    });
}



function mostrarPermisosNA(){
    $.get('listarPermisoNA/', function (data) {   //Ruta de listar
        $("#tablaPermisosNA").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargarPermisosNA(item); // carga los datos en la tabla
        });      
    });
}

/*MUESTRA LOS DATOS DEL USUARIO SELECCIONADO  EN EL MODAL */


function cargarPermisoGeneral(data){
if(data.estado==0 || data.estado==1){
  $("#txtObservacionPermiso").html("");
    var fila ="";
    fila+="<tr>";
    fila+="<td>"+ data.cedula +"</td>";
    fila+="<td>"+ data.nombres+" "+ data.apellidos+"</td>";
    fila+="<td>"+ data.descripcion +"</td>";
    fila+="<td>"+ data.fechaInicio +"</td>";
    fila+="<td>"+ data.fechaFin +"</td>";
    fila+="<td>"+ data.horaInicio +"</td>";
    fila+="<td>"+ data.horaFin +"</td>";
    fila+="<td>"+ data.catalogo +"</td>";
    fila+="<td class='row'><button type='button' class='btn btn-info' id='btn-confirm' ><a href='"+data.justificacion+"'><i class='fa fa-download'></i></a></button></td>";
    if (data.estado<2) {
        fila+="<td class='row'><button type='button' class='btn btn-success' onClick='AprobarPermiso("+data.id+")'><i class='fa fa-check'></i></button></td>"; 

        fila+="<td class='row'><button type='button' class='btn btn-danger' onClicK='verModalReprobarPermiso("+data.id+")'><i class='fa fa-close'></i></button></td>";
    
    }else{
        fila+="<td class='row'><button type='button' class='btn btn-success' disabled><i class='fa fa-check'></i></button></td>";            
        fila+="<td class='row'><button type='button' class='btn btn-danger' disabled><i class='fa fa-close'></i></button></td>";        
    }
    

    $("#tablaPermisoGeneral").append(fila);
    // $("#tablaPermisoGeneral").append(
    //     "<tr id='fila_cod"+"'>\
    //      <td>"+ data.usuario.nombres+" "+ data.usuario.apellidos+"</td>\
    //      <td>"+ data.descripcion +"</td>\
    //      <td>"+ data.fechaInicio +"</td>\
    //      <td>"+ data.fechaFin +"</td>\
    //      <td>"+ data.horaInicio +"</td>\
    //      <td>"+ data.horaFin +"</td>\
    //      <td class='row'><button type='button' class='btn btn-info' onClick=''><i class='fa fa-eye'></i></button></td>\
    //      <td class='row'><button type='button' class='btn btn-success' onClick='AprobarPermiso("+data.id+")'><i class='fa fa-check'></i></button></td>\
    //      <td class='row'><button type='button' class='btn btn-danger' onClick=''><i class='fa fa-close'></i></button></td>"
    // );
    } 
}



function cargarPermisosAprobados(data){
if(data.estado==2){
  $("#txtObservacionPermiso").html("");
    var fila ="";
    fila+="<tr>";
    fila+="<td>"+ data.cedula +"</td>";
    fila+="<td>"+ data.nombres+" "+ data.apellidos+"</td>";
    fila+="<td>"+ data.descripcion +"</td>";
    fila+="<td>"+ data.fechaInicio +"</td>";
    fila+="<td>"+ data.fechaFin +"</td>";
    fila+="<td>"+ data.horaInicio +"</td>";
    fila+="<td>"+ data.horaFin +"</td>";
    fila+="<td>"+ data.catalogo +"</td>";
    fila+="<td class='row'><button type='button' class='btn btn-info' id='btn-confirm' ><a href='"+data.justificacion+"'><i class='fa fa-download'></i></a></button></td>";
   
    $("#tablaPermisosAprobados").append(fila);
 }
}



function cargarPermisosNA(data){
 if(data.estado==3){  
    $("#txtObservacionPermiso").html("");
    var fila ="";
    fila+="<tr>";
    fila+="<td>"+ data.cedula +"</td>";
    fila+="<td>"+ data.nombres+" "+ data.apellidos+"</td>";
    fila+="<td>"+ data.descripcion +"</td>";
    fila+="<td>"+ data.fechaInicio +"</td>";
    fila+="<td>"+ data.fechaFin +"</td>";
    fila+="<td>"+ data.horaInicio +"</td>";
    fila+="<td>"+ data.horaFin +"</td>";
    fila+="<td>"+ data.catalogo +"</td>";
    fila+="<td class='row'><button type='button' class='btn btn-info' id='btn-confirm' ><a href='"+data.justificacion+"'><i class='fa fa-download'></i></a></button></td>";
   
    $("#tablaPermisosNA").append(fila);
 }
}


function AprobarPermiso(_id){
    //alert('yupi');
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
            //alert(data.di);
            mostrarPermisoGeneral();
            if (data.estado<2) {
                alert("Haz aprobado este permiso");
            }if(data.estado==2){
                alert("El pemiso ya ha sido consedido");
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
                cargarPermisoGeneral(data);
            //    $("#tablaPermisoGeneral").append(
            //            "<tr id='"+item.id+"'>"+
            //            "<td>"+ item.usuario.nombres+" "+ item.usuario.apellidos+"</td>"+
            //            "<td>"+ item.descripcion+"</td>"+
            //            "<td>"+ item.fechaInicio+"</td>"+
            //            "<td>"+ item.fechaFin+"</td>"+
            //            "<td>"+ item.horaInicio+"</td>"+
            //            "<td>"+ item.horaFin+"</td>"+
            //            "<td class='row'><button type='button' class='btn btn-info' onClick=''><i class='fa fa-eye'></i></button></td>"+
            //            "<td class='row'><button type='button' class='btn btn-success' onClick='AprobarPermiso("+data.id+")'><i class='fa fa-check'></i></button></td>"+
            //            "<td class='row'><button type='button' class='btn btn-danger' onClick='verModalReprobarPermiso("+data.id+")'><i class='fa fa-close'></i></button></td>"  
                                            

            //     );
                
         }); 
    });
});

function verModalReprobarPermiso(_id) {
    //alert("jo");
    $('#idPermiso_g').val(_id);
    //alert($('#idPermiso_g').val());
    $.get('getObservacion/'+_id,function (data) {
     $('#txtObservacionPermiso').val(data);
    });

    //getObservacion

    $('#addObservacionPermiso').modal('show');
    
    
}
$('#GuardarObservacion').on('click',function () {
    var FrmData ={
        idPermiso: $('#idPermiso_g').val(),
        idusuario: $('#idusuario_').val(),
        observacion: $('#txtObservacionPermiso').val(),
    }
    
    //alert(FrmData.idPermiso);//+" ;idusuario: "+FrmData.idusuario+" ;observacion: "+FrmData.observacion);
    console.log(FrmData);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'addObservacion/'+FrmData, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
         success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            //alert('ok');
            $('#addObservacionPermiso').modal('hide');
        },
        complete: function () {     
           
        },
        error:function () {
            
        }
    });    
});

function vermensajeObservacion(_id) {
    //$('#txtmensajeObservacion').val();
    //alert(_id);
    $.get('getObservacion/'+_id,function (data) {
        $('#txtmensajeObservacion').html(data);
       
        //alert(_id);
    });
    // $('#mensajeObservacion').modal('show');    

     
}


//Subida de archivos
$("#form_Permiso").submit(function(e){ // este metodo es para el submit de un formulario donde tengas                                     // el input de tipo file # form_enviarFile es el nombre de eese formulario
    e.preventDefault();   // evitamos que se recargue la pagina al ejecutar el formulario
    
    $.ajaxSetup({
        headers: { 
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST", // la ruta tiene que ser port // define una ruta post
        url: 'guardarJustificacion',  // en este caso la ruta es esta
        // data: e.serialize(),
        data: new FormData(this), // como dato enviamos el contenido del formulario creando un objeto del mismo
        contentType: false,  // no se pa q es esto xd
        cache: false, // tampoco se
        processData: false, // ni idea
        
        success: function (data) { // eso si quiers omitelo
           ingresarPermiso(data);
        },
            

    }); 
});
