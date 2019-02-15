$(document).ready(function()
{
          mostrarVacacion($('#idusuario1').val());
          //mostrarDisponibilidad($('#idusuario1').val());
          mostrarVacacionIndividual($('#idusuario1').val());
          mostrarVacacionGeneral();
          
 });
/*FUNCION PARA INGRESAR LOS USUARIOS*/
function ingresarVacacion(){ 
    //Datos que se envian a la ruta
    var FrmData = {
        descripcion: $('#descripcionVac').val(),
        fechaInicio: $('#fechaIniVac').val(),
        fechaFin: $('#fechaFiniVac').val(),
        fechaAprobacionJefe: $('#fechaAproJefeVac').val(),
        fechaAprobacionTTHH: $('#fechaAproTTHHVac').val(),
        estado: $('#estadoVac').val(),
        persona_id: $('#persIdVac').val(),
        user_id: $('#idusuario1').val(),
    }
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'vacaciones', // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
           
            
          
            mostrarVacacion();      
            limpiarVacacion();
            mostrarVacacion($('#idusuario1').val());
        },
        complete: function () {     
           
        }
    });  
}


/*MOSTRAR TODOS LOS EMPLEADOS*/
function mostrarVacacion(id){
    $.get('listarVacacion/'+id, function (data) {   //Ruta de listar
        $("#tablaVacacion").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargarVacacion(item); // carga los datos en la tabla
        });      
    });
}

function eliminarVacacion(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url: 'vacaciones/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          mostrarVacacion($('#idusuario1').val()); // carga los datos en la tabla                       
        }
    });
}

/*MUESTRA LOS DATOS DEL USUARIO SELECCIONADO  EN EL MODAL */
function actualizarVacacion(id){ 
    //alert(id);
    $.get('actualizarVacacion/'+id,function(data){
        
        $('#idVacacion1').val(data.id);
        $('#descVacacion').val(data.descripcion);
        $('#fecIniVacacion').val(data.fechaInicio);
        $('#fechFinVacacion').val(data.fechaFin);
        $('#fechAprobJefeVacacion').val(data.fechaAprobacionJefe);
        $('#fechAprobTTHHVacacion').val(data.fechaAprobacionTTHH);
        $('#estadoVacacion').val(data.estado);
        $('#idusuario1').val(data.usuario.id);
    });
}


/*PARA ACTUALIZAR LOS DATOS DEL USUARIO*/
function updateVacacion(){ 
   var FrmData = {
        idVacacion: $('#idVacacion1').val(),
        descripcion: $('#descVacacion').val(),
        fechaInicio: $('#fecIniVacacion').val(),
        fechaFin: $('#fechFinVacacion').val(),
        fechaAprobacionJefe: $('#fechAprobJefeVacacion').val(),
        fechaAprobacionTTHH: $('#fechAprobTTHHVacacion').val(),
        estado: $('#estadoVacacion').val(),
        user_id: $('#idusuario1').val(),

    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'vacaciones/'+ $('#idVacacion').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            console.log(data);
            mostrarVacacion($('#idusuario1').val()); 
            limpiarVacacion();
        },
        
    });  
}

/*PARA LIMPIAR LOS COMPONENTES DEL FORMULARIO*/
function limpiarVacacion(){
    $('#descripcionVac').val('');
    $('#fechaIniVac').val('');
    $('#fechaFiniVac').val('');
    $('#fechaAproJefeVac').val('');
    $('#fechaAproTTHHVac').val('');
    $('#estadoVac').val('');
}

/*FUNCIÓN PARA CARGAR LOS USUARIOS EN LA TABLA*/
function cargarVacacion(data){
 
    $("#tablaVacacion").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.usuario.nombres+" "+ data.usuario.apellidos+"</td>\
         <td>"+ data.descripcion +"</td>\
         <td>"+ data.fechaInicio +"</td>\
         <td>"+ data.fechaFin +"</td>\
         <td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarVacacion' onClick='actualizarVacacion("+data.id+")'><i class='fa fa-refresh'></i></button></td>\
         <td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarVacacion("+data.id+")'><i class='fa fa-trash'></i></button></td>"
    );
}
 
$( "#B_Vacacion" ).keyup(function() {


    var FrmData = {
        descripcion: $('#B_Vacacion').val(),
        user_id: $('#idusuario1').val(),
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'buscarVacacion/'+FrmData, // Url que se envia para la solicitud esta en el web php es la ruta
        method:"GET",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            //console.log(data)
            $("#tablaVacacion").html('');
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
                //console.log(item.descripcion);
                var fila='';
                fila+= "<tr id='"+item.id+"'>";
                fila+="<td>"+ item.usuario.nombres+" "+ item.usuario.apellidos+"</td>";
                fila+="<td>"+ item.descripcion+"</td>";
                fila+="<td>"+ item.fechaInicio+"</td>";
                fila+="<td>"+ item.fechaFin+"</td>";
                fila+="<td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarVacacion' onClick='actualizarVacacion("+item.id+")'><i class='fa fa-refresh'></i></button></td>";
                fila+="<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarVacacion("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>";
                
                $("#tablaVacacion").append(fila);
                                
             }); 
        },
        complete: function () {     
        
        },
        error: function () {
            
        }
    });


    //alert('ssss');
   //alert($( "#dtpFecha" ).val());
//    $.get('buscarVacacion/'+$('#B_Vacacion').val() , function (data) { //ruta que especifica que metodo ejecutar en resource
//               // limpia el tbody de la tabla
//               //alert(2); 
//               $('#tablaVacacion').html('');
//              $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
//                $("#tablaVacacion").append(
//                       "<tr id='"+item.id+"'>"+
//                       "<td>"+ item.usuario.nombres+" "+ item.usuario.apellidos+"</td>"+
//                        "<td>"+ item.descripcion+"</td>"+
//                        "<td>"+ item.fechaInicio+"</td>"+
//                        "<td>"+ item.fechaFin+"</td>"+
//                        "<td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarVacacion' onClick='actualizarVacacion("+item.id+")'><i class='fa fa-refresh'></i></button></td>"+
//                        "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarVacacion("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
//                 );
                
//          }); 
//     });
});




//---------------MODAL DISPONIBILIDAD

    function mostrarDisponibilidad(id){
        $('#agregardisponibilidad').modal('show');
        $('#idusuario1').val(id);
        cargarDisponibilidad(id);
    }
         

    function cargarDisponibilidad(id){
        
        $.get('listarVP/'+id, function (data) { 
            console.log(id+""+data);
            $('#cantidadDisponible').append(" "+data+" días");
             //$('#tablaD').html(''); // limpia el tbody de la tabla
            // $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
                // agregaso uno a uno los valores del objero json como una fila
                // append permite agregar codigo en una etiqueta sin remplazar el contenido anterior
                // $('#tablaD').append(
                //     '<tr>'+
                //         '<td>'+item.vacacion.usuario.nombres+' '+item.vacacion.usuario.apellidos+'</td>'+
                //         '<td >'+item.periodo.descripcion+'</td>'+
                //         '<td>'+item.cantidad+'</td>'
                // );
         //});
        }); 
    }


 ////////////////////////////VACACIONES INDIVIDUALES
 function mostrarVacacionIndividual(id){
    $.get('listarVacacionIndividual/'+id, function (data) {   //Ruta de listar
        $("#tablaVacacionUsuario").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargarVacacionIndividual(item); // carga los datos en la tabla
        });      
    });
}


function MostrarCertificado(id){
    $.get('certificado_vacaciones/'+id, function (data) {   //Ruta de listar
        $("#tablaCertificado").html("");
        $.each(data, function(i, item) { //recorre el data 
            cargarCertificado(item); // carga los datos en la tabla
        });      
    });
}


function cargarCertificado(data){
 
    $("#tablaCertificado").append(
        "<tr id='fila_cod"+"'>\
         <td>"+ data.usuario.nombres+" "+ data.usuario.apellidos+"</td>\
         <td>"+ data.usuario.cedula +"</td>\
         <td>"+ data.fechaInicio +"</td>\
         <td>"+ data.fechaFin +"</td>\
         <td>"+ data.jefeAprueba +"</td>\
         <td>"+ data.tthhAprueba +"</td>"
    );
}



function cargarVacacionIndividual(data){
 
    var fila='';

    fila+='<tr>';
    fila+='<td>'+ data.usuario.nombres+' '+ data.usuario.apellidos+'</td>';
    fila+='<td>'+ data.descripcion +'</td>';
    fila+='<td>'+ data.fechaInicio +'</td>';
    fila+='<td>'+ data.fechaFin +'</td>';
    fila+="<td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarVacacionIndividual' onClick='actualizarVacacionIndividual("+data.id+")'><i class='fa fa-refresh'></i></button></td>";
    fila+="<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarVacacionIndividual("+data.id+")'><i class='fa fa-trash'></i></button></td>";
    
    
    var url="../../TalentoHumano/public/certificado_vacaciones/"+data.usuario.id;
    if (data.estado==2) {
        fila+="<td class='row'><a href='"+url+"' class='btn btn-success' id='btn-confirm'><i class='fa fa-file-text'></i></a</td>";

    }else{
        fila+="<td class='row'><button type='button' class='btn btn-success' disabled><i class='fa fa-file-pdf-o '></i></button></td>";

    }

    $("#tablaVacacionUsuario").append(fila);



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


function descargarCertificado(id){ 
    alert(id);
    $.get('certificado_vacaciones/'+id,function(){
        
      
    });
}



function actualizarVacacionIndividual(id){ 
    //alert(id);
    $.get('actualizarVacacion/'+id,function(data){
        
        $('#idVacacion1').val(data.id);
        $('#descVacacion').val(data.descripcion);
        $('#fecIniVacacion').val(data.fechaInicio);
        $('#fechFinVacacion').val(data.fechaFin);
        $('#fechAprobJefeVacacion').val(data.fechaAprobacionJefe);
        $('#fechAprobTTHHVacacion').val(data.fechaAprobacionTTHH);
        $('#estadoVacacion').val(data.estado);
        $('#idusuario1').val(data.usuario.id);
    });
}


/*PARA ACTUALIZAR LOS DATOS DEL USUARIO*/
function updateVacacionIndividual(){ 
   var FrmData = {
        idVacacion: $('#idVacacion1').val(),
        descripcion: $('#descVacacion').val(),
        fechaInicio: $('#fecIniVacacion').val(),
        fechaFin: $('#fechFinVacacion').val(),
        fechaAprobacionJefe: $('#fechAprobJefeVacacion').val(),
        fechaAprobacionTTHH: $('#fechAprobTTHHVacacion').val(),
        estado: $('#estadoVacacion').val(),
        user_id: $('#idusuario1').val(),

    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'vacaciones/'+ $('#idVacacion').val(), // Url que se envia para la solicitud esta en el web php es la ruta
        method: "PUT",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            console.log(data);
            mostrarVacacionIndividual($('#idusuario1').val()); 
            limpiarVacacion();
        },
        
    });  
}


function eliminarVacacionIndividual(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var FrmData ;
    $.ajax({
        url: 'vacaciones/'+id, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "DELETE",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {   
          mostrarVacacionIndividual($('#idusuario1').val());                      
        }
    });
}


$( "#B_VacacionIndividual" ).change(function() {
   //alert($( "#dtpFecha" ).val());
   $.get('buscarVacacion/'+$('#B_VacacionIndividual').val() , function (data) { //ruta que especifica que metodo ejecutar en resource
              // limpia el tbody de la tabla
              //alert(2); 
              $('#tablaVacacionUsuario').html('');
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
               $("#tablaVacacionUsuario").append(
                       "<tr id='"+item.id+"'>"+
                       "<td>"+ item.usuario.nombres+" "+ item.usuario.apellidos+"</td>"+
                       "<td>"+ item.descripcion+"</td>"+
                       "<td>"+ item.fechaInicio+"</td>"+
                       "<td>"+ item.fechaFin+"</td>"+
                       "<td class='row'><button type='button' class='btn btn-info' data-toggle='modal' data-target='#actualizarVacacionIndividual' onClick='actualizarVacacionIndividual("+item.id+")'><i class='fa fa-refresh'></i></button></td>"+
                       "<td class='row'><button type='button' class='btn btn-danger' id='btn-confirm' onClick='eliminarVacacionIndividual("+item.id+")'><i class='fa fa-trash'></i></button></td></tr>"
                );
                
         }); 
    });
});




//-------------------------------------------------VACACIONES GENERALES

function mostrarVacacionGeneral(){
    $.get('listarVacacionGeneral/', function (data) {   //Ruta de listar
        $("#tablaVacacionGeneral").html("");
        $.each(data, function(i, item) { //recorre el data 

            cargarVacacionGeneral(item); // carga los datos en la tabla
        });      
    });
}



/*MUESTRA LOS DATOS DEL USUARIO SELECCIONADO  EN EL MODAL */
function cargarVacacionGeneral(data){
    var fila ="";
    fila+="<tr>";
    fila+="<td>"+ data.usuario.nombres+" "+ data.usuario.apellidos+"</td>";
    fila+="<td>"+ data.descripcion +"</td>";
    fila+="<td>"+ data.fechaInicio +"</td>";
    fila+=" <td>"+ data.fechaFin +"</td>";
    
    if (data.estado<2) {
        fila+="<td class='row'><button type='button' class='btn btn-success' onClick='AprobarVacacion("+data.id+")'><i class='fa fa-check'></i></button></td>";    
        fila+="<td class='row'><button type='button' class='btn btn-danger' onClicK='verModalReprobarVacacion("+data.id+")'><i class='fa fa-close'></i></button></td>";
    
    }else{
        fila+="<td class='row'><button type='button' class='btn btn-success' disabled><i class='fa fa-check'></i></button></td>";            
        fila+="<td class='row'><button type='button' class='btn btn-danger' disabled><i class='fa fa-close'></i></button></td>";        
    }
    

    $("#tablaVacacionGeneral").append(fila);
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








$( "#B_VacacionGeneral" ).change(function() {
   //alert($( "#dtpFecha" ).val());
   $.get('buscarVacacion/'+$('#B_VacacionGeneral').val() , function (data) { //ruta que especifica que metodo ejecutar en resource
              // limpia el tbody de la tabla
              //alert(2); 
              $('#tablaVacacionGeneral').html('');
             $.each(data, function(i, item) { // recorremos cada uno de los datos que retorna el objero json n valores
               $("#tablaVacacionGeneral").append(
                       "<tr id='"+item.id+"'>"+
                       "<td>"+ item.usuario.nombres+" "+ item.usuario.apellidos+"</td>"+
                       "<td>"+ item.descripcion+"</td>"+
                       "<td>"+ item.fechaInicio+"</td>"+
                       "<td>"+ item.fechaFin+"</td>"+
                       "<td class='row'><button type='button' class='btn btn-success' onClick='AprobarPermiso("+data.id+")'><i class='fa fa-check'></i></button></td>"+
                       "<td class='row'><button type='button' class='btn btn-danger' onClick=''><i class='fa fa-close'></i></button></td>"  
                                            

                );
                
         }); 
    });
});



function AprobarVacacion(_id){
    //alert('yupi');
  var FrmData ={
    idVacacion: _id,
    idusuario: $('#idusuario1').val(),
  }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: 'modificarVacacion/'+FrmData, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
           
            mostrarVacacionGeneral();
            if (data.estado<2) {
                alert("Haz aprobado este permiso");
            }if(data.estado==2){
                alert("El pemiso ya ha sido consedido");
            }
        },
        complete: function () {     
           
        }
    });  
}



function verModalReprobarVacacion(_id) {
    //alert("jo");
    $('#idVacacion_g').val(_id);
    //alert($('#idPermiso_g').val());
    $.get('getObservacionvacacion/'+_id,function (data) {
        $('#txtObservacionVacacion').val(data);
    });
    //getObservacion

    $('#addObservacionVacacion').modal('show');
    
    
}


$('#GuardarObservacionVacacion').on('click',function () {
    var FrmData ={
        idPermiso: $('#idVacacion_g').val(),
        idusuario: $('#idusuario_').val(),
        observacion: $('#txtObservacionVacacion').val(),
    }
    
    //alert(FrmData.idPermiso);//+" ;idusuario: "+FrmData.idusuario+" ;observacion: "+FrmData.observacion);
    

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'addObservacionvacacion/'+FrmData, // Url que se envia para la solicitud esta en el web php es la ruta
        method: "POST",             // Tipo de solicitud que se enviará, llamado como método
        data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
        success: function (data)   // Una función a ser llamada si la solicitud tiene éxito
        {
            //alert('ok');
            $('#addObservacionVacacion').modal('hide');
        },
        complete: function () {     
           
        },
        error:function () {
            
        }
    });    
});

function vermensajeObservacionVacacion(_id) {
    //$('#txtmensajeObservacion').val();
    //alert(_id);
    $.get('getObservacionvacacion/'+_id,function (data) {
        $('#txtmensajeObservacionVacacion').html(data);
        //alert(data);
        //alert(_id);
    });
    // $('#mensajeObservacion').modal('show');    

     
}